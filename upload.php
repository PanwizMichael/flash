<?php
header('Content-Type: application/json');

// Directory to save uploaded files
$targetDir = "uploads/";

// Create the directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if the file was uploaded without errors
if ($_FILES['audio']['error'] === UPLOAD_ERR_OK) {
    // Generate a unique file name to prevent conflicts
    $fileName = uniqid() . "_" . basename($_FILES["audio"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["audio"]["tmp_name"], $targetFilePath)) {
        echo json_encode(['success' => true, 'filePath' => $targetFilePath]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file.']);
    }
} else {
    // Return an error message if the file couldn't be uploaded
    echo json_encode(['success' => false, 'error' => 'File upload error: ' . $_FILES['audio']['error']]);
}
?>