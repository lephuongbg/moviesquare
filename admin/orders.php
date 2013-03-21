<?php 
$title = "Orders";
require_once 'header.php';
?>
	
	<div id="content">
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
						<tr>
							<td class="align-center">0001</td>
							<td class="align-left">
								Movie: The Avengers<br />
								Room: 3-A<br />
								Time: 22-03-2013<br />
								Seat: F5<br />
								Price: 200000đ<br />
							</td>
							<td class="align-left">
								Name: John Doe<br />
								Email: johndoe@email.com<br />
								Telephone: 111-555555<br />
								Payment: VISA
							</td>
							<td class="align-center">
								Confirmed
							</td>
							<td>
								<a href="orders-edit.php" class="table-icon edit" title="Edit"></a>
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
					<a class="button add" href="rooms-new.php">Add new room</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?php
require_once 'footer.php';
