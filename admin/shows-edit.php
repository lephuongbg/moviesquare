<?php 
$title = 'Edit show';
require 'header.php';
?>

<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">Edit show</div>
			<div class="entry">
				<form action="" method="post">
					
					<div class="element">
						<label for="show-movie">Movie</label>
						<select id="show-movie" name="show[movie]">
							<option value="">- Please select -</option>
							<option selected value="1">The Avenger</option>
							<option value="2">Titanic</option>
							<option value="3">This is war</option>
							<option value="4">John Carter</option>
						</select>
					</div>
					
					<div class="element">
						<label for="show-room">Room</label>
						<select id="show-room" name="show[room]">
							<option value="">- Please select -</option>
							<option selected value="1-A">1-A</option>
							<option value="1-B">1-B</option>
							<option value="1-C">1-C</option>
							<option value="1-D">1-D</option>
							<option value="2-A">2-A</option>
							<option value="2-B">2-B</option>
							<option value="2-C">2-C</option>
							<option value="2-D">2-D</option>
							<option value="2-A">2-A</option>
							<option value="2-B">2-B</option>
							<option value="2-C">2-C</option>
							<option value="2-D">2-D</option>
						</select>
					</div>
					
					<div class="element">
						<label for="show-time">Show Time</label>
						<input id="show-time" name="show[time]" type="datetime-local" value="2012-30-12 20:00">
					</div>
					
					<div class="entry">
						<button type="submit" class="add">Save show</button> 
						<button class="cancel" onClick="location.href='shows.php'; return false;">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';