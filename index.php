<?php
if ((isset($_GET['pages'])) && ($_GET['pages'] === "controller_home")) {
    include("view/inc/top_page_home.php");
} elseif ((isset($_GET['pages'])) && ($_GET['pages'] === "controller_shop")) {
    include("view/inc/top_page_shop.php");
} else {
    include("view/inc/top_page.php");
}
session_start();

include("view/inc/header.php");
include("view/inc/pages.php");
include("view/inc/footer.html");
include("view/inc/bottom_page.php");
