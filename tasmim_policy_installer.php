<?php
/**
 * Tasmim Policy Installer
 *
 * Automatically installs policy CMS pages in multiple languages.
 * Reusable across Tasmim themes.
 *
 * @author Tasmim
 * @license MIT
 */

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

class Tasmim_Policy_Installer extends Module
{
    /**
     * Supported language ISO codes
     */
    private const SUPPORTED_LANGUAGES = ['sv', 'en', 'da', 'ar'];

    /**
     * Placeholders to check for validation
     */
    private const PLACEHOLDERS = [
        '[COMPANY_NAME]',
        '[ORG_NUMBER]',
        '[ADDRESS]',
        '[EMAIL]',
        '[PHONE]',
    ];

    public function __construct()
    {
        $this->name = 'tasmim_policy_installer';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Tasmim';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Tasmim Policy Installer', [], 'Modules.Tasmimpolicyinstaller.Admin');
        $this->description = $this->trans('Installs policy CMS pages (Privacy Policy, Terms, etc.) in multiple languages.', [], 'Modules.Tasmimpolicyinstaller.Admin');
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];
    }

    public function install(): bool
    {
        return parent::install()
            && $this->registerHook('actionDispatcherAfter')
            && Configuration::updateValue('TASMIM_POLICY_DELETE_ON_UNINSTALL', false);
    }

    /**
     * Hook: After any controller action - check if link block was saved
     */
    public function hookActionDispatcherAfter(array $params): void
    {
        // Only run in admin/backoffice context
        if (($params['controller_type'] ?? 0) !== 2) {
            return;
        }

        $controller = $params['controller_class'] ?? '';

        // Check if this is the link block controller (any action - list, edit, create)
        // We reapply ordering to ensure it's always correct after any link block changes
        if (str_contains($controller, 'LinkBlockController')) {
            // Use static flag to prevent multiple executions in same request
            static $reordered = false;
            if (!$reordered) {
                $reordered = true;
                $this->reapplyFooterLinkOrder();
            }
        }
    }

    /**
     * Reapply footer link ordering for policy pages
     */
    private function reapplyFooterLinkOrder(): void
    {
        $pages = $this->getCmsPagesData();

        // Collect all policy page CMS IDs with their desired order
        $policyPageIds = [];
        foreach (array_keys($pages) as $slug) {
            $cmsId = $this->findCmsPageBySlug($slug);
            if ($cmsId) {
                $order = self::FOOTER_LINK_ORDER[$slug] ?? 99;
                $policyPageIds[$order] = $cmsId;
            }
        }

        if (empty($policyPageIds)) {
            return;
        }

        ksort($policyPageIds);
        $this->setFooterLinksInOrder(array_values($policyPageIds));
    }

    public function uninstall(): bool
    {
        if (Configuration::get('TASMIM_POLICY_DELETE_ON_UNINSTALL')) {
            $this->deleteCmsPages();
        }

        // Clean up configuration
        Configuration::deleteByName('TASMIM_POLICY_DELETE_ON_UNINSTALL');

        // Clean up backups
        $pages = $this->getCmsPagesData();
        foreach (array_keys($pages) as $slug) {
            Configuration::deleteByName('TASMIM_BACKUP_' . strtoupper($slug));
        }

        return parent::uninstall();
    }

    /**
     * Admin configuration page
     */
    public function getContent(): string
    {
        $output = '';

        // Handle form submissions
        if (Tools::isSubmit('submitInstallPages')) {
            $output .= $this->processInstallPages();
        } elseif (Tools::isSubmit('submitInstallSinglePage')) {
            $slug = Tools::getValue('page_slug');
            $output .= $this->processInstallSinglePage($slug);
        } elseif (Tools::isSubmit('submitRestorePage')) {
            $slug = Tools::getValue('page_slug');
            $output .= $this->processRestorePage($slug);
        } elseif (Tools::isSubmit('submitAddFooterLinks')) {
            $output .= $this->processAddFooterLinks();
        } elseif (Tools::isSubmit('submitSaveSettings')) {
            Configuration::updateValue('TASMIM_POLICY_DELETE_ON_UNINSTALL', (bool) Tools::getValue('delete_on_uninstall'));
            $output .= $this->displayConfirmation($this->trans('Settings saved.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        return $output . $this->renderConfigurationPage();
    }

    /**
     * Render the admin configuration page
     */
    private function renderConfigurationPage(): string
    {
        $this->context->smarty->assign([
            'module_dir' => $this->_path,
            'pages_status' => $this->getPagesStatus(),
            'active_languages' => $this->getActiveLanguagesInfo(),
            'supported_languages' => self::SUPPORTED_LANGUAGES,
            'placeholder_warnings' => $this->checkPlaceholders(),
            'delete_on_uninstall' => (bool) Configuration::get('TASMIM_POLICY_DELETE_ON_UNINSTALL'),
            'token' => Tools::getAdminTokenLite('AdminModules'),
            'configure_link' => $this->context->link->getAdminLink('AdminModules', true, [], ['configure' => $this->name]),
        ]);

        return $this->context->smarty->fetch($this->getLocalPath() . 'views/templates/admin/configure.tpl');
    }

    /**
     * Install all CMS pages
     */
    private function processInstallPages(): string
    {
        $pages = $this->getCmsPagesData();
        $installed = 0;
        $updated = 0;
        $errors = [];

        foreach ($pages as $slug => $pageData) {
            try {
                $result = $this->installOrUpdatePage($slug, $pageData);
                if ($result === 'created') {
                    $installed++;
                } elseif ($result === 'updated') {
                    $updated++;
                }
            } catch (Exception $e) {
                $errors[] = sprintf('%s: %s', $slug, $e->getMessage());
            }
        }

        $output = '';
        if ($installed > 0) {
            $output .= $this->displayConfirmation(sprintf(
                $this->trans('%d page(s) created.', [], 'Modules.Tasmimpolicyinstaller.Admin'),
                $installed
            ));
        }
        if ($updated > 0) {
            $output .= $this->displayConfirmation(sprintf(
                $this->trans('%d page(s) updated.', [], 'Modules.Tasmimpolicyinstaller.Admin'),
                $updated
            ));
        }
        foreach ($errors as $error) {
            $output .= $this->displayError($error);
        }

        return $output;
    }

    /**
     * Install or update a single page
     */
    private function processInstallSinglePage(string $slug): string
    {
        $pages = $this->getCmsPagesData();
        if (!isset($pages[$slug])) {
            return $this->displayError($this->trans('Unknown page slug.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        try {
            $result = $this->installOrUpdatePage($slug, $pages[$slug], true);
            return $this->displayConfirmation(sprintf(
                $this->trans('Page "%s" %s successfully.', [], 'Modules.Tasmimpolicyinstaller.Admin'),
                $slug,
                $result === 'created' ? 'created' : 'reinstalled'
            ));
        } catch (Exception $e) {
            return $this->displayError($e->getMessage());
        }
    }

    /**
     * Restore a page from backup
     */
    private function processRestorePage(string $slug): string
    {
        $backup = Configuration::get('TASMIM_BACKUP_' . strtoupper($slug));
        if (!$backup) {
            return $this->displayError($this->trans('No backup found for this page.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        $backupData = json_decode($backup, true);
        if (!$backupData) {
            return $this->displayError($this->trans('Invalid backup data.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        $cmsId = $this->findCmsPageBySlug($slug);
        if (!$cmsId) {
            return $this->displayError($this->trans('Page not found.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        $cms = new CMS($cmsId);
        foreach ($backupData as $langId => $content) {
            $cms->meta_title[$langId] = $content['meta_title'];
            $cms->meta_description[$langId] = $content['meta_description'];
            $cms->content[$langId] = $content['content'];
        }

        if ($cms->save()) {
            return $this->displayConfirmation($this->trans('Page restored from backup.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
        }

        return $this->displayError($this->trans('Failed to restore page.', [], 'Modules.Tasmimpolicyinstaller.Admin'));
    }

    /**
     * Desired order for footer links (slug => position)
     */
    private const FOOTER_LINK_ORDER = [
        'om-oss' => 1,
        'leverans' => 2,
        'angerratt-returer' => 3,
        'saker-betalning' => 4,
        'kopvillkor' => 5,
        'integritetspolicy' => 6,
        'cookiepolicy' => 7,
        'cookie-samtycke' => 8,
    ];

    /**
     * Add footer links for all policy pages
     */
    private function processAddFooterLinks(): string
    {
        $pages = $this->getCmsPagesData();

        // Collect all policy page CMS IDs with their desired order
        $policyPageIds = [];
        foreach (array_keys($pages) as $slug) {
            $cmsId = $this->findCmsPageBySlug($slug);
            if ($cmsId) {
                $order = self::FOOTER_LINK_ORDER[$slug] ?? 99;
                $policyPageIds[$order] = $cmsId;
            }
        }
        ksort($policyPageIds);

        // Add all pages to footer in correct order
        $result = $this->setFooterLinksInOrder(array_values($policyPageIds));

        if ($result) {
            return $this->displayConfirmation(
                $this->trans('Footer links updated with correct ordering.', [], 'Modules.Tasmimpolicyinstaller.Admin')
            );
        }

        return $this->displayError(
            $this->trans('Failed to update footer links.', [], 'Modules.Tasmimpolicyinstaller.Admin')
        );
    }

    /**
     * Set footer links in specific order, preserving existing non-policy links
     */
    private function setFooterLinksInOrder(array $policyPageIds): bool
    {
        // Find "Our company" footer link block
        $sql = new DbQuery();
        $sql->select('lb.id_link_block, lb.content');
        $sql->from('link_block', 'lb');
        $sql->innerJoin('hook', 'h', 'lb.id_hook = h.id_hook');
        $sql->innerJoin('link_block_lang', 'lbl', 'lb.id_link_block = lbl.id_link_block');
        $sql->where('h.name = "displayFooter"');
        $sql->where('lbl.name LIKE "%company%" OR lbl.name LIKE "%företag%" OR lbl.name LIKE "%firma%" OR lbl.name = "Information"');
        $sql->groupBy('lb.id_link_block');

        $block = Db::getInstance()->getRow($sql);

        if (!$block) {
            return false;
        }

        // Parse existing content
        $content = json_decode($block['content'], true);
        if (!$content) {
            $content = ['cms' => [], 'product' => [false], 'static' => [false], 'category' => [false]];
        }

        // Get existing CMS IDs (excluding our policy pages)
        $existingCms = isset($content['cms']) && is_array($content['cms']) ? $content['cms'] : [];
        $existingCms = array_filter($existingCms, function ($v) {
            return $v !== false && $v !== 'false';
        });

        // Remove policy page IDs from existing list
        $policyIdsStr = array_map('strval', $policyPageIds);
        $otherCms = array_filter($existingCms, function ($id) use ($policyIdsStr) {
            return !in_array((string) $id, $policyIdsStr, true);
        });

        // Build new CMS array: policy pages first (in order), then other pages
        $newCms = array_merge($policyIdsStr, array_values($otherCms));
        $content['cms'] = $newCms;

        // Update the link block
        return (bool) Db::getInstance()->update(
            'link_block',
            ['content' => json_encode($content)],
            'id_link_block = ' . (int) $block['id_link_block']
        );
    }

    /**
     * Install or update a CMS page
     */
    private function installOrUpdatePage(string $slug, array $pageData, bool $forceOverwrite = false): string
    {
        $languages = Language::getLanguages(true);
        $existingId = $this->findCmsPageBySlug($slug);

        if ($existingId) {
            // Backup existing content before overwrite
            $this->backupPageContent($existingId, $slug);

            $cms = new CMS($existingId);
            $action = 'updated';
        } else {
            $cms = new CMS();
            $cms->id_cms_category = $pageData['category'] ?? 1;
            $cms->active = $pageData['active'] ?? 1;
            $cms->indexation = 1;
            $action = 'created';
        }

        // Set content for each active language
        foreach ($languages as $lang) {
            $isoCode = $lang['iso_code'];
            $langId = (int) $lang['id_lang'];

            // Use matching language content or fall back to English
            if (isset($pageData['content'][$isoCode])) {
                $content = $pageData['content'][$isoCode];
            } elseif (isset($pageData['content']['en'])) {
                $content = $pageData['content']['en'];
            } else {
                continue;
            }

            // Only update if new or force overwrite
            if ($action === 'created' || $forceOverwrite || empty($cms->content[$langId])) {
                $cms->meta_title[$langId] = $content['title'];
                $cms->meta_description[$langId] = $content['meta_desc'] ?? '';
                $cms->meta_keywords[$langId] = $content['meta_keywords'] ?? '';
                $cms->content[$langId] = $content['html'];
                // Use language-specific slug if available, otherwise fall back to main slug
                $cms->link_rewrite[$langId] = $content['slug'] ?? $slug;
            }
        }

        if (!$cms->save()) {
            throw new Exception('Failed to save CMS page: ' . $slug);
        }

        // Associate with all shops
        if (Shop::isFeatureActive()) {
            $shops = Shop::getShops(true, null, true);
            foreach ($shops as $shopId) {
                $cms->associateTo($shopId);
            }
        }

        return $action;
    }

    /**
     * Find CMS page ID by link_rewrite slug
     */
    private function findCmsPageBySlug(string $slug): ?int
    {
        $sql = new DbQuery();
        $sql->select('c.id_cms');
        $sql->from('cms', 'c');
        $sql->innerJoin('cms_lang', 'cl', 'c.id_cms = cl.id_cms');
        $sql->where('cl.link_rewrite = \'' . pSQL($slug) . '\'');
        $sql->groupBy('c.id_cms');

        $result = Db::getInstance()->getValue($sql);
        return $result ? (int) $result : null;
    }

    /**
     * Backup page content before overwrite
     */
    private function backupPageContent(int $cmsId, string $slug): void
    {
        $cms = new CMS($cmsId);
        $backup = [];

        foreach (Language::getLanguages(true) as $lang) {
            $langId = (int) $lang['id_lang'];
            if (!empty($cms->content[$langId])) {
                $backup[$langId] = [
                    'meta_title' => $cms->meta_title[$langId] ?? '',
                    'meta_description' => $cms->meta_description[$langId] ?? '',
                    'content' => $cms->content[$langId],
                ];
            }
        }

        if (!empty($backup)) {
            Configuration::updateValue('TASMIM_BACKUP_' . strtoupper($slug), json_encode($backup));
        }
    }

    /**
     * Delete all CMS pages created by this module
     */
    private function deleteCmsPages(): void
    {
        $pages = $this->getCmsPagesData();
        foreach (array_keys($pages) as $slug) {
            $cmsId = $this->findCmsPageBySlug($slug);
            if ($cmsId) {
                $cms = new CMS($cmsId);
                $cms->delete();
            }
        }
    }

    /**
     * Get status of all pages
     */
    private function getPagesStatus(): array
    {
        $pages = $this->getCmsPagesData();
        $languages = Language::getLanguages(true);
        $status = [];

        foreach ($pages as $slug => $pageData) {
            $cmsId = $this->findCmsPageBySlug($slug);
            $pageStatus = [
                'slug' => $slug,
                'title' => $pageData['content']['en']['title'] ?? $slug,
                'exists' => (bool) $cmsId,
                'cms_id' => $cmsId,
                'languages' => [],
                'has_backup' => (bool) Configuration::get('TASMIM_BACKUP_' . strtoupper($slug)),
            ];

            if ($cmsId) {
                $cms = new CMS($cmsId);
                foreach ($languages as $lang) {
                    $langId = (int) $lang['id_lang'];
                    $pageStatus['languages'][$lang['iso_code']] = !empty($cms->content[$langId]);
                }
            }

            $status[$slug] = $pageStatus;
        }

        return $status;
    }

    /**
     * Get active languages info
     */
    private function getActiveLanguagesInfo(): array
    {
        $languages = Language::getLanguages(true);
        $info = [];

        foreach ($languages as $lang) {
            $info[] = [
                'id' => (int) $lang['id_lang'],
                'iso_code' => $lang['iso_code'],
                'name' => $lang['name'],
                'supported' => in_array($lang['iso_code'], self::SUPPORTED_LANGUAGES),
            ];
        }

        return $info;
    }

    /**
     * Check for unreplaced placeholders in installed pages
     */
    private function checkPlaceholders(): array
    {
        $warnings = [];
        $pages = $this->getCmsPagesData();

        foreach (array_keys($pages) as $slug) {
            $cmsId = $this->findCmsPageBySlug($slug);
            if (!$cmsId) {
                continue;
            }

            $cms = new CMS($cmsId);
            foreach (Language::getLanguages(true) as $lang) {
                $langId = (int) $lang['id_lang'];
                $content = $cms->content[$langId] ?? '';

                foreach (self::PLACEHOLDERS as $placeholder) {
                    if (strpos($content, $placeholder) !== false) {
                        $warnings[] = [
                            'page' => $slug,
                            'language' => $lang['iso_code'],
                            'placeholder' => $placeholder,
                        ];
                    }
                }
            }
        }

        return $warnings;
    }

    /**
     * Get CMS pages data from data file
     */
    private function getCmsPagesData(): array
    {
        $dataFile = $this->getLocalPath() . 'data/cms_pages.php';
        if (file_exists($dataFile)) {
            return include $dataFile;
        }
        return [];
    }
}
