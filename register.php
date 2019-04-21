<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    

    // menyiapkan query
    $sql = "INSERT INTO users (username, password) 
            VALUES (:username, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
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
<link rel="stylesheet" href="css/register.css">
<title>SIPELAN MAYA - Register</title>
</head>
<body>
  <form class="box" action="../LoginPage/index.html" method="post">
    <div class="logoBox">
      <img src="img/page/logo.png" alt="SIPELAN MAYA">
    </div>
    <input type="email" name="" placeholder="EMAIL ADDRESS">
    <input type="password" name="" placeholder="PASSWORD">
    <button type="submit">REGISTER</button>
  </form>
  <div class="footer-bar">
    <p>Copyright © 2019 SIPELAN MAYA. All Rights Reserved</p>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>