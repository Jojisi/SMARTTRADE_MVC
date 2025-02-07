<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="index.php?page=controller_home">Home</a></li>
                <li>About</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<div id="contenido">
    <div class="container">
        <div class="row">
            <h3>HOUSEHOLDS LIST</h3>
        </div>
        <div class="row">
            <br>
            <br>
            <br>
            <br>
            <br>
            <p><a href="index.php?pages=controller_households&op=create"><img src="view/img/crear_coches.png"></a>⠀⠀<a href="index.php?pages=controller_households&op=delete_all"><img src="view/img/add_button.png"></a>⠀⠀
                <a href="index.php?pages=controller_households&op=dummies"><img src="view/img/dummies-si.png"></a>
            </p>

            <table>
                <tr>
                    <td width=125><b>ID</b></th>
                    <td width=125><b>REF_ID</b></th>
                    <td width=125><b>TYPE</b></th>
                    <th width=350><b>Action</b></th>
                </tr>
                <?php
                if ($rdo->num_rows === 0) {
                    echo '<tr>';
                    echo '<td align="center"  colspan="3">THERES NO HOUSEHOLDS AVAILABIE</td>';
                    echo '</tr>';
                } else {
                    foreach ($rdo as $row) {
                        echo '<tr>';
                        echo '<td width=125>' . $row['id'] . '</td>';
                        echo '<td width=125>' . $row['ref_id'] . '</td>';
                        echo '<td width=125>' . $row['h_type'] . '</td>';
                        echo '<td width=350>';

                        print("<div class='households Button_blue' ref_id='" . $row['ref_id'] . "'>Read</div>");  //READ
                        echo '&nbsp;';
                        // echo '<a class="Button_blue" href="index.php?page=controller_households&op=read&ref_id=' . $row['ref_id'] . '">Read</a>';
                        echo '&nbsp;';
                        echo '<a class="Button_green" href="index.php?pages=controller_households&op=update&ref_id=' . $row['ref_id'] . '">Update</a>';
                        echo '&nbsp;';
                        echo '<a class="Button_red" href="index.php?pages=controller_households&op=delete&ref_id=' . $row['ref_id'] . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>

<!-- modal window -->
<section id="households_modal">
</section>