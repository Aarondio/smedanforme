<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit67f69236023dfd0a26a668a469414cde
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
        'Interpid\\PdfExamples\\MyPdf' => __DIR__ . '/../..' . '/library/interpid/PdfExamples/MyPdf.php',
        'Interpid\\PdfExamples\\PdfFactory' => __DIR__ . '/../..' . '/library/interpid/PdfExamples/PdfFactory.php',
        'Interpid\\PdfExamples\\PdfSettings' => __DIR__ . '/../..' . '/library/interpid/PdfExamples/PdfSettings.php',
        'Interpid\\PdfLib\\Multicell' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Multicell.php',
        'Interpid\\PdfLib\\MulticellData' => __DIR__ . '/../..' . '/library/interpid/PdfLib/MulticellData.php',
        'Interpid\\PdfLib\\MulticellOptions' => __DIR__ . '/../..' . '/library/interpid/PdfLib/MulticellOptions.php',
        'Interpid\\PdfLib\\Pdf' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Pdf.php',
        'Interpid\\PdfLib\\PdfInterface' => __DIR__ . '/../..' . '/library/interpid/PdfLib/PdfInterface.php',
        'Interpid\\PdfLib\\String\\Tags' => __DIR__ . '/../..' . '/library/interpid/PdfLib/String/Tags.php',
        'Interpid\\PdfLib\\Table' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table.php',
        'Interpid\\PdfLib\\Table\\Cell\\CellAbstract' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table/Cell/CellAbstract.php',
        'Interpid\\PdfLib\\Table\\Cell\\CellInterface' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table/Cell/CellInterface.php',
        'Interpid\\PdfLib\\Table\\Cell\\EmptyCell' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table/Cell/EmptyCell.php',
        'Interpid\\PdfLib\\Table\\Cell\\Image' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table/Cell/Image.php',
        'Interpid\\PdfLib\\Table\\Cell\\Multicell' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Table/Cell/Multicell.php',
        'Interpid\\PdfLib\\Tools' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Tools.php',
        'Interpid\\PdfLib\\Validate' => __DIR__ . '/../..' . '/library/interpid/PdfLib/Validate.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit67f69236023dfd0a26a668a469414cde::$classMap;

        }, null, ClassLoader::class);
    }
}