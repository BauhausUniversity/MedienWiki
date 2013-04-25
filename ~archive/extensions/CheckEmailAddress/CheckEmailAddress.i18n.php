<?php
$messages = array();

/** English
* @author Naitsirk
*/
$messages['en'] = array(
        'checkemailaddress-desc'        => 'Allows to exclude certain email-addresses from registration',
        'checkemailaddress'             => '# This is a list of forbidden domains for emails which therefore are disabled to register with.',
        'checkemailaddress-domainerror' => 'Once-only and trash email-addresses are not allowed on {{SITENAME}}. Please register with a different email-address.',
        'checkemailaddress-nameerror'   => 'The email-address you submitted is supposed to be spam. If it is not, please email the admin.',
);

/** German (Deutsch)
* @author Naitsirk
* @author Kghbln
*/
$messages['de'] = array(
        'checkemailaddress-desc'        => 'Ermöglicht es, bestimmte E-Mail-Adressen von der Registrierung auszuschließen',
        'checkemailaddress'             => '# Dies ist eine Liste unzulässiger Domainnamen für E-Mails, mit denen eine Registrierung nicht möglich ist.',
        'checkemailaddress-domainerror' => 'Wegwerf- und Einmal-E-Mail-Adressen sind auf {{SITENAME}} nicht zulässig. Bitte registriere dich mit einer anderen E-Mail-Adresse.',
        'checkemailaddress-nameerror'   => 'Es handelt sich vermutlich um eine Spam-E-Mail-Adresse. Sofen dies nicht der Fall ist, kontaktiere bitte einen Administrator per E-Mail.',
);

/** German (formal address) (\202aDeutsch (Sie-Form)\202c)
* @author Kghbln
*/
$messages['de-formal'] = array(
        'checkemailaddress-domainerror' => 'Wegwerf- und Einmal-E-Mail-Adressen sind auf {{SITENAME}} nicht zulässig. Bitte registrieren Sie sich mit einer anderen E-Mail-Adresse.',
        'checkemailaddress-nameerror'   => 'Es handelt sich vermutlich um eine Spam-E-Mail-Adresse. Sofen dies nicht der Fall ist, kontaktieren Sie bitte einen Administrator per E-Mail.',
);
