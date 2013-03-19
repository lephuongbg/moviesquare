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
						<label for="room-id">ID (*)</label>
						<input id="room-id" name="room[id]" type="text">
					</div>
					
					<div class="element">
						<label for="room-description">Description</label>
						<textarea id="room-description" name="movie[description]" cols="60" rows="10" onkeyup="countChar(this)"></textarea>
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

<script type="text/javascript">
	function countChar(val) {
		var len = val.value.length;
		if (len >= 250) {
			val.value = val.value.substring(0, 250);
		} else {
			$(val).text(250 - len);
		}
	};
</script>
<?php
require_once 'footer.php';