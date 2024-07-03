<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf'])) {
    $file = $_FILES['pdf']['tmp_name'];
    $originalFileName = $_FILES['pdf']['name'];
    $destination = 'compressed_' . uniqid() . '_' . $originalFileName;
    $outputDir = __DIR__ . '/compressed_pdfs/';

    // Create the output directory if it doesn't exist
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    $outputPath = $outputDir . $destination;

    // Use Ghostscript for PDF compression
    $command = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile=$outputPath $file";
    shell_exec($command);

    // Return the URL to the compressed PDF file
    echo json_encode(['url' => 'compressed_pdfs/' . $destination]);
}
?>
