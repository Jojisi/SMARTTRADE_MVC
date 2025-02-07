<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="index.php?page=controller_home">Home</a></li>
                <li>Create</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div id="contenido">
    <form autocomplete="on" method="post" name="alta_households" id="alta_households">
        <h1>New Household</h1>
        <table border='0'>

            <tr>
                <td>Catastral reference: </td>
                <td><input type="text" id="ref_id" name="ref_id" placeholder="catastral_reference" value="" /></td>
                <td>
                    <font color="red">
                        <span id="error_ref_id" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Household type: </td>
                <td><select multiple size="5" id="h_type" name="h_type" placeholder="household_type">
                        <option value="flat">Flat</option>
                        <option value="house">House</option>
                        <option value="contry_house">Country house</option>
                        <option value="office">Office</option>
                        <option value="warehouse">Warehouse</option>
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
                <td><input type="text" id="price" name="price" placeholder="price" value="" /></td>
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
                <td><input type="text" id="m2" name="m2" placeholder="m2" value="" /></td>
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
                <td><input type="text" id="garage" name="garage" placeholder="y/n" value="" /></td>
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
                <td><input type="text" id="rooms" name="rooms" placeholder="rooms_number" value="" /></td>
                <td>
                    <font color="red">
                        <span id="error_rooms" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>


            <tr>
                <td>Heating: </td>
                <td><input type="checkbox" id= "heating[]" name="heating[]" value="gas" />Gas
                    <input type="checkbox" id= "heating[]" name="heating[]" value="natural_gas" />Natural Gas
                    <input type="checkbox" id= "heating[]" name="heating[]" value="none" />None
                    <input type="checkbox" id= "heating[]" name="heating[]" value="electric" />Electric
                </td>
                <td>
                    <font color="red">
                        <span id="error_heating" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Location: </td>
                <td><input type="text" id="location" name="location" placeholder="location" value="" /></td>
                <td>
                    <font color="red">
                        <span id="error_location" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td>Publication date: </td>
                <td><input type="text" id="publication_date" name="publication_date" placeholder="date" value="" /></td>
                <td>
                    <font color="red">
                        <span id="error_publication_date" class="error">
                        </span>
                    </font>
                    </font>
                </td>
            </tr>

            <tr>
                <td><input type="button" name="create" id="create" onclick="validate('create')" value="Enviar" /></td>
                <td align="right"><a href="index.php?page=controller_households&op=list">Go back</a></td>
            </tr>
        </table>
    </form>
</div>