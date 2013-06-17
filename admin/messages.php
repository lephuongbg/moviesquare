<?php 
	if (isset($_REQUEST['message'])) :
		
		// Attempt to parse the message
		if (!is_array($_REQUEST['message'])) {
			$messages = explode(',', $_REQUEST['message']);
		} else {
			$messages = $_REQUEST['message'];
		}
		
		// Declaration of different message types
		$successes = array();
		$notices = array();
		$errors = array();
		
		// Get the current script name (name of php file)
		$script_name = pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_BASENAME);
		
		// Convert message codes to informative strings
		foreach ($messages as $message) {
			switch ($message) {
				case Messages::SUCCESS_SAVE_MOVIE:
					if ($script_name == 'movies-edit.php')
						$successes[] = "Movie information successfully saved";
					break;
				case Messages::SUCCESS_SAVE_ROOM:
					if ($script_name == 'rooms-edit.php')
						$successes[] = "Room information successfully saved";
					break;
				case Messages::SUCCESS_SAVE_SHOW:
					if ($script_name == 'shows-edit.php')
						$successes[] = "Show information successfully saved";
					break;
				case Messages::SUCCESS_DELETE_MOVIE:
					if ($script_name == 'movies.php')
						$successes[] = "Movie successfully deleted";
					break;
				case Messages::SUCCESS_DELETE_ROOM:
					if ($script_name == 'rooms.php')
						$successes[] = "Room successfully deleted";
					break;
				case Messages::SUCCESS_DELETE_SHOW:
					if ($script_name == 'shows.php')
						$successes[] = "Show successfully deleted";
					break;
				case Messages::ERROR_SAVE_MOVIE:
					if ($script_name == 'movies-edit.php')
						$errors[] = "Error occured when saving movie information";
					break;
				case Messages::ERROR_SAVE_ROOM:
					if ($script_name == 'rooms-edit.php')
						$errors[] = "Error occured when saving room information";
					break;
				case Messages::ERROR_SAVE_SHOW:
					if ($script_name == 'shows-edit.php')
						$errors[] = "Error occured when saving show information";
					break;
				case Messages::SUCCESS_DELETE_ORDER:
					if ($script_name == 'orders.php')
						$successes[] = "Order successfully deleted";
					break;
				case Messages::SUCCESS_SAVE_ORDER:
					if ($script_name == 'orders-edit.php')
						$successes[] = "Order information successfully saved";
					break;
				case Messages::ERROR_SAVE_ORDER:
					if ($script_name == 'orders-edit.php')
						$errors[] = "Error occured when saving order information";
					break;
				default:
					break;
			}
		}
?>
	<?php foreach ($successes as $success) : ?>
	<div class="n_ok"><p><?php echo $success; ?></p></div>
	<?php endforeach; ?>

	<?php foreach ($notices as $notice) : ?>
	<div class="n_warning"><p><?php echo $notice; ?></p></div>
	<?php endforeach; ?>

	<?php foreach ($errors as $error) : ?>
	<div class="n_error"><p><?php echo $error; ?></p></div>
	<?php endforeach;?>

<?php endif; ?>

<?php if (isset($_POST['error'])) : ?>
	<div class="n_error"><p><?php echo $_POST['error']; ?></p></div>
<?php endif; ?>