<?php 

require_once 'koneksi.php';
$aktif = 'home';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home - <?= $title ?></title>
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
	<link rel="shortcut icon" href="https://smkpgri3-malang.sch.id/websekolah/wp-content/uploads/2022/06/cropped-logo-smk-1-192x192.png" type="image/x-icon">
</head>
<body>

		<?php require_once 'header.php'; ?>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

		<!-- hero image -->
		<div class="hero">
			<img src="resources/images/banner.png" alt="">
		</div>
		<div class="titlehome text-center mt-3">
			<h2 style="font-family: mulilight;">SMK PGRI 3 MALANG</h2>
			<span style="font-weight: bold;">Success By Disicpline</span>
		</div>
		</div>
		<?php require_once 'footer.php'; ?>
