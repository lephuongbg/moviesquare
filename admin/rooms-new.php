<?php 
$title = 'New room';
require 'header.php';
?>

<?php
	include_once '../core/database.php';
	$db = new MS_Database();
	//$rooms = $db->callProcedure('selectRooms');
	if($_REQUEST['room-id']!='')
	{
		$room_id = $_REQUEST['room-id'];
		$description = $_REQUEST['movie-description'];
		$insert_query = "INSERT INTO `rooms` (`id`,`description`) VALUES ('$room_id','$description');";
		if($db->insert($insert_query)==false)
			echo '<script>alert("This room ID has already been created");</script>';
		else
			echo '<script>window.location = "rooms.php"</script>';
	}
?>	

<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">New room</div>
			<div class="entry">
				<form action="rooms-new.php" method="post" onsubmit="check();">
					
					<div class="element">
						<label for="room-id">ID (*)</label>
						<input id="room-id" name="room-id" type="text">
					</div>
					
					<div class="element">
						<label for="room-description">Description</label>
						<textarea id="room-description" name="movie-description" cols="60" rows="10" onkeyup="countChar(this)"></textarea>
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
require_once 'footer.php';?>
<script type="text/javascript" language="javascript">
	function countChar(val) {
		var len = val.value.length;
		if (len >= 250) {
			val.value = val.value.substring(0, 250);
		} else {
			$(val).text(250 - len);
		}
	};
	function check() {
		alert("ID must not be left empty");	
		if(form["room-id"]=="") (
			alert("ID must not be left empty");	
			return false;
		)
	};
</script>