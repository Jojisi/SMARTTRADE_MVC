<br>
<br>
<br>
<br>


<div id="contenido">
    <form autocomplete="on" method="post" name="delete_households" id="delete_households">
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>Are you sure you wanna delete this household? <?php echo $_GET['ref_id']; ?>?</h3></td>
                
            </tr>
            <tr>
                <td><input type="hidden" id="ref_id" name="ref_id" placeholder="catastral reference" value="<?php echo $ref_id['ref_id'];?>"/></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_green" onclick="validate_others('delete')" value="Send"/></td>
                <td align="right"><br><a class="Button_red" href="index.php?page=controller_households&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>