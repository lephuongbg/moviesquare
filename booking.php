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
	
	$movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 0;
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
<link href="css/booking.css" rel="stylesheet" type="text/css" />

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
				<li class="current"><a href="booking.php">Ticket Booking</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li><a href="news.php">News &amp; Events</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="aboutus.php">About Us</a></li>
			</ul>
		</div>
	</div>

	<div id="filmBar"></div>

	<div class="progressBar">
		<div class="currentStep" style="width:25%">
			<span>Choose Movie & Time</span>
		</div>
		<div class="progressStatus">Progress 25%</div>
	</div>

	<div id="dateBox">
		<div class="dateTabs">			
			<a href="#" class="selected">Today</a>
			<a href="#">Next three days</a>
			<a href="#">This week</a>	
			<a href="#">Display all</a>			
		</div>
	</div>
				
    <div id="main">

    	<div id="content">
			<div class="padding">
				<h1>Movie Schedule</h1>
				<div id="query_result">
				</div>
			</div>
		</div>

    	<div id="sidebar">
			<div class="padding">
				<div class="box">
					<form method="post" onsubmit="return false;">
						<h3>Select movies</h3>
						<?php 
						foreach ($movies_now_showing as $movie) {
							echo '<input type="checkbox" name="movie" value="' . $movie['alias'] . '" id="' . $movie['alias'] . '" ' . ($movie_id == $movie['id'] ? 'checked' : '') . '/>';
							echo '<label for="' . $movie['alias'] . '">' . $movie['title'] . '</label><br />';
						}
						?>
						
						<!--<button class="button" id="submit_query">Search</button>-->
					</form>

					<div class="clr"></div>
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

<script type="text/javascript">
/*	today = new Date();

	$("input[name=movie]").each(function() {
		$(this).removeAttr("checked");
	});

	$("#submit_query").click(function() {
		movies = $("input[name=movie]:checked");
		if (movies.length == 0) {
			alert("You haven't choose any movie!");
			return;
		}

		// Update Schedule
		schedule = $("#query_result");
		schedule.empty();
		movies.each(function() {
			m = $(this);
			schedule.append("<div class='box mod'><h1><a href='#'>" + getTitle(m) + "</a></h1>");
			//c_query.each(function() {
				//c = $(this);
				//if (c.hasClass(m.val())) {
					//$("#query_result .box").last().append("<div class='itemBox'><h4>" + $("label[for=" + m.attr("id") + "]").html() + "</h4><br >\n");

					var i = 0, period = parseInt($(".selected").attr("id"));
					var date = today.getDate(), month = today.getMonth(), year = today.getFullYear();
					do {
						date++;
						if (date>31) {
							date -= 31;
							month++;
							if (month>12)
								year++;
						}

						$("#query_result .box").last().append("<span class='s_date'>" + date + "/" + month + "/" + year + "</span>\n" + generateTimeblock() + "<br>");
					} while (++i<period && Math.floor(Math.random()*100)<80);
				//}
			//});
		});
		schedule.append("</div>");
	});

	function generateTimeblock() {
		var html = "";
		var timeblocks = new Array("10:00", "11:30", "14:00", "16:45", "20:00", "21:30");
		for (i in timeblocks)
			if (Math.floor(Math.random()*100)<75)
				html += "<span class='s_timeblock'><a href='book-step-2.html'>" + timeblocks[i] + "</a></span>\n";
		return html;
	}

	function getTitle(o) {
		return $("label[for=" + o.attr("id") + "]").html();
	}*/
</script>
</body>
</html>