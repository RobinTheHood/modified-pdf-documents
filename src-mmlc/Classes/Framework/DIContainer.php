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

use Exception;

class DIContainer
{
    public function get(string $class)
    {
        // if (Session::class === $class) {
        //     return new Session(new Repository(new Database()));
        // } elseif (Repository::class === $class) {
        //     return new Repository(new Database());
        // }

        throw new Exception('Can not create object of type ' . $class);
    }
}
