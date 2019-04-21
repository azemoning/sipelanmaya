<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: main.php");
        }
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
<link rel="stylesheet" href="css/login.css">
<title>SIPELAN MAYA - Login</title>
</head>
<body>
  <form class="box" action="" method="post">
    <div class="logoBox">
      <img src="img/page/logo.png" alt="SIPELAN MAYA">
    </div>
    <input type="email" name="username" placeholder="EMAIL ADDRESS">
    <input type="password" name="password" placeholder="PASSWORD">
    <button type="submit" name="login">LOGIN</button>
    <div class="straightLine container">
      <div class="row">
        <div class="registerLink col">
          <a href="register.php">REGISTER</a>
        </div>
        <div class="resetpwdLink col">
          <a href="resetpass.php">RESET PASSWORD</a>
        </div>
      </div>
    </div>
  </form>
  <div class="footer-bar">
    <p>Copyright © 2019 SIPELAN MAYA. All Rights Reserved</p>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>