<?php
  require_once("config.php");
  require_once("auth.php");
  session_start();
  if(isset($_POST['save'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    

    // menyiapkan query
    $sql = "UPDATE users SET name=$name WHERE username=$user";
    $sql2 = "UPDATE users SET password=$password WHERE username=$user";
    $sql3 = "UPDATE users set name=$name, password=$password WHERE username=$user";
    $stmt = $db->prepare($sql);
    $stmt2 = $db2->prepare($sql2);
    $stmt3 = $db2->prepare($sql3);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":password" => $password
        
    );

    if(isset($_POST['save']) && !isset($_POST['password'])){
      // eksekusi query untuk menyimpan ke database
      $update = $stmt->execute($params);

      // jika query simpan berhasil, maka user sudah terdaftar
      // maka alihkan ke halaman utama
      if($saved) header("Location: main.php");

    }
    elseif(isset($_POST['save']) && !isset($_POST['name'])){
      // eksekusi query untuk menyimpan ke database
      $update = $stmt2->execute($params);

      // jika query simpan berhasil, maka user sudah terdaftar
      // maka alihkan ke halaman utama
      if($saved) header("Location: main.php");

    }
    elseif(isset($_POST['save']) && !isset($_POST['name']) && !isset($_POST['pasword'])){
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
    <input type="email" name="email" placeholder="user@example.com" disabled>
    <input type="text" name="name" placeholder="DISPLAY NAME">
    <input type="password" name="password" placeholder="NEW PASSWORD">
    <button type="submit" name="save">SAVE</button>
  </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>