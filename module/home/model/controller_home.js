function loadBrand() {
    ajaxPromise('module/home/controller/controller_home.php?op=homePageBrand', 'GET', 'JSON')
        .then(function (data) {
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

$(document).ready(function () {
    loadBrand();
    loadCatalog();
});