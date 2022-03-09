<?php

// Quebra da session //

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: index.php");