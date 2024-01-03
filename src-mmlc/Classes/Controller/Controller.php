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

namespace RobinTheHood\PdfDocuments\Classes\Controller;

use order as Order;
use RobinTheHood\PdfDocuments\Classes\Framework\AbstractController;
use RobinTheHood\PdfDocuments\Classes\Framework\Request;
use RobinTheHood\PdfDocuments\Classes\Framework\Response;

/**
 * The AbstractController can automatically forward requests to methods beginning with the invoke prefix via the ?action=
 * query parameter in the URL. If action is empty or not set, invokeIndex() is called by default.
 * The entry point of this class is in file shop-root/rth_stripe.php
 */
class Controller extends AbstractController
{
    protected function invokeIndex(Request $request): Response
    {
        return new Response('There is nothing to do');
    }
}
