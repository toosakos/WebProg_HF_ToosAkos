<?php
session_start();
if ($_SESSION["loggedin"]) {
    unset($_SESSION["loggedin"]);
    session_destroy();
    header("location: login.php");
}