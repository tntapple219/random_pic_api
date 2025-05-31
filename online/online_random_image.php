<?php

// Define the name of the file containing image URLs (´▽`ʃ♡ƪ)
// Each URL should be on a new line in this file.
$imageListFile = 'images.txt';

// Check if the image list file exists (゜o゜)
if (!file_exists($imageListFile)) {
    // If the file is not found, return a 500 Internal Server Error status
    header('HTTP/1.0 500 Internal Server Error');
    // Encode an error message in JSON format
    echo json_encode(['error' => 'Image list file not found! ┐(ﾟдﾟ)┌']);
    exit(); // Stop script execution
}

// Read the file content and store each line as an image URL (ง •̀_•́)ง
// FILE_IGNORE_NEW_LINES: Do not add newline at the end of each array element
// FILE_SKIP_EMPTY_LINES: Skip empty lines in the file
$imageUrls = file($imageListFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Check if any image URLs were successfully read from the file (⊙ω⊙)
if (empty($imageUrls)) {
    // If no URLs are found, return a 500 Internal Server Error status
    header('HTTP/1.0 500 Internal Server Error');
    echo json_encode(['error' => 'No image URLs found in the list file! Σ( ° △ °|||)︴']);
    exit(); // Stop script execution
}

// Randomly select one image URL from the list (ﾉ>ω<)ﾉ
$randomImageUrl = $imageUrls[array_rand($imageUrls)];

// Directly redirect the browser to the randomly chosen image URL (´∀｀)♡
// This makes the browser display the image directly.
header('Location: ' . $randomImageUrl);
exit(); // Important to exit after a header redirect

// --- Optional: If you want to return the image URL as JSON instead of redirecting ---
/*
header('Content-Type: application/json');
echo json_encode(['imageUrl' => $randomImageUrl]);
*/

?>