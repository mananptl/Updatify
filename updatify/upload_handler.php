<?php

$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$version = $_POST['version'];
$details = $_POST['details'];

$fileName = basename($_FILES["update_file"]["name"]);
$targetFile = $uploadDir . time() . "_" . $fileName;

if (move_uploaded_file($_FILES["update_file"]["tmp_name"], $targetFile)) {

    $jsonFile = "updates.json";

    $existing = [];
    if (file_exists($jsonFile)) {
        $existing = json_decode(file_get_contents($jsonFile), true);
    }

    $existing[$version] = [
        "details" => $details,
        "link" => $targetFile
    ];

    file_put_contents($jsonFile, json_encode($existing, JSON_PRETTY_PRINT));

    echo "<h2 style='color:lightgreen'>✔ Upload Successful!</h2>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    echo "<h2 style='color:red;'>❌ Upload Failed</h2>";
}
?>
