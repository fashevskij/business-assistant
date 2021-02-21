<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="/admin/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Admin panel
	</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="/admin/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="/admin/assets/demo/demo.css" rel="stylesheet" />
</head>

<?php
if (isset($_COOKIE['user_admin'])) {
?>

	<body class="">
		<div class="wrapper">
			<div class="sidebar" data-color="purple" data-background-color="white" data-image="/admin/assets/img/sidebar-1.jpg">
				<div class="logo"><a href="/admin" class="simple-text logo-normal">
						Business-assistant
					</a></div>
				<div class="sidebar-wrapper">
					<?php
					include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/nav.php";
					?>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
<?php
} else {
?>
	<div class="mx-auto my-5" style="width: 100px;">
		<a class="btn" href="../shop/authorization_b.php?page=servLogin" style="border-radius: 30px; background-color: #36c9;">Войти</a>
	</div>
<?php
}
?>