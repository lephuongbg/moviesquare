<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	$db = new mysqli('localhost', 'root', 'herozero', 'moviesquare');
	// check connection
	if (mysqli_connect_errno()) {
		die('Counld not connect: '. mysqli_connect_error());
	}

	if ($result = $db->query('call selectMoviesNowShowing();')) {
		$movies_now_showing = array();
		while($row = $result->fetch_assoc()) {
			$movies_now_showing[] = $row;
		}

		$result->close();
	} else {
		die($db->error);
	}
	
	$db->close();
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
				<li><a href="index.php">Home </a></li>
				<li><a href="booking.php">Ticket Booking</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li class="current"><a href="news.php">News &amp; Events</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="aboutus.php">About Us</a></li>
			</ul>
		</div>
	</div>

	<div id="filmBar"></div>
	
    <div id="main">
	
		<div id="content">
			<div class="padding">
				<div id="category">
					<h1>News & Events</h1>
					
					<div class="itemList">
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news6.jpg" /></a>
							<h2><a href="content.php">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<a class="button" href="content.php">Read more</a>
						</div> 
						
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news5.jpg" /></a>
							<h2><a href="content.php">Sed ut perspiciatis unde omnis iste natus error </a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
							<a class="button" href="content.php">Read more</a>
						</div> 
						
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news4.jpg" /></a>
							<h2><a href="content.php">Neque porro quisquam est</a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet reprehenderit qui in ea voluptate reprehenderit qui in ea voluptate.</p>
							<a class="button" href="content.php">Read more</a>
						</div> 
						
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news3.jpg" /></a>
							<h2><a href="content.php">Quis autem vel eum iure reprehenderit </a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
							<a class="button" href="content.php">Read more</a>
						</div> 
						
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news2.jpg" /></a>
							<h2><a href="content.php">Velit esse quam nihil molestiae consequatur,</a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae ea commodi consequatur ea commodi consequatur ea commodi consequatur.</p>
							<a class="button" href="content.php">Read more</a>
						</div> 
						
						<div class="itemBox">
							<a href="content.php"><img src="images/news/news1.jpg" /></a>
							<h2><a href="content.php">Excepteur sint occaecat cupidatat non proident</a></h2>
							<div class="small">20:00 Thurday, 15/5/2012</div>
							<p>Ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae reprehenderit qui in ea voluptate reprehenderit qui in ea voluptate</p>
							<a class="button" href="content.php">Read more</a>
						</div>
					</div>
					
					<div class="pagination">
						<ul>
							<li><a href="#">Start</a></li>
							<li><a href="#">Prev</a></li>
							<li class="current"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
							<li><a href="#">End</a></li>    
					   </ul>                        
					</div>
				</div>
			</div>
		</div>
		
    	<div id="sidebar">
			<div class="padding">
			<div id="quickBooking" class="box mod">
			<div class="ticketIcon"></div>
			<h3>Get Ticket</h3>

			<select name="movie" class="default" tabindex="1">
				<option value="">Select Movie</option>
				<?php 
				foreach ($movies_now_showing as $movie) {
					echo '<option value="' . $movie['alias'] . '">' . $movie['title'] . '</option>';
				}
				?>
			</select>

			<select name="date" class="default" tabindex="1">
				<option value="d1">Today</option>
				<option value="d2">Next Three Days</option>
				<option value="d3">This Week</option>
				<option value="d6">All</option>
			</select>

			<button class="button">Search Now</button>

			<p><a href="movies.php?filter=movie_now_showing">Now Showing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="movies.php?filter=movie_coming_soon">Coming Soon</a></p>
			<div class="clr"></div>
				</div>
				<div id="ad1" class="mod last">
					<a href="#"><img src="images/ad1.jpg" /></a>
				</div>
			</div>
		</div>
		
        <div class="clr"></div>    	
    </div>
	
    <div id="filmBar"></div>

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
</body>
</html>
