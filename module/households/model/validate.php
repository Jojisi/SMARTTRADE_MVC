<?php
    function validate_ref_id($ref_id){

        $mysqli = "SELECT * FROM households WHERE ref_id='$ref_id'";
    
        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }
    
    function validate()
    {
        $check = true;
    
        $v_ref_id = $_POST['ref_id'];
    
        $r_ref_id = validate_ref_id($v_ref_id);
    
        if ($r_ref_id === 1) { // Ajuste para usar el nombre de la variable correcto
            echo '<script language="javascript">toastr.error("The catastral reference cannot be duplicated.");</script>';
            $check = false;
        }
    
        return $check;
    }
