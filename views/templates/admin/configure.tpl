{**
 * Tasmim Policy Installer - Admin Configuration Template
 *}

<div class="panel">
    <div class="panel-heading">
        <i class="icon-file-text"></i> {l s='Tasmim Policy Installer' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        <p>{l s='This module installs policy CMS pages (Privacy Policy, Terms & Conditions, etc.) in multiple languages.' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
    </div>
</div>

{* Active Languages *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-globe"></i> {l s='Active Languages' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>{l s='Language' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='ISO Code' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='Content Available' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$active_languages item=lang}
                    <tr>
                        <td>{$lang.name}</td>
                        <td><code>{$lang.iso_code}</code></td>
                        <td>
                            {if $lang.supported}
                                <span class="badge badge-success">{l s='Yes' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                            {else}
                                <span class="badge badge-warning">{l s='No (will use English)' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        <p class="help-block">
            {l s='Supported languages:' d='Modules.Tasmimpolicyinstaller.Admin'}
            {foreach from=$supported_languages item=iso name=supported}
                <code>{$iso}</code>{if !$smarty.foreach.supported.last}, {/if}
            {/foreach}
        </p>
    </div>
</div>

{* Placeholder Warnings *}
{if !empty($placeholder_warnings)}
    <div class="alert alert-warning">
        <h4><i class="icon-warning"></i> {l s='Placeholder Warnings' d='Modules.Tasmimpolicyinstaller.Admin'}</h4>
        <p>{l s='The following pages contain unreplaced placeholders. Please edit them in the CMS section:' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
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
        <i class="icon-list"></i> {l s='CMS Pages Status' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{l s='Page' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='Slug' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='Status' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='Languages' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    <th>{l s='Actions' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$pages_status key=slug item=page}
                    <tr>
                        <td>{$page.title}</td>
                        <td><code>{$page.slug}</code></td>
                        <td>
                            {if $page.exists}
                                <span class="badge badge-success">{l s='Installed' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                            {else}
                                <span class="badge badge-secondary">{l s='Not installed' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
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
                                <button type="submit" name="submitInstallSinglePage" class="btn btn-sm btn-default" title="{l s='Reinstall this page' d='Modules.Tasmimpolicyinstaller.Admin'}">
                                    <i class="icon-refresh"></i> {if $page.exists}{l s='Reinstall' d='Modules.Tasmimpolicyinstaller.Admin'}{else}{l s='Install' d='Modules.Tasmimpolicyinstaller.Admin'}{/if}
                                </button>
                            </form>
                            {if $page.has_backup}
                                <form method="post" action="{$configure_link}" style="display: inline;">
                                    <input type="hidden" name="page_slug" value="{$page.slug}">
                                    <button type="submit" name="submitRestorePage" class="btn btn-sm btn-warning" title="{l s='Restore from backup' d='Modules.Tasmimpolicyinstaller.Admin'}">
                                        <i class="icon-undo"></i> {l s='Restore' d='Modules.Tasmimpolicyinstaller.Admin'}
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
        <i class="icon-cogs"></i> {l s='Actions' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{$configure_link}">
                    <div class="form-group">
                        <h4>{l s='Install/Update All Pages' d='Modules.Tasmimpolicyinstaller.Admin'}</h4>
                        <p class="help-block">{l s='Creates new pages or updates existing ones with content for all active languages.' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
                        <button type="submit" name="submitInstallPages" class="btn btn-primary">
                            <i class="icon-download"></i> {l s='Install/Update All Pages' d='Modules.Tasmimpolicyinstaller.Admin'}
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form method="post" action="{$configure_link}">
                    <div class="form-group">
                        <h4>{l s='Add Footer Links' d='Modules.Tasmimpolicyinstaller.Admin'}</h4>
                        <p class="help-block">{l s='Adds policy page links to the footer. Skips pages already in footer.' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
                        <button type="submit" name="submitAddFooterLinks" class="btn btn-default">
                            <i class="icon-link"></i> {l s='Add to Footer' d='Modules.Tasmimpolicyinstaller.Admin'}
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
        <i class="icon-shield"></i> {l s='GDPR Consent Messages' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        {if !$gdpr_status.psgdpr_installed}
            <div class="alert alert-warning">
                <i class="icon-warning"></i>
                {l s='The Official GDPR Compliance module (psgdpr) is not installed. Please install it first to use this feature.' d='Modules.Tasmimpolicyinstaller.Admin'}
            </div>
        {else}
            <p>{l s='Update consent checkbox messages for all GDPR-related forms in all active languages.' d='Modules.Tasmimpolicyinstaller.Admin'}</p>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{l s='Form' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                        <th>{l s='Status' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                        <th>{l s='Languages' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                        <th>{l s='Data Available' d='Modules.Tasmimpolicyinstaller.Admin'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$gdpr_status.consents key=key item=consent}
                        <tr>
                            <td>{$consent.label}</td>
                            <td>
                                {if isset($consent.module_installed) && !$consent.module_installed}
                                    <span class="badge badge-secondary">{l s='Module not installed' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                                {elseif $consent.active}
                                    <span class="badge badge-success">{l s='Active' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                                {else}
                                    <span class="badge badge-warning">{l s='Inactive' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
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
                                    <span class="badge badge-success">{l s='Yes' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                                {else}
                                    <span class="badge badge-secondary">{l s='No' d='Modules.Tasmimpolicyinstaller.Admin'}</span>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>

            <hr>
            <form method="post" action="{$configure_link}">
                <button type="submit" name="submitUpdateGdprMessages" class="btn btn-primary">
                    <i class="icon-refresh"></i> {l s='Update GDPR Consent Messages' d='Modules.Tasmimpolicyinstaller.Admin'}
                </button>
                <p class="help-block" style="margin-top: 10px;">
                    {l s='This will update all consent messages with links to your policy pages. Messages include links to Privacy Policy and Terms & Conditions pages.' d='Modules.Tasmimpolicyinstaller.Admin'}
                </p>
            </form>
        {/if}
    </div>
</div>

{* Settings *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-cog"></i> {l s='Settings' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <form method="post" action="{$configure_link}">
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label">
                    <input type="checkbox" name="delete_on_uninstall" value="1" {if $delete_on_uninstall}checked{/if}>
                    {l s='Delete CMS pages when uninstalling module' d='Modules.Tasmimpolicyinstaller.Admin'}
                </label>
                <p class="help-block">{l s='If checked, all policy pages created by this module will be deleted when uninstalling. Default: unchecked (keep pages).' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" name="submitSaveSettings" class="btn btn-default pull-right">
                <i class="icon-save"></i> {l s='Save Settings' d='Modules.Tasmimpolicyinstaller.Admin'}
            </button>
        </div>
    </form>
</div>

{* Info Box *}
<div class="panel">
    <div class="panel-heading">
        <i class="icon-info-circle"></i> {l s='Important Information' d='Modules.Tasmimpolicyinstaller.Admin'}
    </div>
    <div class="panel-body">
        <div class="alert alert-info">
            <h4>{l s='Demo Content Notice' d='Modules.Tasmimpolicyinstaller.Admin'}</h4>
            <p>{l s='The policy pages installed by this module contain demo content with placeholders. Before publishing, you must:' d='Modules.Tasmimpolicyinstaller.Admin'}</p>
            <ol>
                <li>{l s='Replace all placeholders ([COMPANY_NAME], [EMAIL], etc.) with your actual information' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li>{l s='Have the content reviewed by legal counsel' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li>{l s='Customize the content to match your specific business practices' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
            </ol>
        </div>
        <div class="alert alert-warning">
            <h4>{l s='Placeholders to Replace' d='Modules.Tasmimpolicyinstaller.Admin'}</h4>
            <ul>
                <li><code>[COMPANY_NAME]</code> - {l s='Your company name' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li><code>[ORG_NUMBER]</code> - {l s='Organization/VAT number' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li><code>[ADDRESS]</code> - {l s='Company address' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li><code>[EMAIL]</code> - {l s='Contact email' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
                <li><code>[PHONE]</code> - {l s='Contact phone number' d='Modules.Tasmimpolicyinstaller.Admin'}</li>
            </ul>
        </div>
    </div>
</div>
