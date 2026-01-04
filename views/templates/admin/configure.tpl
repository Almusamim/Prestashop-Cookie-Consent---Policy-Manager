{**
 * Tasmim Consent & Policy Manager - Admin Configuration Template
 *}

<div class="panel">
    <div class="panel-heading">
        <i class="icon-file-text"></i> {l s='Tasmim Consent & Policy Manager' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        <p>{l s='Manages policy CMS pages, GDPR consent messages, and EU-compliant cookie consent banner with Google Consent Mode v2.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
    </div>
</div>

{* Active Languages *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-globe"></i> {l s='Active Languages' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>{l s='Language' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='ISO Code' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='Content Available' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$active_languages item=lang}
                    <tr>
                        <td>{$lang.name}</td>
                        <td><code>{$lang.iso_code}</code></td>
                        <td>
                            {if $lang.supported}
                                <span class="badge badge-success">{l s='Yes' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                            {else}
                                <span class="badge badge-warning">{l s='No (will use English)' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        <p class="help-block">
            {l s='Supported languages:' d='Modules.Tasmimconsentpolicymanager.Admin'}
            {foreach from=$supported_languages item=iso name=supported}
                <code>{$iso}</code>{if !$smarty.foreach.supported.last}, {/if}
            {/foreach}
        </p>
    </div>
</div>

{* Placeholder Warnings *}
{if !empty($placeholder_warnings)}
    <div class="alert alert-warning">
        <h4><i class="icon-warning"></i> {l s='Placeholder Warnings' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
        <p>{l s='The following pages contain unreplaced placeholders. Please edit them in the CMS section:' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
        <ul>
            {foreach from=$placeholder_warnings item=warning}
                <li>
                    <strong>{$warning.page}</strong> ({$warning.language}):
                    <code>{$warning.placeholder}</code>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}

{* Pages Status *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-list"></i> {l s='CMS Pages Status' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{l s='Page' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='Slug' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='Status' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='Languages' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    <th>{l s='Actions' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$pages_status key=slug item=page}
                    <tr>
                        <td>{$page.title}</td>
                        <td><code>{$page.slug}</code></td>
                        <td>
                            {if $page.exists}
                                <span class="badge badge-success">{l s='Installed' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                            {else}
                                <span class="badge badge-secondary">{l s='Not installed' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                            {/if}
                        </td>
                        <td>
                            {if $page.exists}
                                {foreach from=$page.languages key=iso item=has_content}
                                    {if $has_content}
                                        <span class="badge badge-info">{$iso}</span>
                                    {/if}
                                {/foreach}
                            {else}
                                -
                            {/if}
                        </td>
                        <td>
                            <form method="post" action="{$configure_link}" style="display: inline;">
                                <input type="hidden" name="page_slug" value="{$page.slug}">
                                <button type="submit" name="submitInstallSinglePage" class="btn btn-sm btn-default" title="{l s='Reinstall this page' d='Modules.Tasmimconsentpolicymanager.Admin'}">
                                    <i class="icon-refresh"></i> {if $page.exists}{l s='Reinstall' d='Modules.Tasmimconsentpolicymanager.Admin'}{else}{l s='Install' d='Modules.Tasmimconsentpolicymanager.Admin'}{/if}
                                </button>
                            </form>
                            {if $page.has_backup}
                                <form method="post" action="{$configure_link}" style="display: inline;">
                                    <input type="hidden" name="page_slug" value="{$page.slug}">
                                    <button type="submit" name="submitRestorePage" class="btn btn-sm btn-warning" title="{l s='Restore from backup' d='Modules.Tasmimconsentpolicymanager.Admin'}">
                                        <i class="icon-undo"></i> {l s='Restore' d='Modules.Tasmimconsentpolicymanager.Admin'}
                                    </button>
                                </form>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

{* Actions *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-cogs"></i> {l s='Actions' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{$configure_link}">
                    <div class="form-group">
                        <h4>{l s='Install/Update All Pages' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
                        <p class="help-block">{l s='Creates new pages or updates existing ones with content for all active languages.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                        <button type="submit" name="submitInstallPages" class="btn btn-primary">
                            <i class="icon-download"></i> {l s='Install/Update All Pages' d='Modules.Tasmimconsentpolicymanager.Admin'}
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form method="post" action="{$configure_link}">
                    <div class="form-group">
                        <h4>{l s='Add Footer Links' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
                        <p class="help-block">{l s='Adds policy page links to the footer. Skips pages already in footer.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                        <button type="submit" name="submitAddFooterLinks" class="btn btn-default">
                            <i class="icon-link"></i> {l s='Add to Footer' d='Modules.Tasmimconsentpolicymanager.Admin'}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{* GDPR Consent Messages *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-shield"></i> {l s='GDPR Consent Messages' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        {if !$gdpr_status.psgdpr_installed}
            <div class="alert alert-warning">
                <i class="icon-warning"></i>
                {l s='The Official GDPR Compliance module (psgdpr) is not installed. Please install it first to use this feature.' d='Modules.Tasmimconsentpolicymanager.Admin'}
            </div>
        {else}
            <p>{l s='Update consent checkbox messages for all GDPR-related forms in all active languages.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{l s='Form' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                        <th>{l s='Status' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                        <th>{l s='Languages' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                        <th>{l s='Data Available' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$gdpr_status.consents key=key item=consent}
                        <tr>
                            <td>{$consent.label}</td>
                            <td>
                                {if isset($consent.module_installed) && !$consent.module_installed}
                                    <span class="badge badge-secondary">{l s='Module not installed' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                                {elseif $consent.active}
                                    <span class="badge badge-success">{l s='Active' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                                {else}
                                    <span class="badge badge-warning">{l s='Inactive' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                                {/if}
                            </td>
                            <td>
                                {foreach from=$consent.languages key=iso item=has_message}
                                    {if $has_message}
                                        <span class="badge badge-info">{$iso}</span>
                                    {/if}
                                {/foreach}
                                {if empty($consent.languages|@array_filter)}
                                    <span class="text-muted">-</span>
                                {/if}
                            </td>
                            <td>
                                {if $consent.has_data}
                                    <span class="badge badge-success">{l s='Yes' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                                {else}
                                    <span class="badge badge-secondary">{l s='No' d='Modules.Tasmimconsentpolicymanager.Admin'}</span>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>

            <hr>
            <form method="post" action="{$configure_link}">
                <button type="submit" name="submitUpdateGdprMessages" class="btn btn-primary">
                    <i class="icon-refresh"></i> {l s='Update GDPR Consent Messages' d='Modules.Tasmimconsentpolicymanager.Admin'}
                </button>
                <p class="help-block" style="margin-top: 10px;">
                    {l s='This will update all consent messages with links to your policy pages. Messages include links to Privacy Policy and Terms & Conditions pages.' d='Modules.Tasmimconsentpolicymanager.Admin'}
                </p>
            </form>
        {/if}
    </div>
</div>

{* Cookie Consent Banner *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-shield"></i> {l s='Cookie Consent Banner' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <form method="post" action="{$configure_link}">
        <div class="panel-body">
            <div class="alert alert-info">
                <p>{l s='This feature provides a GDPR/EU-compliant cookie consent banner using the CookieConsent library with Google Consent Mode v2 support.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Enable Cookie Consent Banner' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" name="cookie_consent_enabled" id="cookie_consent_enabled_on" value="1" {if $cookie_consent.enabled}checked{/if}>
                        <label for="cookie_consent_enabled_on">{l s='Yes' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <input type="radio" name="cookie_consent_enabled" id="cookie_consent_enabled_off" value="0" {if !$cookie_consent.enabled}checked{/if}>
                        <label for="cookie_consent_enabled_off">{l s='No' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <a class="slide-button btn"></a>
                    </span>
                    <p class="help-block">{l s='Show the cookie consent banner on your store.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Google Consent Mode v2' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" name="gcm_enabled" id="gcm_enabled_on" value="1" {if $cookie_consent.gcm_enabled}checked{/if}>
                        <label for="gcm_enabled_on">{l s='Yes' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <input type="radio" name="gcm_enabled" id="gcm_enabled_off" value="0" {if !$cookie_consent.gcm_enabled}checked{/if}>
                        <label for="gcm_enabled_off">{l s='No' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <a class="slide-button btn"></a>
                    </span>
                    <p class="help-block">{l s='Required from March 2024 for Google Analytics and Google Ads. Sets consent defaults for ad_storage, analytics_storage, etc.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='IframeManager' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" name="iframemanager_enabled" id="iframemanager_enabled_on" value="1" {if $cookie_consent.iframemanager_enabled}checked{/if}>
                        <label for="iframemanager_enabled_on">{l s='Yes' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <input type="radio" name="iframemanager_enabled" id="iframemanager_enabled_off" value="0" {if !$cookie_consent.iframemanager_enabled}checked{/if}>
                        <label for="iframemanager_enabled_off">{l s='No' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                        <a class="slide-button btn"></a>
                    </span>
                    <p class="help-block">{l s='Block YouTube, Vimeo, and Google Maps iframes until user consents. Requires adding data-service attribute to iframes.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Banner Layout' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <select name="consent_layout" class="fixed-width-lg">
                        <option value="box" {if $cookie_consent.layout == 'box'}selected{/if}>{l s='Box' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="bar" {if $cookie_consent.layout == 'bar'}selected{/if}>{l s='Bar' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="cloud" {if $cookie_consent.layout == 'cloud'}selected{/if}>{l s='Cloud' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                    </select>
                    <p class="help-block">{l s='Choose the visual style of the consent banner.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Banner Position' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <select name="consent_position" class="fixed-width-lg">
                        <option value="bottom-left" {if $cookie_consent.position == 'bottom-left'}selected{/if}>{l s='Bottom Left' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="bottom-center" {if $cookie_consent.position == 'bottom-center'}selected{/if}>{l s='Bottom Center' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="bottom-right" {if $cookie_consent.position == 'bottom-right'}selected{/if}>{l s='Bottom Right' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="middle-left" {if $cookie_consent.position == 'middle-left'}selected{/if}>{l s='Middle Left' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="middle-center" {if $cookie_consent.position == 'middle-center'}selected{/if}>{l s='Middle Center' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        <option value="middle-right" {if $cookie_consent.position == 'middle-right'}selected{/if}>{l s='Middle Right' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                    </select>
                    <p class="help-block">{l s='Where on the screen the banner should appear.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Cookie Policy Page' d='Modules.Tasmimconsentpolicymanager.Admin'}</label>
                <div class="col-lg-9">
                    <select name="cookie_policy_cms_id" class="fixed-width-xl">
                        <option value="0">{l s='-- None --' d='Modules.Tasmimconsentpolicymanager.Admin'}</option>
                        {foreach from=$cms_pages item=cms}
                            <option value="{$cms.id_cms}" {if $cookie_consent.cookie_policy_cms_id == $cms.id_cms}selected{/if}>{$cms.meta_title}</option>
                        {/foreach}
                    </select>
                    <p class="help-block">{l s='Link to your Cookie Policy CMS page in the consent banner.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
                </div>
            </div>

            <hr>
            <h4>{l s='Cookie Categories' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
            <p class="help-block">{l s='The following categories are configured by default. Necessary cookies are always enabled.' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{l s='Category' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                        <th>{l s='GCM Types' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                        <th>{l s='Description' d='Modules.Tasmimconsentpolicymanager.Admin'}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{l s='Necessary' d='Modules.Tasmimconsentpolicymanager.Admin'}</strong></td>
                        <td><code>security_storage</code></td>
                        <td>{l s='Essential cookies for site functionality (session, cart, security). Always enabled.' d='Modules.Tasmimconsentpolicymanager.Admin'}</td>
                    </tr>
                    <tr>
                        <td><strong>{l s='Functionality' d='Modules.Tasmimconsentpolicymanager.Admin'}</strong></td>
                        <td><code>functionality_storage, personalization_storage</code></td>
                        <td>{l s='Cookies for enhanced features like language and currency preferences.' d='Modules.Tasmimconsentpolicymanager.Admin'}</td>
                    </tr>
                    <tr>
                        <td><strong>{l s='Analytics' d='Modules.Tasmimconsentpolicymanager.Admin'}</strong></td>
                        <td><code>analytics_storage</code></td>
                        <td>{l s='Cookies for analytics services like Google Analytics.' d='Modules.Tasmimconsentpolicymanager.Admin'}</td>
                    </tr>
                    <tr>
                        <td><strong>{l s='Advertisement' d='Modules.Tasmimconsentpolicymanager.Admin'}</strong></td>
                        <td><code>ad_storage, ad_user_data, ad_personalization</code></td>
                        <td>{l s='Cookies for advertising services like Facebook Pixel and Google Ads.' d='Modules.Tasmimconsentpolicymanager.Admin'}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <button type="submit" name="submitSaveCookieConsent" class="btn btn-primary pull-right">
                <i class="icon-save"></i> {l s='Save Cookie Consent Settings' d='Modules.Tasmimconsentpolicymanager.Admin'}
            </button>
        </div>
    </form>
</div>

{* Settings *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-cog"></i> {l s='Settings' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <form method="post" action="{$configure_link}">
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label">
                    <input type="checkbox" name="delete_on_uninstall" value="1" {if $delete_on_uninstall}checked{/if}>
                    {l s='Delete CMS pages when uninstalling module' d='Modules.Tasmimconsentpolicymanager.Admin'}
                </label>
                <p class="help-block">{l s='If checked, all policy pages created by this module will be deleted when uninstalling. Default: unchecked (keep pages).' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" name="submitSaveSettings" class="btn btn-default pull-right">
                <i class="icon-save"></i> {l s='Save Settings' d='Modules.Tasmimconsentpolicymanager.Admin'}
            </button>
        </div>
    </form>
</div>

{* Info Box *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-info-circle"></i> {l s='Important Information' d='Modules.Tasmimconsentpolicymanager.Admin'}
    </div>
    <div class="panel-body">
        <div class="alert alert-info">
            <h4>{l s='Demo Content Notice' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
            <p>{l s='The policy pages installed by this module contain demo content with placeholders. Before publishing, you must:' d='Modules.Tasmimconsentpolicymanager.Admin'}</p>
            <ol>
                <li>{l s='Replace all placeholders ([COMPANY_NAME], [EMAIL], etc.) with your actual information' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li>{l s='Have the content reviewed by legal counsel' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li>{l s='Customize the content to match your specific business practices' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
            </ol>
        </div>
        <div class="alert alert-warning">
            <h4>{l s='Placeholders to Replace' d='Modules.Tasmimconsentpolicymanager.Admin'}</h4>
            <ul>
                <li><code>[COMPANY_NAME]</code> - {l s='Your company name' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li><code>[ORG_NUMBER]</code> - {l s='Organization/VAT number' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li><code>[ADDRESS]</code> - {l s='Company address' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li><code>[EMAIL]</code> - {l s='Contact email' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
                <li><code>[PHONE]</code> - {l s='Contact phone number' d='Modules.Tasmimconsentpolicymanager.Admin'}</li>
            </ul>
        </div>
    </div>
</div>
