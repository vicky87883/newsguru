<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    $uploadDir = 'uploads/';
    $outputDir = 'compressed/';
    $uploadedFile = $uploadDir . basename($_FILES['pdf']['name']);
    $compressedFile = $outputDir . 'compressed_' . basename($_FILES['pdf']['name']);

    // Ensure upload and output directories exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (!file_exists($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    // Move the uploaded file to the upload directory
    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadedFile)) {
        // Compress the PDF (You need to have Ghostscript installed)
        $gsCommand = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -sOutputFile={$compressedFile} {$uploadedFile}";
        exec($gsCommand, $output, $returnVar);

        if ($returnVar == 0) {
            // Successfully compressed the file
            $response = ['url' => $compressedFile];
            echo json_encode($response);
        } else {
            // Error during compression
            http_response_code(500);
            echo json_encode(['error' => 'Error compressing the PDF.']);
        }
    } else {
        // Error uploading the file
        http_response_code(500);
        echo json_encode(['error' => 'Error uploading the PDF.']);
    }
} else {
    // Invalid request
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request.']);
}
?>
