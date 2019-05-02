<?php
    require_once("config.php");
    session_start();
    if(isset($_POST['save'])){
    
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "img/user/";
    $imagename = $_FILES["gambar"]["name"];
    $target_file = $dirUpload . $imagename;
    // pindahkan file
    $terupload = move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // filter data yang diinputkan
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $label = filter_input(INPUT_POST, 'label', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $media = $imagename;
    $_SESSION["id_location"] = $_GET['id_location'];
    $id_location = $_SESSION["id_location"];

    $db = new dbconnect;
    $db = $db->connect();
    $stmt = $db->prepare("UPDATE markers SET label=:label, description=:description, lat=:lat, lng=:lng, media=:media WHERE id_location=:id_location");
    $params = array(
        ":id_location" => $id_location,
        ":lat" => $lat,
        ":lng" => $lng,
        ":label" => $label,
        ":description" => $description,
        ":media" => $media
    
    );
    $insertLocation = $stmt->execute($params);
    if($insertLocation) header("Location: main.php");
    }
    if(isset($_POST['save'])){
    
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "img/user/";
    $imagename = $_FILES["gambar"]["name"];
    $target_file = $dirUpload . $imagename;
    // pindahkan file
    $terupload = move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // filter data yang diinputkan
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $label = filter_input(INPUT_POST, 'label', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $media = $imagename;
    $_SESSION["id_location"] = $_GET['id_location'];
    $id_location = $_SESSION["id_location"];

    $db = new dbconnect;
    $db = $db->connect();
    $stmt = $db->prepare("UPDATE markers SET label=:label, description=:description, lat=:lat, lng=:lng, media=:media WHERE id_location=:id_location");
    $params = array(
        ":id_location" => $id_location,
        ":lat" => $lat,
        ":lng" => $lng,
        ":label" => $label,
        ":description" => $description,
        ":media" => $media
    
    );
    $insertLocation = $stmt->execute($params);
    if($insertLocation) header("Location: main.php");
    }
    if(isset($_POST['delete'])){
        $id_location = $_SESSION["id_location"];
    
        $db = new dbconnect;
        $db = $db->connect();
        $stmt = $db->prepare("DELETE FROM markers WHERE id_location=:id_location");
        $params = array(
            ":id_location" => $id_location
        );
        $deleteLocation = $stmt->execute($params);
        if($deleteLocation) header("Location: main.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="css/roadpage.css">
<title>SIPELAN MAYA - Road Page</title>
</head>
<body>
<div id="map"></div>
<div class="dataPage">
    <form action="" class="dataForm" method="post" enctype="multipart/form-data">
    <?php
        require_once("query.php");
        $id_location = $_GET["id_location"];
        $data = new query;
        $dataMarker = $data->getSpecifiedRoad();
        $dataMarker = json_encode($dataMarker,true);
        echo '<div id="dataMarker" style="display:none;">' . $dataMarker . '</div>';

    
    ?>
    <input type="hidden" name="lat" id="lat" value="">
    <input type="hidden" name="lng" id="lng" value="">
    <div class="imageHolder form-group">
        <img src="https://via.placeholder.com/180x100.jpg?text=SIPELAN+MAYA" id="imagepreview">
        <input type="file" id="gambar" name="gambar" onchange="changeimagepreview(event)">
    </div>
    <div class="descriptionContent">
    <div class="row">
    <div class="labelHolder form-group col-sm">
        <input type="text" class="form-control" name="label" id="name" placeholder="Location Name">
    </div>
    <div class="saveDeleteButton col-sm">
        <button type="submit" class="btn btn-success" name="save">SAVE</button>
        <button type="submit" class="btn btn-danger"name="delete">DELETE</button>
    </div>
    </div>
    <div class="descBox">
        <textarea class="form-control" rows="5" name="description" id="description" placeholder="DESCRIPTION"></textarea>
    </div>
    </div>
    </form>
</div>
<script src="js/editgooglemaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLiGqpeUDEaRmzNyogxvoI_psQiSNBnk&libraries=places&callback=initMap"
  async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>