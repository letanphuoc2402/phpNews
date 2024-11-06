<?php
include "header.php";
include "slider.php";

require 'config.php';
require 'function.php';
$db = new Database();
$conn = $db->getConnection();

?>

    <!-- Featured News Slider Start -->
<?php include "feature-news.php" ?>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
   <?php include "latest-news.php" ?>
    <!-- News With Sidebar End -->
<?php include "footer.php" ?>

   