<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$config = new mysqli($servername, $username, $password)or die("Connect failed: %s\n". $config -> error);
$config -> select_db("bcs");
?>