# Tasmim Consent & Policy Manager

A comprehensive PrestaShop 8.x module that manages policy CMS pages, GDPR consent messages, and provides an EU-compliant cookie consent banner with Google Consent Mode v2 support.

## Features

### 1. CMS Policy Pages
Automatically installs 8 essential policy pages in multiple languages (Swedish, English, Danish, Arabic):

| Page | Swedish Slug | English Slug |
|------|--------------|--------------|
| Privacy Policy | integritetspolicy | privacy-policy |
| Terms & Conditions | kopvillkor | terms-and-conditions |
| Delivery | leverans | delivery |
| Returns & Refunds | angerratt-returer | returns-refunds |
| Secure Payment | saker-betalning | secure-payment |
| About Us | om-oss | about-us |
| Cookie Policy | cookiepolicy | cookie-policy |
| Cookie Consent | cookie-samtycke | cookie-consent |

**Key Features:**
- Upsert logic: Updates existing pages or creates new ones
- Language-specific URL slugs for SEO
- Automatic backup before overwriting
- Restore from backup functionality
- Placeholder validation warnings

### 2. GDPR Consent Messages
Updates consent checkbox messages for the Official GDPR Compliance module (psgdpr):

- Account Creation Form
- Customer Account Form
- Product Comments
- Contact Form
- Email Alerts

Messages include proper links to Privacy Policy and Terms & Conditions pages.

### 3. Footer Link Management
- Auto-adds policy pages to the footer "Our Company" block
- Maintains consistent ordering across all pages
- Prevents duplicate entries

### 4. Cookie Consent Banner
EU/GDPR-compliant cookie consent using [orestbida/cookieconsent v3](https://github.com/orestbida/cookieconsent):

- **Google Consent Mode v2** - Required from March 2024 for Google Analytics/Ads
- **Multi-language support** - Swedish, English, Danish, Arabic
- **Customizable layout** - Box, Bar, or Cloud styles
- **Flexible positioning** - 6 position options
- **Cookie table** - Shows users which cookies each category uses

### 5. IframeManager (Optional)
Blocks embedded content until user consents:
- YouTube videos (uses youtube-nocookie.com)
- Vimeo videos
- Google Maps

## Installation

1. Upload the `tasmim_consent_policy_manager` folder to `/modules/`
2. Install the module from BackOffice > Modules
3. Configure settings in the module configuration page

Or add to your theme's `config/theme.yml`:
```yaml
global_settings:
  modules:
    to_enable:
      - tasmim_consent_policy_manager
```

## Configuration

### CMS Pages Tab
- View installation status of all policy pages
- Install/reinstall individual pages
- Restore pages from backup
- View which languages have content

### GDPR Messages Tab
- Update consent messages for all forms
- View current message status per language
- Requires psgdpr module to be installed

### Cookie Consent Banner Tab

| Setting | Description |
|---------|-------------|
| Enable Cookie Consent | Master toggle for the banner |
| Google Consent Mode v2 | Enable GCM v2 defaults (recommended) |
| IframeManager | Block YouTube/Vimeo/Maps until consent |
| Banner Layout | Box, Bar, or Cloud |
| Banner Position | Bottom/Middle, Left/Center/Right |
| Cookie Policy Page | Link to your Cookie Policy CMS page |

## Cookie Categories

The banner uses 4 categories aligned with Google Consent Mode v2:

| Category | GCM Types | Description |
|----------|-----------|-------------|
| Necessary | security_storage | Session, CSRF, cart (always on) |
| Functionality | functionality_storage, personalization_storage | Language, currency preferences |
| Analytics | analytics_storage | Google Analytics |
| Advertisement | ad_storage, ad_user_data, ad_personalization | FB Pixel, Google Ads |

## Google Consent Mode v2

This module implements GCM v2 which is required from March 2024 for:
- Google Analytics 4
- Google Ads conversion tracking
- Google Tag Manager

### How it works:
1. **Default denied** - All consent types start as 'denied'
2. **User choice** - When user accepts categories, consent is updated
3. **Automatic integration** - Google scripts respect consent state

The module injects consent defaults in `<head>` BEFORE any tracking scripts:
```javascript
gtag('consent', 'default', {
    'ad_storage': 'denied',
    'ad_user_data': 'denied',
    'ad_personalization': 'denied',
    'analytics_storage': 'denied',
    'functionality_storage': 'denied',
    'personalization_storage': 'denied',
    'security_storage': 'granted'
});
```

## Facebook Pixel Integration

The module controls Facebook Pixel consent via `window.doNotConsentToPixel`:

- Set to `true` by default (blocks pixel)
- Set to `false` when user accepts advertisement cookies
- Calls `fbq('consent', 'grant')` when consent given

No modifications needed to ps_facebook module.

## IframeManager Usage

When enabled, replace iframe `src` with `data-src` and add `data-service`:

```html
<!-- YouTube -->
<div data-service="youtube" data-id="VIDEO_ID"></div>

<!-- Vimeo -->
<div data-service="vimeo" data-id="VIDEO_ID"></div>

<!-- Google Maps -->
<div data-service="googlemaps" data-id="EMBED_PARAMS"></div>
```

## Placeholders

Policy pages contain demo content with placeholders. Replace before publishing:

| Placeholder | Description |
|-------------|-------------|
| `[COMPANY_NAME]` | Your company name |
| `[ORG_NUMBER]` | Organization/VAT number |
| `[ADDRESS]` | Company address |
| `[EMAIL]` | Contact email |
| `[PHONE]` | Contact phone |

The module shows warnings in admin if placeholders remain.

## Adding New Languages

1. Add translations to `data/cookie_consent.php`:
```php
'translations' => [
    'fi' => [
        'consent_modal' => [
            'title' => 'Kaytamme evasteita',
            // ...
        ],
    ],
],
```

2. Add CMS content to `data/cms_pages.php` for each page

## Customization

### Banner Styling
Override CSS by adding styles after the module stylesheet:
```css
/* Custom colors */
:root {
    --cc-bg: #ffffff;
    --cc-btn-primary-bg: #your-color;
}
```

### Translation Overrides
Custom translations can be stored via `Configuration::updateValue('TASMIM_CONSENT_TRANSLATIONS', json_encode($translations))`.

## Troubleshooting

### Banner not showing
1. Check if "Enable Cookie Consent" is turned on
2. Clear PrestaShop cache
3. Check browser console for JavaScript errors

### Google Analytics still tracking before consent
1. Ensure GCM v2 is enabled in module settings
2. Verify the consent defaults script appears BEFORE gtag.js in page source
3. Check that ps_googleanalytics or your GA implementation respects GCM

### Facebook Pixel tracking before consent
1. Check that `window.doNotConsentToPixel` is `true` in console before consent
2. Verify ps_facebook module version supports consent variable

## Requirements

- PrestaShop 8.0.0+
- PHP 8.0+
- psgdpr module (for GDPR consent messages feature)

## Libraries

- [CookieConsent v3.1.0](https://github.com/orestbida/cookieconsent) - MIT License
- [IframeManager v1.3.0](https://github.com/orestbida/iframemanager) - MIT License

## License

MIT License

## Author

Tasmim
