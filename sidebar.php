<?php
	include_once 'core/database.php';
	$db = isset($db) ? $db : new MS_Database();
	$movies_now_showing = $db->callProcedure('selectMoviesNowShowing');
?>

<div id="sidebar">
	<div class="padding">
	<div id="quickBooking" class="box mod">
	<div class="ticketIcon"></div>
	<h3>Get Ticket</h3>

	<select name="movie" class="default" tabindex="1">
		<option value="">Select Movie</option>
		<?php
		foreach ($movies_now_showing as $movie) {
			echo '<option value="' . $movie['id'] . '">' . $movie['title'] . '</option>';
		}
		?>
	</select>

	<select name="date" class="default" tabindex="1">
		<option value="date_today">Today</option>
		<option value="date_3days">Next Three Days</option>
		<option value="date_7days">This Week</option>
		<option value="">All</option>
	</select>

	<button class="button" onclick="sideBarSearch()">Search Now</button>

	<p><a href="movies.php?filter=movie_now_showing">Now Showing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="movies.php?filter=movie_coming_soon">Coming Soon</a></p>
	<div class="clr"></div>
		</div>
		<div id="ad1" class="mod last">
			<a href="#"><img src="images/ad1.jpg" /></a>
		</div>
	</div>
</div>


<script>
function sideBarSearch() {
	var select_bar = document.getElementsByName('movie')[0];
	var selected_movie = select_bar.options[select_bar.selectedIndex].value;
	
	select_bar = document.getElementsByName('date')[0];
	var selected_date = select_bar.options[select_bar.selectedIndex].value;
	if (selected_movie != "") {
		 location.href = "booking.php?movie_id=" + selected_movie + "&filter=" + selected_date;
	} else {
		alert("You have not chosen any movie yet!");
	}
}
</script>
