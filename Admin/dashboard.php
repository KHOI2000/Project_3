<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
<div class="main-content">
    <h1>Thông tin hệ thống</h1>
    <div class="listing-items">
        <img style="max-width: 100%;" src="../images/chart.png" />
        <div class="clear-both"></div>
    </div>
</div>
<?php
}
include './footer.php';
?>