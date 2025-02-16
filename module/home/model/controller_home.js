function loadBrand() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageBrand', 'GET', 'JSON')
        .then(function (data) {
            // console.log(data);
            let container = $('#containerBrands');

            data.forEach(function (brand) {
                let cardHTML = `
                    <div class="card" id="${brand.name}">
                        <div class="card_image">
                            <img src="http://localhost/SMARTTRADE_MVC/${brand.img_brand}" alt="${brand.name}">
                        </div>
                        <div class="card_title">
                            <p>${brand.name}</p>
                        </div>
                    </div>`;
                container.append(cardHTML);
            });

            new Glider(document.querySelector('.glider'), {
                slidesToShow: 5,
                slidesToScroll: 1,
                draggable: false,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [
                    { breakpoint: 1200, settings: { slidesToShow: 5 } },
                    { breakpoint: 1024, settings: { slidesToShow: 4 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } }
                ]
            });
        })
        .catch(function () {
            window.location.href = "index.php?module=controller_exceptions&op=503&type=503&lugar=Type_Categories HOME";
        });
}

function loadCatalog() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageCatalog', 'GET', 'JSON')
        .then(function (data) {
            // console.log(data);
            let container = $('#containerCatalog');
            container.empty();

            data.forEach(function (catalog) {
                let cardHTML = `
                    <div class="card" id="${catalog.name}">
                        <div class="card_image">
                            <img src="http://localhost/SMARTTRADE_MVC/${catalog.img_catalog}" alt="${catalog.name}">
                        </div>
                        <div class="card_title">
                            <p>${catalog.name}</p>
                        </div>
                    </div>`;
                container.append(cardHTML);
            });

            new Glider(document.querySelector('#containerCatalog'), {
                slidesToShow: 4,
                slidesToScroll: 1,
                draggable: false,
                dots: '.dots-catalog',
                arrows: {
                    prev: '.glider-prev-catalog',
                    next: '.glider-next-catalog'
                },
                responsive: [
                    // { breakpoint: 1200, settings: { slidesToShow: 5 } },
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } }
                ]
            });
        })
        .catch(function () {
            window.location.href = "index.php?module=controller_exceptions&op=503&type=503&lugar=Type_Catalog_HOME";
        });
}

function loadCondition() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageCondition', 'GET', 'JSON')
        .then(function(data) {
            // console.log(data);
            for (let row in data) {
                $('<div></div>').attr('class', "card-condition").attr({ 'id': data[row].name_condition_type }).appendTo('#containerCondition')  // Cambié #containerBrands a #containerCondition
                    .html(
                        "<div class='card_image'>" +
                        "<img src='http://localhost/SMARTTRADE_MVC/" + data[row].img_condition_type + "' />" +
                        "</div>" +
                        "<div class='card_title'>" +  // Cambié card_black title-black a card_title
                        "<p>" + data[row].name_condition_type + "</p>" +
                        "</div>"
                    );
            }
        }).catch(function() {
            window.location.href = "index.php?module=controller_exceptions&op=503&type=503&lugar=Type_Condition HOME";
        });
}

function loadCity() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageCity', 'GET', 'JSON')
        .then(function (data) {
            // console.log(data);
            let container = $('#containerCity');
            container.empty();

            data.forEach(function (city) {
                let cardHTML = `
                    <div class="card" id="${city.name_city}">
                        <div class="card_image">
                            <img src="http://localhost/SMARTTRADE_MVC/${city.img_city}" alt="${city.name_city}">
                        </div>
                        <div class="card_title">
                            <p>${city.name_city}</p>
                        </div>
                    </div>`;
                container.append(cardHTML);
            });

            new Glider(document.querySelector('#containerCity'), {
                slidesToShow: 4,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots-city',
                arrows: {
                    prev: '.glider-prev-city',
                    next: '.glider-next-city'
                },
                responsive: [
                    // { breakpoint: 1200, settings: { slidesToShow: 5 } },
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } }
                ]
            });
        })
        .catch(function () {
            window.location.href = "index.php?module=controller_exceptions&op=503&type=503&lugar=Type_City HOME";
        });
}

$(document).ready(function () {
    loadBrand();
    loadCatalog();
    loadCondition();
    loadCity();
});