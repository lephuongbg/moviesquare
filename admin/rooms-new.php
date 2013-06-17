<?php 
$title = 'New room';
require 'header.php';
?>

<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">New room</div>
			<div class="entry">
				<form action="" method="post">
					
					<div class="element">
						<label for="room-id">ID</label>
						<input id="room-id" name="room[id]" type="text">
					</div>
					
					<div class="element">
						<label for="room-description">Description</label>
						<input id="room-description" name="room[description]" type="text">
					</div>
					
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