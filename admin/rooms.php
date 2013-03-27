<?php 
$title = "Rooms";
require_once 'header.php';
$query = "SELECT * FROM `Rooms`";
$rooms = $db->query($query, 'array');
?>
<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">Manage rooms</div>
			<table>
				<thead>
					<tr>
						<th scope="col">Room</th>
						<th scope="col">Description</th>
						<th scope="col" style="width: 65px;">Modify</th>
					</tr>
				</thead>
					
				<tbody>
					<?php // Load all rooms
					foreach ($rooms as  $room) {
						echo '<tr>';
						echo '<td class="align-center">' . $room['id'] . '</td>';
						echo '<td>' . $room['description'] . '</td>';
						
						echo '<td>';
							echo '<a href="rooms-edit.php?id='.$room['id'].'" class="table-icon edit" title="Edit"></a>';
							echo '<a href="process.php?mode=delete&type=room&id='.$room['id'].'" class="table-icon delete" title="Delete"></a>';
						echo '</td>';
					}
					?>
				</tbody>
			</table>
			
			<div class="entry">
				<div class="sep"></div>		
				<a class="button add" href="rooms-edit.php">Add new room</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';
