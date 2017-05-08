<?php
error_reporting(0);
$db = new mysqli("localhost","id426614_admin","1@qwerty","id426614_messenger");
if ($db->connect-error){
    die ("Couldn't connect");
}

$username = stripslashes(htmlspecialchars($_GET['username']));

$result = $db->prepare("SELECT * FROM messages");
$result->bind_param("s", $username);
$result->execute();
$result = $result->get_result();

while ($r = $result->fetch_row()) {
	echo $r[1];
	echo "\\";
	echo $r[2];
	echo "\n";
}