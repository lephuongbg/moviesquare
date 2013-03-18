<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	include_once 'core/database.php';
	$db = new MS_Database();
	$movies = $db->callProcedure('selectMovies');
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

<!-- Custom CSS -->
<link href="css/ms.css" rel="stylesheet" type="text/css" />

<!-- Javascript and JQuery -->
<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.dropkick-1.0.0.js" type="text/javascript" charset="utf-8"></script>
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
				<li class="current"><a href="index.php">Home </a></li>
				<li><a href="booking.php">Ticket Booking</a></li>
				<li><a href="movies.php">Movies</a></li>
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
				<div id="slider">
					<a href="content.php"><img src="images/slideImg.jpg" /></a>
					<h2><a href="content.php">Madagascar 3: Europe’s most wanted</a></h2> <!-- TODO: get data from DB -->
					<p>
						Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
					</p>					
				</div>
			</div>
		</div>

		<!-- SIDE BAR -->
    	<?php include('sidebar.php');?>

        <div class="clr"></div>
    </div>

    <div id="filmBar"></div>

	<div id="movieBox">
		<div class="movieTabs">
			<a class="selected">Now Showing</a>
			<a >Featured by Movie Square</a>
			<a >Coming Soon</a>			
		</div>

		<div class="movieGrid">
			<?php // Load all movies
			foreach ($movies as $key => $movie ) {
				if (($key + 1) % 5 == 0) {
					echo '<div class="movieCell last ' . $movie['class'] . '">';
				} else {
					echo '<div class="movieCell ' . $movie['class'] . '">';
				}					
					echo '<a href="booking.php?movie_id=' . $movie['id'] . '"><img src="media/movies/' . $movie['alias'] , '/poster_portrait.jpg" /></a>';
					
					echo '<div class="hoverBox" onclick="location.href=\'movie.php?id=' . $movie['id'] . '\';">';
						echo '<a href="movie.php?id=' . $movie['id'] . '" class="button">Preview</a>';
						if (strpos($movie['class'],'movie_now_showing') !== false) {
							echo '<a href="booking.php?movie_id=' . $movie['id'] . '" class="button">Book now</a>';
						}
					echo '</div>';
					
					echo '<div class="movieName"><a href="movie.php?id=' . $movie['id'] . '">' . $movie['title'] . '</a></div>';
				echo '</div>';
			}
			?>
			
			<div class="clr"></div>
		</div>
	</div>
	
	<div id="filmBarDark"></div>

	<div id="newsBox">
		<h3 class="boxTitle">News & Events</h3>
		<div class="itemGrid">
			<div class="itemCell">
				<a href="content.php">
					<img src="images/news/news6.jpg" />
				</a>
				<h3><a href="content.php">Lorem ipsum dolor sit amet, consectetur</a></h3>
				<p>
					Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .
				</p>
				<a href="content.php" class="button">Read more</a>
			</div>
			
			<div class="itemCell">
				<a href="content.php">
					<img src="images/news/news7.jpg" />
				</a>
				<h3><a href="content.php">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h3>
				<p>
					Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .
				</p>
				<a href="content.php" class="button">Read more</a>
			</div>
			
			<div class="itemCell">
				<a href="content.php">
					<img src="images/news/news5.jpg" />
				</a>
				<h3><a href="content.php">Lorem ipsum dolor sit amet, consectetur</a></h3>
				<p>
					Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .
				</p>
				<a href="content.php" class="button">Read more</a>
			</div>
			
			<div class="itemCell">
				<a href="content.php">
					<img src="images/news/news3.jpg" />
				</a>
				<h3><a href="content.php">Quis nostrud exercitation ullamco</a></h3>
				<p>
					Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .
				</p>
				<a href="content.php" class="button">Read more</a>
			</div>
			
			<div class="clr"></div>
		</div>
	</div>
	
	<div id="filmBarGrey"></div>

    <div id="footer">
    	<ul>
			<li class="current"><a href="index.php">Home </a></li>
			<li><a href="booking.php">Ticket Booking</a></li>
			<li><a href="movies.php">Movies</a></li>
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

<script type="text/javascript">
$(".movieCell").hide();
$(".movieCell.movie_now_showing").show();

$(".movieTabs a").click(function() {
	var o = $(this);
	var selectedClass = "";
	$(".movieTabs a").removeClass("selected");
	o.addClass("selected");;
	switch (o.html().toLowerCase()) {
		case "featured by movie square":
			selectedClass = "movie_featured";
			break;
		case "now showing":
			selectedClass = "movie_now_showing";
			break;
		case "coming soon":
			selectedClass = "movie_coming_soon";
			break;
	}
	
	if (selectedClass != "") {
		$(".movieCell").hide();
		$(".movieCell").removeClass("last");
		$(".movieCell." + selectedClass).filter(function(index) {
			return (index + 1) % 5 == 0;
		}).addClass("last");
		$(".movieCell." + selectedClass).fadeIn(500, "linear");	
	} else {
		$(".movieCell").hide();
		$(".movieCell").removeClass("last");
		$(".movieCell").filter(function(index) {
			return (index + 1) % 5 == 0;
		}).addClass("last");
		$(".movieCell").fadeIn(500, "linear");	
	}		
})
</script>
</body>
</html>
