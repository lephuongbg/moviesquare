<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	$movie_id = $_POST['movie_id'];
	$room_id = $_POST['room_id'];
	$show_time = $_POST['show_time'];
	if (!$movie_id || !$room_id || !$show_time) {
		// 404 Redirect
		header('Location: booking.php');
	}

	$db = new mysqli('localhost', 'root', '', 'moviesquare');
	// check connection
	if (mysqli_connect_errno()) {
		die('Counld not connect: '. mysqli_connect_error());
	}

	if ($result = $db->query('call selectShow(' . $movie_id . ', \'' . $room_id . '\', \'' . $show_time . '\');')) {
		$show = $result->fetch_assoc();

		$result->close();
	} else {
		die($db->error);
	}

	$show_time = DateTime::createFromFormat('Y-m-d H:i:s', $show['show_time']);
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
		<div class="currentStep" style="width:50%">
			<span>Select your seats</span>
		</div>
		<div class="progressStatus">Progress 50%</div>
	</div>

    <div id="main">
    	<div id="content">
			<div class="padding">
				<div class="box">
					<h1>Select your seats</h1>

					<table id="seatMap">
						<!-- A -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">A</td>
						</tr>

						<!-- B -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">B</td>
						</tr>

						<!-- C -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td><td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">C</td>
						</tr>

						<!-- D -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">D</td>
						</tr>

						<!-- E -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">E</td>
						</tr>

						<!-- F -->
						<tr>
							<td class="invalid"></td><td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td><td class="invalid"></td>
							<td class="nameTag">F</td>
						</tr>

						<!-- G -->
						<tr>
							<td class="invalid"></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="invalid"></td>
							<td class="nameTag">G</td>
						</tr>

						<!-- H -->
						<tr>
							<td class="invalid"></td>
							<td></td><td></td><td></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td></td><td></td><td></td>
							<td class="invalid"></td>
							<td class="nameTag">H</td>
						</tr>

						<!-- I -->
						<tr>
							<td class="invalid"></td>
							<td></td><td></td><td></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td></td><td></td><td></td>
							<td class="invalid"></td>
							<td class="nameTag">I</td>
						</tr>

						<!-- J -->
						<tr>
							<td></td><td></td><td></td><td></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td></td><td></td><td></td><td></td>
							<td class="nameTag">J</td>
						</tr>

						<!-- K -->
						<tr>
							<td></td><td></td><td></td><td></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td><td class="vip"></td>
							<td></td><td></td><td></td><td></td>
							<td class="nameTag">K</td>
						</tr>

						<!-- L -->
						<tr>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="nameTag">L</td>
						</tr>

						<!-- M -->
						<tr>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="nameTag">M</td>
						</tr>

						<!-- N -->
						<tr>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="nameTag">N</td>
						</tr>

						<!-- O -->
						<tr>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
							<td class="nameTag">O</td>
						</tr>


						<tr id="">
							<td class="nameTag">1</td><td class="nameTag">2</td><td class="nameTag">3</td><td class="nameTag">4</td><td class="nameTag">5</td>
							<td class="nameTag">6</td><td class="nameTag">7</td><td class="nameTag">8</td><td class="nameTag">9</td><td class="nameTag">10</td>
							<td class="nameTag">11</td><td class="nameTag">12</td><td class="nameTag">13</td><td class="nameTag">14</td><td class="nameTag">15</td>
							<td class="nameTag">16</td><td class="nameTag">17</td><td class="nameTag">18</td><td class="nameTag">19</td><td class="nameTag">20</td>
						</tr>
					</table>

				<button onclick="back();" class="button">Back</button>
				<button onclick="reset();" class="button">Reset</button>
				<button onclick="process();" class="button">Next</button>

				<!-- Hidden form -->
				<form id="movie_booking" action="booking-step3.php" method="post">
					<input type="hidden" name="movie_id" value="<?php echo $show['movie_id']; ?>"/>
					<input type="hidden" name="room_id" value="<?php echo $show['room_id']; ?>"/>
					<input type="hidden" name="show_time" value="<?php echo $show['show_time']; ?>"/>
					<input type="hidden" name="seats" />
				</form>
			   </div>
			</div>
		</div>

		<div id="sidebar">
			<div class="padding">
				<div class="box">
					<h3>Your Ticket</h3>
					<div class="yourTicket">
						<a href="#">
							<img src="media/movies/<?php echo $show['movie_alias']; ?>/poster_portrait.jpg" />
						</a>
						<ul>
							<li><span class="label">Movie</span><?php echo $show['movie_title']; ?></li>
							<li><span class="label">Date</span><?php echo $show_time->format('d/m/Y'); ?></li>
							<li><span class="label">Time</span><?php echo $show_time->format('H:i'); ?></li>
							<li class="yourSeats"></li>
							<li class="ticketStandard"><span class="label">Standard (x0)</span>0$</li>
							<li class="ticketVIP"><span class="label">VIP (x0)</span>0$</li>
							<li class="ticketVAT"><span class="label">VAT (10%)</span>0$</li>
							<li class="ticketTotal"><span class="label">Total</span>0$</li>
						</ul>
					</div>
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

