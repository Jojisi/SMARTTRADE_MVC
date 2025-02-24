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
        
                $daoshop_img = new DAOShop();
                $Date_images = $daoshop_img->select_imgs_product($_GET['id']);
        
                if (!$Date_car) {
                    die(json_encode(["error" => "Product not found"]));
                }
        
                if (!$Date_images) {
                    $Date_images = []; // Si no hay imágenes, devolvemos un array vacío
                }
        
                $rdo = array();
                $rdo[0] = $Date_car;
                $rdo[1] = $Date_images;
        
                echo json_encode($rdo);
            } catch (Exception $e) {
                die(json_encode(["error" => $e->getMessage()]));
            }
            break;
        

    default:
        include("module/exceptions/views/pages/error404.php");
        break;
}
?>