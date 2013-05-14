<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$title = ($id) ? 'Edit show' : 'New show';
require_once 'header.php';

if ($id) {
    $query = "SELECT * FROM `Shows` WHERE id ='".$db->escape($id)."'";
    $show = $db->query($query);

    if (empty($show)) {
        header('Location: shows.php?error=1');
        return;
    }
} else {
    if (isset($_POST['show']))
        $show = $_POST['show'];
    else
        $show = array(
            'id'    => '0', 
            'movie_id' => '',
            'room_id' => '',
            'show_time' => ''
        );
}

$query = "SELECT id, title FROM `Movies` WHERE class LIKE '%movie_now_showing%'";
$movies = $db->query($query);

$query = "SELECT id FROM `Rooms`";
$rooms = $db->query($query);
?>
<style type="text/css">
/* css for timepicker */
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; }
.ui-timepicker-rtl dl dd { margin: 0 65px 10px 10px; }
</style>
<link rel="stylesheet" href="css/eggplant/jquery-ui-1.10.3.custom.min.css" />
<div id="content">
    <?php include_once 'messages.php'; ?>
    <?php require_once 'sidebar.php' ?>
    <div id="main">
        
        <div class="full_w">
            <div class="h_title"><?php echo $title; ?></div>
            <div class="entry">
                <form action="process.php" method="post">
                
                    <div class="element">
                        <label for="show-id">ID</label>
                        <input id="show-id" type="text" value="<?php echo $show['id']; ?>" disabled>
                        <input type="hidden" name="show[id]" value="<?php echo $show['id']; ?>">
                    </div>
                    
                    <div class="element">
                        <label for="show-movie">Movie</label>
                        <select id="show-movie" name="show[movie_id]">
                            <option value="">- Please select -</option>
                            <?php foreach ($movies as $movie) : ?>
                            <option <?php if ($movie['id'] == $show['movie_id']) echo ' selected '; ?> value="<?php echo $movie['id']; ?>">
                                <?php echo $movie['title']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="element">
                        <label for="show-room">Room</label>
                        <select id="show-room" name="show[room_id]">
                            <option value="">- Please select -</option>
                            <?php foreach ($rooms as $room) : ?>
                            <option <?php if ($room['id'] == $show['room_id']) echo ' selected '; ?> value="<?php echo $room['id']; ?>">
                                <?php echo $room['id']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="element">
                        <label for="show-time">Show Time</label>
                        <input id="show-time" name="show[show_time]" type="text" value="<?php echo $show['show_time']; ?>">
                    </div>
                    
                    <input type="hidden" name="type" value="show" />
                    <input type="hidden" name="mode" value="edit" />
                    <div class="entry">
                        <button type="submit" class="add">Save show</button> 
                        <button class="cancel" onClick="location.href='shows.php'; return false;">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
    $('#show-time').datetimepicker({
        timeFormat: "HH:mm",
        dateFormat: "yy-mm-dd"
    });
</script>
<?php
require_once 'footer.php';