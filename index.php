<?php
if ((isset($_GET['pages'])) && ($_GET['pages'] === "controller_home")) {
    include("view/inc/top_page_home.php");
} else {
    include("view/inc/top_page.php");
}
session_start();

include("view/inc/header.php");
include("view/inc/pages.php");
include("view/inc/footer.html");
include("view/inc/bottom_page.php");
?>