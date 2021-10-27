<?php
require_once './photoModel.php';

/*
    https://www.phpzag.com/create-thumbnails-while-uploading-multiple-images-with-php-jquery/
    https://www.codexworld.com/upload-multiple-images-store-in-database-php-mysql/
    https://www.codexworld.com/upload-multiple-images-using-jquery-ajax-php/
    https://www.codexworld.com/image-gallery-crud-with-php-mysql/
    https://duckduckgo.com/?t=ffab&q=upload+multiple+photos+php&ia=web
*/

//TODO: FETCH OID FROM SESSION->QUERTYSTRING
if (isset($_SESSION['fileNames'])) {
    $photo = new Photos();
    foreach ($_SESSION['fileNames'] as $key => $val) {
        $fileName = basename($_SESSION['fileNames'][$key]);
        $result = $photo->insertPhotos($fileName, $subject);
        if ($result) {
            //! OID COMES FROM QUERYSTRING.
            $r = $photo->insertPhotoOrder($result, $oid);
        } else {
            echo "ERROR IN ADDING PHOTOS";
        }
    }
} else {
    //TODO : ADD CUSTOMER SIDE PHOTO DISPLAY THINGY
    header("location: ../index.php");
}
