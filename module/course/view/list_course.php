<div id="contenido">
    <div class="container">
        <div class="row">
            <h3>COURSES LIST</h3>
        </div>
        <div class="row buttons-container">
            <a href="index.php?pages=controller_course&op=create" title="Add a new course" class="button-icon">
                <img class="icon" src="view/img/add_button.png" alt="Add Course">
                <span>Add</span>
            </a>
            <a href="index.php?pages=controller_course&op=delete_all" title="Delete all courses" class="button-icon">
                <img class="icon" src="view/img/delete_all_icon.png" alt="Delete All Courses">
                <span>Delete All</span>
            </a>
            <a href="index.php?pages=controller_course&op=dummies" title="Generate dummy courses" class="button-icon">
                <img class="icon" src="view/img/dummies_container.png" alt="Generate Dummy Courses">
                <span>Dummies</span>
            </a>
        </div>

        <table>
            <tr>
                <td width=125><b>Course ID</b></th>
                <td width=125><b>Name</b></th>
                <td width=125><b>Category</b></th>
                <td width=125><b>Level</b></th>
                <td width=125><b>Price</b></th>
                <td width=125><b>Language</b></th>
                <th width=350><b>ACTION</b></th>
            </tr>
            <?php
            if ($rdo->num_rows === 0) {
                echo '<tr>';
                echo '<td align="center" colspan="3">THERE`S NO COURSES AVAILABLE !!!</td>';
                echo '</tr>';
            } else {
                foreach ($rdo as $row) {
                    echo '<tr>';
                    echo '<td width=125>' . $row['id_course'] . '</td>';
                    echo '<td width=125>' . $row['name_course'] . '</td>';
                    echo '<td width=125>' . $row['category_course'] . '</td>';
                    echo '<td width=125>' . $row['level_course'] . '</td>';
                    echo '<td width=125>' . $row['price_course'] . ' €</td>';
                    echo '<td width=125>' . $row['language_course'] . '</td>';
                    echo '<td width=350>';
                    // echo '<a class="Button_blue" href="index.php?pages=controller_course&op=read&id=' . $row['id_course'] . '">Read</a>';
                    print("<div class='course Button_blue' id_course='" . $row['id_course'] . "'>Read</div>");  //READ
                    echo '&nbsp;';
                    echo '<a class="Button_green" href="index.php?pages=controller_course&op=update&id=' . $row['id_course'] . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="Button_red" href="index.php?pages=controller_course&op=delete&id=' . $row['id_course'] . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</div>

<!-- modal window -->
<!-- <div id="modal-overlay"></div>
<div id="course_modal">
  <h2>Course Details</h2>
  <p><strong>ID:</strong> <span id="id_course"></span></p>
  <p><strong>Name:</strong> <span id="name_course"></span></p>
  <p><strong>Description:</strong> <span id="description_course"></span></p>
  <p><strong>Category:</strong> <span id="category_course"></span></p>
  <p><strong>Level:</strong> <span id="level_course"></span></p>
  <p><strong>Price:</strong> <span id="price_course"></span>€</p>
  <p><strong>Language:</strong> <span id="language_course"></span></p>
  <p><strong>Start Date:</strong> <span id="datestart_course"></span></p>
  <p><strong>End Date:</strong> <span id="dateend_course"></span></p>
  <div class="modal-buttons">
    <button id="close-modal">Close</button>
  </div>
</div> -->

<section id="course_modal">
    <!-- <div id="details_course" hidden>
        <div id="details">
            <div id="container">
            </div>
        </div>
    </div> -->
</section>


<style>
    /* Estilos generales */
    #contenido {
        font-family: Arial, sans-serif;
        background-color: #f4f7fb;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .row {
        margin-bottom: 20px;
    }

    /* Contenedor para centrar botones */
    .buttons-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 30px;
        /* Espacio extra entre botones y la tabla */
    }

    .button-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        padding: 8px 15px;
        border: 2px solid #3498db;
        border-radius: 8px;
        background-color: #eaf6fd;
        color: rgb(243, 160, 16);
        font-size: 14px;
        font-weight: bold;
        transition: transform 0.3s ease;
        /* Añadimos transición para el efecto */
    }

    .button-icon:hover img {
        transform: scale(1.3);
        /* Aumenta el tamaño del icono */
    }

    .button-icon img {
        margin-right: 8px;
        width: 24px;
        height: auto;
    }

    .button-icon:hover {
        background-color: rgba(243, 160, 16, 0.81);
        color: white;
        border-color: rgba(243, 160, 16, 0.69);
    }

    /* Tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    table th,
    table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f4f7fb;
        font-weight: bold;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .Button_blue,
    .Button_green,
    .Button_red {
        padding: 12px 26px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
    }

    .Button_blue {
        background-color: #3498db;
    }

    .Button_green {
        background-color: #4CAF50;
    }

    .Button_red {
        background-color: #f44336;
    }

    .Button_blue:hover {
        background-color: #2980b9;
    }

    .Button_green:hover {
        background-color: #45a049;
    }

    .Button_red:hover {
        background-color: #e53935;
    }

    .no-courses {
        text-align: center;
        font-size: 18px;
        color: #888;
        padding: 20px;
    }
</style>