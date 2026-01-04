<?php
/**
 * Tasmim Consent & Policy Manager
 *
 * Comprehensive PrestaShop module that:
 * - Installs policy CMS pages in multiple languages
 * - Manages GDPR consent messages
 * - Provides EU-compliant cookie consent banner with Google Consent Mode v2
 *
 * @author Tasmim
 * @license MIT
 */

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

class Tasmim_Consent_Policy_Manager extends Module
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
        $this->name = 'tasmim_consent_policy_manager';
        $this->tab = 'front_office_features';
        $this->version = '1.1.0';
        $this->author = 'Tasmim';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Tasmim Consent & Policy Manager', [], 'Modules.Tasmimconsentpolicymanager.Admin');
        $this->description = $this->trans('Manages policy CMS pages, GDPR consent, and EU-compliant cookie consent banner with Google Consent Mode v2.', [], 'Modules.Tasmimconsentpolicymanager.Admin');
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];
    }

    public function install(): bool
    {
        return parent::install()
            && $this->registerHook('actionDispatcherAfter')
            && $this->registerHook('displayHeader')
            && $this->registerHook('actionFrontControllerSetMedia')
            && $this->registerHook('displayBeforeBodyClosingTag')
            && Configuration::updateValue('TASMIM_POLICY_DELETE_ON_UNINSTALL', false)
            && Configuration::updateValue('TASMIM_COOKIE_CONSENT_ENABLED', false)
            && Configuration::updateValue('TASMIM_GCM_ENABLED', true)
            && Configuration::updateValue('TASMIM_CONSENT_LAYOUT', 'box')
            && Configuration::updateValue('TASMIM_CONSENT_POSITION', 'bottom-left')
            && Configuration::updateValue('TASMIM_IFRAMEMANAGER_ENABLED', false);
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
     * Hook: Register CSS and JS assets for cookie consent
     */
    public function hookActionFrontControllerSetMedia(array $params): void
    {
        if (!Configuration::get('TASMIM_COOKIE_CONSENT_ENABLED')) {
            return;
        }

        // Register CookieConsent CSS
        $this->context->controller->registerStylesheet(
            'tasmim-cookieconsent-css',
            'modules/' . $this->name . '/views/css/cookieconsent.min.css',
            ['media' => 'all', 'priority' => 10]
        );

        // Register CookieConsent JS
        $this->context->controller->registerJavascript(
            'tasmim-cookieconsent-js',
            'modules/' . $this->name . '/views/js/cookieconsent.umd.js',
            ['position' => 'bottom', 'priority' => 100]
        );

        // Register IframeManager if enabled
        if (Configuration::get('TASMIM_IFRAMEMANAGER_ENABLED')) {
            $this->context->controller->registerStylesheet(
                'tasmim-iframemanager-css',
                'modules/' . $this->name . '/views/css/iframemanager.min.css',
                ['media' => 'all', 'priority' => 11]
            );
            $this->context->controller->registerJavascript(
                'tasmim-iframemanager-js',
                'modules/' . $this->name . '/views/js/iframemanager.umd.js',
                ['position' => 'bottom', 'priority' => 101]
            );
        }
    }

    /**
     * Hook: Output Google Consent Mode v2 defaults in header
     * This MUST run before any tracking scripts (GA, FB Pixel, etc.)
     */
    public function hookDisplayHeader(array $params): string
    {
        if (!Configuration::get('TASMIM_COOKIE_CONSENT_ENABLED')) {
            return '';
        }

        if (!Configuration::get('TASMIM_GCM_ENABLED')) {
            return '';
        }

        $this->context->smarty->assign([
            'gcm_enabled' => true,
        ]);

        return $this->context->smarty->fetch(
            $this->getLocalPath() . 'views/templates/front/consent-defaults.tpl'
        );
    }

    /**
     * Hook: Output cookie consent banner initialization before body closing tag
     */
    public function hookDisplayBeforeBodyClosingTag(array $params): string
    {
        if (!Configuration::get('TASMIM_COOKIE_CONSENT_ENABLED')) {
            return '';
        }

        $cookiePolicyCmsId = (int) Configuration::get('TASMIM_COOKIE_POLICY_CMS_ID');
        $cookiePolicyUrl = '';
        if ($cookiePolicyCmsId) {
            $cookiePolicyUrl = $this->context->link->getCMSLink($cookiePolicyCmsId);
        }

        $cookieConsentData = $this->getCookieConsentData();

        $this->context->smarty->assign([
            'cookie_consent_config' => $this->getCookieConsentConfig(),
            'cookie_consent_translations' => $this->getCookieConsentTranslations(),
            'cookie_table_data' => $this->getCookieTableData(),
            'cookie_consent_data' => $cookieConsentData,
            'cookie_policy_url' => $cookiePolicyUrl,
            'current_lang' => $this->context->language->iso_code,
            'gcm_enabled' => (bool) Configuration::get('TASMIM_GCM_ENABLED'),
            'iframemanager_enabled' => (bool) Configuration::get('TASMIM_IFRAMEMANAGER_ENABLED'),
        ]);

        return $this->context->smarty->fetch(
            $this->getLocalPath() . 'views/templates/front/cookie-consent-config.tpl'
        );
    }

    /**
     * Get cookie consent configuration
     */
    private function getCookieConsentConfig(): array
    {
        return [
            'enabled' => (bool) Configuration::get('TASMIM_COOKIE_CONSENT_ENABLED'),
            'gcm_enabled' => (bool) Configuration::get('TASMIM_GCM_ENABLED'),
            'layout' => Configuration::get('TASMIM_CONSENT_LAYOUT') ?: 'box',
            'position' => Configuration::get('TASMIM_CONSENT_POSITION') ?: 'bottom-left',
            'cookie_policy_cms_id' => (int) Configuration::get('TASMIM_COOKIE_POLICY_CMS_ID'),
            'iframemanager_enabled' => (bool) Configuration::get('TASMIM_IFRAMEMANAGER_ENABLED'),
        ];
    }

    /**
     * Get cookie consent translations (merged with defaults)
     */
    private function getCookieConsentTranslations(): array
    {
        $defaults = $this->getCookieConsentData();
        $customTranslations = Configuration::get('TASMIM_CONSENT_TRANSLATIONS');

        if ($customTranslations) {
            $custom = json_decode($customTranslations, true);
            if (is_array($custom)) {
                return array_replace_recursive($defaults['translations'] ?? [], $custom);
            }
        }

        return $defaults['translations'] ?? [];
    }

    /**
     * Get cookie table data for preferences modal
     */
    private function getCookieTableData(): array
    {
        $defaults = $this->getCookieConsentData();
        $customTable = Configuration::get('TASMIM_COOKIE_TABLE');

        if ($customTable) {
            $custom = json_decode($customTable, true);
            if (is_array($custom)) {
                return array_replace_recursive($defaults['cookie_table'] ?? [], $custom);
            }
        }

        return $defaults['cookie_table'] ?? [];
    }

    /**
     * Get cookie consent default data from data file
     */
    private function getCookieConsentData(): array
    {
        $dataFile = $this->getLocalPath() . 'data/cookie_consent.php';
        if (file_exists($dataFile)) {
            return include $dataFile;
        }
        return [];
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

        // Clean up cookie consent configuration
        Configuration::deleteByName('TASMIM_COOKIE_CONSENT_ENABLED');
        Configuration::deleteByName('TASMIM_GCM_ENABLED');
        Configuration::deleteByName('TASMIM_CONSENT_LAYOUT');
        Configuration::deleteByName('TASMIM_CONSENT_POSITION');
        Configuration::deleteByName('TASMIM_COOKIE_POLICY_CMS_ID');
        Configuration::deleteByName('TASMIM_IFRAMEMANAGER_ENABLED');
        Configuration::deleteByName('TASMIM_CONSENT_CATEGORIES');
        Configuration::deleteByName('TASMIM_COOKIE_TABLE');
        Configuration::deleteByName('TASMIM_CONSENT_TRANSLATIONS');

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
            $output .= $this->displayConfirmation($this->trans('Settings saved.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        } elseif (Tools::isSubmit('submitUpdateGdprMessages')) {
            $output .= $this->processUpdateGdprMessages();
        } elseif (Tools::isSubmit('submitSaveCookieConsent')) {
            $output .= $this->processSaveCookieConsentSettings();
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
            'gdpr_status' => $this->getGdprConsentStatus(),
            'cookie_consent' => $this->getCookieConsentConfig(),
            'cms_pages' => $this->getAllCmsPages(),
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
                $this->trans('%d page(s) created.', [], 'Modules.Tasmimconsentpolicymanager.Admin'),
                $installed
            ));
        }
        if ($updated > 0) {
            $output .= $this->displayConfirmation(sprintf(
                $this->trans('%d page(s) updated.', [], 'Modules.Tasmimconsentpolicymanager.Admin'),
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
            return $this->displayError($this->trans('Unknown page slug.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        }

        try {
            $result = $this->installOrUpdatePage($slug, $pages[$slug], true);
            return $this->displayConfirmation(sprintf(
                $this->trans('Page "%s" %s successfully.', [], 'Modules.Tasmimconsentpolicymanager.Admin'),
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
            return $this->displayError($this->trans('No backup found for this page.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        }

        $backupData = json_decode($backup, true);
        if (!$backupData) {
            return $this->displayError($this->trans('Invalid backup data.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        }

        $cmsId = $this->findCmsPageBySlug($slug);
        if (!$cmsId) {
            return $this->displayError($this->trans('Page not found.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        }

        $cms = new CMS($cmsId);
        foreach ($backupData as $langId => $content) {
            $cms->meta_title[$langId] = $content['meta_title'];
            $cms->meta_description[$langId] = $content['meta_description'];
            $cms->content[$langId] = $content['content'];
        }

        if ($cms->save()) {
            return $this->displayConfirmation($this->trans('Page restored from backup.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
        }

        return $this->displayError($this->trans('Failed to restore page.', [], 'Modules.Tasmimconsentpolicymanager.Admin'));
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
                $this->trans('Footer links updated with correct ordering.', [], 'Modules.Tasmimconsentpolicymanager.Admin')
            );
        }

        return $this->displayError(
            $this->trans('Failed to update footer links.', [], 'Modules.Tasmimconsentpolicymanager.Admin')
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

    /**
     * Get GDPR consent messages data from data file
     */
    private function getGdprConsentData(): array
    {
        $dataFile = $this->getLocalPath() . 'data/gdpr_consent.php';
        if (file_exists($dataFile)) {
            return include $dataFile;
        }
        return [];
    }

    /**
     * Process GDPR consent messages update
     */
    private function processUpdateGdprMessages(): string
    {
        // Check if psgdpr module is installed
        if (!Module::isInstalled('psgdpr')) {
            return $this->displayError(
                $this->trans('The GDPR module (psgdpr) is not installed. Please install it first.', [], 'Modules.Tasmimconsentpolicymanager.Admin')
            );
        }

        $gdprData = $this->getGdprConsentData();
        if (empty($gdprData)) {
            return $this->displayError(
                $this->trans('No GDPR consent data found.', [], 'Modules.Tasmimconsentpolicymanager.Admin')
            );
        }

        $languages = Language::getLanguages(true);
        $errors = [];
        $updated = [];

        // Update account form consents (stored in Configuration)
        $accountForms = [
            'creation_form' => 'PSGDPR_CREATION_FORM',
            'customer_form' => 'PSGDPR_CUSTOMER_FORM',
        ];

        foreach ($accountForms as $key => $configKey) {
            if (!isset($gdprData[$key])) {
                continue;
            }

            $values = [];
            foreach ($languages as $lang) {
                $isoCode = $lang['iso_code'];
                $langId = (int) $lang['id_lang'];

                if (isset($gdprData[$key][$isoCode])) {
                    $values[$langId] = $gdprData[$key][$isoCode];
                } elseif (isset($gdprData[$key]['en'])) {
                    $values[$langId] = $gdprData[$key]['en'];
                }
            }

            if (!empty($values)) {
                Configuration::updateValue($configKey, $values);
                // Enable the consent checkbox
                Configuration::updateValue($configKey . '_SWITCH', 1);
                $updated[] = $key;
            }
        }

        // Update module-specific consents (stored in psgdpr_consent_lang table)
        $moduleConsents = [
            'productcomments' => 'productcomments',
            'contactform' => 'contactform',
            'ps_emailalerts' => 'ps_emailalerts',
        ];

        foreach ($moduleConsents as $key => $moduleName) {
            if (!isset($gdprData[$key])) {
                continue;
            }

            $result = $this->updateModuleConsent($moduleName, $gdprData[$key], $languages);
            if ($result === true) {
                $updated[] = $key;
            } elseif (is_string($result)) {
                $errors[] = $result;
            }
        }

        $output = '';
        if (!empty($updated)) {
            $output .= $this->displayConfirmation(sprintf(
                $this->trans('GDPR consent messages updated: %s', [], 'Modules.Tasmimconsentpolicymanager.Admin'),
                implode(', ', $updated)
            ));
        }

        foreach ($errors as $error) {
            $output .= $this->displayWarning($error);
        }

        return $output;
    }

    /**
     * Update consent message for a specific module
     */
    private function updateModuleConsent(string $moduleName, array $messages, array $languages): bool|string
    {
        // Get module ID
        $moduleId = (int) Db::getInstance()->getValue(
            'SELECT id_module FROM `' . _DB_PREFIX_ . 'module` WHERE name = \'' . pSQL($moduleName) . '\''
        );

        if (!$moduleId) {
            return sprintf('Module "%s" not found', $moduleName);
        }

        // Check if consent entry exists for this module
        $consentId = (int) Db::getInstance()->getValue(
            'SELECT id_gdpr_consent FROM `' . _DB_PREFIX_ . 'psgdpr_consent` WHERE id_module = ' . $moduleId
        );

        if (!$consentId) {
            // Create consent entry
            Db::getInstance()->insert('psgdpr_consent', [
                'id_module' => $moduleId,
                'active' => 1,
                'error' => 0,
                'error_message' => '',
                'date_add' => date('Y-m-d H:i:s'),
                'date_upd' => date('Y-m-d H:i:s'),
            ]);
            $consentId = (int) Db::getInstance()->Insert_ID();
        } else {
            // Ensure consent is active
            Db::getInstance()->update('psgdpr_consent', [
                'active' => 1,
                'date_upd' => date('Y-m-d H:i:s'),
            ], 'id_gdpr_consent = ' . $consentId);
        }

        $shopId = (int) $this->context->shop->id;

        // Update messages for each language
        foreach ($languages as $lang) {
            $isoCode = $lang['iso_code'];
            $langId = (int) $lang['id_lang'];

            $message = $messages[$isoCode] ?? $messages['en'] ?? '';
            if (empty($message)) {
                continue;
            }

            // Check if lang entry exists
            $exists = Db::getInstance()->getValue(
                'SELECT 1 FROM `' . _DB_PREFIX_ . 'psgdpr_consent_lang`
                WHERE id_gdpr_consent = ' . $consentId . '
                AND id_lang = ' . $langId . '
                AND id_shop = ' . $shopId
            );

            if ($exists) {
                Db::getInstance()->update('psgdpr_consent_lang', [
                    'message' => pSQL($message, true),
                ], 'id_gdpr_consent = ' . $consentId . ' AND id_lang = ' . $langId . ' AND id_shop = ' . $shopId);
            } else {
                Db::getInstance()->insert('psgdpr_consent_lang', [
                    'id_gdpr_consent' => $consentId,
                    'id_lang' => $langId,
                    'id_shop' => $shopId,
                    'message' => pSQL($message, true),
                ]);
            }
        }

        return true;
    }

    /**
     * Get GDPR consent status for admin display
     */
    private function getGdprConsentStatus(): array
    {
        $status = [
            'psgdpr_installed' => Module::isInstalled('psgdpr'),
            'consents' => [],
        ];

        if (!$status['psgdpr_installed']) {
            return $status;
        }

        $gdprData = $this->getGdprConsentData();
        $languages = Language::getLanguages(true);

        // Check account forms
        $accountForms = [
            'creation_form' => ['config' => 'PSGDPR_CREATION_FORM', 'label' => 'Account Creation Form'],
            'customer_form' => ['config' => 'PSGDPR_CUSTOMER_FORM', 'label' => 'Customer Account Form'],
        ];

        foreach ($accountForms as $key => $info) {
            $active = (bool) Configuration::get($info['config'] . '_SWITCH');
            $langStatus = [];

            foreach ($languages as $lang) {
                $langId = (int) $lang['id_lang'];
                $message = Configuration::get($info['config'], $langId);
                $langStatus[$lang['iso_code']] = !empty($message);
            }

            $status['consents'][$key] = [
                'label' => $info['label'],
                'active' => $active,
                'languages' => $langStatus,
                'has_data' => isset($gdprData[$key]),
            ];
        }

        // Check module consents
        $moduleConsents = [
            'productcomments' => 'Product Comments',
            'contactform' => 'Contact Form',
            'ps_emailalerts' => 'Email Alerts',
        ];

        $shopId = (int) $this->context->shop->id;

        foreach ($moduleConsents as $moduleName => $label) {
            $moduleId = (int) Db::getInstance()->getValue(
                'SELECT id_module FROM `' . _DB_PREFIX_ . 'module` WHERE name = \'' . pSQL($moduleName) . '\''
            );

            $active = false;
            $langStatus = [];

            if ($moduleId) {
                $consent = Db::getInstance()->getRow(
                    'SELECT * FROM `' . _DB_PREFIX_ . 'psgdpr_consent` WHERE id_module = ' . $moduleId
                );

                if ($consent) {
                    $active = (bool) ($consent['active'] ?? false);
                    $consentId = (int) $consent['id_gdpr_consent'];

                    foreach ($languages as $lang) {
                        $langId = (int) $lang['id_lang'];
                        $message = Db::getInstance()->getValue(
                            'SELECT message FROM `' . _DB_PREFIX_ . 'psgdpr_consent_lang`
                            WHERE id_gdpr_consent = ' . $consentId . '
                            AND id_lang = ' . $langId . '
                            AND id_shop = ' . $shopId
                        );
                        $langStatus[$lang['iso_code']] = !empty($message);
                    }
                }
            }

            $status['consents'][$moduleName] = [
                'label' => $label,
                'active' => $active,
                'languages' => $langStatus,
                'has_data' => isset($gdprData[$moduleName]),
                'module_installed' => (bool) $moduleId,
            ];
        }

        return $status;
    }

    /**
     * Process cookie consent settings form
     */
    private function processSaveCookieConsentSettings(): string
    {
        Configuration::updateValue('TASMIM_COOKIE_CONSENT_ENABLED', (bool) Tools::getValue('cookie_consent_enabled'));
        Configuration::updateValue('TASMIM_GCM_ENABLED', (bool) Tools::getValue('gcm_enabled'));
        Configuration::updateValue('TASMIM_IFRAMEMANAGER_ENABLED', (bool) Tools::getValue('iframemanager_enabled'));
        Configuration::updateValue('TASMIM_CONSENT_LAYOUT', Tools::getValue('consent_layout', 'box'));
        Configuration::updateValue('TASMIM_CONSENT_POSITION', Tools::getValue('consent_position', 'bottom-left'));
        Configuration::updateValue('TASMIM_COOKIE_POLICY_CMS_ID', (int) Tools::getValue('cookie_policy_cms_id'));

        return $this->displayConfirmation(
            $this->trans('Cookie consent settings saved.', [], 'Modules.Tasmimconsentpolicymanager.Admin')
        );
    }

    /**
     * Get all CMS pages for dropdown selection
     */
    private function getAllCmsPages(): array
    {
        $langId = (int) $this->context->language->id;

        $sql = new DbQuery();
        $sql->select('c.id_cms, cl.meta_title');
        $sql->from('cms', 'c');
        $sql->innerJoin('cms_lang', 'cl', 'c.id_cms = cl.id_cms AND cl.id_lang = ' . $langId);
        $sql->innerJoin('cms_shop', 'cs', 'c.id_cms = cs.id_cms AND cs.id_shop = ' . (int) $this->context->shop->id);
        $sql->where('c.active = 1');
        $sql->orderBy('cl.meta_title ASC');

        return Db::getInstance()->executeS($sql) ?: [];
    }
}
