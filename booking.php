<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php	
	include_once 'core/database.php';
	$db = new MS_Database();
	$movies_now_showing = $db->callProcedure('selectMoviesNowShowing');
	$schedules = $db->callProcedure('selectSchedules');

	$movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 0;
	$date_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
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
			<a <?php if ($date_filter == '') echo 'class="selected"';?>>Display all</a>
			<a <?php if ($date_filter == 'date_today') echo 'class="selected"';?>>Today</a>
			<a <?php if ($date_filter == 'date_3days') echo 'class="selected"';?>>Next three days</a>
			<a <?php if ($date_filter == 'date_7days') echo 'class="selected"';?>>This week</a>			
		</div>
	</div>

    <div id="main">

    	<div id="content">
			<div class="padding">
				<h1>Movie Schedule</h1>
				<?php
				try{
				$today = new DateTime('15-03-2013');
				}
				catch(Exception $e)
				{}

								/*$current_movie = null;
				$current_date = null;
				
				foreach ($schedules as $s) {
					$show_time = DateTime::createFromFormat('Y-m-d H:i:s', $s['show_time']);
					
					if ($current_movie = null) {
						
					} elseif {$current_movie 1= $s['movie_id']} {
						
					}
					

					if ($s['movie_id'] == $movie['id']) {
						$dayDiff = $show_time->diff($today)->d;

						if ($last_date->diff($show_time)->d != 0) {
							echo '<div class="showDate ' . ( ($dayDiff == 0) ?  'date_1 ' : ' ' ) . ( ($dayDiff >= 0 && $dayDiff <= 2) ?  'date_3 ' : ' ' ) . ( ($dayDiff >= 0 && $dayDiff <= 6) ?  'date_7 ' : ' ' ) .'" >' . $show_time->format('d/m/Y');
							echo '<span class="showTime"><a onclick="process(\'' . $s['movie_id'] . '\', \'' . $s['room_id'] . '\', \'' . $s['show_time'] . '\')">' . $show_time->format('H:i') . '</a></span>';
							echo '</div>';
						} else {
							echo '<span class="showTime"><a onclick="process(\'' . $s['movie_id'] . '\', \'' . $s['room_id'] . '\', \'' . $s['show_time'] . '\')">' . $show_time->format('H:i') . '</a></span>';
						}									
					}
					
					$last_date = $show_time->format('d-m-Y');
				}*/
				
				foreach ($movies_now_showing as $movie) {						
					echo '<div id="movie_' . $movie['id'] . '" class="box mod movieBox">';
						echo '<a href="movie.php?id=' . $movie['id'] . '"><h1>' . $movie['title'] . '</h1></a>';
						
						foreach ($schedules as $s) {
							$show_time = DateTime::createFromFormat('Y-m-d H:i:s', $s['show_time']);
							

							if ($s['movie_id'] == $movie['id']) {
								$dayDiff = $show_time->diff($today)->d;
								
								echo '<div class="showDate ' . ( ($dayDiff == 0) ?  'date_today ' : ' ' ) . ( ($dayDiff >= 0 && $dayDiff <= 2) ?  'date_3days ' : ' ' ) . ( ($dayDiff >= 0 && $dayDiff <= 6) ?  'date_7days ' : ' ' ) .'" >' . $show_time->format('d/m/Y');
								echo '<span class="showTime"><a onclick="process(\'' . $s['movie_id'] . '\', \'' . $s['room_id'] . '\', \'' . $s['show_time'] . '\')">' . $show_time->format('H:i') . '</a></span>';
								echo '</div>';								
							}
						}
					echo '</div>';
				}
			
				?>

				<!-- Hidden form -->
				<form id="movie_booking" action="booking-step2.php" method="post">
					<input type="hidden" name="movie_id" />
					<input type="hidden" name="room_id" />
					<input type="hidden" name="show_time" />
				</form>
			</div>


		</div>

    	<div id="sidebar">
			<div class="padding">
				<div class="box">
					<h3>Select movies</h3>
					<?php foreach ($movies_now_showing as $movie) {
						echo '<label>';
						echo '<input type="checkbox" class="movieCheckbox" name="movie" class="movieCheckbox" value="' . $movie['id'] . '" id="' . $movie['alias'] . '" ' . ($movie_id == $movie['id'] ? 'checked' : '') . '/>';
						echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $movie['title'] . '</label><br />';
					}
					?>
					<div class="clr"></div>
				</div>
			</div>
		</div>

		<div class="clr"></div>
    </div>

    <div id="filmBarGrey"></div>

    <div id="footer">
    	<ul>
			<li><a href="index.php">Home </a></li>
			<li class="current"><a href="booking.php">Ticket Booking</a></li>
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
$(".movieBox").hide();
$(".movieCheckbox:checked").each(function() {
	var movie_id = $(this).val();
	$(".movieBox#movie_" + movie_id).show();
});

$(".movieCheckbox").change(function() {
	var movie_id = $(this).val();

	if ($(this).attr("checked")) {
		$(".movieBox#movie_" + movie_id).slideDown(300);
	} else {
		$(".movieBox#movie_" + movie_id).slideUp(300);
	}
});

var selectedClass = "<?php echo $date_filter;?>";
if (selectedClass != "") {
	$(".showDate").hide();
	$(".showDate." + selectedClass).show();
}

$(".dateTabs a").click(function() {
	var o = $(this);
	selectedClass = "";
	$(".dateTabs a").removeClass("selected");
	o.addClass("selected");;
	switch (o.html().toLowerCase()) {
		case "today":
			selectedClass = "date_today";
			break;
		case "next three days":
			selectedClass = "date_3days";
			break;
		case "this week":
			selectedClass = "date_7days";
			break;
		default:
			selectedClass = "";
			break;
	}

	if (selectedClass != "") {
		$(".showDate:not(." + selectedClass + ")").slideUp("fast", function() {
			$(this).hide();
		});		
		$(".showDate." + selectedClass).slideDown("fast");		
	} else {
		$(".showDate").slideDown("fast");
	}
})

function process(movieId, roomId, showTime) {
	$("[name=movie_id]").val(movieId);
	$("[name=room_id]").val(roomId);
	$("[name=show_time]").val(showTime);
	$("#movie_booking").submit();
}
</script>
</body>
</html>