<?php

require_once "../config/connection.php";
require "f.php";

$pica=doh();
$excel= new COM("Excel.Application");
$excel->Visible=1;
$excel->DisplayAlerts=1;

$workobook=$excel->Workbooks->Add();
$sheet=$workobook->Worksheets('Sheet1');
$sheet->activate;

$br=1;
foreach($pica as $pice){
    $polje=$sheet->Range("A{$br}");
    $polje->activate;
    $polje->value=$pice->idPice;
    $polje=$sheet->Range("B{$br}");
    $polje->activate;
    $polje->value=$pice->nazivPica;

    $br++;
}
$workobook->_SaveAs('pica.xlsx');