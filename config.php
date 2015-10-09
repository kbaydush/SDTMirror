<?php
// init autoloader
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', true);
date_default_timezone_set('UTC');

require_once(dirname(__FILE__) . '/classes/Autoloader/Interface.php');
require_once(dirname(__FILE__) . '/classes/Autoloader.php');

$loader = new Autoloader();
$loader->setRootPath(realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR));

Autoloader::register($loader);

$loader->setLogger('error.log');

global $CFG;

$CFG = new stdClass();

$CFG->root_dir = dirname(__FILE__);

$CFG->mail_from = 'orders@testsite.localhost';
$CFG->test_mail = 'averskos@gmail.com';

$CFG->pdf_title = 'SITE LICENSE AGREEMENT';
$CFG->pdf_author = 'SomeCompanyName Inc.';

// Here you can add any form id which we need
$CFG->all_form_id_array = array(
    'purchases' => 10,
    'refunds' => 11
);

// life time of PDF file
$CFG->pdf_lifetime = 60 * 5;

// debug settings by default (on/off)

$CFG->DEBUG_MODE_BY_DEFAULT = array(
    //   gen pdf init
    'pdf' => 1,
    //  send mail init
    'sendmail' => 1,
    'testmail' => 0,   //test mail [yes/no]
    'request' => 1,          // request to Mirror [yes/no]
    'setmirror' => 'test', //Mirror server -> $CFG->MIRROR_SERVERS array values
    'pushstorage' => 0,        // data submit from file [yes/no]
    'force' => 0,       // data submit to main server [yes/no]
// Attention! If you need to see all process information than simply have to use the POST param [info = true] in request with submit
    'info' => 0        // instance dump [yes/no]
);


// system's servers are available
$CFG->MIRROR_SERVERS = array(
    'test' => 'http://testmirror.localhost',
    'local' => 'http://mirror.localhost'
);

// Purchases params
$CFG->request_params[$CFG->all_form_id_array['purchases']] = array(
    'id' => 'mirrorId',
    'name' => 'mirrorName',
    'surname' => 'mirrorSurname',
    'product' => 'mirrorProduct',
    'LicenseKey' => 'mirrorLicenseKey',
    'CustomerCompany' => 'mirrorCustomerCompany',
    'security_data' => 'security_data',
    'security_hash' => 'security_hash'
);

// Refunds params
$CFG->request_params[$CFG->all_form_id_array['refunds']] = array(
    'id' => 'mirrorId',
    'name' => 'mirrorName',
    'surname' => 'mirrorSurname',
    'product' => 'mirrorProduct',
    'LicenseKey' => 'mirrorLicenseKey',
    'CustomerCompany' => 'mirrorCustomerCompany',
    'security_data' => 'security_data',
    'security_hash' => 'security_hash'
);

// Data does not going to mirror
$CFG->params_disabled = array(

    'security_data',
    'security_hash'
);

$CFG->order_product_names = array(
    'ProductLetters' => 'PROD-L-001',
    'ProductNumbers' => 'PROD-N-001',
    'ProductBasics' => 'PROD-B-0011',
    'ProductColors' => 'PROD-C-0011',
    'ProductShapes' => 'PROD-S-0011'
);

// response results (redirecting path array)

$CFG->response_successfull = array(
    'http://mirror-db.localhost/success.html',

);

$CFG->response_wrong = array(
    'http://mirror-db.localhost/error.html'
);

