<?php
session_start(); // Ensure the session is started

require_once 'User.php';
require_once 'Database.php';

$database = new Database("localhost", "root", "", "web-project");

include 'header.php';
$user = new User($database);

$user->logout();
?>
