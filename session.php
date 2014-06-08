<?php

session_start();
$name = "Daniel";
$_SESSION['name'] = $name;
echo $_SESSION['name'];

?>