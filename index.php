<?php
use mikehaertl\wkhtmlto\Pdf;
exec('/home/cesar/Downloads/wkhtmltox/bin/wkhtmltopdf files.local/content.html --header-html files.local/header.html --footer-html files.local/footer.html content.pdf');

include 'vendor/autoload.php';

$pdf = new Pdf();
$pdf->addPage('files.local/content.html');
$pdf->setOptions(array(
    'header-html' => 'files.local/header.html',
    'footer-html' => 'files.local/footer.html'
));

$pdf->binary = '/home/cesar/Downloads/wkhtmltox/bin/wkhtmltopdf';
if (false === $pdf->saveAs('./my_pdf.pdf')) {
    echo $pdf->getError();
}