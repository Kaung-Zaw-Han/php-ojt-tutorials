<?php
error_reporting(E_ALL & ~E_DEPRECATED);
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
require('libs/spreadsheet/vendor/autoload.php');
require('libs/phpword/vendor/autoload.php');
$txtFile = 'files/sample.txt';
$objReader = WordIOFactory::createReader("Msdoc");
$phpWord = $objReader->load("files/sample.doc");
$sections = $phpWord->getSections();
$objWriter = WordIOFactory::createWriter($phpWord, 'HTML');
$convertXlsxFile = 'files/sample.xlsx';
$xlsxReader = SpreadsheetIOFactory::createReaderForFile($convertXlsxFile);
$xlsxSpreadSheet = $xlsxReader->load($convertXlsxFile);
$xlsxWorkSheet = $xlsxSpreadSheet->getActiveSheet();
$convertCsvFile = 'files/sample.csv';
$csvReader = SpreadsheetIOFactory::createReaderForFile($convertCsvFile);
$csvSpreadSheet = $csvReader->load($convertCsvFile);
$csvWorkSheet = $csvSpreadSheet->getActiveSheet();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_05</title>
</head>
<body>
    <div class='center-div'>
        <h1>Text File</h1>
        <p><?php readfile($txtFile); ?> </p>
        <h1>Document File</h1>
        <div>
            <?php
            foreach ($sections as $section) {
                $paragraphs = $section->getElements();
                foreach ($paragraphs as $paragraph) {
                    $text = $paragraph->getText();
                    echo $text;
                }
            }
            ?>
        </div>
        <h1>Excel File</h1>
        <?php
        echo '<table>';
        foreach ($csvWorkSheet->getRowIterator() as $row) {
            echo '<tr>';
            foreach ($row->getCellIterator() as $cell) {
                echo '<td>' . $cell->getValue() . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <h1>Csv File </h1>
        <?php
        echo '<table>';
        foreach ($xlsxWorkSheet->getRowIterator() as $row) {
            echo '<tr>';
            foreach ($row->getCellIterator() as $cell) {
                echo '<td>' . $cell->getValue() . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
</body>
</html>