<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo ((isset($title) && !empty($title)) ? ($title . " | ") : ""); ?>ユーザシステム</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" 
      type="image/ico" 
      href="<?=base_url('assets/favicon.ico');?>">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<?=link_tag('assets/css/app.css');?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<div class="container">
	<header>
		<?php $user = (isset($this->session) && ($this->session->userdata('user'))) ? $this->session->userdata('user') : NULL; ?>

		<nav class="navbar navbar-expand-sm bg-light">
		  <!-- Brand -->
		  <a class="navbar-brand" href="<?=base_url();?>">CIU</a>

		  <!-- Links -->
		  <ul class="navbar-nav">
			<?php if($user) { ?>

		    <li class="nav-item">
		      <a class="nav-link" href="<?=base_url('users');?>"><i class="fas fa-list"></i> User list</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?=base_url('users/create');?>"><i class="fas fa-user-plus"></i> New user</a>
		    </li>

		    <li class="nav-item">
		      <a class="nav-link" href="<?=base_url('users/cart/search');?>"><i class="fas fa-shopping-cart"></i> Cart</a>
		    </li>

		    <!-- Dropdown -->
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbardrop" data-toggle="dropdown">
			        <?=$user->name?>
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?=base_url('users/logout')?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
		      </div>
		    </li>

			<?php }else{ ?>
		    <li class="nav-item">
		      <a class="nav-link" href="<?=base_url('users/login');?>"><i class="fas fa-sign-in-alt"></i> Login</a>
		    </li>
<!-- 
		    <li class="nav-item">
		      <a class="nav-link" href="<?=base_url('users/create');?>"><i class="fas fa-user-plus"></i> Register</a>
		    </li>
 -->
			<?php } ?>

		  </ul>
		</nav>

	</header>
