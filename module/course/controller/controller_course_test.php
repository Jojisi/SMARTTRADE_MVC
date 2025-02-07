<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/wallapop_MVC_PHP_JS/';
include($path . "module/course/model/DAOCourse.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

switch ($_GET['op']) {
    case 'list':
        try {
            $daocourse = new DAOCourse();
            $rdo = $daocourse->select_all_courses();
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }

        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/course/view/list_course.php");
        }
        break;

    case 'create':
        include("module/course/model/validate.php");

        $check = true;

        if ($_POST) {
            $check = validate();

            if ($check) {
                $_SESSION['course'] = $_POST;
                try {
                    $daocourse = new DAOCourse();
                    $rdo = $daocourse->insert_course($_POST);
                } catch (Exception $e) {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }

                if ($rdo) {
                    echo '<script language="javascript">setTimeout(() => {
                            toastr.success("Creado en la base de datos correctamente");
                        }, 1000);</script>';
                    echo '<script language="javascript">setTimeout(() => {
                            window.location.href="index.php?pages=controller_course&op=list";
                        }, 2000);</script>';
                } else {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }
            }
        }
        include("module/course/view/create_course.php");
        break;

    case 'update':
        include("module/course/model/validate.php");

        if ($_POST) {
            $check = true; // Si el check es necesario, agregar validación adecuada

            if ($check) {
                $_SESSION['course'] = $_POST;
                try {
                    $daocourse = new DAOCourse();
                    $rdo = $daocourse->update_course($_POST);
                } catch (Exception $e) {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }

                if ($rdo) {
                    echo '<script language="javascript">alert("Updated successfully")</script>';
                    $callback = 'index.php?pages=controller_course&op=list';
                    die('<script>window.location.href="' . $callback . '";</script>');
                } else {
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="' . $callback . '";</script>');
                }
            } else {
                echo '<script language="javascript">setTimeout(() => {
                            window.location.href="index.php?pages=controller_course&op=list";
                        }, 2000);</script>';
            }
        }

        try {
            $daocourse = new DAOCourse();
            $rdo = $daocourse->select_course($_GET['id']);
            $course = get_object_vars($rdo);
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }

        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/course/view/update_course.php");
        }
        break;

    case 'read':
        try {
            $daocourse = new DAOCourse();
            $rdo = $daocourse->select_course($_GET['id']);
            $course = get_object_vars($rdo);
        } catch (Exception $e) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        }

        if (!$rdo) {
            $callback = 'index.php?page=503';
            die('<script>window.location.href="' . $callback . '";</script>');
        } else {
            include("module/course/view/read_course.php");
        }
        break;

    case 'delete':
        if (isset($_POST['delete'])) {
            try {
                $daocourse = new DAOCourse();
                $rdo = $daocourse->delete_course($_GET['id']);
            } catch (Exception $e) {
                $callback = 'index.php?page=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }

            if ($rdo) {
                echo '<script language="javascript">setTimeout(() => {
                        toastr.success("Borrado en la base de datos correctamente");
                    }, 1000);</script>';
                echo '<script language="javascript">setTimeout(() => {
                        window.location.href="index.php?pages=controller_course&op=list";
                    }, 2000);</script>';
            } else {
                $callback = 'index.php?page=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/course/view/delete_course.php");
        break;

    case 'delete_all':
        if ($_POST) {
            try {
                $daocourse = new DAOCourse();
                $result = $daocourse->delete_all_courses();
            } catch (Exception $e) {
                $callback = 'index.php?module=errors&op=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }

            if ($result) {
                echo '<script language="javascript">alert("Deleted successfully")</script>';
                $callback = 'index.php?pages=controller_course&op=list';
                die('<script>window.location.href="' . $callback . '";</script>');
            } else {
                $callback = 'index.php?module=errors&op=503&desc=Delete all error';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/course/view/delete_all.php");
        break;

    case 'dummies':
        if ($_POST) {
            try {
                $daocourse = new DAOCourse();
                $result = $daocourse->dummies_courses();
            } catch (Exception $e) {
                $callback = 'index.php?module=errors&op=503';
                die('<script>window.location.href="' . $callback . '";</script>');
            }

            if ($result) {
                echo '<script language="javascript">alert("New courses list has been created successfully")</script>';
                $callback = 'index.php?pages=controller_course&op=list';
                die('<script>window.location.href="' . $callback . '";</script>');
            } else {
                $callback = 'index.php?module=errors&op=503&desc=Dummies error';
                die('<script>window.location.href="' . $callback . '";</script>');
            }
        }

        include("module/course/view/dummies_course.php");
        break;

    case 'read_modal':
        try {
            $daocourse = new DAOCourse();
            $rdo = $daocourse->select_course($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }

        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $course = get_object_vars($rdo);
            echo json_encode($course);
            exit;
        }
        break;

    default:
        include("view/inc/error404.php");
        break;
}
