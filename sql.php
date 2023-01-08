<?php
	try {
		$db = new PDO('mysql:host=localhost;dbname=coins', 'root', 'wasv!NVv9n8N!na', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} catch (PDOException $e) {
		exit($e->getMessage());
	}
?>