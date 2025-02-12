function loadBrand() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageBrand', 'GET', 'JSON')
        .then(function(data) {
            console.log(data);
            for (let row in data) {
                $('<div></div>').attr('class', "card").attr({ 'id': data[row].name }).appendTo('#containerBrands')
                    .html(
                        "<div class='card_image'>" +
                        "<img src='http://localhost/SMARTTRADE_MVC/" + data[row].img_brand + "' />" +
                        "</div>" +
                        "<div class='card_black title-black'>" +
                        "<p>" + data[row].name + "</p>" +
                        "</div>"
                    );
            }
        }).catch(function() {
            window.location.href = "index.php?module=controller_exceptions&op=503&type=503&lugar=Type_Categories HOME";
        });
}

$(document).ready(function() {
    loadBrand();
    console.log("entra_ready");
});