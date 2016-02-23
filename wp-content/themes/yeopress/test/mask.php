<?php
// Load source and mask
$source = imagecreatefrompng( 'image.png' );
$mask = imagecreatefrompng( 'mask.png' );
// Apply mask to source
imagealphamask( $source, $mask );
// Output
imagepng( $source, "maskedImage.png" );

function imagealphamask( &$picture, $mask ) {
    // Get sizes and set up new picture
    $xSize = imagesx( $picture );
    $ySize = imagesy( $picture );
    $newPicture = imagecreatetruecolor( $xSize, $ySize );
    imagesavealpha( $newPicture, true );
    imagefill( $newPicture, 0, 0, imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 ) );

    // Resize mask if necessary
    if( $xSize != imagesx( $mask ) || $ySize != imagesy( $mask ) ) {
        $tempPic = imagecreatetruecolor( $xSize, $ySize );
        imagecopyresampled( $tempPic, $mask, 0, 0, 0, 0, $xSize, $ySize, imagesx( $mask ), imagesy( $mask ) );
        imagedestroy( $mask );
        $mask = $tempPic;
    }

    // Perform pixel-based alpha map application
    for( $x = 0; $x < $xSize; $x++ ) {
        for( $y = 0; $y < $ySize; $y++ ) {
            $maskPixel = imagecolorsforindex( $mask, imagecolorat( $mask, $x, $y ) );
            $imagePixel = imagecolorsforindex( $picture, imagecolorat( $picture, $x, $y ) );
            file_put_contents("/home/fabi/test.txt", "x=$x|y=$y|maskPixel=" . print_r($maskPixel, TRUE) . "\n" . "imagePixel=" . print_r($imagePixel, TRUE), FILE_APPEND);
            $transparencyAdd = 127 - $maskPixel["alpha"];
            $newTransparency = $imagePixel["alpha"] + $transparencyAdd;
            if ($newTransparency < 0) {
              $newTransparency = 0;
            }
            if ($newTransparency > 127) {
              $newTransparency = 127;
            }
            $color = 
              imagecolorsforindex( 
                $picture, 
                imagecolorat( $picture, $x, $y ) );
            imagesetpixel( $newPicture, $x, $y, 
              imagecolorallocatealpha( 
                $newPicture, 
                $color[ 'red' ], 
                $color[ 'green' ], 
                $color[ 'blue' ], 
                $newTransparency ) );
        }
    }

    // Copy back to original picture
    imagedestroy( $picture );
    $picture = $newPicture;
}

?>
