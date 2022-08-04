<?php 
require_once "../config.php";

if(isset($_SESSION["logged"])) {
    session_unset();
    header("Location: " . SITE_URL);
} else {
    header("Location: " . SITE_URL);
}