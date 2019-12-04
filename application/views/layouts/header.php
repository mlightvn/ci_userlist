<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo ($title ? ($title . " | ") : ""); ?>ユーザシステム</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<?=link_tag('assets/css/app.css');?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
	<header>
		<h1><?php echo $title; ?></h1>

		<div class="header">
			<a href="<?=base_url();?>" class="btn btn-outline-primary"><i class="fas fa-home"></i></a>
			<a href="<?=base_url();?>users" class="btn btn-outline-primary"><i class="fas fa-list"></i></a>
			<a href="<?=base_url();?>users/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i></a>
		</div>
	</header>
