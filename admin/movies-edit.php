<?php 
$title = 'Edit movie';
require_once 'header.php';
?>

<div id="content">
	<?php require_once 'sidebar.php' ?>
	<div id="main">
		
		<div class="full_w">
			<div class="h_title">Edit movie</div>
			<div class="entry">
				<form action="" method="post">
					<div class="element">
						<label for="movie-id">ID</label>
						<input id="movie-id" name="movie[id]" type="text" value="10" disabled>
						
						<div class="clear"></div>
						
						<label for="movie-title">Title</label>
						<input id="movie-title" name="movie[title]" type="text" value="Titanic">
						
						<div class="clear"></div>
						
						<label for="movie-alias">Alias</label>
						<input id="movie-alias" name="movie[alias]" type="text" value="titanic">
					
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
							<option value="musical">Musical</option>
							<option value="mystery">Mystery</option>
							<option selected value="romance">Romance</option>
							<option value="sci-fi">Sci-Fi</option>
							<option value="war">War</option>
						</select>
					</div>
					
					<div class="element">
						<label for="movie-poster">Poster</label>
						<input id="movie-poster" name="movie[poster]" type="file">
						<div class="clear"></div>
						<img src="/media/titanic/poster.jpg" width="200" height="300" style="margin-left: 80px"/>
					</div>
					
					<div class="element">
						<label for="movie-trailer">Trailer</label>
						<input id="movie-trailer" name="movie[trailer]" type="file">
						<video width="600" height="337" controls>
							<source src="/media/titanic/trailer.mp4" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
					
					<div class="element">
						<label for="movie-length-hours">Length</label>
						<input id="movie-length-hours" name="movie[length][hours]" type="number" min="0" value="2" class="small">:<input id="movie-length-minutes" name="movie[length][minutes]" type="number" min="0" value="30" class="small">
					</div>
					
					<div class="element">
						<label for="movie-short-description">Short Description</label>
						<textarea id="movie-short-description" name="movie[short-description]" cols="60" rows="10" onkeyup="countChar(this)">
A seventeen-year-old aristocrat, expecting to be married to a rich claimant by her mother, falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.
						</textarea>
					</div>
					
					<div class="element">
						<label for="movie-description">Description</label>
						<textarea id="movie-description" name="movie[description]" cols="60" rows="10" class="mceEditor">
								<h3>Storyline</h3>
								84 years later, a 101-year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic when young Rose boards the departing ship with the upper-class passengers and her mother, Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game. And she explains the whole story from departure until the death of Titanic on its first and last voyage April 15th, 1912 at 2:20 in the morning. Written by Anthony Pereyra <hypersonic91@yahoo.com>
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