<?php
/**
 * Cookie Consent Default Configuration and Translations
 *
 * This file contains:
 * - Default category/service configuration for Google Consent Mode v2
 * - Multi-language translations (sv, en, da, ar)
 * - Cookie table data for the preferences modal
 */

return [
    // Category configuration for Google Consent Mode v2
    'categories' => [
        'necessary' => [
            'enabled' => true,
            'readonly' => true,
        ],
        'functionality' => [
            'enabled' => true,
            'readonly' => false,
        ],
        'analytics' => [
            'enabled' => true,
            'readonly' => false,
        ],
        'advertisement' => [
            'enabled' => true,
            'readonly' => false,
        ],
    ],

    // Translations for all supported languages
    'translations' => [
        'en' => [
            'consent_modal' => [
                'title' => 'We use cookies',
                'description' => 'This website uses cookies to ensure the best possible experience. Some cookies are necessary for the site to work properly, while others help us understand how you use our site and improve your experience.',
                'primary_btn' => 'Accept all',
                'secondary_btn' => 'Manage preferences',
                'reject_btn' => 'Reject all',
            ],
            'cookie_policy_link' => 'Cookie Policy',
            'settings_modal' => [
                'title' => 'Cookie preferences',
                'save_btn' => 'Save preferences',
                'accept_all_btn' => 'Accept all',
                'reject_all_btn' => 'Reject all',
                'close_btn' => 'Close',
                'cookie_table_headers' => ['Name', 'Domain', 'Expiration', 'Description'],
            ],
            'categories' => [
                'necessary' => [
                    'title' => 'Strictly necessary cookies',
                    'description' => 'These cookies are essential for the website to function properly. They cannot be disabled.',
                ],
                'functionality' => [
                    'title' => 'Functionality cookies',
                    'description' => 'These cookies enable enhanced functionality and personalization, such as remembering your preferences and language settings.',
                ],
                'analytics' => [
                    'title' => 'Analytics cookies',
                    'description' => 'These cookies help us understand how visitors interact with our website by collecting anonymous information, helping us improve the site.',
                ],
                'advertisement' => [
                    'title' => 'Advertising cookies',
                    'description' => 'These cookies are used to show you relevant advertisements and measure their effectiveness. They may be set by us or by third-party advertising partners.',
                ],
            ],
        ],
        'sv' => [
            'consent_modal' => [
                'title' => 'Vi använder cookies',
                'description' => 'Denna webbplats använder cookies för att säkerställa bästa möjliga upplevelse. Vissa cookies är nödvändiga för webbplatsens funktion, medan andra hjälper oss förstå hur du använder vår webbplats och förbättra din upplevelse.',
                'primary_btn' => 'Acceptera alla',
                'secondary_btn' => 'Hantera inställningar',
                'reject_btn' => 'Avvisa alla',
            ],
            'cookie_policy_link' => 'Cookiepolicy',
            'settings_modal' => [
                'title' => 'Cookie-inställningar',
                'save_btn' => 'Spara inställningar',
                'accept_all_btn' => 'Acceptera alla',
                'reject_all_btn' => 'Avvisa alla',
                'close_btn' => 'Stäng',
                'cookie_table_headers' => ['Namn', 'Domän', 'Utgång', 'Beskrivning'],
            ],
            'categories' => [
                'necessary' => [
                    'title' => 'Nödvändiga cookies',
                    'description' => 'Dessa cookies är nödvändiga för webbplatsens grundläggande funktioner. De kan inte inaktiveras.',
                ],
                'functionality' => [
                    'title' => 'Funktionella cookies',
                    'description' => 'Dessa cookies möjliggör utökad funktionalitet och personalisering, som att komma ihåg dina inställningar och språkval.',
                ],
                'analytics' => [
                    'title' => 'Analyscookies',
                    'description' => 'Dessa cookies hjälper oss förstå hur besökare interagerar med vår webbplats genom att samla in anonym information, vilket hjälper oss att förbättra webbplatsen.',
                ],
                'advertisement' => [
                    'title' => 'Reklam-cookies',
                    'description' => 'Dessa cookies används för att visa dig relevanta annonser och mäta deras effektivitet. De kan sättas av oss eller av tredjepartsannonsörer.',
                ],
            ],
        ],
        'da' => [
            'consent_modal' => [
                'title' => 'Vi bruger cookies',
                'description' => 'Denne hjemmeside bruger cookies for at sikre den bedst mulige oplevelse. Nogle cookies er nødvendige for, at hjemmesiden fungerer korrekt, mens andre hjælper os med at forstå, hvordan du bruger vores hjemmeside.',
                'primary_btn' => 'Accepter alle',
                'secondary_btn' => 'Administrer præferencer',
                'reject_btn' => 'Afvis alle',
            ],
            'cookie_policy_link' => 'Cookiepolitik',
            'settings_modal' => [
                'title' => 'Cookie-præferencer',
                'save_btn' => 'Gem præferencer',
                'accept_all_btn' => 'Accepter alle',
                'reject_all_btn' => 'Afvis alle',
                'close_btn' => 'Luk',
                'cookie_table_headers' => ['Navn', 'Domæne', 'Udløb', 'Beskrivelse'],
            ],
            'categories' => [
                'necessary' => [
                    'title' => 'Nødvendige cookies',
                    'description' => 'Disse cookies er nødvendige for, at hjemmesiden fungerer korrekt. De kan ikke deaktiveres.',
                ],
                'functionality' => [
                    'title' => 'Funktionelle cookies',
                    'description' => 'Disse cookies muliggør udvidet funktionalitet og personalisering, såsom at huske dine præferencer og sprogindstillinger.',
                ],
                'analytics' => [
                    'title' => 'Analyse-cookies',
                    'description' => 'Disse cookies hjælper os med at forstå, hvordan besøgende interagerer med vores hjemmeside ved at indsamle anonym information.',
                ],
                'advertisement' => [
                    'title' => 'Annoncecookies',
                    'description' => 'Disse cookies bruges til at vise dig relevante annoncer og måle deres effektivitet. De kan være sat af os eller af tredjepartsannoncører.',
                ],
            ],
        ],
        'ar' => [
            'consent_modal' => [
                'title' => 'نستخدم ملفات تعريف الارتباط',
                'description' => 'يستخدم هذا الموقع ملفات تعريف الارتباط لضمان أفضل تجربة ممكنة. بعض ملفات تعريف الارتباط ضرورية لعمل الموقع بشكل صحيح، بينما يساعدنا البعض الآخر على فهم كيفية استخدامك لموقعنا.',
                'primary_btn' => 'قبول الكل',
                'secondary_btn' => 'إدارة التفضيلات',
                'reject_btn' => 'رفض الكل',
            ],
            'cookie_policy_link' => 'سياسة ملفات تعريف الارتباط',
            'settings_modal' => [
                'title' => 'تفضيلات ملفات تعريف الارتباط',
                'save_btn' => 'حفظ التفضيلات',
                'accept_all_btn' => 'قبول الكل',
                'reject_all_btn' => 'رفض الكل',
                'close_btn' => 'إغلاق',
                'cookie_table_headers' => ['الاسم', 'النطاق', 'انتهاء الصلاحية', 'الوصف'],
            ],
            'categories' => [
                'necessary' => [
                    'title' => 'ملفات تعريف الارتباط الضرورية',
                    'description' => 'هذه الملفات ضرورية لعمل الموقع بشكل صحيح. لا يمكن تعطيلها.',
                ],
                'functionality' => [
                    'title' => 'ملفات تعريف الارتباط الوظيفية',
                    'description' => 'تتيح هذه الملفات وظائف محسّنة وتخصيصاً، مثل تذكر تفضيلاتك وإعدادات اللغة.',
                ],
                'analytics' => [
                    'title' => 'ملفات تعريف الارتباط التحليلية',
                    'description' => 'تساعدنا هذه الملفات على فهم كيفية تفاعل الزوار مع موقعنا من خلال جمع معلومات مجهولة.',
                ],
                'advertisement' => [
                    'title' => 'ملفات تعريف الارتباط الإعلانية',
                    'description' => 'تُستخدم هذه الملفات لعرض إعلانات ذات صلة وقياس فعاليتها. قد يتم تعيينها من قبلنا أو من قبل شركاء إعلانات خارجيين.',
                ],
            ],
        ],
    ],

    // Cookie table data for the preferences modal
    'cookie_table' => [
        'necessary' => [
            [
                'name' => 'PrestaShop-*',
                'domain' => 'Current domain',
                'expiration' => 'Session',
                'description' => [
                    'en' => 'PrestaShop session cookie for shopping cart and user session',
                    'sv' => 'PrestaShop sessionscookie för kundvagn och användarsession',
                    'da' => 'PrestaShop session-cookie til indkøbskurv og brugersession',
                    'ar' => 'ملف تعريف ارتباط جلسة PrestaShop لعربة التسوق وجلسة المستخدم',
                ],
            ],
            [
                'name' => 'PHPSESSID',
                'domain' => 'Current domain',
                'expiration' => 'Session',
                'description' => [
                    'en' => 'PHP session identifier',
                    'sv' => 'PHP-sessionsidentifierare',
                    'da' => 'PHP-sessionsidentifikator',
                    'ar' => 'معرف جلسة PHP',
                ],
            ],
            [
                'name' => 'cc_cookie',
                'domain' => 'Current domain',
                'expiration' => '6 months',
                'description' => [
                    'en' => 'Stores your cookie consent preferences',
                    'sv' => 'Lagrar dina cookie-samtyckesinställningar',
                    'da' => 'Gemmer dine cookie-samtykkepræferencer',
                    'ar' => 'يخزن تفضيلات موافقتك على ملفات تعريف الارتباط',
                ],
            ],
        ],
        'analytics' => [
            [
                'name' => '_ga',
                'domain' => 'Current domain',
                'expiration' => '2 years',
                'description' => [
                    'en' => 'Google Analytics cookie used to distinguish users',
                    'sv' => 'Google Analytics-cookie som används för att skilja användare åt',
                    'da' => 'Google Analytics-cookie brugt til at skelne brugere',
                    'ar' => 'ملف تعريف ارتباط Google Analytics يُستخدم للتمييز بين المستخدمين',
                ],
            ],
            [
                'name' => '_ga_*',
                'domain' => 'Current domain',
                'expiration' => '2 years',
                'description' => [
                    'en' => 'Google Analytics cookie used to persist session state',
                    'sv' => 'Google Analytics-cookie som används för att bevara sessionstillstånd',
                    'da' => 'Google Analytics-cookie brugt til at bevare sessionstilstand',
                    'ar' => 'ملف تعريف ارتباط Google Analytics يُستخدم للحفاظ على حالة الجلسة',
                ],
            ],
            [
                'name' => '_gid',
                'domain' => 'Current domain',
                'expiration' => '24 hours',
                'description' => [
                    'en' => 'Google Analytics cookie used to distinguish users',
                    'sv' => 'Google Analytics-cookie som används för att skilja användare åt',
                    'da' => 'Google Analytics-cookie brugt til at skelne brugere',
                    'ar' => 'ملف تعريف ارتباط Google Analytics يُستخدم للتمييز بين المستخدمين',
                ],
            ],
        ],
        'advertisement' => [
            [
                'name' => '_fbp',
                'domain' => 'Current domain',
                'expiration' => '3 months',
                'description' => [
                    'en' => 'Facebook Pixel cookie used to identify browsers for advertising',
                    'sv' => 'Facebook Pixel-cookie som används för att identifiera webbläsare för annonsering',
                    'da' => 'Facebook Pixel-cookie brugt til at identificere browsere til annoncering',
                    'ar' => 'ملف تعريف ارتباط Facebook Pixel يُستخدم لتحديد المتصفحات للإعلانات',
                ],
            ],
            [
                'name' => '_fbc',
                'domain' => 'Current domain',
                'expiration' => '3 months',
                'description' => [
                    'en' => 'Facebook Pixel cookie storing click identifier',
                    'sv' => 'Facebook Pixel-cookie som lagrar klickidentifierare',
                    'da' => 'Facebook Pixel-cookie der gemmer klikidentifikator',
                    'ar' => 'ملف تعريف ارتباط Facebook Pixel يخزن معرف النقر',
                ],
            ],
            [
                'name' => '_gcl_au',
                'domain' => 'Current domain',
                'expiration' => '3 months',
                'description' => [
                    'en' => 'Google Ads cookie used to store conversion data',
                    'sv' => 'Google Ads-cookie som används för att lagra konverteringsdata',
                    'da' => 'Google Ads-cookie brugt til at gemme konverteringsdata',
                    'ar' => 'ملف تعريف ارتباط Google Ads يُستخدم لتخزين بيانات التحويل',
                ],
            ],
        ],
        'functionality' => [
            [
                'name' => 'pref_*',
                'domain' => 'Current domain',
                'expiration' => '1 year',
                'description' => [
                    'en' => 'Stores your site preferences (language, currency, etc.)',
                    'sv' => 'Lagrar dina webbplatsinställningar (språk, valuta, etc.)',
                    'da' => 'Gemmer dine hjemmesidepræferencer (sprog, valuta, osv.)',
                    'ar' => 'يخزن تفضيلات موقعك (اللغة، العملة، إلخ)',
                ],
            ],
        ],
    ],

    // IframeManager configuration for embedded content
    'iframemanager' => [
        'youtube' => [
            'embedUrl' => 'https://www.youtube-nocookie.com/embed/{data-id}',
            'thumbnailUrl' => 'https://i3.ytimg.com/vi/{data-id}/hqdefault.jpg',
            'notice' => [
                'en' => 'This content is hosted by YouTube. By showing the external content you accept the <a href="https://www.youtube.com/t/terms" target="_blank">Terms of Service</a>.',
                'sv' => 'Detta innehåll tillhandahålls av YouTube. Genom att visa det externa innehållet accepterar du <a href="https://www.youtube.com/t/terms" target="_blank">användarvillkoren</a>.',
                'da' => 'Dette indhold hostes af YouTube. Ved at vise det eksterne indhold accepterer du <a href="https://www.youtube.com/t/terms" target="_blank">vilkårene</a>.',
                'ar' => 'هذا المحتوى مستضاف بواسطة YouTube. من خلال عرض المحتوى الخارجي، فإنك توافق على <a href="https://www.youtube.com/t/terms" target="_blank">شروط الخدمة</a>.',
            ],
            'loadBtn' => [
                'en' => 'Load video',
                'sv' => 'Ladda video',
                'da' => 'Indlæs video',
                'ar' => 'تحميل الفيديو',
            ],
            'loadAllBtn' => [
                'en' => 'Load all YouTube videos',
                'sv' => 'Ladda alla YouTube-videor',
                'da' => 'Indlæs alle YouTube-videoer',
                'ar' => 'تحميل جميع فيديوهات YouTube',
            ],
        ],
        'vimeo' => [
            'embedUrl' => 'https://player.vimeo.com/video/{data-id}',
            'notice' => [
                'en' => 'This content is hosted by Vimeo. By showing the external content you accept the Terms of Service.',
                'sv' => 'Detta innehåll tillhandahålls av Vimeo. Genom att visa det externa innehållet accepterar du användarvillkoren.',
                'da' => 'Dette indhold hostes af Vimeo. Ved at vise det eksterne indhold accepterer du vilkårene.',
                'ar' => 'هذا المحتوى مستضاف بواسطة Vimeo. من خلال عرض المحتوى الخارجي، فإنك توافق على شروط الخدمة.',
            ],
            'loadBtn' => [
                'en' => 'Load video',
                'sv' => 'Ladda video',
                'da' => 'Indlæs video',
                'ar' => 'تحميل الفيديو',
            ],
        ],
        'googlemaps' => [
            'embedUrl' => 'https://www.google.com/maps/embed?pb={data-id}',
            'notice' => [
                'en' => 'This content is hosted by Google Maps. By showing the external content you accept the Terms of Service.',
                'sv' => 'Detta innehåll tillhandahålls av Google Maps. Genom att visa det externa innehållet accepterar du användarvillkoren.',
                'da' => 'Dette indhold hostes af Google Maps. Ved at vise det eksterne indhold accepterer du vilkårene.',
                'ar' => 'هذا المحتوى مستضاف بواسطة Google Maps. من خلال عرض المحتوى الخارجي، فإنك توافق على شروط الخدمة.',
            ],
            'loadBtn' => [
                'en' => 'Load map',
                'sv' => 'Ladda karta',
                'da' => 'Indlæs kort',
                'ar' => 'تحميل الخريطة',
            ],
        ],
    ],
];
