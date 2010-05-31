<?php
session_start();
ob_start();
header("Cache-control: private");
check_for_session();
check_for_admin();
if (!isset($page_title)) { $page_title = $page_title_basic; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $this_install_title; ?> &raquo; <?php echo $page_title; ?> | <?php echo $short_system_name; ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" media="all" type="text/css" href="styles/base.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script src="includes/js/dropdownmenu.js" type="text/javascript"></script>
<?php if (isset($tablesorter)) { ?>
<script src="includes/js/jquery.tablesorter.min.js" type="text/javascript"></script>
<script src="includes/js/jquery.tablesorter.pager.js" type="text/javascript"></script>
<?php } ?>
</head>

<body>
<div id="wrapper">
	<div id="header">
		<p id="cftptop"><?php echo $full_system_name; ?></p>
		<p><?php echo $version; ?> <?php echo $curver; ?></p>
		<a href="process.php?do=logout" target="_self"><img src="img/logout.gif" alt="Logout" id="logout" /></a>
	</div>

<div id="top_menu">
	<ul class="menu" id="menu">
		<li><a href="home.php" class="menulink"><?php echo $mnu_home; ?></a></li>
		<li><a href="fileupload.php" class="menulink"><?php echo $mnu_upload; ?></a></li>

		<?php // show CLIENTS to allowd users
			$clients_allowed = array(9,8);
			if (in_array($_SESSION['userlevel'],$clients_allowed) || in_array($_COOKIE['userlevel'],$clients_allowed)) {
		?>
		<li>
			<a href="#" class="menulink dropready"><?php echo $mnu_clients; ?></a>
			<ul>
				<li><a href="newclient.php"><?php echo $mnu_add_cl; ?></a></li>
				<li><a href="clients.php"><?php echo $mnu_edit_cl; ?></a></li>
			</ul>
		</li>
		<?php } ?>

		<?php // show USERS to allowd users
			$users_allowed = array(9);
			if (in_array($_SESSION['userlevel'],$users_allowed) || in_array($_COOKIE['userlevel'],$users_allowed)) {
		?>
		<li>
			<a href="#" class="menulink dropready"><?php echo $mnu_users; ?></a>
			<ul>
				<li><a href="newuser.php"><?php echo $mnu_add_usr; ?></a></li>
				<li><a href="users.php"><?php echo $mnu_edit_usr; ?></a></li>
			</ul>
		</li>
		<?php } ?>

		<?php // show LOGO and OPTIONS to allowd users
			$options_allowed = array(9);
			if (in_array($_SESSION['userlevel'],$options_allowed) || in_array($_COOKIE['userlevel'],$options_allowed)) {
		?>
		<li>
			<a href="#" class="menulink dropready"><?php echo $mnu_config; ?></a>
			<ul>
				<li><a href="logo.php"><?php echo $mnu_config_logo; ?></a></li>
				<li><a href="options.php"><?php echo $mnu_config_options; ?></a></li>
			</ul>
		</li>
		<?php } ?>

	</ul>
	<div class="clear"></div>
</div>
<?php can_see_content($allowed_levels,$page_title_not_allowed,$userlevel_not_allowed); ?>