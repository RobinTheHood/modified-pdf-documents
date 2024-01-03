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

class RedirectResponse extends Response
{
    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function send(): void
    {
        header("HTTP/1.1 303 See Other");
        header("Location: " . $this->url);
        exit;
    }
}
