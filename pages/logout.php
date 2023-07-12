<?php 
session_start();
unset($_SESSION['login']);
header('location: /');
die("</a href='/'>On home</a>");