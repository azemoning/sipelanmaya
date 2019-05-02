<?php

session_start();
session_unset("user","id_location","username","id","name");
header("Location: index.php");