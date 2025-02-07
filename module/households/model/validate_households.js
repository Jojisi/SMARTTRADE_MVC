function validate_ref_id(ref_id) {
    // console.log(prueba, prueba.length);
    if (ref_id.length == 6) {
        var reg = /^([A-Za-z0-9]{6})$/;
        return reg.test(ref_id);
    }
    return false;
}

function validate_h_type(h_type) {
    if (h_type.length > 0) {
        var reg = /^[a-zA-Z]*$/;
        return reg.test(h_type);
    }
    return false;
}

function validate_price(price) {
    if (price.length > 0) {
        return true;
    }
    return false;
}

function validate_m2(m2) {
    if (m2.length > 0) {
        return true;
    }
    return false;
}

function validate_garage(garage) {
    if (garage.length > 0) {
        return true;
    }
    return false;
}

function validate_rooms(rooms) {
    if (rooms.length > 0) {
        return true;
    }
    return false;
}

function validate_heating(heating) {
    if (heating.length > 0) {
        return true;
    }
    return false;
}

function validate_location(location) {
    if (location.length > 0) {
        return true;
    }
    return false;
}

function validate_publication_date(publication_date) {
    if (publication_date.length > 0) {
        return true;
    }
    return false;
}


function validate(op) {
    // console.log('hola validate js');
    // return true;

    var check = true;

    var v_ref_id = document.getElementById('ref_id').value;
    //console.log(document.getElementById('ref_id').value);

    var v_h_type = document.getElementById('h_type').value;
    //console.log(document.getElementById('h_type').value);


    var v_price = document.getElementById('price').value;
    //console.log(document.getElementById('price').value);

    var v_m2 = document.getElementById('m2').value;
    //console.log(document.getElementById('m2').value);

    var v_garage = document.getElementById('garage').value;
    //console.log(document.getElementById('garage').value);

    var v_rooms = document.getElementById('rooms').value;
    //console.log(document.getElementById('rooms').value);

    var v_heating = document.getElementById('heating[]').value;
    //console.log(document.getElementById('heating').value);

    var v_location = document.getElementById('location').value;
    //console.log(document.getElementById('location').value);

    var v_publication_date = document.getElementById('publication_date').value;
    //console.log(document.getElementById('publication_date').value);



    var r_ref_id = validate_ref_id(v_ref_id);
    var r_h_type = validate_h_type(v_h_type);
    var r_price = validate_price(v_price);
    var r_m2 = validate_m2(v_m2);
    var r_garage = validate_garage(v_garage);
    //console.log(v_garage);
    var r_rooms = validate_rooms(v_rooms);
    //console.log(v_rooms);
    var r_heating = validate_heating(v_heating);
    var r_location = validate_location(v_location);
    //console.log(v_location);
    var r_publication_date = validate_publication_date(v_publication_date);


    if (!r_ref_id) {
        document.getElementById('error_ref_id').innerHTML = " * The catastral reference its not valid.";
        check = false;
    } else {
        document.getElementById('error_ref_id').innerHTML = "";
    }

    if (!r_h_type) {
        document.getElementById('error_h_type').innerHTML = " * The type its not valid.";
        check = false;
    } else {
        document.getElementById('error_h_type').innerHTML = "";
    }

    if (!r_price) {
        document.getElementById('error_price').innerHTML = " * The price its not valid.";
        check = false;
    } else {
        document.getElementById('error_price').innerHTML = "";
    }

    if (!r_m2) {
        document.getElementById('error_m2').innerHTML = " * The m2 are not valid.";
        check = false;
    } else {
        document.getElementById('error_m2').innerHTML = "";
    }

    if (!r_garage) {
        document.getElementById('error_garage').innerHTML = " * The garage its not valid.";
        check = false;
    } else {
        document.getElementById('error_garage').innerHTML = "";
    }

    if (!r_rooms) {
        document.getElementById('error_rooms').innerHTML = " * The rooms are not valid.";
        check = false;
    } else {
        document.getElementById('error_rooms').innerHTML = "";
    }

    if (!r_heating) {
        document.getElementById('error_heating').innerHTML = " * The heating its not valid.";
        check = false;
    } else {
        document.getElementById('error_heating').innerHTML = "";
    }

    if (!r_location) {
        document.getElementById('error_location').innerHTML = " * The location its not valid.";
        check = false;
    } else {
        document.getElementById('error_location').innerHTML = "";
    }

    if (!r_publication_date) {
        document.getElementById('error_publication_date').innerHTML = " * The publication date is not valid.";
        check = false;
    } else {
        document.getElementById('error_publication_date').innerHTML = "";
    }


    if (check) {
        if (op == 'create') {
            document.getElementById('alta_households').submit();
            // console.log('alta_households');
            document.getElementById('alta_households').action = "index.php?page=controller_households&op=create";
        }
        if (op == 'update') {
            document.getElementById('update_households').submit();
            document.getElementById('update_households').action = "index.php?page=controller_households&op=update";
        }
    }
}

function validate_others(op) {

    if (op == 'delete') {
        document.getElementById('delete_households').submit();
        document.getElementById('delete_households').action = "index.php?page=controller_households&op=delete";
    }
    if (op == 'delete_all') {
        document.getElementById('delete_all').submit();
        document.getElementById('delete_all').action = "index.php?page=controller_households&op=delete_all";
    }

    if (op == 'dummies') {
        document.getElementById('dummies').submit();
        document.getElementById('dummies').action = "index.php?page=controller_households&op=dummies";
    }
}

function showModal(title_households, id) {
    $("#details_households").show();
    $("#households_modal").dialog({
        title: title_households,
        closeText: "",
        width: 850,
        height: 500,
        resizable: "false",
        modal: "true",
        hide: "fold",
        show: "fold",
        buttons: {
            Update: function () {
                window.location.href = 'index.php?page=controller_households&op=update&ref_id=' + id;
            },
            Delete: function () {
                window.location.href = 'index.php?page=controller_households&op=delete&ref_id=' + id;
            }
        }
    });
}

function loadContentModal() {
    $('.households').click(function () {
        var id = this.getAttribute('ref_id');
        ajaxPromise('GET', 'JSON', 'module/households/controller/controller_households.php?op=read_modal&id=' + id)
            .then(function (data) {
                // var data = JSON.parse(data);
                $('<div></div>').attr('id', 'details_households', 'type', 'hidden').appendTo('#households_modal');
                $('<div></div>').attr('id', 'container').appendTo('#details_households');
                $('#container').empty();
                $('<div></div>').attr('id', 'households_content').appendTo('#container');
                $('#households_content').html(function () {
                    var content = "";
                    for (row in data) {
                        content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                    }
                    return content;
                });
                showModal(title_households = data.ref_id + " " + data.h_type, data.ref_id);
            })
            .catch(function () {
                window.location.href = 'index.php?module=errors&op=503&desc=List error';
            });
    });
}

$(document).ready(function () {
    loadContentModal();
});