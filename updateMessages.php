<?php
error_reporting(0);
$db = new mysqli("localhost","REMOVED","REMOVED","REMOVED");
if ($db->connect_error){
    die ("Couldn't connect");
}

$username = stripslashes(htmlspecialchars($_GET['username']));
$message = stripslashes(htmlspecialchars($_GET['message']));

if ($message == "" || $username == "") {
	die();
}

$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
$result->bind_param("ss", $username, $message);
$result->execute();
