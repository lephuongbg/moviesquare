<?php 
$title = "Orders";
require_once 'header.php';
?>

<?php
    include_once '../core/database.php';
    $db = new MS_Database();
    $query = "SELECT o.*, s.`movie_id`, s.`room_id`, s.`show_time`, m.`title` AS `movie_title`, m.`alias` AS `movie_alias` FROM Orders AS o"
			. " JOIN Shows AS s ON o.`show_id` = s.`id`"
			. " JOIN Movies AS m ON s.`movie_id` = m.`id`";
	$orders = $db->query($query, 'array');
?>
	
	<div id="content">
		<?php include_once 'messages.php'; ?>
		<?php require_once 'sidebar.php' ?>
		<div id="main">
			
			<div class="full_w">
				<div class="h_title">Manage orders</div>
				<table>
					<thead>
						<tr>
							<th scope="col">Code</th>
							<th scope="col">Information</th>
							<th scope="col">Customer</th>
							<th scope="col">Status</th>
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
						<?php foreach($orders as $o) : ?>
						<tr>						
							<td class="align-center"><?php echo $o['id']; ?></td>
							<td class="align-left">
								Movie: <?php echo $o['movie_title']; ?><br />
								Room: <?php echo $o['room_id']; ?><br />
								Time: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $o['show_time'])->format('d/m/Y'); ?><br />
								<?php $seats = json_decode($o['seats'], true); 
									$seat_labels = '';
									foreach ($seats as $seat) {
										$seat_labels .= $seat['rowId'] . $seat['colId'] . ',';
									}
									$seat_labels = substr($seat_labels, 0, -1);
								?>
								
								Seat: <?php echo $seat_labels; ?><br />
								Price: <?php echo $o['price']; ?>$<br />
							</td>
							<td class="align-left">
								Name:  <?php echo $o['customer']; ?><br />
								Email: <?php echo $o['email']; ?><br />
								Telephone: <?php echo $o['tel']; ?><br />
								Payment: <?php echo ucfirst($o['payment']); ?><br />
								<?php if ($o['payment'] == "visa") : ?>
								Card Number:  <?php echo $o['card_no']; ?><br />
								Card Name:  <?php echo $o['card_name']; ?><br />
								Card Cvv:  <?php echo $o['card_cvv']; ?><br />
								Expired Dat:  <?php echo $o['card_expired_date']; ?><br />
								<?php endif; ?>
							</td>
							<td class="align-center">
								<?php echo ucfirst($o['status']); ?>
							</td>
							<td>
								<a href="orders-edit.php?id=<?php echo $o['id']; ?>" class="table-icon edit" title="Edit"></a>
								<a href="process.php?mode=delete&amp;type=order&amp;id=<?php echo $o['id']; ?>" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<?php endforeach; ?>						
					</tbody>
				</table>
				<div class="entry">
					<div class="pagination">
						<span>« First</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">Last »</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?php
require_once 'footer.php';
