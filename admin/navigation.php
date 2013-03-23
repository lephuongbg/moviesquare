<div class="pagination">

<?php if ($page == 1) { ?>
	<span>« First</span>
<?php } else { ?>
	<a href="?page=1">« First</a>
<?php } ?>

<?php for ($i = 1; $i <= $page_count; $i++) { ?>
	<?php if ($page == $i) { ?>
	<span class="active"><?php echo $i; ?></span>
	<?php } else { ?>
	<a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
	<?php } ?>
<?php } ?>

<?php if ($page == $page_count) { ?>
	<span>Last »</span>
<?php } else { ?>
	<a href="?page=<?php echo $page_count; ?>">Last »</a>
<?php } ?>

</div> 
