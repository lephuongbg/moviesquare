<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$title = ($id) ? 'Edit room' : 'New room';
require_once 'header.php';

if ($id) {
	$query = "SELECT * FROM `Rooms` WHERE id ='".$db->escape($id)."'";
	$room = $db->query($query);

	if (empty($room)) {
		header('Location: rooms.php?error=1');
		return;
	}
} else {
	if (isset($_POST['room']))
		$room = $_POST['room'];
	else
		$room = array(
			'id' 	=> '', 
			'description' => ''
		);
}
?>

<div id="content">
	<?php include_once 'messages.php'; ?>
	<?php include_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title"><?php echo $title; ?></div>
			<div class="entry">
				<form action="process.php" method="post">
					
					<div class="element">
						<label for="room-id">ID</label>
						<input id="room-id" name="room[id]" type="text" value="<?php echo $room['id']; ?>">
					</div>
					
					<div class="element">
						<label for="room-description">Description</label>
						<textarea 
							id="room-description" 
							name="room[description]" 
							cols="60" rows="10" 
							class="mceEditor"><?php echo $room['description']; ?></textarea>
					</div>
					<input type="hidden" name="type" value="room" />
					<input type="hidden" name="mode" value="edit" />
					<div class="entry">
						<button type="submit" class="add">Save room</button> 
						<button class="cancel" onClick="location.href='rooms.php'; return false;">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';