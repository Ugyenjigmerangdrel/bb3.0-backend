<?php
include("path.php");

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['message']);
unset($_SESSION['email']);
session_destroy();

header('location:'. $BASE_URL .'login.php');