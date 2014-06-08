<?php
$namein = $_GET['name'];
    $size = 120;

    if(empty($namein))
        return;
    if(empty($size) || is_nan($size))
        $size = 8;

    $datajson = file_get_contents('http://traksag.com/php/account.php?name='.$namein);
    $data = json_decode($datajson, true); # Return an array
    $name = $data[0]["$namein"]['name'];
    $image = imagecreatefrompng('http://s3.amazonaws.com/MinecraftSkins/'.$name.'.png');

    imagealphablending($image, true);

    $head = cropandresize($image, 8, 8, $size);
    $hat = cropandresize($image, 40, 8, $size);

    imagecopymergealpha($head, $hat, $size);

    # So browser recognizes it as image
    header('Content-Type: image/png');
    imagepng($head);

    imagedestroy($image);
    imagedestroy($head);
    imagedestroy($hat);

    # -- Functions --

    function cropandresize($src_im, $crop_w, $crop_h, $size) {
        $dest_crop = imagecreatetruecolor(8, 8);
        $dest = imagecreatetruecolor($size, $size);

        # Save alpha channel information
        imagealphablending($dest_crop, false);
        imagesavealpha($dest_crop, true);
        imagealphablending($dest, false);
        imagesavealpha($dest, true);

        imagecopy($dest_crop, $src_im, 0, 0, $crop_w, $crop_h, 8, 8);
        imagecopyresampled($dest, $dest_crop, 0, 0, 0, 0, $size, $size, 8, 8);
        imagedestroy($dest_crop); # Clear from memory
        return $dest;
    }

    # Fix for imagecopymerge not supporting alpha channels
    function imagecopymergealpha($dst_im, $src_im, $size) {
        $temp = imagecreatetruecolor($size, $size);

        imagecopy($temp, $dst_im, 0, 0, 0, 0, $size, $size);
        imagecopy($temp, $src_im, 0, 0, 0, 0, $size, $size);
        imagecopymerge($dst_im, $temp, 0, 0, 0, 0, $size, $size, 100);
    }
?>