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
                $SelectBrand = $daohome->select_brands();
            } catch (Exception $e) {
                echo json_encode("error");
            }

            if (!empty($SelectBrand)) {
                echo json_encode($SelectBrand);
            } else {
                echo json_encode("error");
            }
            break;

        case 'homePageCatalog':
            try {
                $daohome = new DAOHome();
                $SelectCatalog = $daohome->select_catalog();
            } catch (Exception $e) {
                echo json_encode("error");
            }

            if (!empty($SelectCatalog)) {
                echo json_encode($SelectCatalog);
            } else {
                echo json_encode("error");
            }
            break;

            case 'homePageCondition':
                try {
                    $daohome = new DAOHome();
                    $SelectCondition = $daohome->select_condition();
                } catch (Exception $e) {
                    echo json_encode("error");
                }
    
                if (!empty($SelectCondition)) {
                    echo json_encode($SelectCondition);
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
