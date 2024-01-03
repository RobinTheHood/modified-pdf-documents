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

namespace RobinTheHood\PdfDocuments\Classes\Framework;

class RequestFactory
{
    public static function createFromGlobals(): Request
    {
        return new Request(
            $_GET ?? [],
            $_POST ?? [],
            [],
            [],
            [],
            $_SERVER ?? [],
            @file_get_contents('php://input')
        );
    }
}
