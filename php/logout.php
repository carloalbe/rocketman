<?php
session_start();
include "dbConn.php";
session_unset();
session_destroy();
header("location:./../index.php");
?>
