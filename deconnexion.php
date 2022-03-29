<?php
session_start();

$_SERVER = array();

session_destroy();

header('Location: /');
exit;
?>