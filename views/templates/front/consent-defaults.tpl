{**
 * Google Consent Mode v2 Defaults
 *
 * This script MUST be loaded BEFORE any tracking scripts (GA, GTM, FB Pixel, etc.)
 * It sets the default consent state to 'denied' for all non-essential categories.
 * The cookieconsent library will update these values when the user makes a choice.
 *}
<script data-cookiecategory="necessary">
    // Initialize dataLayer
    window.dataLayer = window.dataLayer || [];
    function gtag(){ldelim}dataLayer.push(arguments);{rdelim}

    // Set default consent to 'denied' as a fallback
    // This will be updated by cookieconsent when user makes a choice
    gtag('consent', 'default', {ldelim}
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied',
        'functionality_storage': 'denied',
        'personalization_storage': 'denied',
        'security_storage': 'granted',
        'wait_for_update': 500
    {rdelim});

    // Enable URL passthrough for better conversion tracking while respecting consent
    gtag('set', 'url_passthrough', true);

    // Enable ads data redaction when ad_storage is denied
    gtag('set', 'ads_data_redaction', true);

    // Facebook Pixel consent control
    // Set to true by default - FB SDK checks this before firing events
    window.doNotConsentToPixel = true;
</script>
