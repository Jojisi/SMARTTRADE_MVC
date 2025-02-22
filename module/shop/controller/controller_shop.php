<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/SMARTTRADE_MVC/';
include($path . "/module/shop/model/DAO_shop.php");

switch ($_GET['op']) {
    case 'list':
        include('module/shop/view/shop.html');
        break;

    case 'all_products':
        try {
            $daoshop = new DAOShop();
            $Dates_Products = $daoshop->select_all_products();

            if (!empty($Dates_Products)) {
                echo json_encode($Dates_Products);
            } else {
                echo json_encode("error");
            }
        } catch (Exception $e) {
            echo json_encode("error");
        }
        break;

    case 'details_product':
        try {
            $daoshop = new DAOShop();
            $Date_car = $daoshop->select_one_product($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
        }
        try {
            $daoshop_img = new DAOShop();
            $Date_images = $daoshop_img->select_imgs_product($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
        }

        if (!empty($Date_car) || !empty($Date_images)) {
            $rdo = array();
            $rdo[0] = $Date_car;
            $rdo[1] = $Date_images;
            echo json_encode($rdo);
        } else {
            echo json_encode("error");
        }
        break;

    default:
        include("module/exceptions/views/pages/error404.php");
        break;
}
?>