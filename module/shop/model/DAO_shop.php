<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/SMARTTRADE_MVC/';
include($path . "/model/connect.php");

class DAOShop
{
    function select_all_products()
    {
        $sql = "SELECT p.id_product, p.name, p.price, p.img_product, p.visit_count, c.name_condition_type, s.status_state
                FROM product p
                INNER JOIN conditiontype c ON p.condition_id = c.id_condition_type
                INNER JOIN salestatus s ON p.sale_status_id = s.id_sale_status";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);

        $retrArray = array();
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_one_product($id)
    {
        $sql = "SELECT p.id_product, p.name, p.description, p.price, p.img_product, p.visit_count, c.name_condition_type, s.status_state
                FROM product p
                INNER JOIN conditiontype c ON p.condition_id = c.id_condition_type
                INNER JOIN salestatus s ON p.sale_status_id = s.id_sale_status
                WHERE p.id_product = '$id'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql)->fetch_object();
        connect::close($conexion);

        return $res;
    }

    function select_imgs_product($id)
    {
        $sql = "SELECT * FROM image WHERE product_id = '$id'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);

        $imgArray = array();
        if (mysqli_num_rows($res) > 0) {
            foreach ($res as $row) {
                array_push($imgArray, $row);
            }
        }
        return $imgArray;
    }
}
?>