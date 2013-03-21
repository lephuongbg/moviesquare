<?php
$title = "Movies";
require_once 'header.php';
$page = (isset($_GET['page']) && $_GET['page'] >= 1) ? ((int) $_GET['page']) : 1;
$page_count = $db->query('SELECT COUNT(*) as count FROM `Movies`');
$page_count = (int) ($page_count['count'] / 10) + 1;
$offset = ($page - 1) * 10;
$query = "SELECT * FROM `Movies` LIMIT 10 OFFSET $offset";
$movies = $db->query($query);
?>
	
	<div id="content">
		<?php require_once 'error.php'; ?>
		<?php require_once 'sidebar.php'; ?>
		<div id="main">
			<div class="full_w">
				<div class="h_title">Manage movies</div>
<!--				<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
				
				<div class="entry">
					<div class="sep"></div>
				</div>-->
				<table>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Title</th>
							<th scope="col">Alias</th>
							<th scope="col">Short Description</th>
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
						<?php foreach ($movies as $movie) : ?>
						<tr>
							<td class="align-center"><?php echo $movie['id']; ?></td>
							<td><?php echo $movie['title']; ?></td>
							<td><?php echo $movie['alias']; ?></td>
							<td><?php echo $movie['short_description']; ?></td>
							<td>
								<a href="movies-edit.php?id=<?php echo $movie['id']; ?>" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="entry">
					<?php require_once 'navigation.php'; ?>
					<div class="sep"></div>		
					<a class="button add" href="movies-new.php">Add new movie</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?php
require_once 'footer.php';
