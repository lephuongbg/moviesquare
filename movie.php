<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	$movie_id = isset($_GET['id']) ? $_GET['id'] : 0;
	
	include_once 'core/database.php';
	$db = new MS_Database();
	$movie = $db->callProcedure('selectMovieById', $movie_id);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Movie Square Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat." />
<meta name="keywords" content="Ex ea, commodo, consequat, duis aute irure, dolor in, reprehenderit" />

<title>Movie Square - Home</title>

<!-- CSS -->
<link href="css/rs.css" rel="stylesheet" type="text/css" />
<link href="css/myriadpro.css" rel="stylesheet" type="text/css" />
<link href="css/dropkick.css" rel="stylesheet" type="text/css" />
<link href="css/video-js.min.css" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="css/ms.css" rel="stylesheet" type="text/css" />

<!-- Javascript and JQuery -->
<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.dropkick-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script src="js/video.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
	$(function () {
		$('.default').dropkick();
	});
</script>
</head>

<body>
<div class="w">
	<div id="header">
		<h1><a href="index.php">Movie Square</a></h1>
		<div id="nav">
			<ul>
				<li><a href="index.php">Home </a></li>
				<li><a href="booking.php">Ticket Booking</a></li>
				<li class="current"><a href="movies.php">Movies</a></li>
				<li><a href="news.php">News &amp; Events</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="aboutus.php">About Us</a></li>
			</ul>
		</div>
	</div>

	<div id="filmBar"></div>

    <div id="main">

		<div id="content">
			<div class="padding">
				<div id="article">
					<center><h1><a href="#"><?php echo $movie['title'];?></h1></a></center>
					<!--<div class="itemInfo small">
						<a href="news.php">News & Event</a>
						<span>20:00 Thurday, 15/5/2012</span>
						<span>HITS: 1082</span>
						<a href="#comment">Leave Comment</a>
					</div>-->

					<div class="moviePoster padding">
						<img src="media/movies/<?php echo $movie['alias'];?>/poster_portrait.jpg"/>
						<center>
						<?php if (strpos($movie['class'],'movie_now_showing') !== false) {
							echo '<a href="booking.php?movie_id=' . $movie['id'] . '" class="button">Book now</a>';
						} ?>						
						&nbsp;
						<a href="#movie_trailer" class="button">Watch Trailer</a>
						</center>
					</div>

					<div class="clr"></div>

					<div class="itemSapo">
						<?php echo $movie['short_description'];?>
					</div>

					<div class="movieTrailer" id="movie_trailer">
					<center>
						<video class="video-js vjs-default-skin" controls
							preload="auto" width="640" height="360" poster="media/movies/<?php echo $movie['alias'];?>/poster_landscape.jpg"
							data-setup="{}">
							<source type="video/mp4" src="media/movies/<?php echo $movie['alias'];?>/trailer.mp4">
							<source type="video/webm" src="media/movies/<?php echo $movie['alias'];?>/trailer.webm">
						</video>
					</center>
					</div>

					<div class="itemText">
						<?php echo $movie['description'];?>
					</div>

					<!--<h1>Tags</h1>
					<div class="itemTags">
						<a href="#">Feugiat mauris</a><a href="#">adipiscing magna</a><a href="#">nunc magna</a><a href="#">tellus egestas</a>
					</div>-->

					<br />
					<h1>Latest Articles</h1>
					<ul class="itemLatest">
						<li><a href="#">Aliquam tempus, elit eget   vehicula aliquam</a></li>
						<li><a href="#"> Scelerisque eleifend magna   metus sit amet dui. </a></li>
						<li><a href="#">Aenean sollicitudin, urna eu fermentum commodo</a></li>
						<li><a href="#">Eros enim tincidunt lacus, ut ultricies nisl felis sed purus. </a></li>
						<li><a href="#">Nulla   eleifend est at mauris accumsan. </a></li>
						<li><a href="#"> Vestibulum id libero sed magna tempus rhoncus a quis   augue</a></li>
					</ul>

					<h1>Comment</h1>
					<div class="itemComment" id="comment">
						Under Construction
					</div>
				</div>
			</div>
		</div>

    	<!-- SIDE BAR-->
    	<?php include('sidebar.php');?>

		<div class="clr"></div>
	</div>

	<div id="filmBarGrey"></div>

    <div id="footer">
    	<ul>
			<li><a href="index.php">Home </a></li>
			<li><a href="booking.php">Ticket Booking</a></li>
			<li class="current"><a href="movies.php">Movies</a></li>
			<li><a href="news.php">News &amp; Events</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="aboutus.php">About Us</a></li>
		</ul>

		<h3>Movie Square Entertainment Jsc &copy; Copyright 2012</h3>
		<p>Address: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua<br />
Phone: 123-123456 | Fax: 123-123456 | Email: contact@moviesquare.com</p>

		<div class="socialIcons">
			<a href="#" title="Find us on Facebook"><img src="images/facebook.png" /></a><a href="#" title="Follow us on Twitter"><img src="images/twitter.png" /></a><a href="#" title="Your Channel on Youtube"><img src="images/youtube.png" /></a><a href="#" title="Get RSS Feeds"><img src="images/rss.png" /></a>
		</div>
	</div>
</div>
</body>
</html>
