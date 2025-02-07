<?php
    function validate_course_id($id_course){

        $mysqli = "SELECT * FROM courses WHERE id_course='$id_course'";
    
        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }
    
    function validate()
    {
        $check = true;
    
        $v_id_course = $_POST['id_course'];
    
        $r_id_course = validate_course_id($v_id_course);
    
        if ($r_id_course === 1) { // Ajuste para usar el nombre de la variable correcto
            echo '<script language="javascript">toastr.error("The id_course cannot be duplicated.");</script>';
            $check = false;
        }
    
        return $check;
    }