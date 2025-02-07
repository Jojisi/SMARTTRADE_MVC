<?php
// $data = 'hola crtl households';
// die('<script>console.log('.json_encode( $data ) .');</script>');
$path = $_SERVER['DOCUMENT_ROOT'] . '/MQC_MVC_EXAMEN_joanjimenez_si/';
include($path . "module/households/model/DAOhouseholds.php");

@session_start();

switch ($_GET['op']) {
    case 'list';
        // $data = 'hola crtl households';
        // die('<script>console.log('.json_encode( $data ) .');</script>');
        try {
            $daohouseholds = new DAOhouseholds();
            $rdo = $daohouseholds->select_all_households();
            //die('<script>console.log('.json_encode( $rdo->num_rows ) .');</script>');
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }

        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/households/view/list_households.php");
        }
        break;

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'create';
        // $data = 'hola crtl households create';
        // die('<script>console.log('.json_encode( $data ) .');</script>');

        include("module/households/model/validate.php");

        $check = true;

        if ($_POST) {
            // $data = 'hola create post households';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            // die('<script>console.log('.json_encode( $_POST ) .');</script>');

            $check = validate();
            //die('<script>console.log('.json_encode( $check ) .');</script>');

            if ($check) {
                $_SESSION['households'] = $_POST;
                // die('<script>console.log('.json_encode( $_POST ) .');</script>');
                try {
                    $daohouseholds = new DAOhouseholds();
                    $rdo = $daohouseholds->insert_households($_POST);
                    // die('<script>console.log('.json_encode( $rdo ) .');</script>');
                } catch (Exception $e) {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }

                if ($rdo) {
                    echo '<script language="javascript">setTimeout(() => {
                            toastr.success("Successfully created a new household");
                        }, 1000);</script>';
                    echo '<script language="javascript">setTimeout(() => {
                            window.location.href="index.php?page=controller_households&op=list";
                        }, 2000);</script>';
                } else {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }
            }
        }
        include("module/households/view/create_households.php");
        break;

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'update';
        include("module/households/model/validate.php");
        $check = true;

        if ($_POST) {
            // $data = 'hola update post households';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            //$check=validate();
            $check = true;

            //die('<script>console.log('.json_encode( $check ) .');</script>');

            if ($check) {
                $_SESSION['households'] = $_POST;
                //die('<script>console.log('.json_encode( $_POST ) .');</script>');
                try {
                    $daohouseholds = new DAOhouseholds();
                    $rdo = $daohouseholds->update_households($_POST);
                    //die('<script>console.log('.json_encode( $rdo ) .');</script>');
                } catch (Exception $e) {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }

                if ($rdo) {
                    echo '<script language="javascript">alert("Updated successfully")</script>';
                    $callback = 'index.php?page=controller_households&op=list';
                    die('<script>window.location.href="' . $callback . '";</script>');
                } else {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }
            } else {
                echo '<script language="javascript">setTimeout(() => {
                        window.location.href="index.php?page=controller_households&op=list";
                    }, 2000);</script>';
            }
        }

        try {
            $daohouseholds = new DAOhouseholds();
            $rdo = $daohouseholds->select_households($_GET['ref_id']);
            $households = get_object_vars($rdo);
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }

        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/households/view/update_households.php");
        }
        break;

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'read';
        // $data = 'hola crtl households read';
        // die('<script>console.log('.json_encode( $data ) .');</script>');
        // die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');

        try {
            $daohouseholds = new DAOhouseholds();
            $rdo = $daohouseholds->select_households($_GET['ref_id']);
            $households = get_object_vars($rdo);
            //die('<script>console.log('.json_encode( $households ) .');</script>');
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }
        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/households/view/read_households.php");
        }
        break;

    case 'delete';
        // $data = 'hola crtl households delete';
        // die('<script>console.log('.json_encode( $data ) .');</script>');
        // die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');

        if ($_POST) {
            //die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');
            try {
                $daohouseholds = new DAOhouseholds();
                $rdo = $daohouseholds->delete_households($_GET['ref_id']);
            } catch (Exception $e) {
                $callback = 'index.php?page=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
            if ($rdo) {
                echo '<script language="javascript">setTimeout(() => {
                        toastr.success("Deleted successfully");
                    }, 1000);</script>';
                echo '<script language="javascript">setTimeout(() => {
                        window.location.href="index.php?page=controller_households&op=list";
                    }, 2000);</script>';
            } else {
                $callback = 'index.php?page=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/households/view/delete_households.php");
        break;

    case 'delete_all';
        if ($_POST) {
            try {
                $dao_households = new DAOhouseholds();
                $result = $dao_households->delete_all_households();
            } catch (Exception $e) {
                $callback = 'index.php?module=errors&op=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }

            if ($result) {
                echo '<script language="javascript">alert("Deleted successfully")</script>';
                $callback = 'index.php?page=controller_households&op=list';
                die('<script>window.location.href="' . $callback . '";</script>');
            } else {
                $callback = 'index.php?module=errors&op=503&desc=Delete all error';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/households/view/delete_all.php");
        break;

    case 'dummies';
        if ($_POST) {
            try {
                $dao_households = new DAOhouseholds();
                $result = $dao_households->dummies_households();
            } catch (Exception $e) {
                $callback = 'index.php?module=errors&op=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }

            if ($result) {
                echo '<script language="javascript">alert("New households list has been created successfully")</script>';
                $callback = 'index.php?page=controller_households&op=list';
                die('<script>window.location.href="' . $callback . '";</script>');
            } else {
                $callback = 'index.php?module=errors&op=503&desc=Dummies error';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/households/view/dummies.php");
        break;

    case 'read_modal':
        //echo $_GET["modal"]; 
        //exit;

        try {
            $dao_households = new DAOhouseholds();
            $rdo = $dao_households->select_households($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $households = get_object_vars($rdo);
            echo json_encode($households);
            //echo json_encode("error");
            exit;
        }
        break;
    default;
        include("view/inc/error404.php");
        break;
}
