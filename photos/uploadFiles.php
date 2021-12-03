<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
    <link rel="stylesheet" href="./styles/style.css">
    <title>Upload Photos</title>
</head>

<body>
    <!-- //?This page will use querystring  -->
    <?php
    require_once __DIR__ . "./navbar.php";
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label class="label">
            Select Image Files to Upload:
            <div class="field has-addons">
                <input type="file" name="files[]" class="button is-info" multiple>
                <input type="submit" name="submit" id="submit" class="button is-primary" value="UPLOAD">
            </div>
        </label>
        <main class="image-gallery">
            <?php
            // Include the database configuration file 

            if (isset($_REQUEST["id"])) {
                $oid = $_REQUEST["id"];
            }

            if (isset($_POST['submit'])) {

                // File upload configuration 
                $targetDir = "uploads/";    //uploads and query string and order id
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                $fileNames = array_filter($_FILES['files']['name']);
                if (!empty($fileNames)) {
                    foreach ($_FILES['files']['name'] as $key => $val) {

                        // File upload path 
                        $fileName = basename($_FILES['files']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;

                        // Check whether file type is valid 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                        if (in_array($fileType, $allowTypes)) {
                            // Upload file to server 
                            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                                require_once "./photoModel.php";
                                $photo = new Photos();

                                $pvid = $photo->insertPhotos("/ProductionHouse/photos/" . $targetFilePath);

                                $cnt = 0;
                                foreach ($pvid as $p) {
                                    if ($cnt == 1) {
                                        break;
                                    }
                                    $photo->insertPhotoOrder($p->pvid, $oid);
                                    echo "<img src = '$targetFilePath' class='image' />";
                                    $cnt++;
                                }

                                $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                            } else {
                                $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                            }
                        } else {
                            $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                        }
                    }

                    // Error message 
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                } else {
                    $statusMsg = 'Please select a file to upload.';
                }
            }
            ?>
        </main>
    </form>
    <script src="./scripts/script.js"></script>
</body>

</html>