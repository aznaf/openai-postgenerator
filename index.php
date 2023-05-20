<?php
include("gpt.php");
include("watermark.php");



// echo $content;

$fileNames = array("00.jpg", "01.jpg", "02.jpg", "03.jpg", "04.jpg", "05.jpg", "06.jpg");


for ($i=0; $i<10; $i++){
    $content = generate_article('generate random short parenting tip');
    $input = $fileNames[array_rand($fileNames)];
    $output = 'outputs/'.uniqid().'.jpg';
    addWatermark($input, $content, $output);
    echo '<img src="'.$output.'" width="540px" height="540px"> <br>';
    echo $i;
}


?>