<script type="text/javascript">
var standard = 0, vip = 0;
var seats = new Array();

// Back to step 1
function back() {
	if (confirm("Are you sure?") == false)
		return;

	location.href='booking.php';
}

// Reset form
function reset() {
	seats = [];
	$("#seatMap td").removeClass("selected");
	updateSideBar();
}

// Process form
function process() {
	if (vip == 0 && standard == 0) {
		alert("You have not chosen any seat yet!");
		return;
	}

	$("#movie_booking").submit();
}

// Generate seat rowid(s) and colid(s)
$("#seatMap tr").each(function(i) {
	$(this).children("td").each(function(j) {
		o = $(this);
		if (! o.hasClass("nameTag") && ! o.hasClass("invalid"))
			o.attr("rowId", String.fromCharCode(65 + i));
			o.attr("colId", ++j);
	});
});

// When click on a seat
$("#seatMap td").click(function() {
	o = $(this);
	if (! o.hasClass("nameTag")) {
		if (o.hasClass("booked")) {
			alert("This seat is not available!");
		} else {
			var s = new Seat(o.attr("rowId"), o.attr("colId"));
			if (o.hasClass("selected")) {
				seats.splice(arrayObjectIndexOf(seats, s), 1);
				o.removeClass("selected");
			} else {
				seats.push(s);
				seats.sort(s.compare);
				o.addClass("selected");
			}
		}
		
		updateSideBar();
	}
});

function updateSideBar() {
	standard = 0; 
	vip = 0;

	$(".yourSeats").empty();
	var last_row_id = (seats.length > 0) ? seats[0].rowId : -1;
	for (i = 0; i < seats.length; i++) {
		if (last_row_id != seats[i].rowId)
			$(".yourSeats").append('<br />');
	
		if (seats[i].isVIP()) {
			$(".yourSeats").append('<span class="vip" rowId="' + seats[i].rowId + '" colId="' + seats[i].colId +'">' + seats[i].rowId + '' + seats[i].colId + '</span>');
			vip++;
		} else {
			$(".yourSeats").append('<span class="standard" rowId="' + seats[i].rowId + '" colId="' + seats[i].colId +'">' + seats[i].rowId + '' + seats[i].colId + '</span>');
			standard++;
		}
		
		last_row_id = seats[i].rowId;
	}
	
	$(".ticketStandard").html("<span class='label'>Standard (x" + standard + ")</span>" + standard*30 + "$</li>");
	$(".ticketVIP").html("<span class='label'>VIP (x" + vip + ")</span>" + vip*100 + "$</li>");
	$(".ticketVAT").html("<span class='label'>VAT (10%)</span>" + (standard*30 + vip*100)/10 + "$</li>");
	$(".ticketTotal").html("<span class='label'>Total</span>" + (standard*30 + vip*100)*11/10 + "$</li>");
	
	$(".yourSeats span").click(function() {
		o = $(this);
		var row_id = o.attr("rowId");
		var col_id = o.attr("colId")
		var s = new Seat(row_id, col_id);
		seats.splice(arrayObjectIndexOf(seats, s), 1);
		$('#seatMap td[rowId="' + row_id + '"][colId="' + col_id + '"]').removeClass("selected");
		updateSideBar();
	});
	
	$("[name=seats]").val(json_data = JSON.stringify(seats));
}

function Seat(rowId, colId) {
	this.rowId = rowId;
	this.colId = colId;

	this.isVIP = function() {
		return $('#seatMap td[rowId="' + this.rowId + '"][colId="' + this.colId + '"]').hasClass("vip");
	}

	this.equals = function(seat) {
		return this.rowId == seat.rowId && this.colId == seat.colId;
	}

	this.compare = function(a, b) {
		if (a.rowId < b.rowId)
			return -1;
		if (a.rowId > b.rowId)
			return 1;
		if (parseInt(a.colId) < parseInt(b.colId))
			return -1;
		if (parseInt(a.colId) > parseInt(b.colId))
			return 1;
		return 0;
	}
	
	this.type = this.isVIP() ? "vip" : "standard";
}

function arrayObjectIndexOf(array, searchObj) {
    for(var i = 0, len = array.length; i < len; i++) {
        if (array[i].equals(searchObj)) return i;
    }
    return -1;
}
</script>
</body>
</html>