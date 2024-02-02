<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$html = '<h2 style="text-align: center;">Laporan Perjalanan</h2>';
$html .= str_replace('<table class="table table-bordered">', '<table style="border-collapse: collapse; width: 100%;">', $_POST['html']);
$html = str_replace('<th>', '<th style="border: 1px solid #000; padding: 8px;">', $html);
$html = str_replace('<td>', '<td style="border: 1px solid #000; padding: 8px;">', $html);

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();
?>
