<?php 
	require_once dirname(dirname(__FILE__)).'/core/database.php';
	require_once 'Messages.class.php';
	$db = new MS_Database();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Movie Square Administration<?php if (isset($title)) { ?> - <?php echo $title; } ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-icon.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<h2><a href="/admin">Movie Square Administration</a></h2>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="#">Main control</a>
					<ul>
						<li>&#8250; <a href="/">Visit site</a></li>
						<li>&#8250; <a href="">Reports</a></li>
						<li>&#8250; <a href="movies.php">Show all movies</a></li>
						<li>&#8250; <a href="shows.php">Show all shows</a></li>
						<li>&#8250; <a href="rooms.php">Show all rooms</a></li>
						<li>&#8250; <a href="orders.php">Show all orders</a></li>
					</ul>
				</li>
				<li class="upp"><a href="#">Manage content</a>
					<ul>
						<li>&#8250; <a href="movies-new.php">Add new movie</a></li>
						<li>&#8250; <a href="shows-new.php">Add new show</a></li>
						<li>&#8250; <a href="rooms-new.php">Add new room</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div> 
