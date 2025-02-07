<?php
// $data = 'hola update post households';
// die('<script>console.log('.json_encode( $data ) .');</script>');
?>
<br>
<br>
<br>
<br>
<div id="contenido">
    <!-- hay que quitar el action ahora -->
    <form autocomplete="on" method="post" name="update_households" id="update_households">
        <h1>Update household</h1>
        <table border='0'>
            <tr>
                <td>Catastral reference: </td>
                <td><input type="text" id="ref_id" name="ref_id" placeholder="catastral_reference" value="<?php echo $households['ref_id']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_ref_id" class="error"></span>
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Household type: </td>
                <td><select id="h_type" name="h_type" placeholder="h_type">
                        <?php
                        if ($households['h_type'] === "flat") {
                        ?>
                            <option value="flat" selected>Flat</option>
                            <option value="house">House</option>
                            <option value="country_house">Country house</option>
                            <option value="office">Office</option>
                            <option value="warehouse">Warehouse</option>
                        <?php
                        } elseif ($households['h_type'] === "house") {
                        ?>
                            <option value="flat">Flat</option>
                            <option value="house" selected>House</option>
                            <option value="country_house">Country house</option>
                            <option value="office">Office</option>
                            <option value="warehouse">Warehouse</option>
                        <?php
                        } elseif ($households['h_type'] === "country_house") {
                        ?>
                            <option value="flat">Flat</option>
                            <option value="house">House</option>
                            <option value="country_house" selected>Country house</option>
                            <option value="office">Office</option>
                            <option value="warehouse">Warehouse</option>
                        <?php
                        } elseif ($households['h_type'] === "office") {
                        ?>
                            <option value="flat">Flat</option>
                            <option value="house">House</option>
                            <option value="country_house">Country house</option>
                            <option value="office" selected>Office</option>
                            <option value="warehouse">Warehouse</option>
                        <?php
                        } else {
                        ?>
                            <option value="flat">Flat</option>
                            <option value="house">House</option>
                            <option value="country_house">Country house</option>
                            <option value="office">Office</option>
                            <option value="warehouse" selected>Warehouse</option>
                        <?php
                        }
                        ?>

                    </select></td>
                <td>
                    <font color="red">
                        <span id="error_h_type" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td><input type="text" id="price" name="price" placeholder="price" value="<?php echo $households['price']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_price" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>m2: </td>
                <td><input type="text" id="m2" name="m2" placeholder="m2" value="<?php echo $households['m2']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_m2" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Garage: </td>
                <td><input type="text" id="garage" name="garage" placeholder="y/n" value="<?php echo $households['garage']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_garage" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Rooms: </td>
                <td><input type="text" id="rooms" name="rooms" placeholder="rooms" value="<?php echo $households['rooms']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_rooms" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <td>Heating: </td>
            <td>
                <?php
                $heating = explode(":", $households['heating']);
                ?>
            <td>
                <?php
                $busca_array=in_array("gas", $heating);
                if ($busca_array) {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="gas" checked />gas
                <?php
                } else {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="gas" />gas
                <?php
                }
                ?>
                <?php
                $busca_array = in_array("natural_gas", $heating);
                if ($busca_array) {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="natural_gas" checked />natural_gas
                <?php
                } else {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="natural_gas" />natural_gas
                <?php
                }
                ?>
                <?php
                $busca_array = in_array("none", $heating);
                if ($busca_array) {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="none" checked />none
                <?php
                } else {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="none" />none
                <?php
                }
                ?>
                <?php
                $busca_array = in_array("electric", $heating);
                if ($busca_array) {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="electric" checked />electric</td>
                <?php
                } else {
                ?>
                    <input type="checkbox" id="heating[]" name="heating[]" value="electric" />electric</td>
                <?php
                }
                ?>
            </td>
            <td>
                <font color="red">
                    <span id="error_heating" class="error"></span>

                </font>
            </td>
            </tr>

            <tr>
                <td>Location: </td>
                <td><input type="text" id="location" name="location" placeholder="location" value="<?php echo $households['location']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_location" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Publication Date: </td>
                <td><input type="text" id="publication_date" name="publication_date" placeholder="date" value="<?php echo $households['publication_date']; ?>" /></td>
                <td>
                    <font color="red">
                        <span id="error_publication_date" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>


            <tr>
                <td><input type="button" name="update" id="update" onclick="validate('update')" value="Enviar" /></td>
                <td align="right"><a href="index.php?page=controller_households&op=list">Go Back</a></td>
            </tr>
        </table>
    </form>
</div>