<div id="contenido">
    <h1>Household Info</h1>
    <p>
    <table border='2'>
        <tr>
            <td>ID: </td>
            <td>
                <?php
                echo $households['id'];
                ?>
            </td>
        </tr>

        <tr>
            <td>CATASTRAL REFERENCE: </td>
            <td>
                <?php
                echo $households['ref_id'];
                ?>
            </td>
        </tr>

        <tr>
            <td>HOUSEHOLD TYPE: </td>
            <td>
                <?php
                echo $households['h_type'];
                ?>
            </td>
        </tr>

        <tr>
            <td>PRICE: </td>
            <td>
                <?php
                echo $households['price'];
                ?>
            </td>
        </tr>

        <tr>
            <td>M2: </td>
            <td>
                <?php
                echo $households['m2'];
                ?>
            </td>
        </tr>

        <tr>
            <td>GARAGE: </td>
            <td>
                <?php
                echo $households['garage'];
                ?>
            </td>heating
        </tr>

        <tr>
            <td>ROOMS: </td>
            <td>
                <?php
                echo $households['rooms'];
                ?>
            </td>

        </tr>

        <td>HEATING: </td>
        <?php
        $heating = explode(":", $households['heating']);
        ?>
        <?php
        $busca_array = in_array("gas", $heating);
        if ($busca_array) {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="gas" readonly checked />Gas
        <?php
        } else {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="gas" readonly />Gas
        <?php
        }
        ?>
        <?php
        $busca_array = in_array("natural_gas", $heating);
        if ($busca_array) {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="natural_gas" readonly checked />Natural gas
        <?php
        } else {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="natural_gas" readonly />Natural gas
        <?php
        }
        ?>
        <?php
        $busca_array = in_array("none", $heating);
        if ($busca_array) {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="none" readonly checked />None
        <?php
        } else {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="none" readonly />None
        <?php
        }
        ?>
        <?php
        $busca_array = in_array("electric", $heating);
        if ($busca_array) {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="electric" readonly checked />Electric</td>
        <?php
        } else {
        ?>
            <input type="checkbox" id="heating[]" name="heating[]" value="electric" readonly />Electric</td>
        <?php
        }
        ?>
        </td>

        <tr>
            <td>LOCATION: </td>
            <td>
                <?php
                echo $households['location'];
                ?>
            </td>
        </tr>

        <tr>
            <td>PUBLICATION DATE: </td>
            <td>
                <?php
                echo $households['publication_date'];
                ?>
            </td>
        </tr>

    </table>
    </p>
    <p><a href="index.php?page=controller_households&op=list">Go Back</a></p>
</div>