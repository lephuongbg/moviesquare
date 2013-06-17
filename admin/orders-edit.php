<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$title = ($id) ? 'Edit order' : 'New order';
require_once 'header.php';

$query = "SELECT o.*, s.`movie_id`, s.`room_id`, s.`show_time`, m.`title` AS `movie_title`, m.`alias` AS `movie_alias` FROM Orders AS o"
		. " JOIN Shows AS s ON o.`show_id` = s.`id`"
		. " JOIN Movies AS m ON s.`movie_id` = m.`id`"
		. "WHERE o.`id` = " . $id;
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

<div id="content">
	<?php include_once 'messages.php' ?>
	<?php include_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title"><?php echo $title; ?></div>
			<div class="entry">
				<form action="process.php" method="post">
					
					<div class="element">
						<label for="order-id">ID</label>
						<input id="order-id" name="order[id]" type="text" value="<?php echo $order['id']; ?>" disabled>
						<input type="hidden" name="order[id]" value="<?php echo $order['id']; ?>">
						<input type="hidden" name="order[show_id]" value="<?php echo $order['show_id']; ?>">
					</div>
					
					<div class="element">
						<label>Movie</label><?php echo $order['movie_title']; ?><div class="clear"></div>
						<label>Date</label><?php echo $show_time->format('d/m/Y'); ?><div class="clear"></div>
						<label>Seat Numbers</label><?php 
							foreach ($seats as $seat) {
								echo $seat['rowId'] . '' . $seat['colId'] . ', ';
							} ?><div class="clear"></div>
						<input type="hidden" name="order[seats]" value='<?php echo $order['seats']; ?>'>
						<label>Total Price</label>$<?php echo $order['price'];?><div class="clear"></div>
						<input type="hidden" name="order[price]" value="<?php echo $order['price']; ?>">
						<label>Payment</label><?php					
							switch($payment) {
								case 'visa':
									echo ' VISA Card';
									break;
								case 'booth':
									echo ' Ticket Booth';
									break;
								case 'delivery':
									echo ' Delivery';
									break;
								case 'internet':
									echo ' Internet Banking';
									break;
								}
							?>
						<input type="hidden" name="order[payment]" value="<?php echo $order['payment']; ?>">
					</div>
					
					<div class="element">
						<label>Customer</label><?php echo $order['customer']; ?><div class="clear"></div>
						<input type="hidden" name="order[customer]" value="<?php echo $order['customer']; ?>">
						<label>Email</label><?php echo $order['email']; ?><div class="clear"></div>
						<input type="hidden" name="order[email]" value="<?php echo $order['email']; ?>">
						<label>Phone Number</label><?php echo $order['tel']; ?><div class="clear"></div>
						<input type="hidden" name="order[tel]" value="<?php echo $order['tel']; ?>">
						<?php if($order['payment'] == "visa") { ?>
						<label>Card Number</label><?php echo $order['card_no']; ?><div class="clear"></div>
						<input type="hidden" name="order[card_no]" value="<?php echo $order['card_no']; ?>">
						<label>Card Name</label><?php echo $order['card_name']; ?><div class="clear"></div>
						<input type="hidden" name="order[card_name]" value="<?php echo $order['card_name']; ?>">
						<label>Card CVV</label><?php echo $order['card_cvv']; ?><div class="clear"></div>
						<input type="hidden" name="order[card_cvv]" value="<?php echo $order['card_cvv']; ?>">
						<label>Expired Date</label><?php echo DateTime::createFromFormat('Y-m-d', $order['card_expired_date'])->format('d/m/Y');  ?><div class="clear"></div>
						<input type="hidden" name="order[card_expired_date]" value="<?php echo $order['card_expired_date']; ?>">
						<?php } ?>
					</div>
					
					<div class="element">
						<label for="order-status">Status</label>
						<select id="order-status" name="order[status]">
							<option 
								value="pending"
								<?php if ($order['status'] == 'pending') { ?> selected<?php } ?> >
								Pending
							</option>
							<option 
								value="confirmed"
								<?php if ($order['status'] == 'confirmed') { ?> selected<?php } ?> >
								Confirmed
							</option>
							<option 
								value="canceled"
								<?php if ($order['status'] == 'canceled') { ?> selected<?php } ?> >
								Canceled
							</option>
							<option 
								value="done"
								<?php if ($order['status'] == 'done') { ?> selected<?php } ?> >
								Done
							</option>
						</select>
					</div>
					
					<input type="hidden" name="type" value="order" />
					<input type="hidden" name="mode" value="edit" />
					<div class="entry">
						<button type="submit" class="add">Save order</button> 
						<button class="cancel" onClick="location.href='orders.php'; return false;">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';