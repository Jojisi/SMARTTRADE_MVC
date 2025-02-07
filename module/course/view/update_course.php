<?php
$error_id_course = "";
$error_name_course = "";
$error_description_course = "";
$error_category_course = "";
$error_level_course = "";
$error_price_course = "";
$error_language_course = "";
$error_datestart_course = "";
$error_dateend_course = "";
?>
<div id="contenido">
    <form autocomplete="on" method="post" name="update_course" id="update_course">
    <!-- onsubmit="return validate();" action="index.php?pages=controller_course&op=update"> -->
        <h1>Modify Course</h1>
                <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #cecece;
            margin: 0;
            padding: 0;
        }

        #contenido {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: 40px auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td:first-child {
            text-align: right;
            font-weight: bold;
            color: #333;
            padding-right: 10px;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="submit"] {
            background: #004aad;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background: #004aad;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
        <table border='0'>
            <tr>
                <td>Course ID: </td>
                <td><input type="text" id="id_course" name="id_course" placeholder="id_course" value="<?php echo $course['id_course'];?>"/></td>
                <td><font color="red">
                    <span id="error_id_course" class="error">
                        <?php
                            echo "$error_id_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>
        
            <tr>
                <td>Name: </td>
                <td><input type="text" id="name_course" name="name_course" placeholder="name of the course" value="<?php echo $course['name_course'];?>"/></td>
                <td><font color="red">
                    <span id="error_name_course" class="error">
                        <?php
                            echo "$error_name_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Description: </td>
                <td><textarea cols="30" rows="5" id="description_course" name="description_course" placeholder="what's the course about"><?php echo $course['description_course'];?></textarea></td>
                <td><font color="red">
                    <span id="error_description_course" class="error">
                        <?php
                            echo "$error_description_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Category: </td>
                <?php
                    $cat_course=explode(":", $course['category_course']);
                ?>
                <td>
                    <?php
                        $busca_array=in_array("Java", $cat_course);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "category_course[]" name="category_course[]" value="Java" checked/>Java
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "category_course[]" name="category_course[]" value="Java"/>Java
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("HTML", $cat_course);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "category_course[]" name="category_course[]" value="HTML" checked/>HTML
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "category_course[]" name="category_course[]" value="HTML"/>HTML
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("CSS", $cat_course);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "category_course[]" name="category_course[]" value="CSS" checked/>CSS</td>
                    <?php
                        }else{
                    ?>
                    <input type="checkbox" id= "category_course[]" name="category_course[]" value="CSS"/>CSS</td>
                    <?php
                        }
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_category_course" class="error">
                        <?php
                            echo "$error_category_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Level: </td>
                <?php
                    $lvl_course=explode(":", $course['level_course']);
                ?>
                <td><select multiple size="3" id="level_course[]" name="level_course[]" placeholder="level_course">
                    <?php
                        $busca_array=in_array("Rookie", $lvl_course);
                        if($busca_array){
                    ?>
                        <option value="Rookie" selected>Rookie</option>
                    <?php
                        }else{
                    ?>
                        <option value="Rookie">Rookie</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Beginner", $lvl_course);
                        if($busca_array){
                    ?>
                        <option value="Beginner" selected>Beginner</option>
                    <?php
                        }else{
                    ?>
                        <option value="Beginner">Beginner</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Intermediate", $lvl_course);
                        if($busca_array){
                    ?>
                        <option value="Intermediate" selected>Intermediate</option>
                    <?php
                        }else{
                    ?>
                        <option value="Intermediate">Intermediate</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Advanced", $lvl_course);
                        if($busca_array){
                    ?>
                        <option value="Advanced" selected>Advanced</option>
                    <?php
                        }else{
                    ?>
                        <option value="Advanced">Advanced</option>
                    <?php
                        }
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_level_course" class="error">
                        <?php
                            echo "$error_level_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Price: </td>
                <td><input type="text" id="price_course" name="price_course" placeholder="price of the course" value="<?php echo $course['price_course'];?>"/></td>
                <td><font color="red">
                    <span id="error_price_course" class="error">
                        <?php
                            echo "$error_price_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Language: </td>
                <td>
                    <?php
                        if ($course['language_course']==="Hombre"){
                    ?>
                        <input type="radio" id="language_course" name="language_course" placeholder="language_course" value="English" checked/>English
                        <input type="radio" id="language_course" name="language_course" placeholder="language_course" value="Spanish"/>Spanish
                    <?php    
                        }else{
                    ?>
                        <input type="radio" id="language_course" name="language_course" placeholder="language_course" value="English"/>English
                        <input type="radio" id="language_course" name="language_course" placeholder="language_course" value="Spanish" checked/>Spanish
                    <?php   
                        }
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_language_course" class="error">
                        <?php
                            echo "$error_language_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>Sart date: </td>
                <td><input id="datestart_course" type="text" name="datestart_course" placeholder="start date of the course" value="<?php echo $course['datestart_course'];?>"/></td>
                <td><font color="red">
                    <span id="error_datestart_course" class="error">
                        <?php
                            echo "$error_datestart_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>End date: </td>
                <td><input id="dateend_course" type="text" name="dateend_course" placeholder="end date of the course" value="<?php echo $course['dateend_course'];?>"/></td>
                <td><font color="red">
                    <span id="error_dateend_course" class="error">
                        <?php
                            echo "$error_dateend_course";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <!-- <td><input type="submit" name="update" id="update"/></td> -->
                <td><input type="button" id="update" onclick="console.log('Button clicked'); validate('update')" style="width: 100%; padding: 10px; background-color: #004aad; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;" value="Modify"></td>
                <!-- <td><input type="button" name="update" id="update" onclick="validate('update')" value="Update" /></td> -->
                <td align="right"><a href="index.php?pages=controller_course&op=list">Go back</a></td>
            </tr>
        </table>
    </form>
</div>

<script>
  function validate(op) {
    console.log("Button clicked");
    var check = true;
    var v_id_course = document.getElementById("id_course").value;
    if (v_id_course.length == 0) {
      console.log("ID is empty");
      check = false;
    }
    if (check) {
      console.log("Validation passed");
      document.getElementById('update_course').submit();
    } else {
      console.log("Validation failed");
    }
  }
</script>