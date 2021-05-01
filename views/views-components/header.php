<?php
$config = require __DIR__ . '/../../config.php';
$site = $config['site'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/yourTabIcon" type="image/x-icon">
	<title><?= $site['title'] ?></title>
</head>

<body>

	<nav>
		<ul>
			<li>
				<a href="/">Home</a>
			</li>
			<li>
				<a href="/list">List</a>
			</li>
			<li>
				<a href="/input">Input</a>
			</li>
		</ul>
	</nav>