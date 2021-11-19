<?php
session_start();
if($_SESSION){
    session_destroy();
    header("Location: login");
}
?>