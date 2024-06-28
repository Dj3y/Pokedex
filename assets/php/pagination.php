<!-- <?php 
include("assets/php/engine.php");

try{
        
    $offset = ($page - 1) * $per_page;
    $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
    $per_page = 20;

    $countPrepare = $connect->prepare('SELECT * FROM pokemon');
    $countPrepare -> execute();
    $total_count = $countPrepare -> fetchAll(PDO::FETCH_ASSOC);

    $total_count = count($total_count);
}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}   

$total_pages = ceil($total_count / $per_page);
// Determine the range of pages to display
$display_range = 5;
$start_page = max(1, $page - floor($display_range / 2));
$end_page = min($total_pages, $start_page + $display_range - 1);

if ($end_page - $start_page + 1 < $display_range) {
    $start_page = max(1, $end_page - $display_range + 1);
}

for($i = 1; $i <= $total_pages; $i ++):
                ?>
                <a href="?page=<?php echo $i; ?>"
                <?php if ($i == $page) echo 'class="active";'?>>
            <?php echo $i; ?>
                </a>
                <?php endfor; ?>      -->

                <?php 
include("assets/php/engine.php");

try {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $per_page = 20;
    $offset = ($page - 1) * $per_page;

    $countPrepare = $connect->prepare('SELECT * FROM pokemon');
    $countPrepare->execute();
    $total_count = $countPrepare->fetchAll(PDO::FETCH_ASSOC);

    $total_count = count($total_count);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}   

$total_pages = ceil($total_count / $per_page);

// Determine the range of pages to display
$display_range = 5;
$start_page = max(1, $page - floor($display_range / 2));
$end_page = min($total_pages, $start_page + $display_range - 1);

if ($end_page - $start_page + 1 < $display_range) {
    $start_page = max(1, $end_page - $display_range + 1);
}
?>

<!-- Previous button -->
<?php if ($page > 1): ?>
    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
<?php endif; ?>

<!-- Pagination links -->
<?php for ($i = $start_page; $i <= $end_page; $i++): ?>
    <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
<?php endfor; ?>

<!-- Next button -->
<?php if ($page < $total_pages): ?>
    <a href="?page=<?php echo $page + 1; ?>">Next</a>
<?php endif; ?>
