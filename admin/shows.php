<?php 
$title = "Shows";
require_once 'header.php';
?>

<?php
	include_once '../core/database.php';
	$db = new MS_Database();
	$schedules = $db->callProcedure('selectSchedules;');
?>
	
<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">Manage shows</div>
<!--				<h2>Lorem ipsum dolor sit ame</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
			
			<div class="entry">
				<div class="sep"></div>
			</div>-->
			<table>
				<thead>
					<tr>
						<th scope="col">Movie</th>
						<th scope="col">Room</th>
						<th scope="col">Show Time</th>
						<th scope="col" style="width: 65px;">Modify</th>
					</tr>
				</thead>
					
				<tbody>
					<?php // Load all shows
					foreach ($schedules as  $s ) {
						echo '<tr>';
						echo '<td>' . $s['movie_title'] . '</td>';
						echo '<td  class="align-center">' . $s['room_id'] . '</td>';
						echo '<td  class="align-center">' . $s['show_time'] . '</td>';
						
						echo '<td>';
							echo '<a href="#" class="table-icon edit" title="Edit"></a>';
							echo '<a href="#" class="table-icon archive" title="Archive"></a>';
							echo '<a href="#" class="table-icon delete" title="Delete"></a>';
						echo '</td>';
					}
					?>
				
					<tr>
						<td class="align-center">Titanic</td>
						<td class="align-center">3-A</td>
						<td class="align-center">22-03-2012 12:00</td>
						<td>
							<a href="shows-edit.php" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>
					<tr>
						<td class="align-center">Titanic</td>
						<td class="align-center">2-A</td>
						<td class="align-center">22-03-2012 12:00</td>
						<td>
							<a href="#" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>
						
					<tr>
						<td class="align-center">The Avengers</td>
						<td class="align-center">3-B</td>
						<td class="align-center">23-03-2012 - 10:00</td>
						<td>
							<a href="#" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>
						
					<tr>
						<td class="align-center">This means war</td>
						<td class="align-center">2-B</td>
						<td class="align-center">25-03-2012 - 14:00</td>
						<td>
							<a href="#" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>						
					<tr>
						<td class="align-center">Feel the wrath</td>
						<td class="align-center">2-A</td>
						<td class="align-center">22-03-2012 16:00</td>
						<td>
							<a href="#" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>
						
					<tr>
						<td class="align-center">John Carter</td>
						<td class="align-center">2-B</td>
						<td class="align-center">23-03-2012 18:00</td>
						<td>
							<a href="#" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="#" class="table-icon delete" title="Delete"></a>
						</td>
					</tr>
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
				<div class="sep"></div>		
				<a class="button add" href="shows-new.php">Add new show</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';
