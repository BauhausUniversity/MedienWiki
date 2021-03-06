<?php
/** Min Nan Chinese (Bân-lâm-gú)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Ianbu
 * @author Kaihsu
 */

$datePreferences = array(
	'default',
	'ISO 8601',
);
$defaultDateFormat = 'nan';
$dateFormats = array(
	'nan time' => 'H:i',
	'nan date' => 'Y-"nî" n-"goe̍h" j-"jἰt" (l)',
	'nan both' => 'Y-"nî" n-"goe̍h" j-"jἰt" (D) H:i',
);

$messages = array(
# User preference toggles
'tog-underline' => 'Liân-kiat oē té-sûn:',
'tog-justify' => 'pâi-chê  tōaⁿ-lo̍h',
'tog-hideminor' => 'Am chòe-kīn ê sió kái-piàn',
'tog-hidepatrolled' => 'Am chòe-kīn sûn koè--ê  kái-piàn',
'tog-newpageshidepatrolled' => 'Sin-ia̍h ê chheng-toaⁿ am sûn koè--ê',
'tog-extendwatchlist' => 'Khok-chhiong kàm-sī-toaⁿ kàu hián-sī só͘-ū ê kái-piàn',
'tog-usenewrc' => 'Ka-kiông pán ê chòe-kīn-ê-kái-piàn (su-iàu JavaScript)',
'tog-numberheadings' => 'Phiau-tê chū-tōng pian-hō',
'tog-showtoolbar' => 'Hián-sī pian-chi̍p ke-si-tiâu (su-iàu JavaScript)',
'tog-editondblclick' => 'Siang-ji̍h ia̍h-bīn to̍h ē-tàng pian-chi̍p (su-iàu JavaScript)',
'tog-editsection' => 'Ji̍h [siu-kái] chit-ê liân-kiat to̍h ē-tàng pian-chi̍p toāⁿ-lo̍h',
'tog-editsectiononrightclick' => 'Chiàⁿ-ji̍h (right click) toāⁿ-lo̍h (section) phiau-tê to̍h ē-tàng pian-chi̍p toāⁿ-lo̍h (su-iàu JavaScript)',
'tog-showtoc' => 'Hián-sī bo̍k-chhù (3-ê phiau-tê í-siōng ê ia̍h)',
'tog-rememberpassword' => 'Kì tiâu bi̍t-bé, āu-chōa iōng (for a maximum of $1 {{PLURAL:$1|day|days}})',
'tog-watchcreations' => 'Kā goá khui ê ia̍h ka-ji̍p kàm-sī-toaⁿ lāi-té',
'tog-watchdefault' => 'Kā goá pian-chi̍p kòe ê ia̍h ka-ji̍p kàm-sī-toaⁿ lāi-té',
'tog-watchmoves' => 'Kā goá soá ê ia̍h ka-ji̍p kàm-sī-toaⁿ',
'tog-watchdeletion' => 'Kā goá thâi tiāu ê ia̍h ka-ji̍p kàm-sī-toaⁿ',
'tog-minordefault' => 'Chiām-tēng bī-lâi ê siu-kái lóng sī sió-siu-ká',
'tog-previewontop' => 'Sûn-khoàⁿ ê lōe-iông tī pian-chi̍p keh-á thâu-chêng',
'tog-previewonfirst' => 'Thâu-pái pian-chi̍p seng khoàⁿ-māi',
'tog-nocache' => 'Koaiⁿ-tiāu ia̍h ê cache',
'tog-enotifwatchlistpages' => 'Kam-sī-tuann ū ē bûn-tsiunn nā ū kái-piàn, kià tiān-tsú-phue hōo guá.',
'tog-enotifusertalkpages' => 'Guá ê thó-lūn ia̍h  nā ū lâng kái,  kià tiān-tsú-phue hōo guá.',
'tog-enotifminoredits' => 'Sió pian-chi̍p mā kià tiān-tsú-phue hōo guá.',
'tog-enotifrevealaddr' => 'Hō͘ pat-lâng khoàⁿ ê tio̍h oá ê tiān-chú-phoe tē-chí',
'tog-shownumberswatching' => 'Hián-sī tng leh khoàⁿ ê iōng-chiá sò͘-bo̍k',
'tog-oldsig' => 'Chit-má ê chhiam-miâ:',
'tog-fancysig' => 'Chhiam-miâ mài chò liân-kiat',
'tog-externaleditor' => 'Iōng gōa-pō· pian-chi̍p-khì',
'tog-externaldiff' => 'Iōng gōa-pō· diff',
'tog-showjumplinks' => 'Hō͘ "thiàu khì" chit ê liân-chiap ē-sái',
'tog-uselivepreview' => 'Ēng sui khoàⁿ-māi (ài ū JavaScript) (chhì-giām--ê)',
'tog-forceeditsummary' => 'Pian-chi̍p khài-iàu bô thiⁿ ê sî-chūn, kā goá thê-chhéⁿ',
'tog-watchlisthideown' => 'Kàm-sī-toaⁿ bián hián-sī goá ê pian-chi̍p',
'tog-watchlisthidebots' => 'Kàm-sī-toaⁿ bián hián-sī ki-khì pian-chi̍p',
'tog-watchlisthideminor' => 'Kàm-sī-toaⁿ bián hián-sī sió siu-kái',
'tog-watchlisthideliu' => 'Kàm-sī-toaⁿ bián hián-sī iōng-chiá ū teng-ji̍p ê pian-chi̍p',
'tog-watchlisthideanons' => 'Kàm-sī-toaⁿ bián hián-sī bû-bêng-sī ê pian-chi̍p',
'tog-watchlisthidepatrolled' => 'Kàm-sī-toaⁿ bián hián-sī khoàⁿ-koè--ê pian-chi̍p',
'tog-ccmeonemails' => 'Kià hō͘ pa̍t-lâng ê email sūn-soà kià copy hō͘ goá',
'tog-diffonly' => 'Diff ē-pêng bián hián-sī ia̍h ê loē-iông',
'tog-showhiddencats' => 'Hián-sī chhàng khí--lâi ê lūi-pia̍t',
'tog-norollbackdiff' => 'ká tńg-khí liáu bián-koán cheng-chha goā-chē',

'underline-always' => 'Tiāⁿ-tio̍h',
'underline-never' => 'Tiāⁿ-tio̍h mài',
'underline-default' => 'Tòe liû-lám-khì ê default',

# Font style option in Special:Preferences
'editfont-style' => 'Pian-chi̍p sî ēng ê jī-thé hêng-sek:',
'editfont-default' => 'Tòe liû-lám-khì ê default',
'editfont-monospace' => 'Monospaced jī-thé',
'editfont-sansserif' => 'Sans-serif jī-thé',
'editfont-serif' => 'Serif jī-thé',

# Dates
'sunday' => 'Lé-pài',
'monday' => 'Pài-it',
'tuesday' => 'Pài-jī',
'wednesday' => 'Pài-saⁿ',
'thursday' => 'Pài-sì',
'friday' => 'Pài-gō·',
'saturday' => 'Pài-la̍k',
'sun' => 'Lé-pài',
'mon' => 'It',
'tue' => 'Jī',
'wed' => 'Saⁿ',
'thu' => 'Sì',
'fri' => 'Gō·',
'sat' => 'La̍k',
'january' => '1-goe̍h',
'february' => '2-goe̍h',
'march' => '3-goe̍h',
'april' => '4-goe̍h',
'may_long' => '5-goe̍h',
'june' => '6-goe̍h',
'july' => '7-goe̍h',
'august' => '8-goe̍h',
'september' => '9-goe̍h',
'october' => '10-goe̍h',
'november' => '11-goe̍h',
'december' => '12-goe̍h',
'january-gen' => 'Chiaⁿ-goe̍h',
'february-gen' => 'Jī-goe̍h',
'march-gen' => 'Saⁿ-goe̍h',
'april-gen' => 'Sì-goe̍h',
'may-gen' => 'Gō·-goe̍h',
'june-gen' => 'La̍k-goe̍h',
'july-gen' => 'Chhit-goe̍h',
'august-gen' => 'Peh-goe̍h',
'september-gen' => 'Káu-goe̍h',
'october-gen' => 'Cha̍p-goe̍h',
'november-gen' => 'Cha̍p-it-goe̍h',
'december-gen' => 'Cha̍p-jī-goe̍h',
'jan' => '1g',
'feb' => '2g',
'mar' => '3g',
'apr' => '4g',
'may' => '5g',
'jun' => '6g',
'jul' => '7g',
'aug' => '8g',
'sep' => '9g',
'oct' => '10g',
'nov' => '11g',
'dec' => '12g',

# Categories related messages
'pagecategories' => '{{PLURAL:$1|Lūi-pia̍t|Lūi-pia̍t}}',
'category_header' => 'Tī "$1" chit ê lūi-pia̍t ê bûn-chiuⁿ',
'subcategories' => 'Ē-lūi-pia̍t',
'category-media-header' => 'Tī lūi-pia̍t "$1" ê mûi-thé',
'category-empty' => "''Chit-má chit ê lūi-pia̍t  bô ia̍h ia̍h-sī mûi-thé.''",
'hidden-categories' => '{{PLURAL:$1|Hidden category|Chhàng khí-lâi ê lūi-pia̍t}}',
'hidden-category-category' => 'Chhàng khí--lâi ê lūi piat',
'category-subcat-count' => '{{PLURAL:$2|Chit ê lūi-piat chí-ū ē-bīn ê ē-lūi-pia̍t.|Chit ê lūi-piat ū ē-bīn {{PLURAL:$1| ê ē-lūi-piat|$1 ê ē-lūi-piat}}, choân-pō͘ $2 ê.}}',
'category-subcat-count-limited' => 'Chit ê lūi-piat ū ē-bīn ê {{PLURAL:$1| ē-lūi-pia̍t|$1 ē-lūi-pia̍t}}.',
'category-article-count' => '{{PLURAL:$2|Chit ê lūi-piat chí-ū ē-bīn ê ia̍h.|Ē-bīn {{PLURAL:$1|bīn ia̍h sī|$1bīn ia̍h sī}} tī chit lūi-pia̍t, choân-pō͘ $2 bīn ia̍h}}',
'category-article-count-limited' => 'Ē-bīn {{PLURAL:$1|ia̍h sī|$1 ia̍h sī }} tī chit ê lūi-pia̍t.',
'category-file-count' => '{{PLURAL:$2|Chit ê lūi-piat chí-ū ē-bīn ê tóng-àn.|Ē-bīn {{PLURAL:$1| ê tóng-àn sī|$1 ê tóng-àn sī}} tī chit lūi-pia̍t, choân-pō͘ $2 ê tóng-àn}}',
'category-file-count-limited' => 'Chit-má chit-ê lūi-pia̍t ū {{PLURAL:$1| ê tóng-àn}}',
'listingcontinuesabbrev' => '(chiap-sòa thâu-chêng)',
'index-category' => 'Ū sik-ín ê ia̍h',
'noindex-category' => 'Bī sik-ín ê ia̍h.',
'broken-file-category' => 'Sit-khì tóng-àn liân-kiat ê ia̍h.',

'about' => 'Koan-hē',
'article' => 'Loē-iông ia̍h',
'newwindow' => '(ē khui sin thang-á hián-sī)',
'cancel' => 'Chhú-siau',
'moredotdotdot' => 'Iáu-ū',
'mypage' => 'Góa ê ia̍h',
'mytalk' => 'Góa ê thó-lūn',
'anontalk' => 'Chit ê IP ê thó-lūn-ia̍h',
'navigation' => 'Se̍h chām',
'and' => '&#32;kap',

# Cologne Blue skin
'qbfind' => 'Chhoé',
'qbbrowse' => 'Liū-lám',
'qbedit' => 'Siu-kái',
'qbpageoptions' => 'Chit ia̍h',
'qbpageinfo' => 'Bo̍k-lo̍k',
'qbmyoptions' => 'Goá ê ia̍h',
'qbspecialpages' => 'Te̍k-sû-ia̍h',
'faq' => 'Būn-tah',
'faqpage' => 'Project:Būn-tah',

# Vector skin
'vector-action-addsection' => 'Ke chi̍t-ê toān-lo̍h',
'vector-action-delete' => 'Thâi',
'vector-action-move' => 'Sóa khì',
'vector-action-protect' => 'Pó-hō·',
'vector-action-undelete' => 'chhú-siau thâi tiàu',
'vector-action-unprotect' => 'Chhú-siau pó-hō·',
'vector-simplesearch-preference' => 'Chhái-iōng ka-kiông-pán ê chhiau-soh kiàn-gī ( chí hān tī Vector bīn-phoê)',
'vector-view-create' => 'Khai-sí siá',
'vector-view-edit' => 'Siu-kái',
'vector-view-history' => 'khoàⁿ le̍k-sú',
'vector-view-view' => 'Tha̍k',
'vector-view-viewsource' => 'Khoàⁿ goân-sú lōe-iông',
'actions' => 'Tōng-chok',
'namespaces' => 'Miâ-khong-kan',
'variants' => 'piàn-thé',

'errorpagetitle' => 'Chhò-gō·',
'returnto' => 'Tò-tńg khì $1.',
'tagline' => 'Ùi {{SITENAME}}',
'help' => 'Soat-bêng-su',
'search' => 'Chhiau-chhoē',
'searchbutton' => 'Chhiau',
'go' => 'Lâi-khì',
'searcharticle' => 'Lâi-khì',
'history' => 'Ia̍h le̍k-sú',
'history_short' => 'le̍k-sú',
'updatedmarker' => 'Téng hoê goá lâi chiah liáu ū kái koè--ê',
'printableversion' => 'Ìn-soat pán-pún',
'permalink' => 'Éng-kiú liân-kiat',
'print' => 'Ìn-soat',
'view' => 'Khoàⁿ',
'edit' => 'Siu-kái',
'create' => 'Khai-sí siá',
'editthispage' => 'Siu-kái chit ia̍h',
'create-this-page' => 'Khai-sí siá chit ia̍h',
'delete' => 'Thâi',
'deletethispage' => 'Thâi chit ia̍h',
'undelete_short' => 'Kiù $1 ê siu-kái',
'viewdeleted_short' => 'Khoàⁿ {{PLURAL:$1|chi̍t-ê thâi tiàu--ê pian-chi̍p|$1 ê thâi tiàu--ê pian-chi̍p}}',
'protect' => 'Pó-hō·',
'protect_change' => 'kái-piàn',
'protectthispage' => 'Pó-hō· chit ia̍h',
'unprotect' => 'Chhú-siau pó-hō·',
'unprotectthispage' => 'Chhú-siau pó-hō· chit ia̍h',
'newpage' => 'Sin ia̍h',
'talkpage' => 'Thó-lūn chit ia̍h',
'talkpagelinktext' => 'thó-lūn',
'specialpage' => 'Te̍k-sû-ia̍h',
'personaltools' => 'Kò-jîn kang-khū',
'postcomment' => 'Hoat-piáu phêng-lūn',
'articlepage' => 'Khoàⁿ loē-iông ia̍h',
'talk' => 'thó-lūn',
'views' => 'Khoàⁿ',
'toolbox' => 'Ke-si kheh-á',
'userpage' => 'Khoàⁿ iōng-chiá ê Ia̍h',
'projectpage' => 'Khoàⁿ sū-kang ia̍h',
'imagepage' => 'Khoàⁿ tóng-àn ia̍h',
'mediawikipage' => 'Khoàⁿ sìn-sit ia̍h',
'templatepage' => 'Khoàⁿ pang-bô͘ ia̍h',
'viewhelppage' => 'Khoàⁿ pang-chō͘ ia̍h',
'categorypage' => 'Khoàⁿ lūi-pia̍t ia̍h',
'viewtalkpage' => 'Khoàⁿ thó-lūn',
'otherlanguages' => 'Kî-thaⁿ ê gí-giân',
'redirectedfrom' => '(Tùi $1 choán--lâi)',
'redirectpagesub' => 'Choán-ia̍h',
'lastmodifiedat' => 'Chit ia̍h tī $1,  $2 ū kái--koè',
'viewcount' => 'Pún-ia̍h kàu taⁿ ū $1 pái access.',
'protectedpage' => 'Siū pó-hō͘ ê ia̍h',
'jumpto' => 'Thiàu khì:',
'jumptonavigation' => 'Se̍h chām',
'jumptosearch' => 'chhiau-chhoē',
'view-pool-error' => 'Pháiⁿ-sè, chit-má chú-ki siuⁿ koè bô-êng.
Siuⁿ koè chē lâng beh khoàⁿ chit ia̍h.
Chhiáⁿ sio-tán chi̍t-ē,  chiah koh lâi khoàⁿ chit ia̍h.

$1',
'pool-timeout' => 'Chhiau-koè só-tēng ê sî-kan',
'pool-queuefull' => 'Tūi-lia̍t pâi moá ah',
'pool-errorunknown' => 'M̄-chai siáⁿ chhò-gō͘',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite' => 'hían-sī',
'aboutpage' => 'Project:koan-hē',
'copyright' => 'Tī $1 tiâu-kiāⁿ chi hā khó sú-iōng loē-iông',
'copyrightpage' => '{{ns:project}}:Pán-khoân',
'currentevents' => 'Sin-bûn sū-kiāⁿ',
'currentevents-url' => 'Project:Sin-bûn sū-kiāⁿ',
'disclaimers' => 'Bô-hū-chek seng-bêng',
'disclaimerpage' => 'Project:It-poaⁿ ê seng-bêng',
'edithelp' => 'Án-choáⁿ siu-kái',
'edithelppage' => 'Help:Pian-chi̍p',
'helppage' => 'Help:Bo̍k-lio̍k',
'mainpage' => 'Thâu-ia̍h',
'mainpage-description' => 'Thâu-ia̍h',
'policy-url' => 'Project:Chèng-chhek',
'portal' => 'Siā-lí mn̂g-chhùi-kháu',
'portal-url' => 'Project:Siā-lí mn̂g-chhùi-kháu',
'privacy' => 'Ín-su chèng-chhek',
'privacypage' => 'Project:Ún-su chèng-chhek',

'badaccess' => 'Siū-khoân chhò-ngō͘',
'badaccess-group0' => 'Lí bô ún-chún chò lí iau-kiû ê tōng-chok.',
'badaccess-groups' => 'Lí beh chò ê tōng-chok chí hān {{PLURAL:$2| tīn| tīn-goân chi it }}: $1 ê iōng-chiá.',

'versionrequired' => 'Ài MediaWiki $1 ê pán-pún',
'versionrequiredtext' => 'Beh iōng chit ia̍h ài MediaWiki $1 ê pán-pún.
Chhiáⁿ khoàⁿ [[Special:Version|pán-pún ia̍h]].',

'ok' => 'Hó ah',
'retrievedfrom' => 'Lâi-goân: "$1"',
'youhavenewmessages' => 'Lí ū $1 ($2).',
'newmessageslink' => 'sin sìn-sit',
'newmessagesdifflink' => 'chêng 2 ê siu-tēng-pún ê diff',
'youhavenewmessagesmulti' => 'Lí tī $1 ū sin sìn-sit',
'editsection' => 'siu-kái',
'editold' => 'siu-kái',
'viewsourceold' => 'Khoàⁿ goân-sú lōe-iông',
'editlink' => 'siu-kái',
'viewsourcelink' => 'Khoàⁿ goân-sú lōe-iông',
'editsectionhint' => 'Pian-chi̍p toān-lo̍h: $1',
'toc' => 'Bo̍k-lo̍k',
'showtoc' => 'khui',
'hidetoc' => 'siu',
'collapsible-collapse' => 'Siu',
'collapsible-expand' => 'Khui',
'thisisdeleted' => 'Khoàⁿ a̍h-sī kiù $1?',
'viewdeleted' => 'Beh khoàⁿ $1？',
'restorelink' => '{{PLURAL:$1|chi̍t ê thâi-tiàu ê pian-chi̍p|$1 thâi-tiàu ê pian-chi̍p}}',
'feedlinks' => 'Chhī-liāu:',
'feed-invalid' => 'Bô-hāu ê tēng khoàⁿ lūi-hêng.',
'feed-unavailable' => 'Bô thê-kiong liân-ha̍p tēng khoàⁿ.',
'site-rss-feed' => '$1 ê RSS tēng khoàⁿ',
'site-atom-feed' => '$1 ê Atom tēng-khoàⁿ',
'page-rss-feed' => '"$1" ê RSS tēng khoàⁿ',
'page-atom-feed' => '"$1" ê Atom tēng khoàⁿ',
'red-link-title' => '$1 (bô hit ia̍h)',
'sort-descending' => 'Hā-kàng pâi-lia̍t',
'sort-ascending' => 'Seng-koân pâi-lia̍t',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main' => 'Bûn-chiuⁿ',
'nstab-user' => 'Iōng-chiá ê ia̍h',
'nstab-media' => 'Mûi-thé',
'nstab-special' => 'Te̍k-sû-ia̍h',
'nstab-project' => 'Sū-kang ia̍h',
'nstab-image' => 'Tóng-àn',
'nstab-mediawiki' => 'Sìn-sit',
'nstab-template' => 'Pang-bô·',
'nstab-help' => 'Pang-chō͘ ia̍h',
'nstab-category' => 'Lūi-pia̍t',

# Main script and global functions
'nosuchaction' => 'Bô chit-khoán tōng-chok',
'nosuchactiontext' => 'Hit ê URL só͘ chí-tēng ê tōng-chok bô-hāu.
Lí khó-lêng phah m̄-tio̍h URL, ia̍h sī ji̍h tio̍h chhò-ngō͘ ê liân-kiat.
Che mā khó-lêng sī {{SITENAME}} só͘ sú-iōng ê nńg-thé chhut būn-tê.',
'nosuchspecialpage' => 'Bô chit ê te̍k-sû-ia̍h',
'nospecialpagetext' => '<strong>Bô lí beh tih ê te̍k-sû-ia̍h。</strong>

[[Special:SpecialPages|{{int:specialpages}}]] sī só͘-ū ê te̍k-sû-ia̍h lia̍t-pió.',

# General errors
'error' => 'Chhò-gō·',
'databaseerror' => 'Chu-liāu-khò· chhò-gō·',
'dberrortext' => 'Chu-liāu-khò͘ hoat-seng cha-sûn ê gí-hoat chhò-ngō͘.
Che khó-lêng sī nńg-thé ê chhò-ngō͘.
Téng chi̍t ê cha-sûn sī :
<blockquote><tt>$1</tt></blockquote>
tī hâm-sò͘  "<tt>$2</tt>".
Chu-liāu-khò͘ thoân hoê ê chhò-ngō͘ "<tt>$3: $4</tt>".',
'readonly' => 'Chu-liāu-khò· só tiâu leh',
'enterlockreason' => 'Phah beh hong-só ê lí-iû, pau-koah ko͘-kè siáⁿ-mi̍h sî-chūn ē kái-tû hong-só.',
'readonlytext' => 'Chu-liāu-khò· hiān-chú-sî só tiâu leh, bô khai-hòng hō· lâng siu-kái. Che tāi-khài sī in-ūi teh pān î-siu khang-khòe, oân-sêng liáu-āu èng-tong tō ē hôe-ho̍k chèng-siông. Hū-chek ê hêng-chèng jîn-oân lâu chit-ê soat-bêng: $1',
'missing-article' => 'Chu-liāu-khò͘ chhoē bô ia̍h ê luē-iông, ia̍h ê miâ "$1" $2 .

Che it-poaⁿ sī in-ūi koè-sî ê cheng-chha ia̍h sī le̍k-sú liân-kiat ê ia̍h í-keng hông thâi tiàu.

Nā m̄-sī hit chióng chêng-hêng, lí khó-lêng tú tio̍h nńg-thé ê chhò-ngō͘. Chhiáⁿ pò hō͘ chi̍t ūi [[Special:ListUsers/sysop|koán-lí-goân]], ūi liân-kiat hiâ khì lâu thong-ti .',
'internalerror' => 'Loē-pō͘ ê chhò-ngō͘',
'internalerror_info' => 'Loē-pō͘ ê chhò-ngō͘: $1',
'fileappenderrorread' => 'Ka-ji̍p(append) ê sî bô-hoat-tō͘ thak "$1".',
'fileappenderror' => 'Bô-hoat-tō͘ kā "$1" chiap khì "$2".',
'filecopyerror' => 'Bô-hoat-tō· kā tóng-àn "$1" khó·-pih khì "$2".',
'filerenameerror' => 'Bô-hoat-tō· kā tóng-àn "$1" kái-miâ chò "$2".',
'filedeleteerror' => 'Bô-hoat-tō· kā tóng-àn "$1" thâi tiāu',
'directorycreateerror' => 'Bô-hoat-tō͘ khui bo̍k-lo̍k "$1".',
'filenotfound' => 'Chhōe bô tóng-àn "$1".',
'fileexistserror' => 'Bô-hoat-tō͘ chûn-ji̍p tóng-àn "$1": í-keng ū chit ê tóng-àn',
'unexpected' => 'Koài-koài ê pió-tat: "$1"="$2"。',
'formerror' => 'Chhò-gō·: bô-hoat-tō· kā pió sàng chhut khì.',
'badarticleerror' => 'Bē-tàng tiàm chit ia̍h chip-hêng chit ê tōng-chok.',
'cannotdelete' => 'Bô-hoat-tō· kā hit ê ia̍h a̍h-sī iáⁿ-siōng thâi tiāu. (Khó-lêng pa̍t-lâng í-keng kā thâi tiāu ah.)',
'badtitle' => 'M̄-chiâⁿ piau-tê',
'badtitletext' => 'Iau-kiû ê piau-tê sī bô-hāu ê, khang ê, a̍h-sī liân-kiat chhò-gō· ê inter-language/inter-wiki piau-tê.',
'perfcached' => 'Ē-kha ê chu-liāu tùi lâi--ê, só·-í bī-pit oân-choân hoán-èng siōng sin ê chōng-hóng. A maximum of {{PLURAL:$1|one result is|$1 results are}} available in the cache.',
'perfcachedts' => 'Ē-kha ê chu-liāu tùi lâi--ê, tī $1 keng-sin--koè. A maximum of {{PLURAL:$4|one result is|$4 results are}} available in the cache.',
'querypage-no-updates' => 'Chit-má bē-sái kái chit ia̍h.
Chia ê chu-liāu bē-tàng sui tiông-sin chéng-lí.',
'wrong_wfQuery_params' => 'Chhò-ngō͘ ê chham-sò͘ chhoân hō͘ wfQuery（）<br />
Hâm-sò͘: $1<br />
Cha-sûn: $2',
'viewsource' => 'Khoàⁿ goân-sú lōe-iông',
'actionthrottled' => 'Tōng-chok hông tóng leh.',
'actionthrottledtext' => 'Ūi-tio̍h thê-hông lah-sap ê chhú-tì,  lí ū hông hān-chè tī té sî-kan lāi chò siuⁿ chē pái chit ê tōng-chok,  taⁿ lí í-keng chhiau-koè hān-chè.
Chhiáⁿ tī kúi hun-cheng hāu chiah koh chhì.',
'protectedpagetext' => 'Chit ia̍h hông só tiâu leh, bē pian-chi̍p tit.',
'viewsourcetext' => 'Lí ē-sái khoàⁿ ia̍h khó͘-pih chit ia̍h ê goân-sú loē-iông:',
'protectedinterface' => 'Chit ia̍h thê-kiong nńg-thé kài-bīn ēng ê bûn-jī. Ūi beh ī-hông lâng chau-that, só͘-í ū siū tio̍h pó-hō͘.',
'editinginterface' => "'''Sè-jī:''' Lí tng teh siu-kái 1 bīn thê-kiong nńg-thé kài-bīn bûn-jī ê ia̍h. Jīn-hô kái-piàn to ē éng-hióng tio̍h kî-thaⁿ iōng-chiá ê sú-iōng kài-bīn.",
'sqlhidden' => '(Tshàng SQL tsa-sûn)',
'cascadeprotected' => 'Chit-ê ia̍h í-keng hông pó-hō͘ bē kái tit. In-ūi i tī ē-bīn {{PLURAL:$1|ê|ê}} liân-só pó-hō͘ lāi-té:
$2',
'namespaceprotected' => "Lí bô khoân-lī kái '''$1'''  miâ-khong-kan ê ia̍h",

# Virus scanner
'virus-unknownscanner' => 'M̄-chai siáⁿ pēⁿ-to̍k:',

# Login and logout pages
'logouttext' => "'''Lí í-keng teng-chhut.'''

Lí ē-sái mài kì-miâ kè-siok sú-iōng {{SITENAME}}, mā ē-sái iōng kāng-ê a̍h-sī pa̍t-ê sin-hūn têng teng-ji̍p.
Chhiaⁿ chù-ì: ū-kóa ia̍h ū khó-lêng khoàⁿ-tio̍h bē-su lí iû-goân teng-ji̍p tiong; che chi-iàu piàⁿ tiāu lí ê browser ê cache chiū ē chèng-siông.",
'welcomecreation' => '==Hoan-gêng $1!==
Í-keng khui hó lí ê kháu-chō.  M̄-hó bē-kì-tit chhiâu lí ê iōng-chiá siat-tēng.',
'yourname' => 'Lí ê iōng-chiá miâ-chheng:',
'yourpassword' => 'Lí ê bi̍t-bé:',
'yourpasswordagain' => 'Têng phah bi̍t-bé:',
'remembermypassword' => 'Kì tiâu góa ê bi̍t-bé (āu-chhiú teng-ji̍p iōng) (for a maximum of $1 {{PLURAL:$1|day|days}})',
'login' => 'Teng-ji̍p',
'nav-login-createaccount' => 'Teng-ji̍p / khui sin kháu-chō',
'loginprompt' => 'Thiⁿ ē-kha ê chu-liāu thang khui sin hō·-thâu a̍h-sī teng-ji̍p {{SITENAME}}.',
'userlogin' => 'Teng-ji̍p / khui sin kháu-chō',
'userloginnocreate' => 'Teng-ji̍p',
'logout' => 'Teng-chhut',
'userlogout' => 'Teng-chhut',
'notloggedin' => 'Bô teng-ji̍p',
'nologin' => "Bô-thang teng-ji̍p? '''$1'''.",
'nologinlink' => 'Khui 1 ê kháu-chō',
'createaccount' => 'Khui sin kháu-chō',
'gotaccount' => "Í-keng ū kháu-chō? '''$1'''.",
'gotaccountlink' => 'Teng-ji̍p',
'createaccountmail' => 'Thàu koè tiān-chú-phoe',
'createaccountreason' => 'Lí-iû:',
'badretype' => 'Lí su-ji̍p ê 2-cho· bi̍t-bé bô tùi.',
'userexists' => 'Lí beh ti̍h ê iōng-chiá miâ-chheng í-keng ū lâng iōng. Chhiáⁿ kéng pa̍t-ê miâ.',
'loginerror' => 'Teng-ji̍p chhò-gō·',
'createaccounterror' => 'Bô hoat-tō͘ khui kháu-chō: $1',
'loginsuccesstitle' => 'Teng-ji̍p sêng-kong',
'loginsuccess' => 'Lí hiān-chhú-sî í-keng teng-ji̍p {{SITENAME}} chò "$1".',
'nosuchuser' => 'Chia bô iōng-chiá hō-chò "$1". Chhiáⁿ kiám-cha lí ê phèng-im, a̍h-sī iōng ē-kha ê pió lâi khui sin iōng-chiá ê kháu-chō.',
'nosuchusershort' => 'Bô "$1" chit ê iōng-chiá miâ.
Tùi khoàⁿ-māi,  lí phah--ê.',
'nouserspecified' => 'Lí ài chí-tēng chi̍t ê iōng-chiá miâ.',
'wrongpassword' => 'Lí su-ji̍p ê bi̍t-bé ū têng-tâⁿ. Chhiáⁿ têng chhì.',
'wrongpasswordempty' => 'Bi̍t-bé keh-á khang-khang. Chhiáⁿ têng chhì.',
'mailmypassword' => 'Kià sin bi̍t-bé hō· góa',
'passwordremindertitle' => '{{SITENAME}} the-chheN li e bit-be',
'noemail' => 'Kì-lo̍k bô iōng-chiá "$1" ê e-mail chū-chí.',
'passwordsent' => 'Ū kià sin bi̍t-bé khì "$1" chù-chheh ê e-mail chū-chí. Siu--tio̍h liáu-āu chhiáⁿ têng teng-ji̍p.',
'mailerror' => 'Kià phoe tú tio̍h chhò-gō·: $1',
'acct_creation_throttle_hit' => 'Pháiⁿ-sè, lí taⁿ í-keng khui $1 ê kháu-chō ā. Bē-sái koh-chài khui.',
'emailauthenticated' => 'Lí ê e-mail chū-chí tī $1 khak-jīn sêng-kong.',
'emailnotauthenticated' => 'Lí ê e-mail chū-chí iáu-bōe khak-jīn ū-hāu, só·-í ē--kha ê e-mail kong-lêng bē-ēng-tit.',
'noemailprefs' => 'Tī lí ê siat-piān chí-tēng chi̍t ê tiān-chú-phoe tē-chí thang hō͘ chia ê kong-lêng ē-tàng ēng.',
'emailconfirmlink' => 'Chhiáⁿ khak-jīn lí ê e-mail chū-chí ū-hāu',

# Email sending
'user-mail-no-addy' => 'Siūⁿ beh kià tiān-chú-phoe, m̄-koh bô siá tē-chí.',

# Change password dialog
'resetpass' => 'Kái bi̍t-bé',
'resetpass_header' => 'Kái káu-chō ê bi̍t-bé.',
'oldpassword' => 'Kū bi̍t-bé:',
'newpassword' => 'Sin bi̍t-bé:',
'retypenew' => 'Têng phah sin bi̍t-bé:',
'resetpass_forbidden' => 'Bi̍t-bé bē-sái piàn.',
'resetpass-submit-loggedin' => 'Kái bi̍t-bé',
'resetpass-submit-cancel' => 'Chhú-siau',
'resetpass-temp-password' => 'Lîm-sî ê bi̍t-bé:',

# Special:PasswordReset
'passwordreset' => 'Têng siat bi̍t-bé',
'passwordreset-legend' => 'Têng siat bi̍t-bé',
'passwordreset-username' => 'Lí ê iōng-chiá miâ-chheng:',
'passwordreset-email' => 'Tiān-chú-phoe tē-chí:',
'passwordreset-emailelement' => 'Iōng-chiá: $1
Lîm-sî ê bi̍t-bé: $2',
'passwordreset-emailsent' => 'Chit hong thê-chhíⁿ ê  tiān-chú-phoe í-keng kià chhut.',

# Special:ChangeEmail
'changeemail' => 'Kái tiān-chú-phoe ê tē-chí',
'changeemail-oldemail' => 'Chit-má ê E-mail tē-chí:',
'changeemail-newemail' => 'Sin E-mail ê chū-chí:',
'changeemail-cancel' => 'Chhú-siau',

# Edit page toolbar
'bold_sample' => 'Chho·-thé bûn-jī',
'bold_tip' => 'Chho·-thé jī',
'italic_sample' => 'Chhú-thé ê bûn-jī',
'italic_tip' => 'Chhú-thé jī',
'link_sample' => 'Liân-kiat piau-tê',
'link_tip' => 'Lōe-pō· ê liân-kiat',
'extlink_sample' => 'http://www.example.com liân-kiat piau-tê',
'extlink_tip' => 'Gōa-pō· ê liân-kiat (ē-kì-tit thâu-chêng ài ke http://)',
'headline_sample' => 'Thâu-tiâu bûn-jī',
'headline_tip' => 'Tē-2-chân (level 2) ê phiau-tê',
'nowiki_sample' => 'Chia siá bô keh-sek ê bûn-jī',
'image_sample' => 'Iann-siong-e-le.jpg',
'image_tip' => 'Giap tī lāi-bīn ê iáⁿ-siōng',
'sig_tip' => 'Lí ê chhiam-miâ kap sî-kan ìn-á',

# Edit pages
'summary' => 'Khài-iàu:',
'subject' => 'Tê-bo̍k/piau-tê:',
'minoredit' => 'Che sī sió siu-kái',
'watchthis' => 'Kàm-sī chit ia̍h',
'savearticle' => 'Pó-chûn chit ia̍h',
'preview' => 'Seng khoàⁿ-māi',
'showpreview' => 'Seng khoàⁿ-māi',
'showdiff' => 'Khòaⁿ kái-piàn ê pō·-hūn',
'anoneditwarning' => "'''Kéng-kò:''' Lí bô teng-ji̍p. Lí ê IP chū-chí ē kì tī pún ia̍h ê pian-chi̍p le̍k-sú lāi-bīn.",
'summary-preview' => 'Khài-iàu ê preview:',
'subject-preview' => 'Ū-lám tê-bo̍k/piau-tê:',
'blockednoreason' => '無寫理由',
'whitelistedittext' => 'Lí ài $1 chiah ē-sái siu-kái.',
'nosuchsectiontitle' => 'Chhoé bô toān-lo̍h',
'loginreqtitle' => 'Su-iàu Teng-ji̍p',
'loginreqlink' => 'Teng-ji̍p',
'loginreqpagetext' => 'Lí ài $1 chiah thang khoàⁿ pat ia̍h.',
'accmailtitle' => 'Bi̍t-bé kià chhut khì ah.',
'accmailtext' => '$1 ê bi̍t-bé í-keng kìa khì $2.',
'newarticle' => '(Sin)',
'newarticletext' => "Lí tòe 1 ê liân-kiat lâi kàu 1 bīn iáu-bōe chûn-chāi ê ia̍h. Beh khai-sí pian-chi̍p chit ia̍h, chhiáⁿ tī ē-kha ê bûn-jī keh-á lāi-té phah-jī. ([[{{MediaWiki:Helppage}}|Bo̍k-lio̍k]] kà lí án-choáⁿ chìn-hêng.) Ká-sú lí bô-tiuⁿ-tî lâi kàu chia, ē-sai chhi̍h liû-lám-khì ê '''téng-1-ia̍h''' tńg--khì.",
'anontalkpagetext' => "----''Pún thó-lūn-ia̍h bô kò·-tēng ê kháu-chō/hō·-thâu, kan-na ū 1 ê IP chū-chí (chhin-chhiūⁿ 123.456.789.123). In-ūi bô kāng lâng tī bô kāng sî-chūn ū khó-lêng tú-hó kong-ke kāng-ê IP, lâu tī chia ê oē ū khó-lêng hō· bô kāng lâng ê! Beh pī-bián chit khoán būn-tê, ē-sái khì [[Special:UserLogin|khui 1 ê hō·-thâu a̍h-sī teng-ji̍p]].''",
'clearyourcache' => "'''Chù-ì:''' Pó-chûn liáu-āu, tio̍h ē-kì leh kā liû-lám-khì ê cache piàⁿ tiāu chiah khoàⁿ-ē-tio̍h kái-piàn: *'''Firefox / Safari:''' chhi̍h tiâu \"Shift\" kâng-sî-chūn tiám-kik ''Reload/têng-sin chài-ji̍p'' a̍h-sī chhi̍h ''Ctrl-F5'' \"Ctrl-R\" kî-tiong chi̍t ê (''Command-R'' tī Mac) 
* '''Google Chrome:''' chhi̍h ''Ctrl-Shift-R'' (''Command-Shift-R'' tī Mac)
'''Internet Explorer :'''chhi̍h tiâu \"Ctrl\" kâng-sî-chūn tiám-kek ''Refresh/têng-sin chài-ji̍p'' a̍h-sī chhi̍h \"Ctrl-F5\" 
* '''Konqueror:'''  tiám-kek ''Reload/têng-sin chài-ji̍p'' a̍h-sī chhi̍h ''F5''
* '''Opera:''' piàⁿ-tiāu cache tī ''Tools(ke-si) → Preferences(siat-piān)''",
'usercssyoucanpreview' => "'''Phiat-pō·''': Pó-chûn chìn-chêng ē-sái chhi̍h 'Seng khoàⁿ-māi' kiám-cha sin ê CSS a̍h-sī JavaScript.",
'userjsyoucanpreview' => "'''Phiat-pō·''': Pó-chûn chìn-chêng ē-sái chhi̍h 'Seng khoàⁿ-māi' kiám-cha sin ê CSS a̍h-sī JavaScript.",
'usercsspreview' => "'''Sè-jī! Lí hiān-chú-sî khoàⁿ--ê sī lí ê su-jîn css ê preview; che iáu-bōe pó-chûn--khí-lâi!'''",
'userjspreview' => "'''Sè-jī! Lí hiān-chú-sî chhì khoàⁿ--ê sī lí ka-kī ê javascript; che iáu-bōe pó-chûn--khí-lâi!'''",
'note' => "'''Chù-ì:'''",
'previewnote' => "'''Thê-chhéⁿ lí che sī 1 bīn kiám-cha chho͘-phe ēng--ê \"seng-khoàⁿ-ia̍h\", iáu-bōe pó-chûn--khí-lâi!'''",
'session_fail_preview' => "'''Pháiⁿ-sè! Gún chiām-sî bô hoat-tō͘ chhú-lí lí ê pian-chi̍p (goân-in: \"phàng-kiàn sú-iōng kî-kan ê chu-liāu\"). Lô-hoân têng chhì khoàⁿ-māi. Ká-sú iû-goân bô-hāu, ē-sái teng-chhut koh-chài teng-ji̍p hoān-sè tō ē-tit kái-koat.'''",
'editing' => 'Siu-kái $1',
'editingsection' => 'Pian-chi̍p $1 (section)',
'editingcomment' => 'Teh pian-chi̍p $1 (lâu-oē)',
'editconflict' => 'Siu-kái sio-chhiong: $1',
'explainconflict' => "Ū lâng tī lí tng teh siu-kái pún-ia̍h ê sî-chūn oân-sêng kî-tha ê siu-kái.
Téng-koân ê bûn-jī-keh hián-sī hiān-chhú-sî siōng sin ê lōe-iông.
Lí ê kái-piàn tī ē-kha ê bûn-jī-keh. Lí su-iàu chiōng lí chò ê kái-piàn kap siōng sin ê lōe-iông chéng-ha̍p.
'''Kan-na''' téng-koân keh-á ê bûn-jī ē tī lí chhi̍h \"{{int:savearticle}}\" liáu-āu pó-chûn khí lâi.",
'yourtext' => 'Lí ê bûn-jī',
'storedversion' => 'Chu-liāu-khò· ê pán-pún',
'editingold' => "'''KÉNG-KÒ: Lí tng teh siu-kái chit ia̍h ê 1 ê kū siu-tēng-pún. Lí nā kā pó-chûn khí lâi, chit ê siu-tēng-pún sòa-āu ê jīm-hô kái-piàn ē bô khì.'''",
'yourdiff' => 'Chha-pia̍t',
'readonlywarning' => "'''CHÙ-Ì: Chu-liāu-khò· taⁿ só tiâu leh thang pān î-siu khang-khòe, só·-í lí hiān-chú-sî bô thang pó-chûn jīn-hô phian-chi̍p hāng-bo̍k. Lí ē-sái kā siong-koan pō·-hūn tah--ji̍p-khì 1-ê bûn-jī tóng-àn pó-chûn, āu-chhiú chiah koh kè-sio̍k.'''",
'protectedpagewarning' => "'''KÉNG-KÒ: Pún ia̍h só tiâu leh. Kan-taⁿ ū hêng-chèng te̍k-koân ê iōng-chiá (sysop) ē-sái siu-kái.'''",
'templatesused' => 'Chit ia̍h iōng chia ê pang-bô·:',
'templatesusedpreview' => 'Chit ê preview iōng chia ê pang-bô͘:',
'templatesusedsection' => 'Chit ê section iōng chia ê pang-bô͘:',
'template-protected' => '(pó-hō͘)',
'template-semiprotected' => '(poàⁿ pó-hō͘)',
'permissionserrorstext-withaction' => 'Lí bô ún-chún chò $2, in-ūi ē-kha
{{PLURAL:$1|iân-kò͘|iân-kò͘}}:',
'recreate-moveddeleted-warn' => "'''Sè-jī: Lí taⁿ chún-pī beh khui ê ia̍h, chêng bat hō͘ lâng thâi tiāu koè.''' Lí tio̍h chim-chiok soà-chiap pian-chi̍p chit ia̍h ê pit-iàu-sèng. Chia ū chit ia̍h ê san-tû kì-lo̍k (deletion log) hō͘ lí chham-khó:",
'edit-conflict' => 'Siu-kái sio-chhiong',
'defaultmessagetext' => 'Siat piān ê bûn-jī',

# Parser/template warnings
'post-expand-template-inclusion-warning' => "'''Kéng-pò:'''Pau ji̍t lâi ê pán-bôo sioⁿ koè tsē ia̍h tuā.
Ū chi̍t-koá-á ē bô pau ji̍t lâi.",

# "Undo" feature
'undo-success' => 'Pian-chi̍p í-keng chhú-siau. Chhiáⁿ khak-tēng, liáu-āu kā ē-kha ho̍k-goân ê kái-piàn pó-chûn--khí-lâi.',
'undo-failure' => 'Pian-chi̍p bē-tàng chhú-siau, in-ūi chhiong tio̍h kî-kan chhah-ji̍p ê pian-chi̍p.',
'undo-summary' => 'Chhú-siau [[Special:Contributions/$2|$2]] ([[User talk:$2|thó-lūn]]) ê siu-tēng-pún $1',

# History pages
'viewpagelogs' => 'Khoàⁿ chit ia̍h ê logs',
'nohistory' => 'Chit ia̍h bô pian-chi̍p-sú.',
'currentrev' => 'Hiān-chú-sî ê siu-tēng-pún',
'revisionasof' => '$1 ê siu-tēng-pún',
'previousrevision' => '←Khah kū ê siu-tēng-pún',
'nextrevision' => 'Khah sin ê siu-tēng-pún→',
'currentrevisionlink' => 'khoàⁿ siōng sin ê siu-tēng-pún',
'cur' => 'taⁿ',
'next' => '下一个',
'last' => 'chêng',
'page_first' => 'Tùi thâu-chêng',
'page_last' => 'Tùi āu-piah',
'histlegend' => 'Pán-pún pí-phēng: tiám-soán beh pí-phēng ê pán-pún ê liú-á, liáu-āu chhi̍h ENTER a̍h-sī ē-kha hit tè sì-kak.<br />Soat-bêng: (taⁿ) = kap siōng sin pán-pún pí-phēng, (chêng) = kap chêng-1-ê pán-pún pí-phēng, ~ = sió siu-kái.',
'histfirst' => 'Tùi thâu-chêng',
'histlast' => 'Tùi āu-piah',

# Revision feed
'history-feed-item-nocomment' => '$1 tī $2',

# Diffs
'lineno' => 'Tē $1 chōa:',
'compareselectedversions' => 'Pí-phēng soán-te̍k ê pán-pún',
'editundo' => 'chhú-siau',

# Search results
'searchresults' => 'Kiám-sek kiat-kó',
'searchresults-title' => 'Chhoé "$1" ê kiat-kó',
'searchresulttext' => 'Koan-hē kiám-sek {{SITENAME}} ê siông-sè pō·-sò·, chhiáⁿ chham-khó [[{{MediaWiki:Helppage}}|{{int:help}}]].',
'titlematches' => 'Phiau-tê ū-tùi ê bûn-chiuⁿ',
'notitlematches' => 'Bô sio-tùi ê ia̍h-piau-tê',
'textmatches' => 'Lōe-iông ū-tùi ê bûn-chiuⁿ',
'notextmatches' => 'Bô sio-tùi ê bûn-chiuⁿ lōe-iông',
'prevn' => 'chêng {{PLURAL:$1|$1}} hāng',
'nextn' => 'āu {{PLURAL:$1|$1}} hāng',
'shown-title' => 'Múi ia̍h hián-sī $1 {{PLURAL:$1|kiat-kó|kiat-kó}}',
'viewprevnext' => 'Khoàⁿ ($1 {{int:pipe-separator}} $2) ($3)',
'searchhelp-url' => 'Help:Bo̍k-lio̍k',
'searchprofile-articles' => 'Loē-iông ia̍h',
'searchprofile-images' => 'To-mûi-thé',
'searchprofile-everything' => 'Só͘-ū ê',
'searchprofile-advanced' => 'chìn-chi̍t-pō͘',
'searchprofile-articles-tooltip' => 'Tī $1 chhoé',
'searchprofile-images-tooltip' => 'Chhoé tóng-àn',
'search-result-size' => '$1 ({{PLURAL:$2|1 jī-goân|$2 jī-goân}})',
'search-section' => '(toān-lo̍h $1)',
'searchall' => 'choân-pō·',
'showingresults' => 'Ē-kha tùi #<b>$2</b> khai-sí hián-sī <b>$1</b> hāng kiat-kó.',
'showingresultsnum' => 'Ē-kha tùi #<b>$2</b> khai-sí hián-sī <b>$3</b> hāng kiat-kó.',
'powersearch' => 'Kiám-sek',
'powersearch-legend' => 'Kiám-sek',

# Quickbar
'qbsettings' => 'Quickbar ê siat-tēng',

# Preferences page
'preferences' => 'Siat-tēng',
'mypreferences' => 'Góa ê siat-tēng',
'prefsnologin' => 'Bô teng-ji̍p',
'prefsnologintext' => 'Lí it-tēng ài [[Special:UserLogin|teng-ji̍p]] chiah ē-tàng chhiâu iōng-chiá ê siat-tēng.',
'changepassword' => 'Oāⁿ bi̍t-bé',
'prefs-skin' => 'Phôe',
'skin-preview' => 'Chhì khoàⁿ',
'datedefault' => 'Chhìn-chhái',
'prefs-datetime' => 'Ji̍t-kî kap sî-kan',
'prefs-personal' => 'Iōng-chiá chu-liāu',
'prefs-rc' => 'Chòe-kīn ê kái-piàn & stub ê hián-sī',
'prefs-watchlist' => 'Kàm-sī-toaⁿ',
'prefs-watchlist-days' => 'Kàm-sī-toaⁿ hián-sī kúi kang lāi--ê:',
'prefs-watchlist-edits' => 'Khok-chhiong ê kàm-sī-toaⁿ tio̍h hián-sī kúi hāng pian-chi̍p:',
'prefs-misc' => 'Kî-thaⁿ ê siat-tēng',
'saveprefs' => 'Pó-chûn siat-tēng',
'resetprefs' => 'Têng siat-tēng',
'prefs-editing' => 'Pian-chi̍p',
'rows' => 'Chōa:',
'columns' => 'Nôa',
'searchresultshead' => 'Chhiau-chhōe kiat-kó ê siat-tēng',
'resultsperpage' => '1 ia̍h hián-sī kúi kiāⁿ:',
'recentchangesdays' => 'Hián-sī kúi ji̍t chòe-kīn ê kái-piàn:',
'recentchangesdays-max' => 'siōng-choē $1 {{PLURAL:$1|kang|kang}}',
'recentchangescount' => 'Hián-sī kúi tiâu chòe-kīn ê kái-piàn:',
'savedprefs' => 'Lí ê iōng-chiá siat-tēng í-keng pó-chûn khí lâi ah.',
'timezonelegend' => 'Sî-khu',
'localtime' => 'Chāi-tē sî-kan sī',
'timezoneoffset' => 'Sî-chha¹',
'servertime' => 'Server sî-kan hiān-chāi sī',
'guesstimezone' => 'Tùi liû-lám-khì chhau--lâi',
'allowemail' => 'Ún-chún pa̍t-ê iōng-chiá kià email kòe-lâi',
'defaultns' => 'Tī chiah ê miâ-khong-kan chhiau-chhōe:',
'prefs-files' => 'Tóng-àn',
'youremail' => 'Lí ê email:',
'yourrealname' => 'Lí ê chin miâ:',
'yourlanguage' => 'Kài-bīn gú-giân:',
'yournick' => 'Lí ê sió-miâ (chhiam-miâ iōng):',
'prefs-help-email' => 'Tiān-chú-phoe ê chū-chí m̄-sī it-tēng ài, m̄-koh tī lí bē-kì bi̍t-bé beh tîng siat-tīng tō ài.',
'prefs-help-email-others' => 'Lí ē-sái thàu--koè lí ê ia̍h , thó-lūn-ia̍h ê liân kiat hō͘ lâng ēng e-mail kah lí liân-lo̍k.
Tī pat-lâng liân-lo̍k lí ê sî-chūn bē kā e-mail tsū-tsí siá chhut--lâi.',

'grouppage-sysop' => '{{ns:project}}:Hêng-chèng jîn-oân',

# User rights log
'rightslogtext' => 'Chit-ê log lia̍t-chhut kái-piàn iōng-chiá koân-lī ê tōng-chok.',

# Associated actions - in the sentence "You do not have permission to X"
'action-edit' => 'Siu-kái chit ia̍h',

# Recent changes
'nchanges' => '$1 {{PLURAL:$1|kái|kái}}',
'recentchanges' => 'Chòe-kīn ê kái-piàn',
'recentchanges-label-newpage' => 'Chit ê siu-kái ē sán-seng sin ia̍h',
'recentchanges-label-minor' => 'Che sī sió siu-kái',
'rcnotefrom' => 'Ē-kha sī <b>$2</b> kàu taⁿ ê kái-piàn (ke̍k-ke hián-sī <b>$1</b> hāng).',
'rclistfrom' => 'Hián-sī tùi $1 kàu taⁿ ê sin kái-piàn',
'rcshowhideminor' => '$1 sió siu-kái',
'rcshowhideliu' => '$1 teng-ji̍p ê iōng-chiá',
'rcshowhideanons' => '$1 bû-bêng-sī',
'rcshowhidemine' => '$1 góa ê pian-chi̍p',
'rclinks' => 'Hían-sī $2 ji̍t lāi siōng sin ê $1 hāng kái-piàn<br />$3',
'diff' => 'Cheng-chha',
'hist' => 'ls',
'hide' => 'am',
'show' => 'hían-sī',
'minoreditletter' => '~',
'newpageletter' => '!',
'boteditletter' => 'b',

# Recent changes linked
'recentchangeslinked' => 'Siong-koan ê kái-piàn',
'recentchangeslinked-feed' => 'Siong-koan ê kái-piàn',
'recentchangeslinked-toolbox' => 'Siong-koan ê kái-piàn',
'recentchangeslinked-noresult' => 'Lí chí-tēng ê tiâu-kiaⁿ lāi-té chhōe bô jīn-hô kái-piàn.',
'recentchangeslinked-page' => 'Ia̍h ê miâ:',

# Upload
'upload' => 'Kā tóng-àn chiūⁿ-bāng',
'uploadbtn' => 'Kā tóng-àn chiūⁿ-bāng',
'reuploaddesc' => 'Tò khì sàng-chiūⁿ-bāng ê pió.',
'uploadnologin' => 'Bô teng-ji̍p',
'uploadnologintext' => 'Bô [[Special:UserLogin|teng-ji̍p]] bē-sái-tit kā tóng-àn sàng-chiūⁿ-bāng.',
'uploaderror' => 'Upload chhò-gō·',
'uploadlogpagetext' => 'Í-hā sī chòe-kīn sàng-chiūⁿ-bāng ê tóng-àn ê lia̍t-toaⁿ.',
'filename' => 'Tóng-àn',
'filedesc' => 'Khài-iàu',
'fileuploadsummary' => 'Khài-iàu:',
'uploadedfiles' => 'Tóng-àn í-keng sàng chiūⁿ-bāng',
'ignorewarning' => 'Mài chhap kéng-kò, kā tóng-àn pó-chûn khí lâi.',
'ignorewarnings' => 'Mài chhap kéng-kò',
'badfilename' => 'Iáⁿ-siōng ê miâ í-keng kái chò "$1".',
'uploadwarning' => 'Upload kéng-kò',
'savefile' => 'Pó-chûn tóng-àn',
'uploadedimage' => 'thoân "[[$1]]" chiūⁿ-bāng',
'uploaddisabled' => 'Pháiⁿ-sè, sàng chiūⁿ-bāng ê kong-lêng bô khui.',
'sourcefilename' => 'Tóng-àn goân miâ:',
'destfilename' => 'Tóng-àn sin miâ:',
'watchthisupload' => 'Kàm-sī chit ia̍h',
'upload-success-subj' => 'Sàng-chiūⁿ-bāng sêng-kong',

# File backend
'backend-fail-delete' => 'Bô-hoat-tō· kā tóng-àn "$1" thâi tiāu',

'license' => 'Siū-khoân:',
'license-header' => 'Siū-khoân',

# Special:ListFiles
'listfiles' => 'Iáⁿ-siōng lia̍t-toaⁿ',
'listfiles_date' => 'Ji̍t-kî',
'listfiles_name' => 'Miâ',
'listfiles_user' => 'Iōng-chiá',
'listfiles_size' => 'Toā-sè',
'listfiles_description' => 'Soat-bêng',
'listfiles_count' => '版本',

# File description page
'file-anchor-link' => 'Tóng-àn',
'filehist' => 'Tóng-àn ê le̍k-sú',
'filehist-current' => 'hiān-chāi',
'filehist-datetime' => 'Ji̍t-kî/ Sî-kan',
'filehist-user' => 'Iōng-chiá',
'imagelinks' => 'Iáⁿ-siōng liân-kiat',
'linkstoimage' => 'Í-hā ê ia̍h liân kàu chit ê iáⁿ-siōng:',
'nolinkstoimage' => 'Bô poàⁿ ia̍h liân kàu chit tiuⁿ iáⁿ-siōng.',

# MIME search
'mimesearch' => 'MIME chhiau-chhoē',

# Unwatched pages
'unwatchedpages' => 'Bô lâng kàm-sī ê ia̍h',

# List redirects
'listredirects' => 'Lia̍t-chhut choán-ia̍h',

# Unused templates
'unusedtemplates' => 'Bô iōng ê pang-bô·',

# Random page
'randompage' => 'Sûi-chāi kéng ia̍h',

# Random redirect
'randomredirect' => 'Sûi-chāi choán-ia̍h',

# Statistics
'statistics' => 'Thóng-kè',
'statistics-header-users' => 'Iōng-chiá thóng-kè sò·-ba̍k',

'disambiguations' => 'Khu-pia̍t-ia̍h',
'disambiguationspage' => 'Template:disambig
Template:KhPI
Template:Khu-pia̍t-iah
Template:Khu-pia̍t-ia̍h',

'doubleredirects' => 'Siang-thâu choán-ia̍h',

'brokenredirects' => 'Choán-ia̍h kò·-chiòng',
'brokenredirectstext' => 'Í-hā ê choán-ia̍h liân kàu bô chûn-chāi ê ia̍h:',

'withoutinterwiki' => 'Bô gí-giân liân-kiat ê ia̍h',
'withoutinterwiki-summary' => 'Ē-kha ê ia̍h bô kî-thaⁿ gí-giân pán-pún ê liân-kiat:',

'fewestrevisions' => 'Siōng bô siu-tēng ê bûn-chiuⁿ',

# Miscellaneous special pages
'nbytes' => '$1 {{PLURAL:$1|jī-goân|jī-goân}}',
'ncategories' => '$1 {{PLURAL:$1|ê lūi-pia̍t |ê lūi-pia̍t}}',
'nlinks' => '$1 ê liân-kiat',
'nmembers' => '$1 ê sêng-oân',
'nrevisions' => '$1 ê siu-tēng-pún',
'lonelypages' => 'Ko·-ia̍h',
'uncategorizedpages' => 'Bô lūi-pia̍t ê ia̍h',
'uncategorizedcategories' => 'Bô lūi-pia̍t ê lūi-pia̍t',
'uncategorizedimages' => 'Bô lūi-pia̍t ê iáⁿ-siōng',
'uncategorizedtemplates' => 'Bô lūi-pia̍t ê pang-bô͘',
'unusedcategories' => 'Bô iōng ê lūi-pia̍t',
'unusedimages' => 'Bô iōng ê iáⁿ-siōng',
'popularpages' => 'Sî-kiâⁿ ê ia̍h',
'wantedcategories' => 'wantedcategories',
'wantedpages' => 'Beh ti̍h ê ia̍h',
'mostlinked' => 'Siōng chia̍p liân-kiat ê ia̍h',
'mostlinkedcategories' => 'Siōng chia̍p liân-kiat ê lūi-pia̍t',
'mostlinkedtemplates' => 'Siōng chia̍p liân-kiat ê pang-bô͘',
'mostcategories' => 'Siōng chē lūi-pia̍t ê ia̍h',
'mostimages' => 'Siōng chia̍p liân-kiat ê iáⁿ-siōng',
'mostrevisions' => 'Siōng chia̍p siu-kái ê ia̍h',
'prefixindex' => 'Sû-thâu sek-ín',
'shortpages' => 'Té-ia̍h',
'deadendpages' => 'Khu̍t-thâu-ia̍h',
'deadendpagestext' => 'Ē-kha ê ia̍h bô liân kàu wiki lāi-té ê kî-thaⁿ ia̍h.',
'protectedpages' => 'Siū pó-hō͘ ê ia̍h',
'protectedpagestext' => 'Ē-kha ê ia̍h siū pó-hō͘, bē-tit soá-ūi ia̍h pian-chi̍p',
'listusers' => 'Iōng-chiá lia̍t-toaⁿ',
'newpages' => 'Sin ia̍h',
'newpages-username' => 'Iōng-chiá miâ-chheng:',
'ancientpages' => 'Kó·-ia̍h',
'move' => 'Sóa khì',
'movethispage' => 'Sóa chit ia̍h',
'unusedimagestext' => '<p>Chhiáⁿ chù-ì: kî-thaⁿ ê bāng-chām ū khó-lêng iōng URL ti̍t-chiap liân kàu iáⁿ-siōng, só·-í sui-jiân chhiâng-chāi teh iōng, mā sī ē lia̍t tī chia.</p>',
'unusedcategoriestext' => 'Ū ē-kha chiah-ê lūi-pia̍t-ia̍h, m̄-koh bô kî-thaⁿ ê bûn-chiuⁿ a̍h-sī lūi-pia̍t lī-iōng.',

# Book sources
'booksources' => 'Tô͘-su chu-liāu',

# Special:Log
'specialloguserlabel' => 'Iōng-chiá:',
'speciallogtitlelabel' => 'Sû-tiâu:',
'logempty' => 'Log lāi-bīn bô sio-tùi ê hāng-bo̍k.',

# Special:AllPages
'allpages' => 'Só·-ū ê ia̍h',
'alphaindexline' => '$1 kàu $2',
'nextpage' => 'Āu 1 ia̍h ($1)',
'prevpage' => '前一頁（$1）',
'allpagesfrom' => 'Tùi chit ia̍h khai-sí hián-sī:',
'allarticles' => 'Só·-ū ê bûn-chiuⁿ',
'allinnamespace' => 'Só·-ū ê ia̍h ($1 miâ-khong-kan)',
'allnotinnamespace' => 'Só·-ū ê ia̍h (bô tī $1 miâ-khong-kan)',
'allpagesprev' => 'Téng 1 ê',
'allpagesnext' => 'ē 1 ê',
'allpagessubmit' => 'Lâi-khì',

# Special:Categories
'categories' => 'Lūi-pia̍t',
'categoriespagetext' => 'Chit ê wiki ū ē-kha chia ê lūi-pia̍t.
[[Special:UnusedCategories|Unused categories]] are not shown here.
Also see [[Special:WantedCategories|wanted categories]].',
'categoriesfrom' => 'Tùi chit ê lūi-pia̍t khai-sí hián-sī:',

# Special:DeletedContributions
'deletedcontributions' => 'Hō͘ lâng thâi tiāu ê kòng-hiàn',
'deletedcontributions-title' => 'Hō͘ lâng thâi tiāu ê kòng-hiàn',

# Special:LinkSearch
'linksearch' => 'Chhiau-chhoē chām-goā liân-kiat',

# Email user
'mailnologin' => 'Bô siu-phoe ê chū-chí',
'mailnologintext' => 'Lí it-tēng ài [[Special:UserLogin|teng-ji̍p]] jī-chhiáⁿ ū 1 ê ū-hāu ê e-mail chū-chí tī lí ê [[Special:Preferences|iōng-chiá siat-tēng]] chiah ē-tàng kià e-mail hō· pa̍t-ūi iōng-chiá.',
'emailuser' => 'Kià e-mail hō· iōng-chiá',
'emailpage' => 'E-mail iōng-chiá',
'emailpagetext' => 'Ká-sú chit ê iōng-chiá ū siat-tēng 1 ê ū-hāu ê e-mail chū-chí, lí tō ē-tàng ēng ē-kha chit tiuⁿ FORM hoat sìn-sek hō· i. Lí siat-tēng ê e-mail chū-chí ē chhut-hiān tī e-mail ê "Kià-phoe-jîn" (From) hit ūi. Án-ne siu-phoe-jîn chiah ū hoat-tō· kā lí hôe-phoe.',
'noemailtitle' => 'Bô e-mail chū-chí',
'noemailtext' => 'Chit ūi iōng-chiá pēng-bô lâu ū-hāu ê e-mail chū-chí, bô tio̍h-sī i bô beh chiap-siū pat-ūi iōng-chiá ê e-mail.',
'emailfrom' => 'Lâi chū',
'emailto' => 'Khì hō·',
'emailsubject' => 'Tê-bo̍k',
'emailmessage' => 'Sìn-sit:',
'emailsend' => 'Sàng chhut-khì',
'emailsent' => 'E-mail sàng chhut-khì ah',
'emailsenttext' => 'Lí ê e-mail í-keng sàng chhut-khì ah.',

# Watchlist
'watchlist' => 'Kàm-sī-toaⁿ',
'mywatchlist' => 'Góa ê kàm-sī-toaⁿ',
'watchlistfor2' => '予$1 $2',
'nowatchlist' => 'Lí ê kàm-sī-toaⁿ bô pòaⁿ hāng.',
'watchnologin' => 'Bô teng-ji̍p',
'watchnologintext' => 'Lí it-tēng ài [[Special:UserLogin|teng-ji̍p]] chiah ē-tàng siu-kái lí ê kàm-sī-toaⁿ.',
'addedwatchtext' => "\"[[:\$1]]\" chit ia̍h í-keng ka-ji̍p lí ê [[Special:Watchlist|kàm-sī-toaⁿ]]. Bī-lâi chit ia̍h a̍h-sī siong-koan ê thó-lūn-ia̍h nā ū kái-piàn, ē lia̍t tī hia. Tông-sî tī [[Special:RecentChanges|Chòe-kīn ê kái-piàn]] ē iōng '''chho·-thé''' hián-sī ia̍h ê piau-tê, án-ne khah bêng-hián. Ká-sú lí beh chiōng chit ia̍h tùi lí ê kàm-sī-toaⁿ tû tiāu, khì khòng-chè-tiâu chhi̍h \"Mài kàm-sī\" chiū ē-sái-tit.",
'removedwatchtext' => '"[[:$1]]" chit ia̍h í-keng tùi lí ê kàm-sī-toaⁿ tû tiāu.',
'watch' => 'kàm-sī',
'watchthispage' => 'Kàm-sī chit ia̍h',
'unwatch' => 'Mài kàm-sī',
'unwatchthispage' => 'Mài koh kàm-sī',
'watchnochange' => 'Lí kàm-sī ê hāng-bo̍k tī hián-sī ê sî-kî í-lāi lóng bô siu-kái kòe.',
'watchlist-details' => 'Kàm-sī-toaⁿ ū {{PLURAL:$1|$1 ia̍h|$1 ia̍h}}, thó-lūn-ia̍h bô sǹg chāi-lāi.',
'watchmethod-recent' => 'tng teh kíam-cha choè-kīn ê siu-kái, khoàⁿ ū kàm-sī ê ia̍h bô',
'watchmethod-list' => 'tng teh kiám-cha kàm-sī ê ia̍h khoàⁿ chòe-kīn ū siu-kái bô',
'watchlistcontains' => 'Lí ê kàm-sī-toaⁿ siu $1 ia̍h.',
'wlnote' => "Ē-kha sī '''$2''' tiám-cheng í-lāi siōng sin ê $1 ê kái-piàn.",
'wlshowlast' => 'Hián-sī chêng $1 tiám-cheng $2 ji̍t $3',

# Delete
'deletepage' => 'Thâi ia̍h',
'confirm' => 'Khak-tēng',
'excontent' => "lōe-iông sī: '$1'",
'excontentauthor' => "loē-iông sī: '$1' (î-it ê kòng-hiàn-chiá sī '[[Special:Contributions/$2|$2]]')",
'exbeforeblank' => "chìn-chêng ê lōe-iông sī: '$1'",
'exblank' => 'ia̍h khang-khang',
'historywarning' => 'Kéng-kò: Lí beh thâi ê ia̍h ū le̍k-sú:',
'confirmdeletetext' => 'Lí tih-beh kā 1 ê ia̍h a̍h-sī iáⁿ-siōng (pau-koat siong-koan ê le̍k-sú) éng-kiú tùi chu-liāu-khò· thâi tiāu. Chhiáⁿ khak-tēng lí àn-sǹg án-ne chò, jī-chhiáⁿ liáu-kái hiō-kó, jī-chhiáⁿ bô ûi-hoán [[{{MediaWiki:Policy-url}}]].',
'actioncomplete' => 'Chip-hêng sêng-kong',
'deletedtext' => '"$1" í-keng thâi tiāu. Tùi $2 khoàⁿ-ē-tio̍h chòe-kīn thâi ê kì-lo̍k.',
'dellogpagetext' => 'Í-hā lia̍t chhut chòe-kīn thâi tiāu ê hāng-bo̍k.',
'deletecomment' => 'Lí-iû:',

# Rollback
'rollback' => 'Kā siu-kái ká tńg khì',
'rollback_short' => 'Ká tńg khì',
'rollbacklink' => 'ká tńg khì',
'rollbackfailed' => 'Ká bē tńg khì',
'cantrollback' => 'Bô-hoat-tō· kā siu-kái ká-tńg--khì; téng ūi kòng-hiàn-chiá sī chit ia̍h î-it ê chok-chiá.',
'alreadyrolled' => 'Bô-hoat-tō· kā [[User:$2|$2]] ([[User talk:$2|Thó-lūn]]) tùi [[:$1]] ê siu-kái ká-tńg-khì; í-keng ū lâng siu-kái a̍h-sī ká-tńg chit ia̍h. Téng 1 ūi siu-kái-chiá sī [[User:$3|$3]] ([[User talk:$3|Thó-lūn]]).',
'editcomment' => "Siu-kái phêng-lūn sī: \"''\$1''\".",

# Protect
'protectedarticle' => 'pó-hō͘ "[[$1]]"',
'protect-title' => 'Pó-hō· "$1"',
'prot_1movedto2' => '[[$1]] sóa khì tī [[$2]]',
'protect-legend' => 'Khak-tēng beh pó-hō·',
'protectcomment' => 'Lí-iû:',
'protect-cascade' => 'Cascading protection - pó-hō͘ jīm-hô pau-hâm tī chit ia̍h ê ia̍h.',

# Restrictions (nouns)
'restriction-edit' => 'Siu-kái',
'restriction-move' => 'Sóa khì',

# Undelete
'undelete' => 'Kiù thâi tiāu ê ia̍h',
'undeletepage' => 'Khoàⁿ kap kiù thâi tiāu ê ia̍h',
'undeleteviewlink' => 'Khoàⁿ',

# Namespace form on various pages
'namespace' => 'Miâ-khong-kan:',
'invert' => 'Soán-hāng í-gōa',
'blanknamespace' => '(Thâu-ia̍h)',

# Contributions
'contributions' => 'Iōng-chiá ê kòng-hiàn',
'mycontris' => 'Góa ê kòng-hiàn',
'nocontribs' => 'Chhōe bô tiâu-kiāⁿ ū-tùi ê hāng-bo̍k.',
'uctop' => '(siōng téng ê)',
'month' => 'Kàu tó 1 kó͘ goe̍h ûi-chí:',
'year' => 'Kàu tó 1 nî ûi-chí:',

'sp-contributions-newbies' => 'Kan-taⁿ hián-sī sin kháu-chō ê kòng-kiàn',
'sp-contributions-newbies-sub' => 'Sin lâi--ê',
'sp-contributions-deleted' => 'Hō͘ lâng thâi tiāu ê kòng-hiàn',
'sp-contributions-talk' => 'thó-lūn',
'sp-contributions-search' => 'Chhoē chhut kòng-kiàn',
'sp-contributions-username' => 'IP Chū-chí a̍h iōng-chiá miâ:',
'sp-contributions-submit' => 'Chhoē',

# What links here
'whatlinkshere' => 'Tó-ūi liân kàu chia',
'linkshere' => "Í-hā '''[[:$1]]''' liân kàu chia:",
'nolinkshere' => "Bô poàⁿ ia̍h liân kàu '''[[:$1]]'''.",
'isredirect' => 'choán-ia̍h',
'whatlinkshere-prev' => '{{PLURAL:$1|chêng|chêng $1 ê}}',
'whatlinkshere-next' => '{{PLURAL:$1|āu|āu $1 ê}}',
'whatlinkshere-links' => '← Liân kàu chia',

# Block/unblock
'blockip' => 'Hong-só iōng-chiá',
'ipadressorusername' => 'IP Chū-chí a̍h iōng-chiá miâ:',
'ipbreason' => 'Lí-iû:',
'ipbsubmit' => 'Hong-só chit ūi iōng-chiá',
'badipaddress' => 'Bô-hāu ê IP chū-chí',
'blockipsuccesssub' => 'Hong-só sêng-kong',
'blockipsuccesstext' => '[[Special:Contributions/$1|$1]] í-keng pī hong-só. <br />Khì [[Special:BlockList|IP hong-só lia̍t-toaⁿ]] review hong-só ê IP.',
'ipusubmit' => 'Chhú-siau hong-só chit ê chū-chí',
'ipblocklist' => 'Siū hong-só ê IP chū-chí kap iōng-chiá miâ-chheng',
'blocklink' => 'hong-só',
'contribslink' => 'kòng-hiàn',
'autoblocker' => 'Chū-tōng kìm-chí lí sú-iōng, in-ūi lí kap "$1" kong-ke kāng 1 ê IP chū-chí (kìm-chí lí-iû "$2").',
'blocklogentry' => 'hong-só [[$1]], siat kî-hān chì $2 $3',
'blocklogtext' => 'Chit-ê log lia̍t-chhut block/unblock ê tōng-chok. Chū-tōng block ê IP chū-chí bô lia̍t--chhut-lâi ([[Special:BlockList]] ū hiān-chú-sî ū-hāu ê block/ban o·-miâ-toaⁿ).',
'block-log-flags-nocreate' => 'Khui kháu-chō thêng-iōng ah',

# Developer tools
'locknoconfirm' => 'Lí bô kau "khak-tēng" ê keh-á.',

# Move page
'move-page' => '徙$1',
'move-page-legend' => 'Sóa ia̍h',
'movepagetext' => "Ē-kha chit ê form> iōng lâi kái 1 ê ia̍h ê piau-tê (miâ-chheng); só·-ū siong-koan ê le̍k-sú ē tòe leh sóa khì sin piau-tê.
Kū piau-tê ē chiâⁿ-chò 1 ia̍h choán khì sin piau-tê ê choán-ia̍h.
Liân khì kū piau-tê ê liân-kiat (link) bē khì tāng--tio̍h; ē-kì-tit chhiau-chhōe siang-thâu (double) ê a̍h-sī kò·-chiòng ê choán-ia̍h.
Lí ū chek-jīm khak-tēng liân-kiat kè-sio̍k liân tio̍h ūi.

Sin piau-tê nā í-keng tī leh (bô phian-chi̍p koè ê khang ia̍h, choán-ia̍h bô chún-sǹg), tō bô-hoat-tō· soá khì hia.
Che piaú-sī nā ū têng-tâⁿ, ē-sái kā sin ia̍h soà tńg-khì goân-lâi ê kū ia̍h.

'''SÈ-JĪ!'''
Tùi chē lâng tha̍k ê ia̍h lâi kóng, soá-ūi sī toā tiâu tāi-chì.
Liâu--lo̍h-khì chìn-chêng, chhiáⁿ seng khak-tēng lí ū liáu-kái chiah-ê hiō-kó.",
'movepagetalktext' => "Siong-koan ê thó-lūn-ia̍h (chún ū) oân-nâ ē chū-tōng tòe leh sóa-ūi. Í-hā ê chêng-hêng '''bô chún-sǹg''': *Beh kā chit ia̍h tùi 1 ê miâ-khong-kan (namespace) soá khì lēng-gōa 1 ê miâ-khong-kan, *Sin piau-tê í-keng ū iōng--kòe ê thó-lūn-ia̍h, he̍k-chiá *Ē-kha ê sió-keh-á bô phah-kau. Í-siōng ê chêng-hêng nā-chún tī leh, lí chí-hó iōng jîn-kang ê hong-sek sóa ia̍h a̍h-sī kā ha̍p-pèng (nā ū su-iàu).",
'movearticle' => 'Sóa ia̍h:',
'movenologin' => 'Bô teng-ji̍p',
'movenologintext' => 'Lí it-tēng ài sī chù-chheh ê iōng-chiá jī-chhiáⁿ ū [[Special:UserLogin|teng-ji̍p]] chiah ē-tàng sóa ia̍h.',
'newtitle' => 'Khì sin piau-tê:',
'move-watch' => 'Kàm-sī chit ia̍h',
'movepagebtn' => 'Sóa ia̍h',
'pagemovedsub' => 'Sóa-ūi sêng-kong',
'articleexists' => 'Kāng miâ ê ia̍h í-keng tī leh, a̍h-sī lí kéng ê miâ bô-hāu. Chhiáⁿ kéng pa̍t ê miâ.',
'talkexists' => "'''Ia̍h ê loē-bûn ū soá cháu, m̄-koh siong-koan ê thó-lūn-ia̍h bô toè leh soá, in-ūi sin piau-tê pun-té tō ū hit ia̍h. Chhiáⁿ iōng jîn-kang ê hoat-tō· kā ha̍p-pèng.'''",
'movedto' => 'sóa khì tī',
'movetalk' => 'Sūn-sòa sóa thó-lūn-ia̍h',
'movepage-page-moved' => '$1 í-keng sóa khì tī $2.',
'movelogpagetext' => 'Ē-kha lia̍t-chhut hông soá-ūi ê ia̍h.',
'movereason' => 'Lí-iû:',
'selfmove' => 'Goân piau-tê kap sin piau-tê sio-siâng; bô hoat-tō· sóa.',
'protectedpagemovewarning' => "'''KÉNG-KÒ: Pún ia̍h só tiâu leh. Kan-taⁿ ū hêng-chèng te̍k-koân ê iōng-chiá (sysop) ē-sái soá tín-tāng.'''
Ē-kha ū choè-kīn ê kì-lio̍k thang chham-khó:",

# Export
'export' => 'Su-chhut ia̍h',
'exportcuronly' => 'Hān hiān-chhú-sî ê siu-téng-pún, mài pau-koat kui-ê le̍k-sú',

# Namespace 8 related
'allmessages' => 'Hē-thóng sìn-sit',
'allmessagesname' => 'Miâ',
'allmessagesdefault' => 'Siat piān ê bûn-jī',
'allmessagescurrent' => 'Bo̍k-chêng ê bûn-jī',
'allmessagestext' => 'Chia lia̍t chhut só·-ū tī MediaWiki: miâ-khong-kan ê hē-thóng sìn-sit.',

# Thumbnails
'thumbnail-more' => 'Hòng-tōa',
'filemissing' => 'Bô tóng-àn',

# Special:Import
'import' => 'Su-ji̍p ia̍h',

# Tooltip help for the actions
'tooltip-pt-userpage' => 'Lí chit ê iōng-chiá ê ia̍h',
'tooltip-pt-mytalk' => 'Lí ê thó-lūn ia̍h',
'tooltip-pt-preferences' => 'Lí ê siat-tēng',
'tooltip-pt-mycontris' => 'Lí ê kòng-hiàn lia̍t-toaⁿ',
'tooltip-pt-login' => 'Hi-bāng lí teng-ji̍p; m̄-ko bô kiông-chè',
'tooltip-pt-anonlogin' => 'Hi-bāng lí teng-ji̍p; m̄-ko bô kiông-chè',
'tooltip-pt-logout' => 'Teng-chhut',
'tooltip-ca-talk' => 'Loē-iông ê thó-lūn',
'tooltip-ca-edit' => 'Lí ē-sái kái chit ia̍h. Beh chhûn chìn-chiân, chhiáⁿ chhi̍h  sing-khoàⁿ-māi ê liú-á',
'tooltip-ca-viewsource' => 'Chit ia̍h pó-hō͘ tiâu leh.
Lí ē-sái khoàⁿ i ê goân-sú-bé.',
'tooltip-ca-history' => 'Chit ia̍h ê chá-chêng pán-pún',
'tooltip-ca-delete' => 'Thâi chit ia̍h',
'tooltip-ca-unwatch' => 'Lí ê kàm-sī-toaⁿ soá tiàu chit ia̍h.',
'tooltip-search' => 'Chhoé {{SITENAME}}',
'tooltip-search-fulltext' => 'Chhoé ū chia-ê jī ê ia̍h',
'tooltip-p-logo' => 'Khì thâu-ia̍h',
'tooltip-n-mainpage' => 'Khì thâu-ia̍h',
'tooltip-n-mainpage-description' => 'Khì thâu-ia̍h',
'tooltip-n-portal' => 'Koan-hē chit ê sū-kang, lí ē-tāng chò siáⁿ, khì tó-ūi chhoé',
'tooltip-n-currentevents' => 'Thê-kiong hiān-sî sin-bûn ê poē-kéng chu-liāu',
'tooltip-n-recentchanges' => 'Choè-kīn tī wiki ū kái--koè ê lia̍t-toaⁿ',
'tooltip-n-randompage' => 'Chhìn-chhái hian chi̍t ia̍h',
'tooltip-n-help' => 'Beh chhoé ê só͘-chāi',
'tooltip-t-whatlinkshere' => 'Só͘-ū liân kàu chia ê liat-toaⁿ',
'tooltip-t-recentchangeslinked' => 'Liân kàu chit ia̍h koh choè-kīn ū kái koè--ê',
'tooltip-t-contributions' => 'Khoàⁿ chit ê iōng-chiá ê kòng-hiàn lia̍t-toaⁿ',
'tooltip-t-upload' => 'Í-keng sàng chiūⁿ-bāng ê tóng-àn',
'tooltip-t-specialpages' => 'Só͘-ū te̍k-sû-ia̍h ê lia̍t-toaⁿ',
'tooltip-t-print' => 'Chit ia̍h ê ìn-soat pán-pún',
'tooltip-t-permalink' => 'Chi̍t ia̍h kái--koè pán-pún ê éng-kiú liân-kiat',
'tooltip-ca-nstab-main' => 'khoàⁿ ia̍h ê loē-iông',
'tooltip-ca-nstab-user' => 'Khoàⁿ iōng-chiá ê Ia̍h',
'tooltip-ca-nstab-image' => 'Khoàⁿ tóng-àn ia̍h',
'tooltip-ca-nstab-category' => 'Khoàⁿ lūi-pia̍t ia̍h',
'tooltip-save' => 'Pó-chhûn lí chò ê kái-piàn',
'tooltip-preview' => 'Chhiáⁿ tī pó-chûn chìn-chêng,  sian khoàⁿ lí chò ê kái-piàn !',
'tooltip-rollback' => 'Ji̍h "Hoê-choán" ē-sái thè tńg-khì téng-chi̍t-ê kái ê lâng ê ia̍h.',
'tooltip-preferences-save' => '保存設定',
'tooltip-summary' => 'Siá chi̍t-ê kán-tan soat-bêng',

# Attribution
'anonymous' => '{{SITENAME}} bô kì-miâ ê iōng-chiá',
'siteuser' => '{{SITENAME}} iōng-chiá $1',
'othercontribs' => 'Kin-kù $1 ê kòng-hiàn.',
'siteusers' => '{{SITENAME}} iōng-chiá $1',

# Patrolling
'markaspatrolleddiff' => 'Phiau-sī sûn--kòe',
'markedaspatrolledtext' => 'Í-keng phiau-sī chit ê siu-tēng-pún ū lâng sûn--kòe.',

# Image deletion
'deletedrevision' => 'Kū siu-tēng-pún $1 thâi-tiāu ā.',

# Browsing diffs
'previousdiff' => '← Khì chêng 1 ê diff',
'nextdiff' => 'Khì āu 1 ê diff →',

# Media information
'imagemaxsize' => 'Iáⁿ-siōng biô-su̍t-ia̍h ê tô· ke̍k-ke hián-sī jōa tōa tiuⁿ:',
'thumbsize' => 'Sok-tô· (thumbnail) jōa tōa tiuⁿ:',
'file-nohires' => 'Bô khah koân ê kái-sek-tō͘.',

# Special:NewFiles
'newimages' => 'Sin iáⁿ-siōng oē-lóng',
'imagelisttext' => "Í-hā sī '''$1''' tiuⁿ iáⁿ-siōng ê lia̍t-toaⁿ, $2 pâi-lia̍t.",
'ilsubmit' => 'Kiám-sek',
'bydate' => 'chiàu ji̍t-kî',

# Metadata
'metadata-expand' => 'Hián-sī iù-chiat',
'metadata-collapse' => 'Am iù-chiat',

# External editor support
'edit-externally' => 'Iōng gōa-pō· èng-iōng nńg-thé pian-chi̍p chit-ê tóng-àn',
'edit-externally-help' => 'Chham-khó [http://www.mediawiki.org/wiki/Manual:External_editors Help:External_editors] ê soat-bêng.',

# 'all' in various places, this might be different for inflected languages
'watchlistall2' => 'choân-pō͘',
'namespacesall' => 'choân-pō·',
'monthsall' => 'choân-pō͘',
'limitall' => '全部',

# Email address confirmation
'confirmemail' => 'Khak-jīn e-mail chū-chí',
'confirmemail_text' => 'Sú-iōng e-mail kong-lêng chìn-chêng tio̍h seng khak-jīn lí ê e-mail chū-chí ū-hāu. Chhi̍h ē-pêng hit-ê liú-á thang kià 1 tiuⁿ khak-jīn phoe hō· lí. Hit tiuⁿ phoe lāi-bīn ū 1 ê te̍k-sû liân-kiat. Chhiáⁿ iōng liû-lám-khì khui lâi khoàⁿ, án-ne tō ē-tit khak-jīn lí ê chū-chí ū-hāu.',
'confirmemail_send' => 'Kià khak-jīn phoe',
'confirmemail_sent' => 'Khak-jīn phoe kià chhut-khì ah.',
'confirmemail_invalid' => 'Bô-hāu ê khak-jīn pian-bé. Pian-bé khó-lêng í-keng kòe-kî.',
'confirmemail_success' => 'í ê e-mail chū-chí khak-jīn oân-sêng. Lí ē-sái teng-ji̍p, khai-sí hiáng-siū chit ê wiki.',
'confirmemail_loggedin' => 'Lí ê e-mail chū-chí í-keng khak-jīn ū-hāu.',
'confirmemail_error' => 'Pó-chûn khak-jīn chu-sìn ê sî-chūn hoat-seng būn-tê.',
'confirmemail_subject' => '{{SITENAME}} e-mail chu-chi khak-jin phoe',
'confirmemail_body' => 'Ū lâng (IP $1, tāi-khài sī lí pún-lâng) tī {{SITENAME}} ēng chit-ê e-mail chū-chí chù-chheh 1 ê kháu-chō "$2".

Chhiáⁿ khui ē-kha chit-ê liân-kiat, thang khak-jīn chit-ê kháu-chō si̍t-chāi sī lí ê:

$3

Nā-chún *m̄-sī* lí, chhiáⁿ mài tòe liân-kiat khì.  Chit tiuⁿ phoe ê khak-jīn-bé ē chū-tōng tī $4 kòe-kî.',
'confirmemail_body_changed' => 'Ū lâng (IP $1, tāi-khài sī lí pún-lâng) tī {{SITENAME}} ēng chit-ê e-mail chū-chí chù-chheh 1 ê kháu-chō "$2".

Chhiáⁿ khui ē-kha chit-ê liân-kiat, thang khak-jīn chit-ê kháu-chō si̍t-chāi sī lí ê:

$3

Nā-chún *m̄-sī* lí, chhiáⁿ khui ē-kha chit-ê liân-kiat,  chhú-siau khak-jīn ê e-mail.

$5

Chit tiuⁿ phoe ê khak-jīn-bé ē chū-tōng tī $4 kòe-kî.',
'confirmemail_body_set' => 'Ū lâng (IP $1, tāi-khài sī lí pún-lâng) tī {{SITENAME}} ēng chit-ê e-mail chū-chí chù-chheh 1 ê kháu-chō "$2".

Chhiáⁿ khui ē-kha chit-ê liân-kiat, thang khak-jīn chit-ê kháu-chō si̍t-chāi sī lí ê:

$3

Nā-chún *m̄-sī* lí, chhiáⁿ khui ē-kha chit-ê liân-kiat,  chhú-siau khak-jīn ê e-mail.

$5

Chit tiuⁿ phoe ê khak-jīn-bé ē chū-tōng tī $4 kòe-kî.',

# action=purge
'confirm-purge-top' => 'Kā chit ia̍h ê cache piàⁿ tiāu?',

# Table pager
'table_pager_next' => 'Aū-chi̍t-ia̍h',
'table_pager_prev' => 'Téng-chi̍t-ia̍h',
'table_pager_first' => 'Thâu-chi̍t-ia̍h',
'table_pager_last' => 'Siāng-bóe-ia̍h',
'table_pager_limit' => 'Múi 1 ia̍h hián-sī $1 hāng',
'table_pager_limit_submit' => 'Lâi-khì',

# Auto-summaries
'autosumm-blank' => 'Kā ia̍h ê loē-iông the̍h tiāu',
'autoredircomment' => 'Choán khì [[$1]]',
'autosumm-new' => 'Sin ia̍h: $1',

# Watchlist editor
'watchlistedit-numitems' => 'Lí ê kàm-sī-toaⁿ ū $1 ia̍h, thó-lūn-ia̍h bô sǹg chāi-lāi.',
'watchlistedit-normal-submit' => 'Mài kàm-sī',
'watchlistedit-normal-done' => 'Í-keng ū $1 ia̍h ùi lí ê kám-sī-toaⁿ soá cháu:',

# Watchlist editing tools
'watchlisttools-edit' => 'Khoàⁿ koh kái kàm-sī-toaⁿ',
'watchlisttools-raw' => 'Kái tshing-chheng ê kàm-sī-toaⁿ',

# Core parser functions
'duplicate-defaultsort' => '\'\'\'Thê-chhíⁿ lí:\'\'\'Siat-piān ê pâi-lia̍t hong-sek "$2" thè-oāⁿ chìn-chêng ê siat-piān ê pâi-lia̍t hong-sek "$1".',

# Special:Version
'version' => 'Pán-pún',

# Special:FilePath
'filepath' => 'Tóng-àn ê soàⁿ-lō·',

# Special:SpecialPages
'specialpages' => 'Te̍k-sû-ia̍h',

);
