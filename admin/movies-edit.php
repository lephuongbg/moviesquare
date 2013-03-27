<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$title = ($id) ? 'Edit movie' : 'New movie';
require_once 'header.php';

if ($id) {
	$movie = $db->query('SELECT * FROM `Movies` WHERE id = '.$id);
	if (empty($movie)) {
		header('Location: movies.php?error=1');
		return;
	}
	// break the movie class
	$movie['featured'] = (strpos($movie['class'],'featured') !== FALSE);
	$movie['class'] = array_shift(explode(' ',$movie['class']));
} else {
	if (isset($_POST['movie']))
		$movie = $_POST['movie'];
	else
		$movie = array(
			'id' 	=> 0, 
			'title' => '', 
			'alias' => '',
			'class' => '',
			'featured' => '',
			'short_description' => '',
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
				<form action="process.php" method="post">
					<div class="element">
						<label for="movie-id">ID</label>
						<input id="movie-id" type="text" value="<?php echo $movie['id']; ?>" disabled>
						<input type="hidden" name="movie[id]" value="<?php echo $movie['id']; ?>">
						
						<div class="clear"></div>
						
						<label for="movie-title">Title</label>
						<input id="movie-title" name="movie[title]" type="text" value="<?php echo $movie['title']; ?>">
						
						<div class="clear"></div>
						
						<label for="movie-alias">Alias</label>
						<input id="movie-alias" name="movie[alias]" type="text" value="<?php echo $movie['alias']; ?>">
					</div>
					
					<div class="element">
						<label for="movie-class">Attribute</label>
						<select id="movie-class" name="movie[class]">
							<option 
								value="movie_coming_soon"
								<?php if (strpos($movie['class'], 'coming_soon') !== FALSE) { ?> selected<?php } ?> >
								Coming Soon
							</option>
							<option 
								value="movie_now_showing"
								<?php if (strpos($movie['class'], 'now_showing') !== FALSE) { ?> selected<?php } ?> >
								Now Showing
							</option>
						</select>
						<label for="movie-featured">Featured</label>
						<input 
							id="movie-featured" 
							name="movie[featured]" 
							type="checkbox" value="1"
							<?php if ($movie['featured']) { ?> checked<?php } ?> >
					</div>
					
					<div class="element">
						<label for="movie-short-description">Short Description</label>
						<textarea 
							id="movie-short-description" 
							name="movie[short_description]" 
							cols="60" rows="10" 
							class="mceEditor"><?php echo $movie['short_description']; ?></textarea>
					</div>
					
					<div class="element">
						<label for="movie-description">Description</label>
						<textarea 
							id="movie-description" 
							name="movie[description]" 
							cols="60" rows="10" 
							class="mceEditor"><?php echo $movie['description']; ?></textarea>
					</div>
					
					<input type="hidden" name="type" value="movie" />
					<input type="hidden" name="mode" value="edit" />
					<div class="entry">
						<button type="submit" class="add">Save movie</button> 
						<button class="cancel" onClick="location.href='movies.php'; return false;">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
	mode:"specific_textareas",
	editor_selector: "mceEditor",
	theme:"advanced",
	width:"600"
	})
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