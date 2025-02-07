<div id="contenido">
    <form autocomplete="on" method="post" name="delete_course" id="delete_course" action="index.php?pages=controller_course&op=delete&id=<?php echo $_GET['id']; ?>">
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>¿Are you sure you want to delete this course -> <?php echo $_GET['id']; ?>?</h3></td>
                
            </tr>
            <tr>
                <td align="center"><button type="submit" class="Button_green"name="delete" id="delete">Accept</button></td>
                <td align="center"><a class="Button_red" href="index.php?pages=controller_course&op=list">Decline</a></td>
            </tr>
        </table>
    </form>
</div>

<style>
    #contenido {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
        background-color: #f4f7fb;
        font-family: Arial, sans-serif;
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

    .buttons {
        display: flex;
        justify-content: space-between;
        gap: 8px;
    }

    .Button_green, .Button_red {
        font-size: 14px;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        width: 45%;
        text-align: center;
    }

    .Button_green {
        background-color: #4CAF50;
        color: white;
    }

    .Button_red {
        background-color: #f44336;
        color: white;
    }

    .Button_green:hover {
        background-color: #45a049;
    }

    .Button_red:hover {
        background-color: #e53935;
    }

</style>