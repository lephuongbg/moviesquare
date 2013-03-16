<?php 
$title = 'New movie';
require 'header.php';
?>

<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">New movie</div>
			<div class="entry">
				<form action="" method="post">
					<div class="element">
						<label for="movie-id">ID</label>
						<input id="movie-id" name="movie[id]" type="text" value="0" disabled>
						
						<div class="clear"></div>
						
						<label for="movie-title">Title</label>
						<input id="movie-title" name="movie[title]" type="text">
						
						<div class="clear"></div>
						
						<label for="movie-alias">Alias</label>
						<input id="movie-alias" name="movie[alias]" type="text">
					
					</div>
					
					<div class="element">
						<label for="movie-genre">Genre</label>
						<select id="movie-genre" name="movie[genre]">
							<option value="">- Please select -</option>
							<option value="action">Action</option>
							<option value="adventure">Adventure</option>
							<option value="animation">Animation</option>
							<option value="biography">Biography</option>
							<option value="comedy">Comedy</option>
							<option value="crime">Crime</option>
							<option value="documentary">Documentary</option>
							<option value="drama">Drama</option>
							<option value="family">Family</option>
							<option value="fantasy">Fantasy</option>
							<option value="history">History</option>
							<option value="horror">Horror</option>
							<option value="Musical">Musical</option>
							<option value="mystery">Mystery</option>
							<option value="romance">Romance</option>
							<option value="sci-fi">Sci-Fi</option>
							<option value="war">War</option>
						</select>
					</div>
					
					<div class="element">
						<label for="movie-poster">Poster</label>
						<input id="movie-poster" name="movie[poster]" type="file">
					</div>
					
					<div class="element">
						<label for="movie-trailer">Trailer</label>
						<input id="movie-trailer" name="movie[trailer]" type="file">
					</div>
					
					<div class="element">
						<label for="movie-length-hours">Length</label>
						<input id="movie-length-hours" name="movie[length][hours]" type="number" min="0" value="0" class="small">:<input id="movie-length-minutes" name="movie[length][minutes]" type="number" min="0" value="0" class="small">
					</div>
					
					<div class="element">
						<label for="movie-short-description">Short Description</label>
						<textarea id="movie-short-description" name="movie[short-description]" cols="60" rows="10" onkeyup="countChar(this)">
						</textarea>
					</div>
					
					<div class="element">
						<label for="movie-description">Description</label>
						<textarea id="movie-description" name="movie[description]" cols="60" rows="10" class="mceEditor">
						</textarea>
					</div>
					
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