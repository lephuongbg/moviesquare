<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once 'core/database.php';
$db = new MS_Database();
$movies_now_showing = $db->callProcedure('selectMoviesNowShowing');
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
				<div id="article">
					<h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h1>
					<div class="itemInfo small">
						<a href="news.php">News & Event</a>
						<span>20:00 Thurday, 15/5/2012</span>
						<span>HITS: 1082</span>
						<a href="#comment">Leave Comment</a>
				</div>

				<div class="itemImage">
					<img src="images/news/keira_knightley_chanel1.jpg" />
				</div>

				<div class="itemSapo">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium   dui id erat dapibus pulvinar. Duis et nulla diam, vel congue augue. Nunc   faucibus gravida ipsum, non euismod nisi sollicitudin sed. Mauris   tempus urna ac quam vestibulum gravida. Aliquam porttitor vehicula leo   vitae tempus.</p>
				</div>

				<div class="itemText">
					<!-- Begin content -->
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium   dui id erat dapibus pulvinar. Duis et nulla diam, vel congue augue. Nunc   faucibus gravida ipsum, non euismod nisi sollicitudin sed. Mauris   tempus urna ac quam vestibulum gravida. Aliquam porttitor vehicula leo   vitae tempus. Suspendisse mollis pulvinar nunc, eget luctus metus   faucibus sit amet. Pellentesque sodales sapien blandit nisl condimentum   vel ornare arcu lacinia. Sed non nibh sed nisi pulvinar dignissim. Donec   a elementum dui. Cras magna magna, euismod id malesuada et, pharetra   nec enim. Maecenas fringilla lorem vitae quam sodales eget hendrerit   eros hendrerit. </p>
					<p> Nam nulla arcu, aliquet vitae faucibus vel, faucibus sed eros. Donec   mattis, arcu vitae tristique ornare, magna justo accumsan odio, sit amet   eleifend ipsum justo sagittis nulla. Aliquam commodo viverra sem, nec   sagittis lectus dapibus et. Donec egestas ultricies tortor at feugiat.   Maecenas egestas consequat viverra. Vivamus dolor nibh, hendrerit   lobortis porta vitae, commodo a lorem. Aliquam tempus, elit eget   vehicula aliquam, lectus sapien ornare ipsum, scelerisque eleifend magna   metus sit amet dui. Aenean sollicitudin, urna eu fermentum commodo,   eros enim tincidunt lacus, ut ultricies nisl felis sed purus. Nulla   eleifend est at mauris accumsan vel feugiat mauris dictum. Morbi sed   adipiscing magna. Vestibulum id libero sed magna tempus rhoncus a quis   augue. Proin sed bibendum sem. Cras diam quam, iaculis vitae pharetra   at, fringilla ut leo. Sed nunc magna, hendrerit eu congue at,   scelerisque sed orci. Fusce eget erat id tellus egestas eleifend. </p>
					<h3>Duis ac ipsum dui, vel congue risus. </h3>
					<p>In hendrerit, nibh sit amet aliquam   mollis, leo ipsum molestie augue, a tincidunt turpis neque ut nulla.   Nam pharetra tellus risus. Nullam sed massa erat. Integer ac nibh at   elit hendrerit tristique in vitae tellus. Quisque nec velit at enim   tristique gravida. Nam at lectus nulla. Fusce sit amet ligula mi, a   lobortis augue. Nullam nec aliquam ligula. Class aptent taciti sociosqu   ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in   quam id justo pulvinar tempus. </p>
					<h3>Donec tristique ipsum vitae sapien feugiat sagittis rhoncus orci  </h3>
					<p>Nunc vitae purus quam. Donec id lacus orci. Sed a ante lectus.   Vestibulum tortor est, facilisis vel luctus vitae, adipiscing id magna.   Nullam et felis a tellus dignissim molestie. Pellentesque vulputate   mauris at neque interdum gravida. Aliquam erat volutpat. Ut nisi nunc,   consequat sagittis congue imperdiet, pellentesque in diam. Lorem ipsum   dolor sit amet, consectetur adipiscing elit. </p>
					<p>In hendrerit, nibh sit amet aliquam   mollis, leo ipsum molestie augue, a tincidunt turpis neque ut nulla.   Nam pharetra tellus risus. Nullam sed massa erat. Integer ac nibh at   elit hendrerit tristique in vitae tellus. Quisque nec velit at enim   tristique gravida. Nam at lectus nulla. Fusce sit amet ligula mi, a   lobortis augue. Nullam nec aliquam ligula. Class aptent taciti sociosqu   ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in   quam id justo pulvinar tempus. </p>
					<ul>
						<li> Cum sociis natoque penatibus et magnis dis parturient montes.</li>
						<li>Nunc tortor enim, iaculis quis elementum nec.</li>
						<li> Cras in ante laoreet ipsum tincidunt pretium. </li>
						<li>Duis dapibus   aliquam dapibus. </li>
					</ul>
					<p>Pellentesque non arcu tellus. Donec euismod elementum   tellus, luctus auctor nunc congue eu. Ut scelerisque nulla vitae mi   gravida rhoncus. </p>
					<h3>Maecenas egestas consequat viverra.</h3>
					<p> Nam nulla arcu, aliquet vitae faucibus vel, faucibus sed eros. Donec   mattis, arcu vitae tristique ornare, magna justo accumsan odio, sit amet   eleifend ipsum justo sagittis nulla. Aliquam commodo viverra sem, nec   sagittis lectus dapibus et. Donec egestas ultricies tortor at feugiat.   Maecenas egestas consequat viverra. Vivamus dolor nibh, hendrerit   lobortis porta vitae, commodo a lorem. Aliquam tempus, elit eget   vehicula aliquam, lectus sapien ornare ipsum, scelerisque eleifend magna   metus sit amet dui. Aenean sollicitudin, urna eu fermentum commodo,   eros enim tincidunt lacus, ut ultricies nisl felis sed purus. Nulla   eleifend est at mauris accumsan vel feugiat mauris dictum. Morbi sed   adipiscing magna. Vestibulum id libero sed magna tempus rhoncus a quis   augue. Proin sed bibendum sem. Cras diam quam, iaculis vitae pharetra   at, fringilla ut leo. Sed nunc magna, hendrerit eu congue at,   scelerisque sed orci. Fusce eget erat id tellus egestas eleifend. </p>
					<!-- End content -->
                </div>

				<h1>Tags</h1>
				<div class="itemTags">
					<a href="#">Feugiat mauris</a><a href="#">adipiscing magna</a><a href="#">nunc magna</a><a href="#">tellus egestas</a>
				</div>

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
</body>
</html>
