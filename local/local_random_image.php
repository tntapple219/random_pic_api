<?php

// Define the directory where your images are stored (´▽`ʃ♡ƪ)
$imageDirectory = 'images/';

// Get all image files from the directory. Supports JPG, JPEG, PNG, GIF, WebP. (ง •̀_•́)ง
// GLOB_BRACE allows multiple patterns like {jpg,jpeg,png}
$images = glob($imageDirectory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);

// Check if any images were found in the directory (゜o゜)
if (empty($images)) {
    // If no images are found, return a 404 Not Found status
    header('HTTP/1.0 404 Not Found');
    // Encode an error message in JSON format
    echo json_encode(['error' => 'No images found in the directory! ┐(ﾟдﾟ)┌']);
    exit(); // Stop script execution
}

// Randomly select one image from the list (ﾉ>ω<)ﾉ
$randomImage = $images[array_rand($images)];

// Get the MIME type of the randomly selected image (e.g., image/jpeg, image/png) (⊙ω⊙)
// This tells the browser what type of content it's receiving
$mimeType = mime_content_type($randomImage);

// Set the Content-Type header so the browser displays the image correctly (￣ω￣;)
header('Content-Type: ' . $mimeType);

// Output the content of the image file directly to the browser (´∀｀)♡
readfile($randomImage);

// --- Optional: If you want to return the image URL as JSON instead of the image content ---
/*
header('Content-Type: application/json');
// Make sure to replace 'http://your_domain/' with your actual domain and path
echo json_encode(['imageUrl' => 'http://your_domain/' . $randomImage]);
*/

// --- Optional: If you want to redirect the browser to the image URL ---
/*
header('Location: http://your_domain/' . $randomImage);
exit();
*/

?>