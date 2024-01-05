<?php

/**
 * PDF Documents for modified
 *
 * You can find informations about system classes and development at:
 * https://docs.module-loader.de
 *
 * @author  Robin Wieschendorf <mail@robinwieschendorf.de>
 * @link    https://github.com/RobinTheHood/modified-pdf-documents/
 */

declare(strict_types=1);

use RobinTheHood\PdfDocuments\Classes\Controller\Controller;
use RobinTheHood\PdfDocuments\Classes\Framework\DIContainer;
use RobinTheHood\PdfDocuments\Classes\Framework\RequestFactory;

$post = $_POST;
require 'includes/application_top.php';
$_POST = $post;

if (rth_is_module_disabled('MODULE_RTH_PDF_DOCUMENTS')) {
    return;
}

// require_once DIR_FS_DOCUMENT_ROOT . '/vendor-no-composer/autoload.php';

// restore_error_handler();
// restore_exception_handler();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL ^ E_NOTICE);

$diContainer = new DIContainer();
$request = RequestFactory::createFromGlobals();
$controller = new Controller($diContainer);
$response = $controller->invoke($request);
$response->send();
