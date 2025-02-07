<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="index.php?page=controller_home">Home</a></li>
                <li>Dummies</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div id="contenido">
    <form autocomplete="on" method="post" name="dummies" id="dummies">
        <table border='0'>
            <tr>
                <th width=1200>
                    <h3>Do you want to create a dummie list of households?</h3>
                    </td>

            </tr>
        </table>
        <table border='0'>
            <tr>
                <td><input type="hidden" id="ref_id" name="ref_id" placeholder="catastral reference" value="<?php echo $ref_id['ref_id']; ?>" /></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_green" onclick="validate_others('dummies')" value="Send" /></td>
                <td align="right"><br><a class="Button_red" href="index.php?page=controller_households&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>