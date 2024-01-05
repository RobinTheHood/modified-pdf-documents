<?php

declare(strict_types=1);

namespace RobinTheHood\PdfDocuments\Classes\Document;

use RobinTheHood\PdfBuilder\Classes\Pdf\Pdf;
use RobinTheHood\PdfBuilder\Classes\Elements\Section;
use RobinTheHood\PdfBuilder\Classes\Elements\Document;
use RobinTheHood\PdfBuilder\Classes\Elements\Image;
use RobinTheHood\PdfBuilder\Classes\Elements\PageDecorator;
use RobinTheHood\PdfBuilder\Classes\Elements\TextArea;
use RobinTheHood\PdfBuilder\Classes\Elements\Table;
use RobinTheHood\PdfBuilder\Classes\Elements\FooterDecorator;
use RobinTheHood\PdfBuilder\Classes\Components\FoldMark;
use RobinTheHood\PdfBuilder\Classes\Components\Address;
use RobinTheHood\PdfBuilder\Classes\Components\ContentArea;
use RobinTheHood\PdfBuilder\Classes\Components\Infoblock;
use RobinTheHood\PdfBuilder\Classes\Components\OrderTable;
use RobinTheHood\PdfBuilder\Classes\Components\OrderTotalTable;
use RobinTheHood\PdfBuilder\Classes\Container\Container;

class Letter
{
    /**
     * @var Document $document;
     */
    private $document;

    private $logo;

    private $address;

    private $infoblock;

    private $contentHeading;

    private $contentIntroText;

    private $contentOutroText;

    private $tableFooter;

    public function __construct()
    {
        $this->create();
    }

    private function create(): void
    {
        $section = new Section();
        $section->setDefaultPageMargin(10, 40);
        $section->addPageMargin(0, 40);

        // Logo
        $logo = new Image(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/img/logo_head.png');
        $this->logo = $logo;
        $logo->position = Container::POSITION_ABSOLUT;
        $logo->containerBox->positionX->setValue(145);
        $logo->containerBox->positionY->setValue(9);
        $logo->containerBox->width->setValue(40);
        $logo->containerBox->height->setValue(13); // only needed for tests
        $section->addChildContainer($logo);

        // Address
        $address = new Address();
        $this->address = $address;
        $section->addChildContainer($address);

        // Infoblock
        $infoblock = new Infoblock();
        $this->infoblock = $infoblock;
        $section->addChildContainer($infoblock);

        // Content Area
        $contentArea = new ContentArea();

        // Heading
        $contentHeading = new TextArea();
        $this->contentHeading = $contentHeading;
        $contentHeading->setFontSize(18);
        $contentHeading->setFontWeight(Pdf::FONT_STYLE_BOLD);
        $contentHeading->containerBox->marginBottom->setValue(2);
        $contentArea->addChildContainer($contentHeading);

        // Content Intro Text
        $contentIntroText = new TextArea();
        $this->contentIntroText = $contentIntroText;
        $contentIntroText->setFontSize(10);
        $contentIntroText->setLineHeight(5); // Unit: mm
        $contentIntroText->setFontWeight(Pdf::FONT_STYLE_NORMAL);
        $contentArea->addChildContainer($contentIntroText);

        // Content Outro Text
        $contentOutroText = new TextArea();
        $this->contentOutroText = $contentOutroText;
        $contentOutroText->containerBox->marginTop->setValue(5);
        $contentOutroText->setFontSize(10);
        $contentOutroText->setLineHeight(5); // Unit: mm
        $contentOutroText->setFontWeight(Pdf::FONT_STYLE_NORMAL);
        $contentArea->addChildContainer($contentOutroText);

        $section->addChildContainer($contentArea);

        $pageDecorator = new PageDecorator();
        $pageDecorator->addChildContainer(new FoldMark());

        $tableFooter = new Table();
        $this->tableFooter = $tableFooter;

        $width = 60;
        $tableFooter->setColumnWidths([
            $width,
            $width,
            $width,
        ]);

        $footer = new FooterDecorator();
        $footer->addChildContainer($tableFooter);

        $section->setPageDecorator($pageDecorator);
        $section->setFooterDecorator($footer);

        $this->document = new Document();
        $this->document->addSection($section);
        $this->document->addSection($section);
    }

    public function use(): void
    {
        // Address
        $this->address->setAddress("Musterfirma GmbH\nz.H. Max Mustermann\nHauptstraße 999\n12345 Neustadt\nDeutschland");
        $this->address->setSender("Max Mustermann - 12345 Neustadt 1\n");

        // Heading
        $this->contentHeading->setText('Rechnung R-123456');

        // Content Intro Text
        $this->contentIntroText->setText(
            "Sehr geehrte Frau Lena Musterfrau,\nwir freuen uns, dass Sie bei online-shop.de bestellt haben."
        );

        // Content Outro Text
        $this->contentOutroText->setText(
            "Vielen Dank für Ihren Auftrag. Besuchen Sie uns wieder unter online-shop.de. Leistungsdatum entspricht"
            . " Rechnungsdatum. Es gelten unsere Allgemeinen Geschäftsbedingungen."
        );

        // Footer
        $this->tableFooter->addRow([
            ['content' => "MAX MUSTERFIRMA\nMustermann Straße 1\n12345 Musterstadt", 'alignment' => Pdf::CELL_ALIGN_LEFT],
            ['content' => "www.musterfirma.de\ninfo@musterfirma.de\n+49 1234 1111-0", 'alignment' => Pdf::CELL_ALIGN_LEFT],
            ['content' => "BLZ: 123456789\nIBAN: DE123456789123456789\nUSt-ID: DE123456789", 'alignment' => Pdf::CELL_ALIGN_LEFT],
        ], ['fontWeight' => Pdf::FONT_STYLE_NORMAL, 'border' => Table::ROW_BORDER_NONE]);
    }

    public function render(): void
    {
        $this->document->render();
    }
}
