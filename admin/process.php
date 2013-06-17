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
					header('Location: rooms-edit.php?id='.$room['id'].'&message='.Messages::SUCCESS_SAVE_ROOM);
					return;
				}
				break;
            case 'show':
                $show = $_POST['show'];
                // Store
                $updated_id = $db->storeArray($show, 'Shows');
                if (!$updated_id) {
                    $action = 'shows-edit.php?message='.Messages::ERROR_SAVE_SHOW;
                    $inputs = $_POST['show'];
                    $input_error = $db->getError();
                } else {
                    /// Redirect
                    header('Location: shows-edit.php?id='.$show['id'].'&message='.Messages::SUCCESS_SAVE_SHOW);
                    return;
                }
                break;
			 case 'order':
                $order = $_POST['order'];
                // Store
                $updated_id = $db->storeArray($order, 'Orders');
				if ($order['status'] == 'done') {
					$query = "SELECT * FROM Shows WHERE id =  " . $order['show_id'];
					$show = $db->query($query);
					
					$seat_labels = array();
					foreach (json_decode($order['seats'], true) as $seat) {
						$seat_labels[] = $seat['rowId'] . $seat['colId'];
					}
					$show['booked'] = json_encode(array_unique(array_merge($show['booked'] ? json_decode($show['booked'], true) : array(), $seat_labels), SORT_STRING));
					$db->storeArray($show, 'Shows');
				}
				
                if (!$updated_id) {
                    $action = 'order-edit.php?message='.Messages::ERROR_SAVE_ORDER;
                    $inputs = $_POST['order'];
                    $input_error = $db->getError();
                } else {
                    /// Redirect
                    header('Location: orders-edit.php?id='.$updated_id.'&message='.Messages::SUCCESS_SAVE_ORDER);
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
            case 'show':
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $query = "DELETE FROM `Shows` WHERE `id` = '".$id."'";
                echo $query;
                $db->query($query);
                header('Location: shows.php?message='.Messages::SUCCESS_DELETE_SHOW);
                break;
			case 'order':
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $query = "DELETE FROM `Orders` WHERE `id` = '".$id."'";
                echo $query;
                $db->query($query);
                header('Location: orders.php?message='.Messages::SUCCESS_DELETE_ORDER);
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