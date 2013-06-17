<?php 
	if (isset($_GET['error'])) { 
		$error_string = '';
		switch ($_GET['error']) {
			case 1:
				$error_string = 'MOVIE NOT FOUND!';
				break;
			default:
				break;
		}
?>
<div class="n_error"><p><?php echo $error_string; ?></p></div>
<?php } ?>
