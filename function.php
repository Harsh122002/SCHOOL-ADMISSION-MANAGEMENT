<?php
// function.php

function make_avatar($character)
{
    $filename = "avatar/" . time() . "_" . uniqid() . ".png";
    $image = imagecreatetruecolor(200, 200);
    $background_color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefill($image, 0, 0, $background_color);
    $text_color = imagecolorallocate($image, 255, 255, 255);
    imagettftext($image, 100, 0, 55, 150, $text_color, 'font/arial.ttf', $character);
    
    // Ensure the avatar directory exists
    if (!file_exists("avatar")) {
        mkdir("avatar");
    }

    imagepng($image, $filename);
    imagedestroy($image);
    return $filename;
}


function Get_user_avatar($user_id, $connect)
{
    $query = "SELECT user_avatar FROM register_user WHERE register_user_id = :user_id";
    $statement = $connect->prepare($query);
    $statement->bindParam(':user_id', $user_id);
    $statement->execute();
    $result = $statement->fetchColumn();

    echo '<img src="' . $result . '" width="75" class="img-thumbnail img-circle" />';
}
?>

