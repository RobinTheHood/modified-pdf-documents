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

if (rth_is_module_disabled('MODULE_RTH_PDF_DOCUMENTS')) {
    return;
}

$rthOrderId = $_GET['oID'];
?>

<div style="margin-left: 5px; margin-bottom: 5px; max-width: 1000px; border: 1px solid #aaaaaa; padding: 5px">
    <div class="heading">PDF Dokumente</div>

    <form action="rth_pdf_documents.php?ref=orderEdit&orderId=<?= $rthOrderId ?>" method="post">
        <input type="hidden" name="action" value="mailInvoice">
        <input type="submit" class="button" value="PDF Rechnung per E-Mail versenden">
    </form>

    <form action="rth_pdf_documents.php?ref=orderEdit&orderId=<?= $rthOrderId ?>" method="post">
        <input type="hidden" name="action" value="downloadInvoice">
        <input type="submit" class="button" value="PDF Rechnung herunterladen">
    </form>

    <form action="rth_pdf_documents.php?ref=orderEdit&orderId=<?= $rthOrderId ?>" method="post">
        <input type="hidden" name="action" value="mailInvoice">
        <input type="submit" class="button" value="PDF Lieferschein per E-Mail versenden">
    </form>

    <form action="rth_pdf_documents.php?ref=orderEdit&orderId=<?= $rthOrderId ?>" method="post">
        <input type="hidden" name="action" value="downloadInvoice">
        <input type="submit" class="button" value="PDF Lieferschein herunterladen">
    </form>
</div>
