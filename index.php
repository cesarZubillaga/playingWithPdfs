<?php
include 'vendor/autoload.php';
include 'PdfClient.php';
$html = file_get_contents('layout.html');
$html = str_replace('{{imgdir}}', './img', $html);
$file = sprintf('%s/file_%s.html', __DIR__, date('d-m-h'));
$html = file_get_contents('http://www.sbb-immobilien.ch/centre-loewenberg');
file_put_contents($file, $html);
$pdf = new \mikehaertl\wkhtmlto\Pdf('http://www.sbb-immobilien.ch/centre-loewenberg');
$pdf->binary = '/home/cesar/wkhtmltox/bin/wkhtmltopdf';
if (false === $pdf->saveAs('./my_pdf.pdf')) {
    echo $pdf->getError();
}
$html = file_get_contents($file);
$pdf = new \Dompdf\Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper('A4');
$pdf->render();
$pdf->stream('filename');
