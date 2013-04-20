<?php
require 'header.php';
if (!(isset($_REQUEST['mode']))) {
	$error = "You are not allow to directly access this page";
} else {
	if ($_REQUEST['mode'] == 'edit') {
		$action = '';
		$inputs = array();
		$type = $_POST['type'];
		switch ($_POST['type']) {
			case 'movie':
				$movie = $_POST['movie'];
				// Preprocess
				if (!$movie['id'])
					unset($movie['id']);
				if (isset($movie['featured']) && $movie['featured'])
					$movie['class'] .= ' movie_featured';
				unset($movie['featured']);
				
				// Store
				$updated_id = $db->storeArray($movie, 'Movies');
				if (!$updated_id) {
					$action = 'movies-edit.php?message='.Messages::ERROR_SAVE_MOVIE;
					$inputs = $_POST['movie'];
					$input_error = $db->getError();
				} else {
					// Redirect
					header('Location: movies-edit.php?id='.$updated_id.'&message='.Messages::SUCCESS_SAVE_MOVIE);
					return;
				}
				
				break;
			case 'room':
				$room = $_POST['room'];
				//Store
				$updated_id = $db->storeArray($room, 'Rooms');
				if (!$updated_id) {
					$action = 'rooms-edit.php?message='.Messages::ERROR_SAVE_ROOM;
					$inputs = $_POST['room'];
					$input_error = $db->getError();
				} else {
					// Redirect
					header('Location: rooms-edit.php?id='.$room['id']);
					return;
				}
				break;
			default:
				$error = "Non-supported type of data for processing";
				break;
		}
	} elseif ($_REQUEST['mode'] == 'delete') {
		switch ($_REQUEST['type']) {
			case 'movie':
				$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
				$query = "DELETE FROM `Movies` WHERE id = ".(int) $id;
				$db->query($query);
				header('Location: movies.php?message='.Messages::SUCCESS_DELETE_MOVIE);
				break;
			case 'room':
				$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
				$query = "DELETE FROM `Rooms` WHERE `id` = '".$id."'";
				echo $query;
				$db->query($query);
				header('Location: rooms.php?message='.Messages::SUCCESS_DELETE_ROOM);
				break;
			default:
				$error = "Non-supported type of data for processing";
				break;
		}
	}
}

?>
<div class="content">
	<?php if (empty($error)) { ?>
	
	<form id="form" action="<?php echo $action; ?>" method="POST">
	<?php foreach ($inputs as $name => $value) : ?>
		<input type="hidden" name="<?php echo $type.'['.$name.']'; ?>" value="<?php echo htmlspecialchars($value); ?>" />
	<?php endforeach; ?>
		<input type="hidden" name="error" value="<?php echo $input_error; ?>" />
	</form>
	<div style="text-align:center; margin: 100px 0px;"><img src="/admin/img/loading.gif" /></div>
	<script type="text/javascript">
		document.getElementById('form').submit();
	</script>
	
	<?php } else { ?>
	
	<div class="n_error"><p><?php echo $error; ?></p></div>
	
	<?php } ?>
</div>