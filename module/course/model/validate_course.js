function validate_id_course(texto) {
  if (texto.length === 3) {
    // Aseguramos que el texto tenga exactamente 3 caracteres
    var reg = /^[0-9]{3}$/; // Acepta solo 3 dígitos
    return reg.test(texto);
  }
  return false;
}

function validate_name_course(texto) {
  if (texto.length > 0) {
    var reg = /^[a-zA-Z]*$/;
    return reg.test(texto);
  }
  return false;
}

function validate_description_course(texto) {
  if (texto.length > 0) {
    return true;
  }
  return false;
}

function validate_category_course(array) {
  var i;
  var ok = 0;
  for (i = 0; i < array.length; i++) {
    if (array[i].checked) {
      ok = 1;
    }
  }

  if (ok == 1) {
    return true;
  }
  if (ok == 0) {
    return false;
  }
}

function validate_level_course(array) {
  var check = false;
  for (var i = 0; i < array.length; i++) {
    if (array[i].checked) {
      check = true;
      break;
    }
  }
  return check;
}

function validate_price_course(texto) {
  if (texto.length > 0) {
    var reg = /^[0-9]{1,4}$/;
    return reg.test(texto);
  }
  return false;
}

function validate_language_course(texto) {
  if (texto && texto.length > 0) {
    return true; // Se ha seleccionado un idioma
  }
  return false; // No se ha seleccionado ningún idioma
}

function validate_datestart_course(texto) {
  if (texto.length > 0) {
    return true;
  }
  return false;
}

function validate_dateend_course(texto) {
  if (texto.length > 0) {
    return true;
  }
  return false;
}

// function validate_password(texto){
//     if (texto.length > 0){
//         var reg = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
//         return reg.test(texto);
//     }
//     return false;
// }

function validate(op) {
  // cambiar a validate(op) porque hay que cambiar los formularios de udpate y create, el boton ya no es update, es button y redirige a aqui
  var check = true;

  var v_id_course = document.getElementById("id_course").value;
  var v_name_course = document.getElementById("name_course").value;
  var v_description_course =
    document.getElementById("description_course").value;
  var v_category_course = document.getElementsByName("category_course[]");
  var v_level_course = document.getElementsByName("level_course[]");
  var v_price_course = document.getElementById("price_course").value;
  var v_language_course = "";
  var radios = document.getElementsByName("language_course");
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      v_language_course = radios[i].value;
      break;
    }
  }

  var v_datestart_course = document.getElementById("datestart_course").value;
  var v_dateend_course = document.getElementById("dateend_course").value;

  // Validaciones
  var r_id_course = validate_id_course(v_id_course);
  var r_name_course = validate_name_course(v_name_course);
  var r_description_course = validate_description_course(v_description_course);
  var r_category_course = validate_category_course(v_category_course);
  var r_level_course = validate_level_course(v_level_course);
  var r_price_course = validate_price_course(v_price_course);
  var r_language_course = validate_language_course(v_language_course);
  var r_datestart_course = validate_datestart_course(v_datestart_course);
  var r_dateend_course = validate_dateend_course(v_dateend_course);

  if (!r_id_course) {
    document.getElementById("error_id_course").innerHTML =
      " * El id_course introducido no es valido";
    // console.log(r_id_course);
    // return false;
    check = false;
  } else {
    document.getElementById("error_id_course").innerHTML = "";
  }
  if (!r_name_course) {
    document.getElementById("error_name_course").innerHTML =
      " * La name_course introducida no es valida";
    check = false;
  } else {
    document.getElementById("error_name_course").innerHTML = "";
  }
  if (!r_description_course) {
    document.getElementById("error_description_course").innerHTML =
      " * El description_course introducido no es valido";
    check = false;
  } else {
    document.getElementById("error_description_course").innerHTML = "";
  }
  if (!r_category_course) {
    document.getElementsByName("error_category_course").innerHTML =
      " * El category_course introducido no es valido";
    check = false;
  } else {
    document.getElementById("error_category_course").innerHTML = "";
  }
  if (!r_level_course) {
    document.getElementsByName("error_level_course").innerHTML =
      " * No has seleccionado ningun genero";
    check = false;
  } else {
    document.getElementById("error_level_course").innerHTML = "";
  }
  if (!r_price_course) {
    document.getElementById("error_price_course").innerHTML =
      " * No has introducido ninguna fecha";
    check = false;
  } else {
    document.getElementById("error_price_course").innerHTML = "";
  }
  if (!r_language_course) {
    document.getElementsByName("error_language_course").innerHTML =
      " * La edad introducida no es valida";
    check = false;
  } else {
    document.getElementById("error_language_course").innerHTML = "";
  }
  if (!r_datestart_course) {
    document.getElementById("error_datestart_course").innerHTML =
      " * No has seleccionado ningun idioma";
    check = false;
  } else {
    document.getElementById("error_datestart_course").innerHTML = "";
  }
  if (!r_dateend_course) {
    document.getElementById("error_dateend_course").innerHTML =
      " * El texto introducido no es valido";
    check = false;
  } else {
    document.getElementById("error_dateend_course").innerHTML = "";
  }
  // return check;

  // quitar el return y gracias a cambiar los botones hay que hacer if check
  if (check){
    if (op == 'create'){
      document.getElementsByName('alta_course').submit();
      document.getElementsByName('alta_course').action = "index.php?pages=controller_course&op=create";
      
    }
    if (op == 'update'){
        document.getElementById('update_course').submit();
        document.getElementById('update_course').action = "index.php?pages=controller_course&op=update";
    }
}
}

