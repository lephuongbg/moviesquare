<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$title = ($id) ? 'Edit room' : 'New room';
require_once 'header.php';

if ($id) {
	$room = $db->query("SELECT * FROM `Rooms` WHERE `id` ='".$id."'");
	if (empty($room)) {
		header('Location: room.php?error=1');
		return;
	}
} else {
	if (isset($_POST['room']))
		$room = $_POST['room'];
	else
		$room = array(
			'id' 	=> 0, 
			'description' => ''
		);
}
?>

<div id="content">
	<?php if (isset($_POST['error'])) : ?>
	<div class="n_error"><p><?php echo $_POST['error']; ?></p></div>
	<?php endif; ?>
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title"><?php echo $title; ?></div>
			<div class="entry">
				<form action="process.php?mode=edit&type=room" method="post">
					
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
					<div class="entry">
						<button type="submit" class="add">Save room</button> 
						<button class="cancel" onClick="location.href='rooms.php'; return false;">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';