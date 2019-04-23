<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="css/roadpage.css">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>

<title>SIPELAN MAYA - Road Page</title>
</head>
<body>
<div id="map"></div>
<div class="dataPage">
    <form action="" class="dataForm" method="POST" enctype="multipart/form-data">
    <div class="imageHolder form-group">
        <img src="img/page/jembatan.jpg">
        <input type="file" id="fileInput">
    </div>
    <div class="descriptionContent">
    <div class="row">
    <div class="labelHolder form-group col-sm">
        <input type="text" class="form-control" name="label" placeholder="Location Name">
    </div>
    <div class="saveDeleteButton col-sm">
        <button type="submit" class="btn btn-success" name="save">SAVE</button>
        <button type="submit" class="btn btn-danger"name="delete">DELETE</button>
    </div>
    </div>
    <div class="descBox">
        <textarea class="form-control" rows="5" name="description" placeholder="DESCRIPTION"></textarea>
    </div>
    </div>
    </form>
</div>
<script src="js/googlemaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLiGqpeUDEaRmzNyogxvoI_psQiSNBnk&libraries=places&callback=initMap"
  async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
</body>
</html>