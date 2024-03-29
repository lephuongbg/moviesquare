<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	include_once 'core/database.php';
	$db = new MS_Database();
	$order_id = $_POST['order_id'];
	
	if (!$order_id) {
		// 404 Redirect
		header('Location: booking.php');
	}

	$query = "SELECT o.*, s.`movie_id`, s.`room_id`, s.`show_time`, m.`title` AS `movie_title`, m.`alias` AS `movie_alias` FROM Orders AS o"
			. " JOIN Shows AS s ON o.`show_id` = s.`id`"
			. " JOIN Movies AS m ON s.`movie_id` = m.`id`"
			. "WHERE o.`id` = " . $order_id;
	$order = $db->query($query);
	
	$movie_id = $order['movie_id'];
	$room_id = $order['room_id'];
	$show_time = DateTime::createFromFormat('Y-m-d H:i:s', $order['show_time']);
	$seats = json_decode($order['seats'], true);	
	$yourname = $order['customer'];
	$email = $order['email'];
	$phone = $order['tel'];
	$payment = $order['payment'];
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
		<div class="currentStep" style="width:100%">
			<span>Completed</span>
		</div>
		<div class="progressStatus">Progress 100%</div>
	</div>

	<div id="main">

		<div class="padding">
			<div class="box">
			<h1>Thank you for using our services</h1>
			<table class="ticketInfo">
				<tr>
					<td width="120">Movie</td><td width="200"><b><?php echo $order['movie_title']; ?></b></td>
					<td rowspan="5" width="150" align="right" valign="top" class="ticketCode"><!--NH3JW2K--></td>
				</tr>
				<tr>
					<td>Date</td><td><b><?php echo $show_time->format('d/m/Y'); ?></b></td>
				</tr>
				<tr>
					<td>Time</td><td><b><?php echo $show_time->format('H:i'); ?></b></td>
				</tr>
				<tr>
					<td>Seat Numbers</td>
					<td><b>
					<?php 
					foreach ($seats as $seat) {
						echo $seat['rowId'] . '' . $seat['colId'] . ', ';
					} ?>
					</b></td>
				</tr>
				<tr>
					<td>Total Price</td>
					<td><b>$<?php echo $order['price'];?></b> 
					<?php					
					switch($payment) {
						case 'visa':
							echo ' (VISA Card)';
							break;
						case 'booth':
							echo ' (Ticket Booth)';
							break;
						case 'delivery':
							echo ' (Delivery)';
							break;
						case 'internet':
							echo ' (Internet Banking)';
							break;
						}
					?>
					</td>
				</tr>
			</table>

			<table class="userInfo">
				<tr>
					<td width="120">Your Name</td>
					<td width="370"><?php echo $yourname; ?></td>
				</tr>
				<tr>					
					<td>Email</td>
					<td><?php echo $email; ?></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><?php echo $phone; ?></td>
				</tr>
				<?php if($order['payment'] == "visa") { ?>
				<tr>
					<td>Card Number</td>
					<td><?php echo $order['card_no']; ?></td>
				</tr>
				<tr>
					<td>Card Name</td>
					<td><?php echo $order['card_name']; ?></td>
				</tr>
				<tr>
					<td>Card CVV</td>
					<td><?php echo $order['card_cvv']; ?></td>
				</tr>
				<tr>
					<td>Expired Date</td>
					<td><?php echo DateTime::createFromFormat('Y-m-d', $order['card_expired_date'])->format('d/m/Y'); ?></td>
				</tr>
				<?php } ?>
			</table>
			
			<p>A copy has been sent to your email, please check carefully that order details are all correct. If there is any question, you can reach out for us <a href="aboutus.php">here</a></p>
			
			<button onclick="location.href='index.php';" class="button">Confirm</button>
			<button onclick="prompt('Email Address', '');" class="button">Send me another email</button>
			</div>
		</div>
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
