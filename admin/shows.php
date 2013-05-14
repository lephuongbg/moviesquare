<?php 
$title = "Shows";
require_once 'header.php';
?>

<?php
    include_once '../core/database.php';
    $db = new MS_Database();
    $query = "SELECT s.*, m.title as movie_title  FROM `Shows` as s LEFT JOIN `Movies` as m ON m.id = s.movie_id";
    $shows = $db->query($query, 'array');
?>
    
<div id="content">
    <?php include_once 'messages.php'; ?>
    <?php include_once 'sidebar.php'; ?>
    <div id="main">
        
        <div class="full_w">
            <div class="h_title">Manage shows</div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th scope="col">Movie</th>
                        <th scope="col">Room</th>
                        <th scope="col">Show Time</th>
                        <th scope="col" style="width: 65px;">Modify</th>
                    </tr>
                </thead>
                    
                <tbody>
                    <?php foreach ($shows as $show) : ?>
                    <tr>
                        <td class="align-center"><?php echo $show['id']; ?></td>
                        <td class="align-center"><?php echo $show['movie_title']; ?></td>
                        <td class="align-center"><?php echo $show['room_id']; ?></td>
                        <td class="align-center"><?php echo $show['show_time']; ?></td>
                        <td class="align-center">
                            <a href="shows-edit.php?id=<?php echo $show['id']; ?>" class="table-icon edit" title="Edit"></a>
                            <a href="process.php?mode=delete&amp;type=show&amp;id=<?php echo $show['id']; ?>" class="table-icon delete" title="Delete"></a>'
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="entry">
                <div class="pagination">
                    <span>« First</span>
                    <span class="active">1</span>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                    <span>...</span>
                    <a href="">23</a>
                    <a href="">24</a>
                    <a href="">Last »</a>
                </div>
                <div class="sep"></div>		
                <a class="button add" href="shows-edit.php">Add new show</a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<?php
require_once 'footer.php';
