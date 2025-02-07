<div id="contenido">
    <form autocomplete="on" method="post" name="delete_all" id="delete_all">
        <table border='0'>
            <tr>
                <th width="100%">
                    <h3>Do you want to delete ALL the courses at once?</h3>
                </th>
            </tr>
        </table>
        <table border='0'>
            <tr>
                <td><input type="hidden" id="id_course" name="id_course" placeholder="course_id" value="<?php echo $id_course['id_course']; ?>" /></td>
            </tr>

            <tr>
                <td>
                    <br>
                    <!-- Botón para aprobar la eliminación -->
                    <input name="Submit" type="button" class="Button_green" onclick="validate_others('delete_all')" value="Approve" />
                </td>
                <td align="right">
                    <br>
                    <!-- Enlace para regresar -->
                    <a class="Button_red" href="index.php?pages=controller_course&op=list">Back</a>
                </td>
            </tr>
        </table>
        <br><br>
    </form>
</div>

<style>
    #contenido {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f4f7fb;
        font-family: Arial, sans-serif;
        /* min-height: 100vh; */
    }

    .confirmation-box {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 350px;
        width: 100%;
    }

    .confirmation-title {
        font-size: 18px;
        color: #333;
        margin-bottom: 15px;
    }

    .course-id {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    /* Alineación de los botones y espaciado */
    .buttons {
        display: flex;
        justify-content: space-between;
        gap: 8px;
    }

    /* Estilos para el botón "Approve" */
    .Button_green {
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color:rgb(46, 202, 51);
        color: white;
        text-align: center;
        width: 100%;
        max-width: 160px;
        cursor: pointer;
        text-decoration: none;
    }

    .Button_green:hover {
        background-color: #45a049;
    }

    /* Estilos para el enlace "Back" */
    .Button_red {
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #f44336;
        color: white;
        text-align: center;
        width: 100%;
        max-width: 160px;
        text-decoration: none;
        display: inline-block;
    }

    .Button_green:hover {
        background-color: #45a049;
    }

    .Button_red:hover {
        background-color: #e53935;
    }

    /* Alineación de los botones */
    td {
        padding: 10px;
    }

    /* Espaciado entre los botones */
    .Button_green + .Button_red {
        margin-left: 10px;
    }

</style>
