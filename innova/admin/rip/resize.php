<?php
$dst_x = 0;   // X-coordinate of destination point
$dst_y = 0;   // Y-coordinate of destination point
$src_x = 100; // Crop Start X position in original image
$src_y = 100; // Crop Srart Y position in original image
$dst_w = 160; // Thumb width
$dst_h = 120; // Thumb height
$src_w = 260; // Crop end X position in original image
$src_h = 220; // Crop end Y position in original image

// Creating an image with true colors having thumb dimensions (to merge with the original image)
$dst_image = imagecreatetruecolor($dst_w, $dst_h);
// Get original image
$src_image = imagecreatefromjpeg('about.jpg');
// Cropping
imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
// Saving
imagejpeg($dst_image, 'images/crop.jpg');
?>