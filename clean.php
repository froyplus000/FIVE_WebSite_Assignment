<?php
    require_once("settings.php");
    require_once("processEOI.php");
    if(!isset($_SERVER['HTTP_REFERER'])){
        header('Location:apply.php');
        exit;
    }
    function cleanInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
?>