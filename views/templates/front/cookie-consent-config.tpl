{**
 * Cookie Consent Configuration and Initialization
 *
 * This template initializes the orestbida/cookieconsent library with:
 * - Multi-language translations
 * - Google Consent Mode v2 integration
 * - Cookie table data for preferences modal
 * - Optional IframeManager for embedded content
 *}
<script data-cookiecategory="necessary">
(function() {ldelim}
    'use strict';

    // Configuration from PHP
    var config = {$cookie_consent_config|json_encode nofilter};
    var translations = {$cookie_consent_translations|json_encode nofilter};
    var cookieTable = {$cookie_table_data|json_encode nofilter};
    var currentLang = '{$current_lang|escape:'javascript'}';
    var cookiePolicyUrl = '{$cookie_policy_url|escape:'javascript'}';
    var gcmEnabled = {if $gcm_enabled}true{else}false{/if};
    var iframeManagerEnabled = {if $iframemanager_enabled}true{else}false{/if};

    // Helper function to get translation for current language
    function t(key) {ldelim}
        var lang = translations[currentLang] || translations['en'] || {ldelim}{rdelim};
        var keys = key.split('.');
        var value = lang;
        for (var i = 0; i < keys.length; i++) {ldelim}
            value = value ? value[keys[i]] : null;
        {rdelim}
        return value || key;
    {rdelim}

    // Helper function to get cookie description for current language
    function getCookieDescription(cookie) {ldelim}
        if (typeof cookie.description === 'object') {ldelim}
            return cookie.description[currentLang] || cookie.description['en'] || '';
        {rdelim}
        return cookie.description || '';
    {rdelim}

    // Build cookie table for a category
    function buildCookieTable(category) {ldelim}
        var cookies = cookieTable[category] || [];
        if (cookies.length === 0) return null;

        return {ldelim}
            headers: t('settings_modal.cookie_table_headers') || ['Name', 'Domain', 'Expiration', 'Description'],
            body: cookies.map(function(cookie) {ldelim}
                return [
                    cookie.name || '',
                    cookie.domain || '',
                    cookie.expiration || '',
                    getCookieDescription(cookie)
                ];
            {rdelim})
        {rdelim};
    {rdelim}

    // Update Google Consent Mode
    function updateGoogleConsent(categories) {ldelim}
        if (!gcmEnabled || typeof gtag !== 'function') return;

        var consentUpdate = {ldelim}
            'security_storage': 'granted' // Always granted
        {rdelim};

        // Functionality category
        if (categories.functionality) {ldelim}
            consentUpdate['functionality_storage'] = 'granted';
            consentUpdate['personalization_storage'] = 'granted';
        {rdelim} else {ldelim}
            consentUpdate['functionality_storage'] = 'denied';
            consentUpdate['personalization_storage'] = 'denied';
        {rdelim}

        // Analytics category
        if (categories.analytics) {ldelim}
            consentUpdate['analytics_storage'] = 'granted';
        {rdelim} else {ldelim}
            consentUpdate['analytics_storage'] = 'denied';
        {rdelim}

        // Advertisement category
        if (categories.advertisement) {ldelim}
            consentUpdate['ad_storage'] = 'granted';
            consentUpdate['ad_user_data'] = 'granted';
            consentUpdate['ad_personalization'] = 'granted';
        {rdelim} else {ldelim}
            consentUpdate['ad_storage'] = 'denied';
            consentUpdate['ad_user_data'] = 'denied';
            consentUpdate['ad_personalization'] = 'denied';
        {rdelim}

        gtag('consent', 'update', consentUpdate);
    {rdelim}

    // Update Facebook Pixel consent
    function updateFacebookConsent(granted) {ldelim}
        window.doNotConsentToPixel = !granted;

        // If FB SDK is loaded and consent granted, re-consent
        if (granted && typeof fbq === 'function') {ldelim}
            fbq('consent', 'grant');
        {rdelim}
    {rdelim}

    // Get accepted categories from cookieconsent
    function getAcceptedCategories() {ldelim}
        var cc = window.CookieConsent;
        if (!cc) return {ldelim}{rdelim};

        return {ldelim}
            necessary: true, // Always accepted
            functionality: cc.acceptedCategory('functionality'),
            analytics: cc.acceptedCategory('analytics'),
            advertisement: cc.acceptedCategory('advertisement')
        {rdelim};
    {rdelim}

    // Handle consent change
    function onConsentChange() {ldelim}
        var categories = getAcceptedCategories();
        updateGoogleConsent(categories);
        updateFacebookConsent(categories.advertisement);
    {rdelim}

    // Initialize IframeManager if enabled
    function initIframeManager() {ldelim}
        if (!iframeManagerEnabled || typeof iframemanager !== 'function') return null;

        var imConfig = {$cookie_consent_data.iframemanager|default:[]|json_encode nofilter};
        var services = {ldelim}{rdelim};

        // Build services configuration
        ['youtube', 'vimeo', 'googlemaps'].forEach(function(service) {ldelim}
            var serviceConfig = imConfig[service];
            if (!serviceConfig) return;

            services[service] = {ldelim}
                embedUrl: serviceConfig.embedUrl || '',
                thumbnailUrl: serviceConfig.thumbnailUrl || null,
                iframe: {ldelim}
                    allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen'
                {rdelim},
                languages: {ldelim}{rdelim}
            {rdelim};

            // Add language-specific notice and buttons
            var langNotice = serviceConfig.notice || {ldelim}{rdelim};
            var langLoadBtn = serviceConfig.loadBtn || {ldelim}{rdelim};
            var langLoadAllBtn = serviceConfig.loadAllBtn || {ldelim}{rdelim};

            services[service].languages[currentLang] = {ldelim}
                notice: langNotice[currentLang] || langNotice['en'] || '',
                loadBtn: langLoadBtn[currentLang] || langLoadBtn['en'] || 'Load',
                loadAllBtn: langLoadAllBtn[currentLang] || langLoadAllBtn['en'] || 'Load all'
            {rdelim};
        {rdelim});

        return iframemanager().run({ldelim}
            currLang: currentLang,
            services: services
        {rdelim});
    {rdelim}

    // Build categories configuration for cookieconsent
    function buildCategories() {ldelim}
        var categories = {ldelim}{rdelim};

        // Necessary (always required)
        categories.necessary = {ldelim}
            enabled: true,
            readOnly: true
        {rdelim};
        var necessaryTable = buildCookieTable('necessary');
        if (necessaryTable) categories.necessary.cookieTable = necessaryTable;

        // Functionality
        categories.functionality = {ldelim}
            enabled: false,
            readOnly: false
        {rdelim};
        var functionalityTable = buildCookieTable('functionality');
        if (functionalityTable) categories.functionality.cookieTable = functionalityTable;

        // Analytics
        categories.analytics = {ldelim}
            enabled: false,
            readOnly: false
        {rdelim};
        var analyticsTable = buildCookieTable('analytics');
        if (analyticsTable) categories.analytics.cookieTable = analyticsTable;

        // Advertisement
        categories.advertisement = {ldelim}
            enabled: false,
            readOnly: false,
            // If IframeManager enabled, link to advertisement category
            autoClear: iframeManagerEnabled ? {ldelim}
                cookies: [
                    {ldelim} name: /^_fb/ {rdelim},
                    {ldelim} name: /^_gcl/ {rdelim}
                ]
            {rdelim} : undefined
        {rdelim};
        var advertisementTable = buildCookieTable('advertisement');
        if (advertisementTable) categories.advertisement.cookieTable = advertisementTable;

        return categories;
    {rdelim}

    // Build sections for the preferences modal
    function buildSections() {ldelim}
        var sections = [];

        // Intro section
        sections.push({ldelim}
            title: t('settings_modal.title'),
            description: t('consent_modal.description') + (cookiePolicyUrl ? ' <a href="' + cookiePolicyUrl + '">' + (t('cookie_policy_link') || 'Cookie Policy') + '</a>' : '')
        {rdelim});

        // Category sections
        var categoryKeys = ['necessary', 'functionality', 'analytics', 'advertisement'];
        categoryKeys.forEach(function(key) {ldelim}
            var catTrans = t('categories.' + key) || {ldelim}{rdelim};
            sections.push({ldelim}
                title: catTrans.title || key,
                description: catTrans.description || '',
                linkedCategory: key
            {rdelim});
        {rdelim});

        return sections;
    {rdelim}

    // Main initialization
    function initCookieConsent() {ldelim}
        var im = initIframeManager();

        CookieConsent.run({ldelim}
            guiOptions: {ldelim}
                consentModal: {ldelim}
                    layout: config.layout || 'box',
                    position: config.position || 'bottom-left',
                    equalWeightButtons: true,
                    flipButtons: false
                {rdelim},
                preferencesModal: {ldelim}
                    layout: 'box',
                    position: 'right',
                    equalWeightButtons: true,
                    flipButtons: false
                {rdelim}
            {rdelim},

            categories: buildCategories(),

            language: {ldelim}
                default: currentLang,
                autoDetect: 'document',
                translations: {ldelim}
                    [currentLang]: {ldelim}
                        consentModal: {ldelim}
                            title: t('consent_modal.title'),
                            description: t('consent_modal.description'),
                            acceptAllBtn: t('consent_modal.primary_btn'),
                            acceptNecessaryBtn: t('consent_modal.reject_btn'),
                            showPreferencesBtn: t('consent_modal.secondary_btn')
                        {rdelim},
                        preferencesModal: {ldelim}
                            title: t('settings_modal.title'),
                            acceptAllBtn: t('settings_modal.accept_all_btn'),
                            acceptNecessaryBtn: t('settings_modal.reject_all_btn'),
                            savePreferencesBtn: t('settings_modal.save_btn'),
                            closeIconLabel: t('settings_modal.close_btn'),
                            sections: buildSections()
                        {rdelim}
                    {rdelim}
                {rdelim}
            {rdelim},

            onFirstConsent: function() {ldelim}
                onConsentChange();
            {rdelim},

            onConsent: function() {ldelim}
                onConsentChange();
            {rdelim},

            onChange: function() {ldelim}
                onConsentChange();
            {rdelim}
        {rdelim});

        // If IframeManager is enabled, connect it to cookieconsent
        if (im && window.CookieConsent) {ldelim}
            // Check initial consent state for iframes
            if (CookieConsent.acceptedCategory('advertisement')) {ldelim}
                im.acceptService('all');
            {rdelim}
        {rdelim}
    {rdelim}

    // Wait for DOM and cookieconsent library
    if (document.readyState === 'loading') {ldelim}
        document.addEventListener('DOMContentLoaded', initCookieConsent);
    {rdelim} else {ldelim}
        initCookieConsent();
    {rdelim}

    // Handle #show-cookie-preferences links (for CMS pages where data-cc is stripped)
    document.addEventListener('click', function(e) {ldelim}
        var link = e.target.closest('a[href="#show-cookie-preferences"]');
        if (link) {ldelim}
            e.preventDefault();
            if (typeof CookieConsent !== 'undefined' && CookieConsent.showPreferences) {ldelim}
                CookieConsent.showPreferences();
            {rdelim}
        {rdelim}
    {rdelim});

    // Also handle if page loads with #show-cookie-preferences hash
    if (window.location.hash === '#show-cookie-preferences') {ldelim}
        setTimeout(function() {ldelim}
            if (typeof CookieConsent !== 'undefined' && CookieConsent.showPreferences) {ldelim}
                CookieConsent.showPreferences();
            {rdelim}
        {rdelim}, 500);
    {rdelim}
{rdelim})();
</script>