function validate_others(op) {

  if (op == 'delete') {
      document.getElementById('delete_course').submit();
      document.getElementById('delete_course').action = "index.php?pages=controller_course&op=delete";
  }
  if (op == 'delete_all') {
      document.getElementById('delete_all').submit();
      document.getElementById('delete_all').action = "index.php?pages=controller_course&op=delete_all";
  }

  if (op == 'dummies') {
      document.getElementById('dummies').submit();
      document.getElementById('dummies').action = "index.php?pages=controller_course&op=dummies";
  }
}

// $(document).ready(function () {
//   $('.course').click(function () {
//     var id = this.getAttribute('id_course');

//     $.get("module/course/controller/controller_course.php?op=read_modal&modal=" + id, function (data, status) {
//       var json = JSON.parse(data);

//       if (json === 'error') {
//         window.location.href = 'index.php?page=503';
//       } else {
//         // Actualiza los datos en el modal
//         $("#id_course").text(json.id_course);
//         $("#name_course").text(json.name_course);
//         $("#description_course").text(json.description_course);
//         $("#category_course").text(json.category_course);
//         $("#level_course").text(json.level_course);
//         $("#price_course").text(json.price_course);
//         $("#language_course").text(json.language_course);
//         $("#datestart_course").text(json.datestart_course);
//         $("#dateend_course").text(json.dateend_course);

//         // Muestra el modal
//         $("#modal-overlay").fadeIn();
//         $("#course_modal").fadeIn();
//       }
//     });
//   });

//   // Cerrar el modal
//   $("#modal-overlay, #close-modal").click(function () {
//     $("#modal-overlay").fadeOut();
//     $("#course_modal").fadeOut();
//   });
// });


function showModal(title_courses, id) {
  $("#details_course").show();
  $("#course_modal").dialog({
      title: title_courses,
      closeText: "",
      width: 850,
      height: 500,
      resizable: "false",
      modal: "true",
      hide: "fold",
      show: "fold",
      buttons: {
          Update: function () {
              window.location.href = 'index.php?pages=controller_course&op=update&id=' + id;
          },
          Delete: function () {
              window.location.href = 'index.php?pages=controller_course&op=delete&id=' + id;
          }
      }
  });
}

function loadContentModal() {
  $('.course').click(function () {
      var id = this.getAttribute('id_course');
      ajaxPromise('GET', 'JSON', 'module/course/controller/controller_course.php?op=read_modal&id=' + id)
          .then(function (data) {
              // var data = JSON.parse(data);
              $('<div></div>').attr('id', 'details_course', 'type', 'hidden').appendTo('#course_modal');
              $('<div></div>').attr('id', 'container').appendTo('#details_course');
              $('#container').empty();
              $('<div></div>').attr('id', 'course_content').appendTo('#container');
              $('#course_content').html(function () {
                  var content = "";
                  for (row in data) {
                      content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                  }
                  return content;
              });
              showModal(title_courses = data.id_course + " " + data.name_course, data.id_course);
          })
          .catch(function () {
              window.location.href = 'index.php?module=errors&op=503&desc=List error';
          });
  });
}

$(document).ready(function () {
  loadContentModal();
});
