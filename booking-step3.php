<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	$movie_id = $_POST['movie_id'];
	$room_id = $_POST['room_id'];
	$show_time = $_POST['show_time'];
	$seats = json_decode($_POST['seats'], true);
	
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
		<div class="currentStep" style="width:75%">
			<span>Information & Payment</span>
		</div>
		<div class="progressStatus">Progress 75%</div>
	</div>

    <div id="main">
		<div id="content">
			<div class="padding">
				<div class="box">
					<form id="movie_booking" action="booking-step4.php" method="post">
						<h1>Information</h1>
						<table class="formTable">
							<tr>
								<td class="formLabel"><label for="yourname">Your Name (*)</label></td>
								<td class="formBody"><input name="yourname" id="yourname" type="text" class="inputbox wide" placeholder="someone"//></td>
							</tr>
							<tr>
								<td class="formLabel"><label for="email">Email (*)</label></td>
								<td class="formBody"><input name="email" id="email" type="text" class="inputbox wide" placeholder="someone@email.com"/></td>
							</tr>
							<tr>
								<td class="formLabel"><label for="phone">Phone (*)</label></td>
								<td class="formBody"><input name="phone" id="phone" type="text" class="inputbox" /></td>
							</tr>
							<tr>
								<td class="formLabel">Payment Methods</td>
								<td class="formBody paymentSelector">
									<label><input type="radio" name="payment" value="visa" id="visa" onclick="updatePayment();"/>VISA Card, Master Card, Credit Card</label>
									<label><input type="radio" name="payment" value="booth" id="booth" onclick="updatePayment();"/>Ticket Booth (30 mins before show time)</label>
									<label><input type="radio" name="payment" value="delivery" id="delivery" checked="checked" onclick="updatePayment();"/>On Delivery</label>
									<label><input type="radio" name="payment" value="internet" id="internet" onclick="updatePayment();"/>Internet Banking</label>
								</td>
							</tr>
						</table>

						<div id="visa_card_payment" hidden="display">
						<h2>VISA CARD PAYMENT</h2>
						<table class="formTable">
							<tr>
								<td class="formLabel"><label for="cardnumber">Card Number</label></td>
								<td class="formBody"><img src="images/creditcard.jpg" align="right"/><input id="cardnumber" type="text" class="inputbox" /></td>
							</tr>
							<tr>
								<td class="formLabel"><label for="cardname">Name</label></td>
								<td class="formBody"><input id="cardname" type="text" class="inputbox" /></td>
							</tr>
							<tr>
								<td class="formLabel"><label for="cardcvv">CCV Number</label></td>
								<td class="formBody"><input id="cardcvv" type="text" class="inputbox short" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.cvvnumber.com/cvv.html" target="_blank">What is my CVV code?</a></td>
							</tr>
							<tr>
								<td class="formLabel"><label for="carddate">Expired Date</label></td>
								<td class="formBody"><input id="carddate" type="text" class="inputbox short" placeholder="dd/mm/yyyy"/></td>
							</tr>
			            </table>
						</div>
						
						<input type="hidden" name="movie_id" value="<?php echo $show['movie_id']; ?>"/>
						<input type="hidden" name="room_id" value="<?php echo $show['room_id']; ?>"/>
						<input type="hidden" name="show_time" value="<?php echo $show['show_time']; ?>"/>
						<input type="hidden" name="seats" value='<?php echo $_POST['seats']; ?>'/>
					</form>
				  
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					<button onclick="back();" class="button">Back</button>
					<button onclick="process();" class="button">I agree & confirm this step</button>						
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
							<li class="yourSeats">
							<?php 
							$vip = 0; $standard = 0;
							$last_row_id = $seats[0]['rowId'];
							foreach ($seats as $seat) {
								if ($last_row_id != $seat['rowId'])
									echo '<br />';
							
								if ($seat['type'] == "vip") {
									echo '<span class="vip">' . $seat['rowId'] . '' . $seat['colId'] . '</span>';
									$vip++;
								} else {
									echo '<span class="standard">' . $seat['rowId'] . '' . $seat['colId'] . '</span>';
									$standard++;
								}
								
								$last_row_id = $seat['rowId'];
							} ?>
							</li>
							
							<li class="ticketStandard"><span class="label">Standard (x<?php echo $standard; ?>)</span><?php echo $standard*30;?>$</li>
							<li class="ticketVIP"><span class="label">VIP (x<?php echo $vip; ?>)</span><?php echo $vip*100;?>$</li>
							<li class="ticketVAT"><span class="label">VAT (10%)</span><?php echo ($standard*30 + $vip*100)/10; ?>$</li>
							<li class="ticketTotal"><span class="label">Total</span><?php echo ($standard*30 + $vip*100)*11/10; ?>$</li>
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

// Back to last step
function back() {
	if (confirm("Are you sure?") == false)
		return false;
	
	$("#movie_booking").attr("action", "booking-step2.php");
	$("#movie_booking").submit();
}

// Process form
function process() {
	o = $("#yourname");
	regex = /^([a-zA-z\s]{2,})$/;
	if (o.val() == "") {
		alert("You haven't enter your name!");
		return false;
	}
	if (!regex.test(o.val())) {
		alert("The name you entered is invalid!");
		return false;
	}

	o = $("#email");
	regex = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
	if (o.val() == "") {
		alert("You haven't enter your email address!");
		return false;
	}
	if (!regex.test(o.val())) {
		alert("The email address you entered is invalid!");
		return false;
	}

	o = $("#phone");
	//regex = /^[0-9]{7,12}$/;
	if (o.val() == "") {
		alert("You haven't enter your phone number!");
		return false;
	}
	/*if (!regex.test(o.val())) {
		alert("The phone number you entered is invalid!");
		return false;
	}*/

	if ($(".paymentSelector input[type=radio]:eq(0)").attr("checked") == "checked") {
		o = $("#cardnumber");
		regex = /\b(?:\d[ -]*?){13,16}\b/;
		if (o.val() == "") {
			alert("You haven't enter your Visacard number!");
			return false;
		}
		if (!regex.test(o.val())) {
			alert("The Visacard number you entered is invalid!");
			return false;
		}

		o = $("#cardname");
		regex = /^([a-zA-z\s]{2,})$/
		if (o.val() == "") {
			alert("You haven't enter your card name!");
			return false;
		}
		if (!regex.test(o.val())) {
			alert("The card name you entered is invalid!");
			return false;
		}

		o = $("#cardcvv");
		regex = /^[0-9]{3,4}$/;
		if (o.val() == "") {
			alert("You haven't enter your card CCV number!");
			return false;
		}
		if (!regex.test(o.val())) {
			alert("The card CCV number you entered is invalid!");
			return false;
		}

		o = $("#carddate");
		regex = /^([0]?[1-9]|[1|2][0-9]|[3][0|1])\/([0]?[1-9]|[1][0-2])\/([0-9]{4}|[0-9]{2})$/;
		if (o.val() == "") {
			alert("You haven't enter your card expired date!");
			return false;
		}
		if (!regex.test(o.val())) {
			alert("The expired date you entered is invalid!");
			return false;
		}
	}
	
	$("#movie_booking").attr("action", "booking-step4.php");
	$("#movie_booking").submit();
	return true;
}

updatePayment();

function updatePayment() {
	if ($("#visa:checked").length) {			
		$("#visa_card_payment").show(300);
		return;
	}
	$("#visa_card_payment").hide(300);
}
</script>
</body>
</html>
