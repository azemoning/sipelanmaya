<?php
  require_once("config.php");
  session_start();
  if(isset($_POST['save'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $id = $_SESSION["id"];

    // menyiapkan query
    $stmt = $db->prepare("UPDATE users set name=:name WHERE id=$id");
    $stmt2 = $db->prepare("UPDATE users set password=:password WHERE id=$id");
    $stmt3 = $db->prepare("UPDATE users set name=:name, password=:password WHERE id=$id");
    // bind parameter ke query
    $params = array(
        ":name" => $name,
    );
    $params2 = array(
        ":password" => $password,
    );
    $params3 = array(
         ":name" => $name,
         ":password" => $password,
    );

    if(!isset($_POST['password'])){
    // eksekusi query untuk menyimpan ke database
       $update = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman utama
       $_SESSION["name"] = $name;
       if($update) header("Location: main.php");

    }
    elseif(!isset($_POST['name'])){
    // eksekusi query untuk menyimpan ke database
      $update = $stmt2->execute($params2);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman utama
      if($update) header("Location: main.php");

    }
    elseif(isset($_POST['name']) && isset($_POST['password'])){
      $update = $stmt3->execute($params3);
      $_SESSION["name"] = $name;
      if($update) header("Location: main.php");
    }
    else{
      header("Location: main.php");
    }
    
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
<link rel="stylesheet" href="css/profile.css">
<title>SIPELAN MAYA - Profile</title>
</head>
<body>
  <form class="box" action="" method="post">
    <div class="logoBox">
      <img src="img/user/avatar.png" alt="SIPELAN MAYA">
    </div>
    <input type="email" name="email" placeholder="<?= $_SESSION['username'] ?>" disabled>
    <input type="text" name="name" placeholder="DISPLAY NAME">
    <input type="password" name="password" placeholder="NEW PASSWORD">
    <button type="submit" name="save">SAVE</button>
  </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>