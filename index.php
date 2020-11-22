<?php

require_once('dbController.php');

$db = new Db();

$connection = $db->connect();

if($connection) echo "Database connected Successfully!!";