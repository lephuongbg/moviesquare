<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	include_once 'core/database.php';
	$db = new MS_Database();
	$room_id = $_POST['room_id'];
	$show_time = $_POST['show_time'];	
	if (!$room_id || !$show_time) {
		// 404 Redirect
		header('Location: booking.php');
	}
	
	$query = "SELECT * FROM Shows WHERE show_time LIKE '" . $show_time . "' AND room_id LIKE '" . $room_id . "'";
	$show = $db->query($query);
	$show_id = $show['id'];
	
	$seats = json_decode($_POST['seats'], true);
	$price = 0;
	$seat_labels = array();	
	foreach ($seats as $seat) {
		$seat_labels[] = $seat['rowId'] . $seat['colId'];
		if ($seat['type'] == "vip") {							
			$price += 100;
		} else {
			$price += 30;
		}
	}
	$price = $price * 11 / 10;
	
	$order['status'] = 'pending';
	$order['show_id'] = $show_id;
	$order['seats'] = $_POST['seats'];
	$order['price'] = $price;
	$order['customer'] = $_POST['yourname'];
	$order['email'] = $_POST['email'];
	$order['tel'] = $_POST['phone'];
	$order['payment'] = $_POST['payment'];
	
	if ($order['payment'] == "visa") {
		$order['card_no'] = $_POST['cardnumber'];
		$order['card_name'] = $_POST['cardname'];
		$order['card_cvv'] = $_POST['cardcvv'];
		$order['card_expired_date'] = DateTime::createFromFormat('d/m/Y', $_POST['carddate'])->format('Y-m-d');
	}
	
	$order_id = $db->storeArray($order, 'Orders');
	$error = (bool) $db->getError();
	
	//$show['booked'] = json_encode(array_unique(array_merge($show['booked'] ? json_decode($show['booked'], true) : array(), $seat_labels), SORT_STRING));
	//$show_id = $db->storeArray($show, 'Shows');	
	//$error = $error || (bool) $db->getError();
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
	<form id="form" action="booking-step4.php" method="POST">
		<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
	</form>
	
	<?php if (!$error) { ?>
		<script type="text/javascript">
			document.getElementById('form').submit();
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("An error has occured!");
			window.location.href = "booking.php";
		</script>
	<?php } ?>
<?php echo $db->getError(); ?>
</body>
</html>
