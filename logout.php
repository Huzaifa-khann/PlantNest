<?php

@include 'config.php';

// <!-- Log Out -->


session_start();
session_unset();
session_destroy();

header('location:login.php');

?>