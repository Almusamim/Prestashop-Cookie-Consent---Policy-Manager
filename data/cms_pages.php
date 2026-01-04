<?php
/**
 * CMS Pages Content Data
 *
 * IMPORTANT: This is demo content for development purposes only.
 * All content must be reviewed by legal counsel before production use.
 *
 * Placeholders to replace:
 * - [COMPANY_NAME] - Your company name
 * - [ORG_NUMBER] - Organization/VAT number
 * - [ADDRESS] - Company address
 * - [EMAIL] - Contact email
 * - [PHONE] - Contact phone
 */

return [
    // =====================================================================
    // PRIVACY POLICY / INTEGRITETSPOLICY
    // =====================================================================
    'integritetspolicy' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Integritetspolicy',
                'slug' => 'integritetspolicy',
                'meta_desc' => 'Läs om hur vi hanterar dina personuppgifter enligt GDPR.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>OBS:</strong> Detta är demoinnehåll. Texten måste granskas av juridisk expertis innan publicering.
    </div>

    <h2>1. Introduktion</h2>
    <p>[COMPANY_NAME] (org.nr [ORG_NUMBER]) värnar om din personliga integritet. Denna policy förklarar hur vi samlar in, använder och skyddar dina personuppgifter i enlighet med EU:s dataskyddsförordning (GDPR).</p>

    <h2>2. Personuppgiftsansvarig</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    E-post: [EMAIL]<br>
    Telefon: [PHONE]</p>

    <h2>3. Vilka uppgifter vi samlar in</h2>
    <p>Vi samlar in följande kategorier av personuppgifter:</p>
    <ul>
        <li><strong>Kontaktuppgifter:</strong> Namn, e-postadress, telefonnummer, leveransadress</li>
        <li><strong>Betalningsuppgifter:</strong> Kortinformation behandlas av vår betalningsleverantör</li>
        <li><strong>Orderhistorik:</strong> Information om dina köp hos oss</li>
        <li><strong>Tekniska uppgifter:</strong> IP-adress, webbläsartyp, enhetsinfo</li>
    </ul>

    <h2>4. Hur vi använder dina uppgifter</h2>
    <p>Vi behandlar dina personuppgifter för att:</p>
    <ul>
        <li>Fullgöra avtal och leverera beställningar</li>
        <li>Hantera betalningar</li>
        <li>Kommunicera angående din beställning</li>
        <li>Förbättra vår webbplats och tjänster</li>
        <li>Uppfylla rättsliga skyldigheter</li>
    </ul>

    <h2>5. Rättslig grund</h2>
    <p>Vi behandlar dina uppgifter baserat på:</p>
    <ul>
        <li><strong>Avtal:</strong> För att fullgöra köpeavtal</li>
        <li><strong>Rättslig förpliktelse:</strong> Bokföringslag, konsumentlagstiftning</li>
        <li><strong>Berättigat intresse:</strong> Förbättra tjänster, förebygga bedrägerier</li>
        <li><strong>Samtycke:</strong> Marknadsföring och nyhetsbrev</li>
    </ul>

    <h2>6. Hur länge vi sparar uppgifter</h2>
    <ul>
        <li>Orderuppgifter: 7 år (bokföringslagen)</li>
        <li>Kundkonto: Tills du avslutar kontot</li>
        <li>Marknadsföring: Tills samtycke återkallas</li>
    </ul>

    <h2>7. Dina rättigheter</h2>
    <p>Du har rätt att:</p>
    <ul>
        <li>Få tillgång till dina uppgifter</li>
        <li>Begära rättelse av felaktiga uppgifter</li>
        <li>Begära radering ("rätten att bli glömd")</li>
        <li>Invända mot behandling</li>
        <li>Begära dataportabilitet</li>
        <li>Återkalla samtycke</li>
    </ul>
    <p><a href="/contact-us">Kontakta oss</a> för att utöva dina rättigheter.</p>

    <h2>8. Cookies</h2>
    <p>Vi använder cookies för webbplatsens funktion och för att förbättra din upplevelse. Läs mer i vår <a href="/sv/content/cookiepolicy">cookiepolicy</a>.</p>

    <h2>9. Kontakt och klagomål</h2>
    <p>Vid frågor om personuppgiftshantering, <a href="/contact-us">kontakta oss</a>. Du har också rätt att lämna klagomål till Integritetsskyddsmyndigheten (IMY).</p>

    <p><em>Senast uppdaterad: [datum]</em></p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'meta_desc' => 'Learn how we handle your personal data in accordance with GDPR.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>NOTE:</strong> This is demo content. The text must be reviewed by legal counsel before publication.
    </div>

    <h2>1. Introduction</h2>
    <p>[COMPANY_NAME] (org. no. [ORG_NUMBER]) is committed to protecting your privacy. This policy explains how we collect, use, and protect your personal data in accordance with the EU General Data Protection Regulation (GDPR).</p>

    <h2>2. Data Controller</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    Email: [EMAIL]<br>
    Phone: [PHONE]</p>

    <h2>3. Data We Collect</h2>
    <p>We collect the following categories of personal data:</p>
    <ul>
        <li><strong>Contact information:</strong> Name, email, phone number, delivery address</li>
        <li><strong>Payment information:</strong> Card details are processed by our payment provider</li>
        <li><strong>Order history:</strong> Information about your purchases</li>
        <li><strong>Technical data:</strong> IP address, browser type, device information</li>
    </ul>

    <h2>4. How We Use Your Data</h2>
    <p>We process your personal data to:</p>
    <ul>
        <li>Fulfill contracts and deliver orders</li>
        <li>Process payments</li>
        <li>Communicate regarding your order</li>
        <li>Improve our website and services</li>
        <li>Comply with legal obligations</li>
    </ul>

    <h2>5. Legal Basis</h2>
    <p>We process your data based on:</p>
    <ul>
        <li><strong>Contract:</strong> To fulfill purchase agreements</li>
        <li><strong>Legal obligation:</strong> Accounting laws, consumer legislation</li>
        <li><strong>Legitimate interest:</strong> Improving services, fraud prevention</li>
        <li><strong>Consent:</strong> Marketing and newsletters</li>
    </ul>

    <h2>6. Data Retention</h2>
    <ul>
        <li>Order data: 7 years (accounting requirements)</li>
        <li>Customer account: Until you close your account</li>
        <li>Marketing: Until consent is withdrawn</li>
    </ul>

    <h2>7. Your Rights</h2>
    <p>You have the right to:</p>
    <ul>
        <li>Access your data</li>
        <li>Request correction of inaccurate data</li>
        <li>Request erasure ("right to be forgotten")</li>
        <li>Object to processing</li>
        <li>Request data portability</li>
        <li>Withdraw consent</li>
    </ul>
    <p><a href="/contact-us">Contact us</a> to exercise your rights.</p>

    <h2>8. Cookies</h2>
    <p>We use cookies for website functionality and to improve your experience. Read more in our <a href="/en/content/cookiepolicy">cookie policy</a>.</p>

    <h2>9. Contact and Complaints</h2>
    <p>For questions about data handling, <a href="/contact-us">contact us</a>. You also have the right to file a complaint with the Swedish Authority for Privacy Protection (IMY).</p>

    <p><em>Last updated: [date]</em></p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Privatlivspolitik',
                'slug' => 'privatlivspolitik',
                'meta_desc' => 'Læs om, hvordan vi håndterer dine personoplysninger i henhold til GDPR.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>BEMÆRK:</strong> Dette er demoindhold. Teksten skal gennemgås af juridisk rådgiver før offentliggørelse.
    </div>

    <h2>1. Introduktion</h2>
    <p>[COMPANY_NAME] (CVR-nr. [ORG_NUMBER]) værner om dit privatliv. Denne politik forklarer, hvordan vi indsamler, bruger og beskytter dine personoplysninger i overensstemmelse med EU's databeskyttelsesforordning (GDPR).</p>

    <h2>2. Dataansvarlig</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    E-mail: [EMAIL]<br>
    Telefon: [PHONE]</p>

    <h2>3. Hvilke oplysninger vi indsamler</h2>
    <ul>
        <li><strong>Kontaktoplysninger:</strong> Navn, e-mail, telefonnummer, leveringsadresse</li>
        <li><strong>Betalingsoplysninger:</strong> Kortoplysninger behandles af vores betalingsudbyder</li>
        <li><strong>Ordrehistorik:</strong> Information om dine køb</li>
        <li><strong>Tekniske data:</strong> IP-adresse, browsertype, enhedsinfo</li>
    </ul>

    <h2>4. Hvordan vi bruger dine oplysninger</h2>
    <ul>
        <li>Opfylde aftaler og levere ordrer</li>
        <li>Behandle betalinger</li>
        <li>Kommunikere vedrørende din ordre</li>
        <li>Forbedre vores hjemmeside og tjenester</li>
        <li>Overholde juridiske forpligtelser</li>
    </ul>

    <h2>5. Retsgrundlag</h2>
    <ul>
        <li><strong>Kontrakt:</strong> For at opfylde købsaftaler</li>
        <li><strong>Juridisk forpligtelse:</strong> Bogføringslov, forbrugerlovgivning</li>
        <li><strong>Legitim interesse:</strong> Forbedring af tjenester, forebyggelse af svindel</li>
        <li><strong>Samtykke:</strong> Markedsføring og nyhedsbreve</li>
    </ul>

    <h2>6. Opbevaring af data</h2>
    <ul>
        <li>Ordredata: 7 år (bogføringskrav)</li>
        <li>Kundekonto: Indtil du lukker din konto</li>
        <li>Markedsføring: Indtil samtykke trækkes tilbage</li>
    </ul>

    <h2>7. Dine rettigheder</h2>
    <p>Du har ret til at:</p>
    <ul>
        <li>Få adgang til dine data</li>
        <li>Anmode om rettelse af unøjagtige data</li>
        <li>Anmode om sletning ("retten til at blive glemt")</li>
        <li>Gøre indsigelse mod behandling</li>
        <li>Anmode om dataportabilitet</li>
        <li>Trække samtykke tilbage</li>
    </ul>
    <p><a href="/contact-us">Kontakt os</a> for at udøve dine rettigheder.</p>

    <h2>8. Cookies</h2>
    <p>Vi bruger cookies til hjemmesidens funktionalitet. Læs mere i vores <a href="/da/content/cookiepolicy">cookiepolitik</a>.</p>

    <h2>9. Kontakt og klager</h2>
    <p>Ved spørgsmål om datahåndtering, <a href="/contact-us">kontakt os</a>. Du har også ret til at indgive klage til Datatilsynet.</p>

    <p><em>Sidst opdateret: [dato]</em></p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'سياسة الخصوصية',
                'slug' => 'privacy-policy',
                'meta_desc' => 'تعرف على كيفية تعاملنا مع بياناتك الشخصية وفقاً لقانون GDPR.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <div class="alert alert-info">
        <strong>ملاحظة:</strong> هذا محتوى تجريبي. يجب مراجعة النص من قبل مستشار قانوني قبل النشر.
    </div>

    <h2>1. مقدمة</h2>
    <p>تلتزم [COMPANY_NAME] (رقم التسجيل [ORG_NUMBER]) بحماية خصوصيتك. توضح هذه السياسة كيفية جمعنا واستخدامنا وحمايتنا لبياناتك الشخصية وفقاً للائحة العامة لحماية البيانات في الاتحاد الأوروبي (GDPR).</p>

    <h2>2. المسؤول عن البيانات</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    البريد الإلكتروني: [EMAIL]<br>
    الهاتف: [PHONE]</p>

    <h2>3. البيانات التي نجمعها</h2>
    <ul>
        <li><strong>معلومات الاتصال:</strong> الاسم، البريد الإلكتروني، رقم الهاتف، عنوان التوصيل</li>
        <li><strong>معلومات الدفع:</strong> يتم معالجة بيانات البطاقة من قبل مزود خدمة الدفع</li>
        <li><strong>سجل الطلبات:</strong> معلومات عن مشترياتك</li>
        <li><strong>البيانات التقنية:</strong> عنوان IP، نوع المتصفح، معلومات الجهاز</li>
    </ul>

    <h2>4. كيف نستخدم بياناتك</h2>
    <ul>
        <li>تنفيذ العقود وتوصيل الطلبات</li>
        <li>معالجة المدفوعات</li>
        <li>التواصل بشأن طلبك</li>
        <li>تحسين موقعنا وخدماتنا</li>
        <li>الامتثال للالتزامات القانونية</li>
    </ul>

    <h2>5. الأساس القانوني</h2>
    <ul>
        <li><strong>العقد:</strong> لتنفيذ اتفاقيات الشراء</li>
        <li><strong>الالتزام القانوني:</strong> قوانين المحاسبة، تشريعات حماية المستهلك</li>
        <li><strong>المصلحة المشروعة:</strong> تحسين الخدمات، منع الاحتيال</li>
        <li><strong>الموافقة:</strong> التسويق والنشرات الإخبارية</li>
    </ul>

    <h2>6. مدة الاحتفاظ بالبيانات</h2>
    <ul>
        <li>بيانات الطلب: 7 سنوات (متطلبات المحاسبة)</li>
        <li>حساب العميل: حتى إغلاق الحساب</li>
        <li>التسويق: حتى سحب الموافقة</li>
    </ul>

    <h2>7. حقوقك</h2>
    <p>لديك الحق في:</p>
    <ul>
        <li>الوصول إلى بياناتك</li>
        <li>طلب تصحيح البيانات غير الدقيقة</li>
        <li>طلب الحذف ("الحق في النسيان")</li>
        <li>الاعتراض على المعالجة</li>
        <li>طلب نقل البيانات</li>
        <li>سحب الموافقة</li>
    </ul>
    <p><a href="/contact-us">تواصل معنا</a> لممارسة حقوقك.</p>

    <h2>8. ملفات تعريف الارتباط</h2>
    <p>نستخدم ملفات تعريف الارتباط لوظائف الموقع. اقرأ المزيد في <a href="/ar/content/cookiepolicy">سياسة ملفات تعريف الارتباط</a>.</p>

    <h2>9. الاتصال والشكاوى</h2>
    <p>للاستفسارات حول معالجة البيانات، <a href="/contact-us">تواصل معنا</a>.</p>

    <p><em>آخر تحديث: [التاريخ]</em></p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // TERMS & CONDITIONS / KÖPVILLKOR
    // =====================================================================
    'kopvillkor' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Köpvillkor',
                'slug' => 'kopvillkor',
                'meta_desc' => 'Läs våra allmänna köpvillkor för beställningar online.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>OBS:</strong> Detta är demoinnehåll. Texten måste granskas av juridisk expertis innan publicering.
    </div>

    <h2>1. Allmänt</h2>
    <p>Dessa köpvillkor gäller för köp via [COMPANY_NAME]:s webbplats. Genom att lägga en beställning godkänner du dessa villkor.</p>

    <h2>2. Beställning och avtal</h2>
    <p>Ett bindande köpeavtal uppstår när vi skickar en orderbekräftelse till din e-postadress. Kontrollera bekräftelsen noggrant.</p>

    <h2>3. Priser</h2>
    <ul>
        <li>Alla priser anges i svenska kronor (SEK) inklusive moms</li>
        <li>Vi reserverar oss för prisändringar och eventuella felaktigheter</li>
        <li>Fraktkostnad tillkommer och visas i kassan</li>
    </ul>

    <h2>4. Betalning</h2>
    <p>Vi erbjuder följande betalningssätt:</p>
    <ul>
        <li>Kortbetalning (Visa, Mastercard)</li>
        <li>Swish</li>
        <li>Faktura/Delbetalning via Klarna</li>
    </ul>
    <p>Betalningen sker via säker krypterad uppkoppling.</p>

    <h2>5. Leverans</h2>
    <p>Leverans sker normalt inom 2-5 arbetsdagar. Läs mer på vår <a href="/sv/content/leverans">leveranssida</a>.</p>

    <h2>6. Ångerrätt</h2>
    <p>Du har 14 dagars ångerrätt enligt distansavtalslagen. Läs mer på vår <a href="/sv/content/angerratt-returer">sida om ångerrätt och returer</a>.</p>

    <h2>7. Reklamation</h2>
    <p>Vid fel på varan har du rätt att reklamera inom 3 år enligt konsumentköplagen. <a href="/contact-us">Kontakta oss</a>.</p>

    <h2>8. Personuppgifter</h2>
    <p>Vi behandlar dina personuppgifter enligt vår <a href="/sv/content/integritetspolicy">integritetspolicy</a>.</p>

    <h2>9. Force Majeure</h2>
    <p>Vi ansvarar inte för förseningar orsakade av omständigheter utanför vår kontroll.</p>

    <h2>10. Tvist</h2>
    <p>Vid tvist följer vi Allmänna Reklamationsnämndens (ARN) rekommendationer. Svensk lag gäller.</p>

    <h2>Kontakt</h2>
    <p>[COMPANY_NAME]<br>
    [ADDRESS]<br>
    [EMAIL]<br>
    [PHONE]</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Terms & Conditions',
                'slug' => 'terms-and-conditions',
                'meta_desc' => 'Read our general terms and conditions for online orders.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>NOTE:</strong> This is demo content. The text must be reviewed by legal counsel before publication.
    </div>

    <h2>1. General</h2>
    <p>These terms and conditions apply to purchases made through [COMPANY_NAME]'s website. By placing an order, you accept these terms.</p>

    <h2>2. Orders and Agreement</h2>
    <p>A binding purchase agreement is formed when we send an order confirmation to your email address. Please check the confirmation carefully.</p>

    <h2>3. Prices</h2>
    <ul>
        <li>All prices are in the displayed currency and include VAT</li>
        <li>We reserve the right to price changes and possible errors</li>
        <li>Shipping costs are added and displayed at checkout</li>
    </ul>

    <h2>4. Payment</h2>
    <p>We offer the following payment methods:</p>
    <ul>
        <li>Card payment (Visa, Mastercard)</li>
        <li>Mobile payment</li>
        <li>Invoice/Installments via Klarna</li>
    </ul>
    <p>Payment is processed through a secure encrypted connection.</p>

    <h2>5. Delivery</h2>
    <p>Delivery normally takes 2-5 business days. Read more on our <a href="/en/content/leverans">delivery page</a>.</p>

    <h2>6. Right of Withdrawal</h2>
    <p>You have a 14-day right of withdrawal under EU consumer law. Read more on our <a href="/en/content/angerratt-returer">returns page</a>.</p>

    <h2>7. Complaints</h2>
    <p>For defective products, you have the right to complain within 3 years. <a href="/contact-us">Contact us</a>.</p>

    <h2>8. Personal Data</h2>
    <p>We process your personal data according to our <a href="/en/content/integritetspolicy">privacy policy</a>.</p>

    <h2>9. Force Majeure</h2>
    <p>We are not responsible for delays caused by circumstances beyond our control.</p>

    <h2>10. Disputes</h2>
    <p>In case of dispute, Swedish law applies. EU consumers may use the ODR platform.</p>

    <h2>Contact</h2>
    <p>[COMPANY_NAME]<br>
    [ADDRESS]<br>
    [EMAIL]<br>
    [PHONE]</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Handelsbetingelser',
                'slug' => 'handelsbetingelser',
                'meta_desc' => 'Læs vores generelle handelsbetingelser for onlinekøb.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>BEMÆRK:</strong> Dette er demoindhold. Teksten skal gennemgås af juridisk rådgiver før offentliggørelse.
    </div>

    <h2>1. Generelt</h2>
    <p>Disse betingelser gælder for køb via [COMPANY_NAME]s hjemmeside. Ved at afgive en ordre accepterer du disse betingelser.</p>

    <h2>2. Bestilling og aftale</h2>
    <p>En bindende købsaftale opstår, når vi sender en ordrebekræftelse til din e-mail. Kontroller bekræftelsen omhyggeligt.</p>

    <h2>3. Priser</h2>
    <ul>
        <li>Alle priser er i den viste valuta og inkluderer moms</li>
        <li>Vi forbeholder os ret til prisændringer og eventuelle fejl</li>
        <li>Forsendelsesomkostninger tillægges og vises ved kassen</li>
    </ul>

    <h2>4. Betaling</h2>
    <p>Vi tilbyder følgende betalingsmetoder:</p>
    <ul>
        <li>Kortbetaling (Visa, Mastercard)</li>
        <li>MobilePay</li>
        <li>Faktura via Klarna</li>
    </ul>

    <h2>5. Levering</h2>
    <p>Levering sker normalt inden for 2-5 arbejdsdage. Læs mere på vores <a href="/da/content/leverans">leveringsside</a>.</p>

    <h2>6. Fortrydelsesret</h2>
    <p>Du har 14 dages fortrydelsesret i henhold til forbrugeraftaleloven. Læs mere på vores <a href="/da/content/angerratt-returer">returside</a>.</p>

    <h2>7. Reklamation</h2>
    <p>Ved defekte varer har du ret til at reklamere inden for 2 år. <a href="/contact-us">Kontakt os</a>.</p>

    <h2>8. Persondata</h2>
    <p>Vi behandler dine persondata i henhold til vores <a href="/da/content/integritetspolicy">privatlivspolitik</a>.</p>

    <h2>9. Force Majeure</h2>
    <p>Vi er ikke ansvarlige for forsinkelser forårsaget af omstændigheder uden for vores kontrol.</p>

    <h2>10. Tvister</h2>
    <p>Dansk ret finder anvendelse. Du kan kontakte Forbrugerklagenævnet.</p>

    <h2>Kontakt</h2>
    <p>[COMPANY_NAME]<br>
    [ADDRESS]<br>
    [EMAIL]<br>
    [PHONE]</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'الشروط والأحكام',
                'slug' => 'terms-and-conditions',
                'meta_desc' => 'اقرأ الشروط والأحكام العامة للطلبات عبر الإنترنت.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <div class="alert alert-info">
        <strong>ملاحظة:</strong> هذا محتوى تجريبي. يجب مراجعة النص من قبل مستشار قانوني قبل النشر.
    </div>

    <h2>1. عام</h2>
    <p>تنطبق هذه الشروط والأحكام على المشتريات من خلال موقع [COMPANY_NAME]. بتقديم طلب، فإنك توافق على هذه الشروط.</p>

    <h2>2. الطلبات والاتفاقية</h2>
    <p>يتم تشكيل اتفاقية شراء ملزمة عندما نرسل تأكيد الطلب إلى بريدك الإلكتروني.</p>

    <h2>3. الأسعار</h2>
    <ul>
        <li>جميع الأسعار بالعملة المعروضة وتشمل الضريبة</li>
        <li>نحتفظ بالحق في تغيير الأسعار</li>
        <li>تكاليف الشحن تضاف وتظهر عند الدفع</li>
    </ul>

    <h2>4. الدفع</h2>
    <p>نقدم طرق الدفع التالية:</p>
    <ul>
        <li>الدفع بالبطاقة (فيزا، ماستركارد)</li>
        <li>الدفع عبر الهاتف المحمول</li>
        <li>الفاتورة/التقسيط عبر Klarna</li>
    </ul>

    <h2>5. التوصيل</h2>
    <p>يستغرق التوصيل عادة 2-5 أيام عمل. اقرأ المزيد على <a href="/ar/content/leverans">صفحة التوصيل</a>.</p>

    <h2>6. حق الإلغاء</h2>
    <p>لديك 14 يوماً حق الإلغاء وفقاً لقانون المستهلك في الاتحاد الأوروبي. اقرأ المزيد على <a href="/ar/content/angerratt-returer">صفحة الإرجاع</a>.</p>

    <h2>7. الشكاوى</h2>
    <p>للمنتجات المعيبة، لديك الحق في تقديم شكوى خلال 3 سنوات. <a href="/contact-us">تواصل معنا</a>.</p>

    <h2>8. البيانات الشخصية</h2>
    <p>نعالج بياناتك الشخصية وفقاً <a href="/ar/content/integritetspolicy">لسياسة الخصوصية</a>.</p>

    <h2>9. القوة القاهرة</h2>
    <p>لسنا مسؤولين عن التأخيرات الناتجة عن ظروف خارجة عن سيطرتنا.</p>

    <h2>10. النزاعات</h2>
    <p>يسري القانون السويدي. يمكن لمستهلكي الاتحاد الأوروبي استخدام منصة ODR.</p>

    <h2>الاتصال</h2>
    <p>[COMPANY_NAME]<br>
    [ADDRESS]<br>
    [EMAIL]<br>
    [PHONE]</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // DELIVERY / LEVERANS
    // =====================================================================
    'leverans' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Leverans',
                'slug' => 'leverans',
                'meta_desc' => 'Information om leveransalternativ, leveranstider och fraktkostnader.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Leveransalternativ</h2>
    <p>Vi erbjuder flera leveransalternativ för att passa dina behov:</p>

    [DELIVERY_CARRIERS]

    <h2>Spårning</h2>
    <p>När din order skickats får du ett e-postmeddelande med spårningsnummer så att du kan följa din leverans.</p>

    <h2>Leverans utanför Sverige</h2>
    <p>Vi levererar till hela EU. Kontakta oss för mer information om internationell frakt.</p>

    <h2>Kontakt</h2>
    <p>Har du frågor om din leverans? <a href="/contact-us">Kontakta oss</a>.</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Delivery',
                'slug' => 'delivery',
                'meta_desc' => 'Information about delivery options, times and shipping costs.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Delivery Options</h2>
    <p>We offer several delivery options to suit your needs:</p>

    [DELIVERY_CARRIERS]

    <h2>Tracking</h2>
    <p>When your order is shipped, you will receive an email with tracking information.</p>

    <h2>International Delivery</h2>
    <p>We deliver throughout the EU. Contact us for more information about international shipping.</p>

    <h2>Contact</h2>
    <p>Questions about your delivery? <a href="/contact-us">Contact us</a>.</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Levering',
                'slug' => 'levering',
                'meta_desc' => 'Information om leveringsmuligheder, leveringstider og fragtomkostninger.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Leveringsmuligheder</h2>
    <p>Vi tilbyder flere leveringsmuligheder:</p>

    [DELIVERY_CARRIERS]

    <h2>Sporing</h2>
    <p>Når din ordre er afsendt, modtager du en e-mail med sporingsinformation.</p>

    <h2>International levering</h2>
    <p>Vi leverer i hele EU. Kontakt os for mere information.</p>

    <h2>Kontakt</h2>
    <p>Spørgsmål om din levering? <a href="/contact-us">Kontakt os</a>.</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'التوصيل',
                'slug' => 'delivery',
                'meta_desc' => 'معلومات حول خيارات التوصيل والمواعيد وتكاليف الشحن.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <h2>خيارات التوصيل</h2>
    <p>نقدم عدة خيارات للتوصيل لتناسب احتياجاتك:</p>

    [DELIVERY_CARRIERS]

    <h2>التتبع</h2>
    <p>عند شحن طلبك، ستتلقى بريداً إلكترونياً مع معلومات التتبع.</p>

    <h2>التوصيل الدولي</h2>
    <p>نوصل لجميع دول الاتحاد الأوروبي. تواصل معنا لمزيد من المعلومات.</p>

    <h2>الاتصال</h2>
    <p>أسئلة حول التوصيل؟ <a href="/contact-us">تواصل معنا</a>.</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // RETURNS & REFUNDS / ÅNGERRÄTT & RETURER
    // =====================================================================
    'angerratt-returer' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Ångerrätt & Returer',
                'slug' => 'angerratt-returer',
                'meta_desc' => 'Information om ångerrätt, returer och återbetalning.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Ångerrätt</h2>
    <p>Enligt distansavtalslagen har du som konsument 14 dagars ångerrätt. Ångerfristen börjar gälla den dag du tar emot varan.</p>

    <h3>Så utövar du din ångerrätt</h3>
    <ol>
        <li>Meddela oss inom 14 dagar via vår <a href="/contact-us">kontaktsida</a></li>
        <li>Skicka tillbaka varan inom 14 dagar efter meddelandet</li>
        <li>Varan ska vara i ursprungligt skick</li>
    </ol>

    <h3>Undantag från ångerrätten</h3>
    <ul>
        <li>Livsmedel och förbrukningsvaror</li>
        <li>Specialbeställda eller personligt anpassade varor</li>
        <li>Förseglad hygienartiklar där förseglingen brutits</li>
    </ul>

    <h2>Returprocess</h2>
    <h3>Steg 1: Anmäl retur</h3>
    <p><a href="/contact-us">Kontakta oss</a> för att anmäla din retur och få retursedel.</p>

    <h3>Steg 2: Paketera</h3>
    <p>Packa varan säkert i originalförpackning om möjligt.</p>

    <h3>Steg 3: Skicka</h3>
    <p>Skicka paketet med den retursedel du fått.</p>

    <h2>Återbetalning</h2>
    <p>Återbetalning sker inom 14 dagar efter att vi mottagit returen, till samma betalningsmetod som användes vid köpet.</p>

    <h2>Returfraktkostnad</h2>
    <ul>
        <li>Ånger: Du står för returfrakten</li>
        <li>Felaktig/defekt vara: Vi betalar returfrakten</li>
    </ul>

    <h2>Kontakt</h2>
    <p>Frågor om returer? <a href="/contact-us">Kontakta oss</a>.</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Returns & Refunds',
                'slug' => 'returns-and-refunds',
                'meta_desc' => 'Information about right of withdrawal, returns and refunds.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Right of Withdrawal</h2>
    <p>Under EU consumer law, you have a 14-day right of withdrawal. The period starts from the day you receive the goods.</p>

    <h3>How to Exercise Your Right</h3>
    <ol>
        <li>Notify us within 14 days via our <a href="/contact-us">contact page</a></li>
        <li>Return the item within 14 days of notification</li>
        <li>The item must be in original condition</li>
    </ol>

    <h3>Exceptions</h3>
    <ul>
        <li>Food and perishable goods</li>
        <li>Custom-made or personalized items</li>
        <li>Sealed hygiene products where the seal has been broken</li>
    </ul>

    <h2>Return Process</h2>
    <h3>Step 1: Request Return</h3>
    <p><a href="/contact-us">Contact us</a> to request a return and receive a return label.</p>

    <h3>Step 2: Package</h3>
    <p>Pack the item safely, in original packaging if possible.</p>

    <h3>Step 3: Ship</h3>
    <p>Send the package using the return label provided.</p>

    <h2>Refunds</h2>
    <p>Refunds are processed within 14 days of receiving the return, to the same payment method used for the purchase.</p>

    <h2>Return Shipping Costs</h2>
    <ul>
        <li>Withdrawal: You pay return shipping</li>
        <li>Defective item: We pay return shipping</li>
    </ul>

    <h2>Contact</h2>
    <p>Questions about returns? <a href="/contact-us">Contact us</a>.</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Returret & Refundering',
                'slug' => 'returret',
                'meta_desc' => 'Information om fortrydelsesret, returnering og refundering.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Fortrydelsesret</h2>
    <p>I henhold til forbrugeraftaleloven har du 14 dages fortrydelsesret. Fristen starter fra den dag, du modtager varen.</p>

    <h3>Sådan bruger du din fortrydelsesret</h3>
    <ol>
        <li>Giv os besked inden for 14 dage via vores <a href="/contact-us">kontaktside</a></li>
        <li>Returner varen inden for 14 dage efter meddelelsen</li>
        <li>Varen skal være i original stand</li>
    </ol>

    <h3>Undtagelser</h3>
    <ul>
        <li>Fødevarer og letfordærvelige varer</li>
        <li>Specialfremstillede eller personlige varer</li>
        <li>Forseglede hygiejneprodukter hvor forseglingen er brudt</li>
    </ul>

    <h2>Returproces</h2>
    <h3>Trin 1: Anmod om retur</h3>
    <p><a href="/contact-us">Kontakt os</a> for at anmode om retur og modtage en returlabel.</p>

    <h3>Trin 2: Pak</h3>
    <p>Pak varen sikkert, gerne i original emballage.</p>

    <h3>Trin 3: Send</h3>
    <p>Send pakken med den medfølgende returlabel.</p>

    <h2>Refundering</h2>
    <p>Refundering sker inden for 14 dage efter modtagelse af returen, til samme betalingsmetode.</p>

    <h2>Returfragt</h2>
    <ul>
        <li>Fortrydelse: Du betaler returfragten</li>
        <li>Defekt vare: Vi betaler returfragten</li>
    </ul>

    <h2>Kontakt</h2>
    <p>Spørgsmål om returnering? <a href="/contact-us">Kontakt os</a>.</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'الإرجاع والاسترداد',
                'slug' => 'returns-and-refunds',
                'meta_desc' => 'معلومات حول حق الإلغاء والإرجاع واسترداد الأموال.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <h2>حق الإلغاء</h2>
    <p>وفقاً لقانون المستهلك في الاتحاد الأوروبي، لديك 14 يوماً حق الإلغاء. تبدأ الفترة من يوم استلام البضاعة.</p>

    <h3>كيفية ممارسة حقك</h3>
    <ol>
        <li>أبلغنا خلال 14 يوماً عبر <a href="/contact-us">صفحة الاتصال</a></li>
        <li>أرجع المنتج خلال 14 يوماً من الإبلاغ</li>
        <li>يجب أن يكون المنتج في حالته الأصلية</li>
    </ol>

    <h3>الاستثناءات</h3>
    <ul>
        <li>الأطعمة والمنتجات القابلة للتلف</li>
        <li>المنتجات المصنوعة حسب الطلب</li>
        <li>منتجات النظافة المختومة التي تم فتح ختمها</li>
    </ul>

    <h2>عملية الإرجاع</h2>
    <h3>الخطوة 1: طلب الإرجاع</h3>
    <p><a href="/contact-us">تواصل معنا</a> لطلب الإرجاع والحصول على ملصق الإرجاع.</p>

    <h3>الخطوة 2: التغليف</h3>
    <p>قم بتغليف المنتج بشكل آمن، في العبوة الأصلية إن أمكن.</p>

    <h3>الخطوة 3: الإرسال</h3>
    <p>أرسل الطرد باستخدام ملصق الإرجاع المقدم.</p>

    <h2>الاسترداد</h2>
    <p>تتم معالجة الاسترداد خلال 14 يوماً من استلام الإرجاع، بنفس طريقة الدفع.</p>

    <h2>تكاليف شحن الإرجاع</h2>
    <ul>
        <li>الإلغاء: أنت تدفع شحن الإرجاع</li>
        <li>منتج معيب: نحن ندفع شحن الإرجاع</li>
    </ul>

    <h2>الاتصال</h2>
    <p>أسئلة حول الإرجاع؟ <a href="/contact-us">تواصل معنا</a>.</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // SECURE PAYMENT / SÄKER BETALNING
    // =====================================================================
    'saker-betalning' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Säker Betalning',
                'slug' => 'saker-betalning',
                'meta_desc' => 'Information om våra säkra betalningsmetoder.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Säker betalning</h2>
    <p>Din säkerhet är vår prioritet. Alla betalningar sker via krypterad SSL-uppkoppling.</p>

    <h2>Betalningsmetoder</h2>

    <h3>Kortbetalning</h3>
    <p>Vi accepterar Visa och Mastercard. Korttransaktioner hanteras av vår PCI-DSS-certifierade betalningsleverantör.</p>

    <h3>Swish</h3>
    <p>Snabb och säker betalning direkt från din mobil.</p>

    <h3>Klarna</h3>
    <p>Betala med faktura eller dela upp betalningen. Klarna gör kreditbedömning.</p>

    <h2>Säkerhetsåtgärder</h2>
    <ul>
        <li><strong>SSL-kryptering:</strong> All data skyddas med 256-bitars kryptering</li>
        <li><strong>3D Secure:</strong> Extra verifiering för kortbetalningar</li>
        <li><strong>PCI DSS:</strong> Vi följer branschstandarder för korthantering</li>
        <li><strong>Bedrägeriövervakning:</strong> Automatisk upptäckt av misstänkta transaktioner</li>
    </ul>

    <h2>Vi lagrar aldrig kortuppgifter</h2>
    <p>Dina kortuppgifter hanteras direkt av betalningsleverantören och lagras aldrig på våra servrar.</p>

    <h2>Kontakt</h2>
    <p>Frågor om betalning? <a href="/contact-us">Kontakta oss</a>.</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Secure Payment',
                'slug' => 'secure-payment',
                'meta_desc' => 'Information about our secure payment methods.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Secure Payment</h2>
    <p>Your security is our priority. All payments are processed via encrypted SSL connection.</p>

    <h2>Payment Methods</h2>

    <h3>Card Payment</h3>
    <p>We accept Visa and Mastercard. Card transactions are handled by our PCI-DSS certified payment provider.</p>

    <h3>Mobile Payment</h3>
    <p>Fast and secure payment directly from your mobile device.</p>

    <h3>Klarna</h3>
    <p>Pay by invoice or split payment. Klarna performs credit assessment.</p>

    <h2>Security Measures</h2>
    <ul>
        <li><strong>SSL Encryption:</strong> All data protected with 256-bit encryption</li>
        <li><strong>3D Secure:</strong> Extra verification for card payments</li>
        <li><strong>PCI DSS:</strong> We follow industry standards for card handling</li>
        <li><strong>Fraud Monitoring:</strong> Automatic detection of suspicious transactions</li>
    </ul>

    <h2>We Never Store Card Details</h2>
    <p>Your card details are handled directly by the payment provider and never stored on our servers.</p>

    <h2>Contact</h2>
    <p>Questions about payment? <a href="/contact-us">Contact us</a>.</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Sikker Betaling',
                'slug' => 'sikker-betaling',
                'meta_desc' => 'Information om vores sikre betalingsmetoder.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Sikker Betaling</h2>
    <p>Din sikkerhed er vores prioritet. Alle betalinger behandles via krypteret SSL-forbindelse.</p>

    <h2>Betalingsmetoder</h2>

    <h3>Kortbetaling</h3>
    <p>Vi accepterer Visa og Mastercard. Korttransaktioner håndteres af vores PCI-DSS-certificerede betalingsudbyder.</p>

    <h3>MobilePay</h3>
    <p>Hurtig og sikker betaling direkte fra din mobil.</p>

    <h3>Klarna</h3>
    <p>Betal med faktura eller del betalingen op. Klarna foretager kreditvurdering.</p>

    <h2>Sikkerhedsforanstaltninger</h2>
    <ul>
        <li><strong>SSL-kryptering:</strong> Alle data beskyttes med 256-bit kryptering</li>
        <li><strong>3D Secure:</strong> Ekstra verifikation for kortbetalinger</li>
        <li><strong>PCI DSS:</strong> Vi følger branchestandarder for korthåndtering</li>
        <li><strong>Svindelovervågning:</strong> Automatisk registrering af mistænkelige transaktioner</li>
    </ul>

    <h2>Vi gemmer aldrig kortoplysninger</h2>
    <p>Dine kortoplysninger håndteres direkte af betalingsudbyderen og gemmes aldrig på vores servere.</p>

    <h2>Kontakt</h2>
    <p>Spørgsmål om betaling? <a href="/contact-us">Kontakt os</a>.</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'الدفع الآمن',
                'slug' => 'secure-payment',
                'meta_desc' => 'معلومات حول طرق الدفع الآمنة لدينا.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <h2>الدفع الآمن</h2>
    <p>أمانك هو أولويتنا. تتم جميع المدفوعات عبر اتصال SSL مشفر.</p>

    <h2>طرق الدفع</h2>

    <h3>الدفع بالبطاقة</h3>
    <p>نقبل فيزا وماستركارد. يتم التعامل مع معاملات البطاقات من قبل مزود دفع معتمد PCI-DSS.</p>

    <h3>الدفع عبر الهاتف المحمول</h3>
    <p>دفع سريع وآمن مباشرة من جهازك المحمول.</p>

    <h3>Klarna</h3>
    <p>ادفع بالفاتورة أو قسّم الدفع. تقوم Klarna بتقييم الائتمان.</p>

    <h2>إجراءات الأمان</h2>
    <ul>
        <li><strong>تشفير SSL:</strong> جميع البيانات محمية بتشفير 256 بت</li>
        <li><strong>3D Secure:</strong> تحقق إضافي لمدفوعات البطاقات</li>
        <li><strong>PCI DSS:</strong> نتبع معايير الصناعة للتعامل مع البطاقات</li>
        <li><strong>مراقبة الاحتيال:</strong> اكتشاف تلقائي للمعاملات المشبوهة</li>
    </ul>

    <h2>لا نخزن بيانات البطاقة أبداً</h2>
    <p>يتم التعامل مع بيانات بطاقتك مباشرة من قبل مزود الدفع ولا يتم تخزينها على خوادمنا أبداً.</p>

    <h2>الاتصال</h2>
    <p>أسئلة حول الدفع؟ <a href="/contact-us">تواصل معنا</a>.</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // ABOUT US / OM OSS
    // =====================================================================
    'om-oss' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Om Oss',
                'slug' => 'om-oss',
                'meta_desc' => 'Lär känna oss och vår historia.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Välkommen till [COMPANY_NAME]</h2>
    <p>Vi är ett passionerat team som brinner för att leverera kvalitetsprodukter och enastående kundservice.</p>

    <h2>Vår historia</h2>
    <p>[Berätta er historia här - när ni startade, varför, och hur ni har vuxit]</p>

    <h2>Våra värderingar</h2>
    <ul>
        <li><strong>Kvalitet:</strong> Vi kompromissar aldrig med kvaliteten</li>
        <li><strong>Kundservice:</strong> Nöjda kunder är vår främsta prioritet</li>
        <li><strong>Hållbarhet:</strong> Vi arbetar aktivt för en bättre framtid</li>
        <li><strong>Transparens:</strong> Vi är alltid ärliga och öppna</li>
    </ul>

    <h2>Kontakta oss</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    E-post: [EMAIL]<br>
    Telefon: [PHONE]</p>

    <h3>Öppettider kundservice</h3>
    <p>Måndag-fredag: 09:00-17:00<br>
    Lördag-söndag: Stängt</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'About Us',
                'slug' => 'about-us',
                'meta_desc' => 'Get to know us and our story.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Welcome to [COMPANY_NAME]</h2>
    <p>We are a passionate team dedicated to delivering quality products and outstanding customer service.</p>

    <h2>Our Story</h2>
    <p>[Tell your story here - when you started, why, and how you've grown]</p>

    <h2>Our Values</h2>
    <ul>
        <li><strong>Quality:</strong> We never compromise on quality</li>
        <li><strong>Customer Service:</strong> Satisfied customers are our top priority</li>
        <li><strong>Sustainability:</strong> We actively work for a better future</li>
        <li><strong>Transparency:</strong> We are always honest and open</li>
    </ul>

    <h2>Contact Us</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    Email: [EMAIL]<br>
    Phone: [PHONE]</p>

    <h3>Customer Service Hours</h3>
    <p>Monday-Friday: 9:00 AM - 5:00 PM<br>
    Saturday-Sunday: Closed</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Om Os',
                'slug' => 'om-os',
                'meta_desc' => 'Lær os og vores historie at kende.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Velkommen til [COMPANY_NAME]</h2>
    <p>Vi er et passioneret team, der brænder for at levere kvalitetsprodukter og enestående kundeservice.</p>

    <h2>Vores Historie</h2>
    <p>[Fortæl jeres historie her - hvornår I startede, hvorfor, og hvordan I er vokset]</p>

    <h2>Vores Værdier</h2>
    <ul>
        <li><strong>Kvalitet:</strong> Vi går aldrig på kompromis med kvaliteten</li>
        <li><strong>Kundeservice:</strong> Tilfredse kunder er vores højeste prioritet</li>
        <li><strong>Bæredygtighed:</strong> Vi arbejder aktivt for en bedre fremtid</li>
        <li><strong>Gennemsigtighed:</strong> Vi er altid ærlige og åbne</li>
    </ul>

    <h2>Kontakt Os</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    E-mail: [EMAIL]<br>
    Telefon: [PHONE]</p>

    <h3>Kundeservice Åbningstider</h3>
    <p>Mandag-fredag: 09:00-17:00<br>
    Lørdag-søndag: Lukket</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'من نحن',
                'slug' => 'about-us',
                'meta_desc' => 'تعرف علينا وعلى قصتنا.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <h2>مرحباً بكم في [COMPANY_NAME]</h2>
    <p>نحن فريق شغوف ملتزم بتقديم منتجات عالية الجودة وخدمة عملاء متميزة.</p>

    <h2>قصتنا</h2>
    <p>[احكِ قصتكم هنا - متى بدأتم، لماذا، وكيف نمت الشركة]</p>

    <h2>قيمنا</h2>
    <ul>
        <li><strong>الجودة:</strong> لا نتنازل أبداً عن الجودة</li>
        <li><strong>خدمة العملاء:</strong> رضا العملاء هو أولويتنا القصوى</li>
        <li><strong>الاستدامة:</strong> نعمل بنشاط من أجل مستقبل أفضل</li>
        <li><strong>الشفافية:</strong> نحن دائماً صادقون ومنفتحون</li>
    </ul>

    <h2>اتصل بنا</h2>
    <p><strong>[COMPANY_NAME]</strong><br>
    [ADDRESS]<br>
    البريد الإلكتروني: [EMAIL]<br>
    الهاتف: [PHONE]</p>

    <h3>ساعات خدمة العملاء</h3>
    <p>الاثنين-الجمعة: 9:00 صباحاً - 5:00 مساءً<br>
    السبت-الأحد: مغلق</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // COOKIE POLICY / COOKIEPOLICY
    // =====================================================================
    'cookiepolicy' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Cookiepolicy',
                'slug' => 'cookiepolicy',
                'meta_desc' => 'Information om hur vi använder cookies på vår webbplats.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>OBS:</strong> Detta är demoinnehåll. Texten måste granskas av juridisk expertis innan publicering.
    </div>

    <h2>Vad är cookies?</h2>
    <p>Cookies är små textfiler som lagras på din enhet när du besöker vår webbplats. De hjälper oss att förbättra din upplevelse och ge dig bättre service.</p>

    <h2>Vilka cookies använder vi?</h2>

    <h3>Nödvändiga cookies</h3>
    <p>Dessa cookies krävs för webbplatsens grundläggande funktioner och kan inte stängas av.</p>
    <ul>
        <li>Varukorgsdata</li>
        <li>Inloggningssession</li>
        <li>CSRF-skydd</li>
    </ul>

    <h3>Funktionella cookies</h3>
    <p>Dessa förbättrar funktionaliteten och personifierar din upplevelse.</p>
    <ul>
        <li>Språkval</li>
        <li>Valutapreferenser</li>
        <li>Tidigare visade produkter</li>
    </ul>

    <h3>Analyscookies</h3>
    <p>Hjälper oss förstå hur besökare använder webbplatsen.</p>
    <ul>
        <li>Google Analytics</li>
        <li>Sidvisningar och användarflöden</li>
    </ul>

    <h3>Marknadsföringscookies</h3>
    <p>Används för att visa relevanta annonser.</p>
    <ul>
        <li>Remarketingcookies</li>
        <li>Sociala medier-spårning</li>
    </ul>

    <h2>Hantera cookies</h2>
    <p>Du kan hantera dina cookieinställningar via vår <a href="/sv/content/cookie-samtycke">cookiesamtyckessida</a> eller genom din webbläsares inställningar.</p>

    <h2>Hur blockerar jag cookies?</h2>
    <p>De flesta webbläsare låter dig blockera cookies via inställningar. Observera att blockering av nödvändiga cookies kan påverka webbplatsens funktionalitet.</p>

    <h2>Kontakt</h2>
    <p>Frågor om vår cookiepolicy? <a href="/contact-us">Kontakta oss</a>.</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Cookie Policy',
                'slug' => 'cookie-policy',
                'meta_desc' => 'Information about how we use cookies on our website.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>NOTE:</strong> This is demo content. The text must be reviewed by legal counsel before publication.
    </div>

    <h2>What are cookies?</h2>
    <p>Cookies are small text files stored on your device when you visit our website. They help us improve your experience and provide better service.</p>

    <h2>Types of cookies we use</h2>

    <h3>Necessary cookies</h3>
    <p>These cookies are required for basic website functionality and cannot be disabled.</p>
    <ul>
        <li>Shopping cart data</li>
        <li>Login session</li>
        <li>CSRF protection</li>
    </ul>

    <h3>Functional cookies</h3>
    <p>These enhance functionality and personalize your experience.</p>
    <ul>
        <li>Language selection</li>
        <li>Currency preferences</li>
        <li>Recently viewed products</li>
    </ul>

    <h3>Analytics cookies</h3>
    <p>Help us understand how visitors use the website.</p>
    <ul>
        <li>Google Analytics</li>
        <li>Page views and user flows</li>
    </ul>

    <h3>Marketing cookies</h3>
    <p>Used to display relevant advertisements.</p>
    <ul>
        <li>Remarketing cookies</li>
        <li>Social media tracking</li>
    </ul>

    <h2>Managing cookies</h2>
    <p>You can manage your cookie settings via our <a href="/en/content/cookie-samtycke">cookie consent page</a> or through your browser settings.</p>

    <h2>How to block cookies</h2>
    <p>Most browsers allow you to block cookies through settings. Note that blocking necessary cookies may affect website functionality.</p>

    <h2>Contact</h2>
    <p>Questions about our cookie policy? <a href="/contact-us">Contact us</a>.</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Cookiepolitik',
                'slug' => 'cookiepolitik',
                'meta_desc' => 'Information om hvordan vi bruger cookies på vores hjemmeside.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <div class="alert alert-info">
        <strong>BEMÆRK:</strong> Dette er demoindhold. Teksten skal gennemgås af juridisk rådgiver før offentliggørelse.
    </div>

    <h2>Hvad er cookies?</h2>
    <p>Cookies er små tekstfiler, der gemmes på din enhed, når du besøger vores hjemmeside. De hjælper os med at forbedre din oplevelse.</p>

    <h2>Typer af cookies vi bruger</h2>

    <h3>Nødvendige cookies</h3>
    <p>Disse cookies er nødvendige for hjemmesidens grundlæggende funktionalitet.</p>
    <ul>
        <li>Indkøbskurvdata</li>
        <li>Login-session</li>
        <li>CSRF-beskyttelse</li>
    </ul>

    <h3>Funktionelle cookies</h3>
    <p>Disse forbedrer funktionaliteten og personaliserer din oplevelse.</p>
    <ul>
        <li>Sprogvalg</li>
        <li>Valutapræferencer</li>
        <li>Senest viste produkter</li>
    </ul>

    <h3>Analysecookies</h3>
    <p>Hjælper os med at forstå, hvordan besøgende bruger hjemmesiden.</p>
    <ul>
        <li>Google Analytics</li>
        <li>Sidevisninger og brugerflows</li>
    </ul>

    <h3>Markedsføringscookies</h3>
    <p>Bruges til at vise relevante annoncer.</p>
    <ul>
        <li>Remarketing-cookies</li>
        <li>Social medie-sporing</li>
    </ul>

    <h2>Håndtering af cookies</h2>
    <p>Du kan håndtere dine cookieindstillinger via vores <a href="/da/content/cookie-samtycke">cookiesamtykkeside</a> eller gennem din browsers indstillinger.</p>

    <h2>Kontakt</h2>
    <p>Spørgsmål om vores cookiepolitik? <a href="/contact-us">Kontakt os</a>.</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'سياسة ملفات تعريف الارتباط',
                'slug' => 'cookie-policy',
                'meta_desc' => 'معلومات حول كيفية استخدامنا لملفات تعريف الارتباط على موقعنا.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <div class="alert alert-info">
        <strong>ملاحظة:</strong> هذا محتوى تجريبي. يجب مراجعة النص من قبل مستشار قانوني قبل النشر.
    </div>

    <h2>ما هي ملفات تعريف الارتباط؟</h2>
    <p>ملفات تعريف الارتباط هي ملفات نصية صغيرة يتم تخزينها على جهازك عند زيارة موقعنا. تساعدنا على تحسين تجربتك.</p>

    <h2>أنواع ملفات تعريف الارتباط التي نستخدمها</h2>

    <h3>ملفات تعريف الارتباط الضرورية</h3>
    <p>هذه الملفات مطلوبة لوظائف الموقع الأساسية ولا يمكن تعطيلها.</p>
    <ul>
        <li>بيانات سلة التسوق</li>
        <li>جلسة تسجيل الدخول</li>
        <li>حماية CSRF</li>
    </ul>

    <h3>ملفات تعريف الارتباط الوظيفية</h3>
    <p>تعزز الوظائف وتخصص تجربتك.</p>
    <ul>
        <li>اختيار اللغة</li>
        <li>تفضيلات العملة</li>
        <li>المنتجات المعروضة مؤخراً</li>
    </ul>

    <h3>ملفات تعريف الارتباط التحليلية</h3>
    <p>تساعدنا على فهم كيفية استخدام الزوار للموقع.</p>
    <ul>
        <li>Google Analytics</li>
        <li>مشاهدات الصفحات وتدفقات المستخدمين</li>
    </ul>

    <h3>ملفات تعريف الارتباط التسويقية</h3>
    <p>تستخدم لعرض الإعلانات ذات الصلة.</p>
    <ul>
        <li>ملفات تعريف الارتباط لإعادة التسويق</li>
        <li>تتبع وسائل التواصل الاجتماعي</li>
    </ul>

    <h2>إدارة ملفات تعريف الارتباط</h2>
    <p>يمكنك إدارة إعدادات ملفات تعريف الارتباط عبر <a href="/ar/content/cookie-samtycke">صفحة موافقة ملفات تعريف الارتباط</a> أو من خلال إعدادات متصفحك.</p>

    <h2>الاتصال</h2>
    <p>أسئلة حول سياسة ملفات تعريف الارتباط؟ <a href="/contact-us">تواصل معنا</a>.</p>
</div>
HTML,
            ],
        ],
    ],

    // =====================================================================
    // COOKIE CONSENT / COOKIE-SAMTYCKE
    // =====================================================================
    'cookie-samtycke' => [
        'category' => 1,
        'active' => 1,
        'content' => [
            'sv' => [
                'title' => 'Cookie-samtycke',
                'slug' => 'cookie-samtycke',
                'meta_desc' => 'Hantera dina cookie-inställningar.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Hantera cookie-samtycke</h2>
    <p>På denna sida kan du hantera dina cookie-inställningar för vår webbplats.</p>

    <div class="alert alert-info">
        <p>Cookie-samtyckesfunktionen hanteras av vår cookie-modul. Om du ser detta meddelande innebär det att cookie-modulen inte är korrekt konfigurerad.</p>
        <p>Kontakta webbadministratören för att aktivera cookie-samtyckesfunktionen.</p>
    </div>

    <h2>Om cookies</h2>
    <p>Vi använder cookies för att:</p>
    <ul>
        <li>Möjliggöra grundläggande webbplatsfunktioner</li>
        <li>Komma ihåg dina inställningar</li>
        <li>Förbättra din användarupplevelse</li>
        <li>Analysera webbplatsanvändning</li>
    </ul>

    <p>Läs mer i vår fullständiga <a href="/sv/content/cookiepolicy">cookiepolicy</a>.</p>

    <h2>Kontakt</h2>
    <p>Vid frågor, <a href="/contact-us">kontakta oss</a>.</p>
</div>
HTML,
            ],
            'en' => [
                'title' => 'Cookie Consent',
                'slug' => 'cookie-consent',
                'meta_desc' => 'Manage your cookie settings.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Manage Cookie Consent</h2>
    <p>On this page you can manage your cookie settings for our website.</p>

    <div class="alert alert-info">
        <p>The cookie consent functionality is managed by our cookie module. If you see this message, it means the cookie module is not properly configured.</p>
        <p>Contact the web administrator to enable the cookie consent functionality.</p>
    </div>

    <h2>About Cookies</h2>
    <p>We use cookies to:</p>
    <ul>
        <li>Enable basic website functionality</li>
        <li>Remember your settings</li>
        <li>Improve your user experience</li>
        <li>Analyze website usage</li>
    </ul>

    <p>Read more in our full <a href="/en/content/cookiepolicy">cookie policy</a>.</p>

    <h2>Contact</h2>
    <p>For questions, <a href="/contact-us">contact us</a>.</p>
</div>
HTML,
            ],
            'da' => [
                'title' => 'Cookie-samtykke',
                'slug' => 'cookie-samtykke',
                'meta_desc' => 'Håndter dine cookie-indstillinger.',
                'html' => <<<'HTML'
<div class="cms-content policy-page">
    <h2>Håndter cookie-samtykke</h2>
    <p>På denne side kan du håndtere dine cookie-indstillinger for vores hjemmeside.</p>

    <div class="alert alert-info">
        <p>Cookie-samtykkefunktionen håndteres af vores cookie-modul. Hvis du ser denne besked, betyder det at cookie-modulet ikke er korrekt konfigureret.</p>
        <p>Kontakt webadministratoren for at aktivere cookie-samtykkefunktionen.</p>
    </div>

    <h2>Om cookies</h2>
    <p>Vi bruger cookies til at:</p>
    <ul>
        <li>Muliggøre grundlæggende hjemmesidefunktioner</li>
        <li>Huske dine indstillinger</li>
        <li>Forbedre din brugeroplevelse</li>
        <li>Analysere hjemmesidebrug</li>
    </ul>

    <p>Læs mere i vores fulde <a href="/da/content/cookiepolicy">cookiepolitik</a>.</p>

    <h2>Kontakt</h2>
    <p>Ved spørgsmål, <a href="/contact-us">kontakt os</a>.</p>
</div>
HTML,
            ],
            'ar' => [
                'title' => 'موافقة ملفات تعريف الارتباط',
                'slug' => 'cookie-consent',
                'meta_desc' => 'إدارة إعدادات ملفات تعريف الارتباط.',
                'html' => <<<'HTML'
<div class="cms-content policy-page" dir="rtl">
    <h2>إدارة موافقة ملفات تعريف الارتباط</h2>
    <p>في هذه الصفحة يمكنك إدارة إعدادات ملفات تعريف الارتباط لموقعنا.</p>

    <div class="alert alert-info">
        <p>يتم إدارة وظيفة موافقة ملفات تعريف الارتباط بواسطة وحدة ملفات تعريف الارتباط الخاصة بنا. إذا رأيت هذه الرسالة، فهذا يعني أن الوحدة غير مهيأة بشكل صحيح.</p>
        <p>اتصل بمسؤول الموقع لتفعيل وظيفة موافقة ملفات تعريف الارتباط.</p>
    </div>

    <h2>حول ملفات تعريف الارتباط</h2>
    <p>نستخدم ملفات تعريف الارتباط من أجل:</p>
    <ul>
        <li>تمكين وظائف الموقع الأساسية</li>
        <li>تذكر إعداداتك</li>
        <li>تحسين تجربة المستخدم</li>
        <li>تحليل استخدام الموقع</li>
    </ul>

    <p>اقرأ المزيد في <a href="/ar/content/cookiepolicy">سياسة ملفات تعريف الارتباط</a> الكاملة.</p>

    <h2>الاتصال</h2>
    <p>للاستفسارات، <a href="/contact-us">تواصل معنا</a>.</p>
</div>
HTML,
            ],
        ],
    ],
];
