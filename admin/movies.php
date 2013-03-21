<?php
$title = "Movies";
require_once 'header.php';
// $page = (isset($_GET['page']) && $_GET['page'] >= 1) ? ((int) $_GET['page']) : 1;
// $page_count = $db->query('SELECT COUNT(*) as count FROM `Movies`');
// $page_count = (int) ($page_count['count'] / 10) + 1;
// $offset = ($page - 1) * 10;
// $query = "SELECT * FROM `Movies` LIMIT 10 OFFSET $offset";
// $movies = $db->query($query);
?>

<?php
	include_once '../core/database.php';
	$db = new MS_Database();
	$movies = $db->callProcedure('selectMovies');
?>
	
<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">Movies Management</div>
			<h2>Lorem ipsum dolor sit ame</h2>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
			
			<div class="entry">
				<div class="sep"></div>
			</div>
			<table>
				<thead>
					<tr>
						<th scope="col" class="small">ID</th>
						<th scope="col">Title</th>
						<th scope="col" class="medium">Featured</th>
						<th scope="col" class="medium">Now showing</th>
						<th scope="col" class="small">Modify</th>
					</tr>
				</thead>
					
				<tbody>
					<?php // Load all movies
					foreach ($movies as  $movie ) {
						echo '<tr>';
						echo '<td class="align-center">' . $movie['id'] . '</td>';
						echo '<td>' . $movie['title'] . '</td>';
						if (strpos($movie['class'],'movie_featured') !== false) {
							echo '<td class="align-center"><i class="icon-ok"></i></td>';
						} else {
							echo '<td class="align-center"></td>';
						}
						if (strpos($movie['class'],'movie_now_showing') !== false) {
							echo '<td class="align-center"><i class="icon-ok"></i></td>';
						} else {
							echo '<td class="align-center"></td>';
						}
						
						echo '<td>';
							echo '<a href="#" class="table-icon edit" title="Edit"></a>';
							echo '<a href="#" class="table-icon archive" title="Archive"></a>';
							echo '<a href="#" class="table-icon delete" title="Delete"></a>';
						echo '</td>';
					}
					?>
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
				<a class="button add" href="movies-new.php">Add new movie</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
require_once 'footer.php';
