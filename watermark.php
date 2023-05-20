<?php

function addWatermark($imagePath, $text, $outputPath) {
    $font ="./IndieFlower-Regular.ttf";
    // Load the image
    $image = imagecreatefromjpeg($imagePath);
  
    // Set the font size and color
    $font_size = 180;
    $color = imagecolorallocate($image, 0, 0, 0); // black color
  
    // Get the dimensions of the image
    $image_width = imagesx($image);
    $image_height = imagesy($image);
  
    // Calculate the maximum width of the text before wrapping
    $max_width = 0.8 * $image_width; // 80% of image width
  
    // Wrap the text
    $wrapped_text = wordwrap($text, 35, "\n");
  
    // Create an array of lines from the wrapped text
    $lines = explode("\n", $wrapped_text);
  

    // Calculate the starting y-coordinate for the text
    $start_y = ($image_height - count($lines) * $font_size) / 2 - 150;

    

    
    // Add each line of text to the image
    foreach ($lines as $line) {
        // Get the dimensions of the text
        $text_box = imagettfbbox($font_size, 0, $font, $line);
        $text_width = abs($text_box[4] - $text_box[0]);
        $text_height = abs($text_box[5] - $text_box[1]);
    
        // Calculate the starting x-coordinate for the text
        $start_x = ($image_width - $text_width) / 2;
    
        // Add the text to the image
        imagettftext($image, $font_size, 0, $start_x, $start_y, $color, $font, $line);
    
        // Move down to the next line
        $start_y += $text_height;
    }
  
    // Save the image to a file
    imagejpeg($image, $outputPath);
  
    // Free up memory
    imagedestroy($image);
}
