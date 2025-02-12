<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/SMARTTRADE_MVC/';
include($path . "module/home/model/DAO_home.php");
@session_start();

if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case 'list':
            include('module/home/view/home.html');
            break;

        case 'homePageBrand':
            try {
                $daohome = new DAOHome();
                $SelectCategory = $daohome->select_brands();
            } catch (Exception $e) {
                echo json_encode("error");
            }

            if (!empty($SelectCategory)) {
                echo json_encode($SelectCategory);
            } else {
                echo json_encode("error");
            }
            break;

        default:
            include("module/exceptions/views/pages/error404.php");
            break;
    }
} else {
    $callback = "index.php?pages=controller_home&op=list";
    die('<script>window.location.href="' . $callback . '";</script>');
}
?>