let pages = 0;
let limit = 6;
let total = 0;

if (!property_data) {
    property_data = {
        is_development: false,
        property_type: "",
        operation_type: "",
        rooms: "",
        suites: "",
        bathrooms: "",
        roofed: "",
        surface: "",
        price: "0",
        location: "",
        location_id: "",
        order_by: "",
        order: "",
        currency: "",
        tags: [],
    };
}

property_tags = [];

$(window).on("load", function () {
    $("#loadMore").css("visibility", "hidden");

    $.ajax({
        url: "/get/tags",
        type: "GET",
        async: false,
        success: function (data) {
            $.each(data, function (item) {});
            $.each(data, function (i, item) {
                const tokkotags = {
                    id: "",
                    name: "",
                };
                tokkotags.id = item.id;
                tokkotags.name = item.name;
                property_tags.push(tokkotags);
            });
        },
    });

    // Seteo los filtros de busqueda y cargo las etiquetas
    // CargarFiltros(property_data, property_tags);

    // loadFilters(property_data, property_tags);

    //borro el listado de propiedades
    $("#props-wrapper").html("");
    //traigo las propiedades segun los filtros.
    datosAjax(property_data);
});

// Funcion que trae los datos con ajax de la API
function datosAjax(request) {
    $.ajax({
        url: "/get/properties",
        type: "GET",
        data: request,
        beforeSend: function () {
            // Mostrar gif de carga
            loader = `
                    <div class="col-sm-2 offset-sm-5" id="loading">
                        <div class="ajax-load"></div>
                    </div>
                `;
            $("#maspropiedades").append(loader);
        },
        success: function (data) {
            $("#loading").remove();
            if (data.meta != null || data.meta != undefined) {
                // Traigo total de paginas
                total = data.meta.total_count;
                // $('.total-prop').text(total);
                limit = data.meta.limit;
                $("#props-wrapper").html("");

                // Cada item en el bucle
                $.each(data.objects, function (i, item) {
                    loadCard(item);
                });
                $("#propertyCount").text(data.meta.limit);
                $("#propertyTotal").text(data.meta.total_count);
                // $('#property-list-title').text('Disponemos de ' + data.meta.total_count + ' Propiedades para vos.');

                // Chequeo si es menor a la cantidad de paginas y le resto el limite
                let off = 0;
                // Si el limite de paginas es igual al total de items
                if (off >= total) {
                    $("#loadMore").css("visibility", "hidden");
                    // Si no hay datos
                    $(".no-data").css("display", "block");
                } else {
                    if (limit >= total) {
                        $("#loadMore").css("visibility", "hidden");
                        //Si no hay datos
                        $(".no-data").css("display", "block");
                    } else {
                        $("#loadMore").css("visibility", "visible");
                    }
                }
            } else {
                $("#loadMore").css("visibility", "hidden");
                // Si no hay datos
                $(".no-data").css("display", "block");
            }
        },
    });
}

//Funcion que trae mas items de la API
function datosAjaxMore(filtros) {
    $.ajax({
        url: "/get/properties",
        type: "GET",
        data: { filtros: filtros },
        beforeSend: function () {
            //Mostrar gif de carga
            loader = `
                        <div class="col-sm-2 offset-sm-5" id="loading">
                        <div class="ajax-load">
                        </div>
                        </div>`;
            $("#maspropiedades").append(loader);
        },
        success: function (data) {
            $("#loading").remove();

            if (data.meta != null || data.meta != undefined) {
                $.each(data.objects, function (i, item) {
                    loadCard(item);
                });

                // $('#totalprops').text('(' + data.meta.total_count + ')');
                // $('#property-list-title').text('Disponemos de ' + data.meta.total_count + ' Propiedades para vos.');

                //traigo total de paginas
                total = data.meta.total_count;
                $(".total-prop").text(total);
                //chequeo si es menor a la cantidad de paginas y le resto 15
                let off = property_data.offset;

                //si el limite de paginas es igual al total de items
                if (off >= total) {
                    $("#moreprops").css("visibility", "hidden");
                    //Si no hay datos
                    $(".no-data").css("display", "block");
                } else {
                    $("#moreprops").css("visibility", "visible");
                }
            } else {
                $("#moreprops").css("visibility", "hidden");
                //Si no hay datos
                $(".no-data").css("display", "block");
            }
        },
    });
}

function loadCard(item) {
    // Si muestro la misma propiedad por cada operacion.

    let code = $(`
            <div class="col-md-12">
                <div class="homeya-box list-style-1 list-style-2">
                    <a href="../propiedad/${slugify(
                        item.id +
                            "-" +
                            item.type.name +
                            "-en-" +
                            item.operations[0].operation_type +
                            "-en-" +
                            item.location.name
                    )}" class="images-group">
                        <div class="images-style">
                            <img src="${
                                item.photos[0].image
                                    ? item.photos[0].image
                                    : "/images/no-image.jpeg"
                            }" alt="img">
                        </div>                 
                    </a>
                    <div class="content">
                        <div class="archive-top">
                            <div class="h7 text-capitalize fw-3"><a href="../propiedad/${slugify(
                                item.id +
                                    "-" +
                                    item.type.name +
                                    "-en-" +
                                    item.operations[0].operation_type +
                                    "-en-" +
                                    item.location.name
                            )}" class="link">
                                ${item.publication_title}
                                </a>
                            </div>
                                <div class="desc">
                                    <i class="icon icon-mapPin"></i>
                                    <p>${item.location.short_location}</p> 
                                </div>
                                <ul class="meta-list">
                                    <li class="item">
                                        <i class="icon icon-bed"></i>
                                        ${
                                            item.room_amount != 0 &&
                                            item.type.name == "Departamento"
                                                ? `<span>${item.room_amount} Ambientes</span>`
                                                : ""
                                        }
                                        ${
                                            item.suite_amount != 0 &&
                                            item.type.name != "Departamento"
                                                ? `<span>${item.suite_amount} Dormitorios</span>`
                                                : ""
                                        }
                                    </li>
                                    <li class="item">
                                        <i class="icon icon-bathtub"></i>
                                        ${
                                            item.bathroom_amount != 0
                                                ? `<span>${item.bathroom_amount} Baños</span>`
                                                : ""
                                        }
                                    </li>
                                    <li class="item">
                                        <i class="icon icon-ruler"></i>
                                        <span>${Number(
                                            item.total_surface
                                        ).toFixed(0)} m² Sup. Total</span>
                                    </li>
                                    <li class="item">
                                        <i class="icon icon-ruler"></i>
                                        <span>${Number(
                                            item.roofed_surface
                                        ).toFixed(0)}m² Sup.Cub</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                            ${item.operations.map((operation) => {
                                switch (operation.operation_type) {
                                    case "Alquiler":
                                        return `<div class="d-flex gap-8 align-items-center">
                                    <div class=" fw-4">Alquiler
                                    <Br/>
                                    <span class="fw-7">${
                                        operation.prices[0].price < 2
                                            ? "CONSULTAR"
                                            : operation.prices[0].currency +
                                              " " +
                                              formatUSD.format(
                                                  operation.prices[0].price
                                              ) +
                                              "/mes"
                                    }</span>
                                    </div>   
                                </div>`;
                                    case "Alquiler temporario":
                                        if (
                                            operation.prices.some(
                                                (price) =>
                                                    price.period &&
                                                    price.period.includes(
                                                        "quincena"
                                                    )
                                            )
                                        ) {
                                            const quincenaPrice =
                                                operation.prices.find(
                                                    (price) =>
                                                        price.period &&
                                                        price.period.includes(
                                                            "quincena"
                                                        )
                                                );
                                            return `<div class="d-flex gap-8 align-items-center hide-mobile">
                                    <div class=" fw-4">Alquiler Temporario
                                        <Br/>
                                        <span class="fw-7">${
                                            quincenaPrice.price < 2
                                                ? "CONSULTAR"
                                                : quincenaPrice.currency +
                                                  " " +
                                                  formatUSD.format(
                                                      quincenaPrice.price
                                                  ) +
                                                  "/quincena"
                                        }</span>
                                    </div>       
                                </div>`;
                                        }
                                        return `<div class="d-flex gap-8 align-items-center hide-mobile">
                                    <div class=" fw-4">Alquiler Temporario
                                        <Br/>
                                        <span class="fw-7">${
                                            operation.prices[0].price < 2
                                                ? "CONSULTAR"
                                                : operation.prices[0].currency +
                                                  " " +
                                                  formatUSD.format(
                                                      operation.prices[0].price
                                                  ) +
                                                  "/mes"
                                        }</span>
                                    </div>       
                                </div>`;
                                    case "Venta":
                                        return `<div class="d-flex gap-8 align-items-center">
                                    <div class=" fw-4">Venta<Br/>
                                    <span class="fw-7">${
                                        operation.prices[0].price < 2
                                            ? "CONSULTAR"
                                            : operation.prices[0].currency +
                                              " " +
                                              formatUSD.format(
                                                  operation.prices[0].price
                                              )
                                    }</span>
                                    </div>`;
                                    default:
                                        return "";
                                }
                            })}
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        `);

    // let codea = $(
    //     `<div class="col-md-6 d-flex mb-50 wow fadeInUp">
    //                             <div class="listing-card-one style-two h-100 w-100">
    //                                 <div class="img-gallery">
    //                                     <div class="position-relative overflow-hidden">
    //                                         <div class="tag fw-500">EN VENTA</div>
    //                                         <div class="carousel slide">

    //                                             <div class="carousel-inner">
    //                                                 <div class="carousel-item active" data-bs-interval="1000000">
    //                                                     <a href="../propiedad/${slugify(
    //                                                         item.id +
    //                                                             "-" +
    //                                                             item.type.name +
    //                                                             "-en-" +
    //                                                             item
    //                                                                 .operations[0]
    //                                                                 .operation_type +
    //                                                             "-en-" +
    //                                                             item.location
    //                                                                 .name
    //                                                     )}" class="d-block"><img
    //                                                             src="${
    //                                                                 item
    //                                                                     .photos[0]
    //                                                                     .image
    //                                                                     ? item
    //                                                                           .photos[0]
    //                                                                           .image
    //                                                                     : "/images/no-image.jpeg"
    //                                                             }"
    //                                                             class="w-100" alt="..."></a>
    //                                                 </div>

    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </div>
    //                                 <!-- /.img-gallery -->
    //                                 <div class="property-info p-25">
    //                                     <a href="../propiedad/${slugify(
    //                                         item.id +
    //                                             "-" +
    //                                             item.type.name +
    //                                             "-en-" +
    //                                             item.operations[0]
    //                                                 .operation_type +
    //                                             "-en-" +
    //                                             item.location.name
    //                                     )}" class="title tran3s">${
    //         item.publication_title
    //     }</a>
    //                                     <div class="address">${
    //                                         item.location.short_location
    //                                     }</div>
    //                                     <ul
    //                                         class="style-none feature d-flex flex-wrap align-items-center justify-content-between pb-5">
    //                                         <li class="d-flex align-items-center">
    //                                             <img src="/images/icon/icon_04.svg" alt=""
    //                                                 class="lazy-img icon me-2">
    //                                             <span class="fs-16">${Number(
    //                                                 item.total_surface
    //                                             ).toFixed(0)}m² Sup/Tot</span>
    //                                         </li>
    //                                         <li class="d-flex align-items-center">
    //                                             <img src="/images/icon/icon_05.svg" alt=""
    //                                                 class="lazy-img icon me-2">
    //                                             ${
    //                                                 item.room_amount != 0 &&
    //                                                 item.type.name ==
    //                                                     "Departamento"
    //                                                     ? `<span class="fs-16">${item.room_amount} Ambs.</span>`
    //                                                     : ""
    //                                             }
    //                                             ${
    //                                                 item.suite_amount != 0 &&
    //                                                 item.type.name !=
    //                                                     "Departamento"
    //                                                     ? `<span class="flaticon-bed">${item.suite_amount} Dorms.</span>`
    //                                                     : ""
    //                                             }
    //                                         </li>
    //                                         <li class="d-flex align-items-center">
    //                                             <img src="/images/icon/icon_06.svg" alt=""
    //                                                 class="lazy-img icon me-2">
    //                                                 ${
    //                                                     item.bathroom_amount !=
    //                                                     0
    //                                                         ? `<span class="fs-16">${item.bathroom_amount} Bañ.</span>`
    //                                                         : ""
    //                                                 }
    //                                         </li>
    //                                     </ul>
    //                                     <div class="pl-footer top-border d-flex align-items-center justify-content-between">
    //                                         <strong class="price fw-500 color-dark">u$d ${
    //                                             item.operations[0].prices[0]
    //                                                 .price < 2
    //                                                 ? "CONSULTAR"
    //                                                 : formatUSD.format(
    //                                                       item.operations[0]
    //                                                           .prices[0].price
    //                                                   )
    //                                         }</strong>
    //                                         <a href="../propiedad/${slugify(
    //                                             item.id +
    //                                                 "-" +
    //                                                 item.type.name +
    //                                                 "-en-" +
    //                                                 item.operations[0]
    //                                                     .operation_type +
    //                                                 "-en-" +
    //                                                 item.location.name
    //                                         )}" class="btn-four"><i class="bi bi-arrow-up-right"></i></a>
    //                                     </div>
    //                                 </div>
    //                                 <!-- /.property-info -->
    //                             </div>
    //                             <!-- /.listing-card-one -->
    //                         </div>`
    // );
    $("#props-wrapper").append(code);
}

// Funcion para cargar filtros al iniciar la Web
function CargarFiltros(property_data, property_tags) {
    $("#filtros-activos").empty();

    if (property_data.location_id != "") {
        $("#fMid").val(property_data.location_id);
        $("#fMLocation-filtro").val(property_data.location);
    }
    // Si el filtro operacion no es nulo ni es "disponibles" cargo el filtro seleccionado.
    if (
        property_data.operation_type != "" &&
        property_data.operation_type != undefined &&
        property_data.operation_type != "disponibles"
    ) {
        operacion = property_data.operation_type;
        //pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_op()" class="list-inline-item" id="filtro-op"><i class="lni lni-close"></i> ${Capear(
                operacion
            )}</a>`
        );

        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_op()" class="list-inline-item" id="filtro-op-mobile"><i class="lni lni-close"></i> ${Capear(
                operacion
            )}</a>`
        );

        $("#operationFilter li").each(function (i) {
            let elemento = $(this).attr("value");
            if (elemento == property_data.operation_type) {
                $(this).css("display", "none");
            }
        });
    }

    if (
        property_data.property_type != "" &&
        property_data.property_type != "propiedades"
    ) {
        tipo = property_data.property_type;
        //pongo el tag de etiquetado.
        //pongo el tag de etiquetado.
        if (property_data.property_type == "casas-ph") {
            property = property_data.property_type.split("-");
            property.forEach((element) => {
                $("#filtros-activos").append(
                    `<a onclick="filtro_ti('${element.replace(
                        "-",
                        " "
                    )}')" class="list-inline-item" id="filtro-ti"><i class="lni lni-close"></i> ${Capear(
                        element.replace("-", " ")
                    )}</a>`
                );
                $("#lista-filtros-mobile").append(
                    `<a onclick="filtro_ti('${element.replace(
                        "-",
                        " "
                    )}')" class="list-inline-item" id="filtro-ti"><i class="lni lni-close"></i> ${Capear(
                        element.replace("-", " ")
                    )}</a>`
                );
            });
        } else {
            $("#filtros-activos").append(
                `<a onclick="filtro_ti()" class="list-inline-item" id="filtro-ti"><i class="lni lni-close"></i> ${Capear(
                    tipo.replace("-", " ")
                )}</a>`
            );
            $("#lista-filtros-mobile").append(
                `<a onclick="filtro_ti()" class="list-inline-item" id="filtro-ti"><i class="lni lni-close"></i> ${Capear(
                    tipo.replace("-", " ")
                )}</a>`
            );
            $("#propertyTypeFilter li").each(function (i) {
                let elemento = $(this).attr("value");
                if (elemento == property_data.property_type) {
                    $(this).css("display", "none");
                }
            });
        }
    }
    if (property_data.suites != "0") {
        // Pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_do()" class="list-inline-item" id="filtro-do"><i class="lni lni-close"></i>${property_data.suites} Dormitorios</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_do()" class="list-inline-item" id="filtro-do"><i class="lni lni-close"></i>${property_data.suites} Dormitorios</a>`
        );
        $("#dormitorios li").each(function (i) {
            let elemento = $(this).attr("value");
            if (elemento == property_data.suites) {
                $(this).find("input").prop("checked", true);
            }
        });
    }
    if (property_data.location != appName) {
        loc = property_data.location;
        //pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_loc()" class="list-inline-item" id="filtro-loc"><i class="lni lni-close"></i> ${Capear(
                loc.replace("-", " ")
            )}</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_loc()" class="list-inline-item" id="filtro-loc"><i class="lni lni-close"></i> ${Capear(
                loc.replace("-", " ")
            )}</a>`
        );
    }

    if (property_data.rooms != "0") {
        //pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_am()" class="list-inline-item" id="filtro-am"><i class="lni lni-close"></i>${property_data.rooms} Ambientes</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_am()" class="list-inline-item" id="filtro-am"><i class="lni lni-close"></i>${property_data.rooms} Ambientes</a>`
        );
        $("#ambientes li").each(function (i) {
            let elemento = $(this).attr("value");
            if (elemento == property_data.rooms) {
                $(this).find("input").prop("checked", true);
            }
        });
    }
    if (property_data.bathrooms != "0") {
        //pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_ba()" class="list-inline-item" id="filtro-ba"><i class="lni lni-close"></i>${property_data.bathrooms} Baños</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_ba()" class="list-inline-item" id="filtro-ba"><i class="lni lni-close"></i>${property_data.bathrooms} Baños</a>`
        );
        $("#bathroom li").each(function (i) {
            let elemento = $(this).attr("value");
            if (elemento == property_data.bathrooms) {
                $(this).find("input").prop("checked", true);
            }
        });
    }
    if (property_data.roofed != "0") {
        $("#filtros-activos").append(
            `<a onclick="filtro_te()" class="list-inline-item" id="filtro-te"><i class="lni lni-close"></i>${property_data.roofed} M2 Cubierto</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_te()" class="list-inline-item" id="filtro-te"><i class="lni lni-close"></i>${property_data.roofed} M2 Cubierto</a>`
        );
    }
    if (property_data.surface != "0") {
        $("#filtros-activos").append(
            `<a onclick="filtro_su()" class="list-inline-item" id="filtro-su"><i class="lni lni-close"></i>${property_data.surface} M2 Total</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_su()" class="list-inline-item" id="filtro-su"><i class="lni lni-close"></i>${property_data.surface} M2 Total</a>`
        );
    }
    if (property_data.price != "0") {
        // Pongo el tag de etiquetado.
        $("#filtros-activos").append(
            `<a onclick="filtro_pr()" class="list-inline-item" id="filtro-pr"><i class="lni lni-close"></i>${property_data.price} ${property_data.currency}</a>`
        );
        $("#lista-filtros-mobile").append(
            `<a onclick="filtro_pr()" class="list-inline-item" id="filtro-pr"><i class="lni lni-close"></i>${property_data.price} ${property_data.currency}</a>`
        );
    }

    if (property_data.tags != undefined || property_data.tags.length > 0) {
        // Recorro cada tag
        $.each(property_data.tags, function (index, value) {
            // Tildo el check en los filtros

            $(".tags-wrapper")
                .find(":checkbox[value=" + value + "]")
                .each(function () {
                    nombretag = "";
                    property_tags.forEach((item) => {
                        if (value == item.id) {
                            nombretag = item.name;
                        }
                    });

                    $("#filtros-activos").append(
                        `<a onclick="filtro_tag('${value}')" class="list-inline-item" id="tag-${value}"><i class="lni lni-close"></i>${nombretag}</a>`
                    );
                    $("#lista-filtros-mobile").append(
                        `<a onclick="filtro_tag('${value}')" class="list-inline-item" id="tag-${value}"><i class="lni lni-close"></i>${nombretag}</a>`
                    );
                    $(this).prop("checked", true);
                });
        });
    }
}

$("#operationFilter li").on("click", function (data) {
    //vacio el listado de propiedades
    $("#props-wrapper").empty();
    //si existe el boton de filtros activos
    if ($("filtro-op")) {
        //remuevo este boton
        $("#operationFilter")
            .find("a")
            .each(function a() {
                $(this).removeAttr("style");
            });
    }
    //seteo el session al tipo de operacion
    property_data.operation_type = $(this).attr("value");

    setUrl(property_data, property_tags);

    location.reload();
});
$("#propertyTypeFilter li").on("click", function (data) {
    if ($("filtro-ti")) {
        $("#propertyTypeFilter")
            .find("li")
            .each(function a() {
                $(this).removeAttr("style");
            });
    }
    $("#props-wrapper").empty();

    property_data.property_type = $(this).attr("value");

    setUrl(property_data, property_tags);
    location.reload();
});
$("#ambientes li").on("click", function (data) {
    if ($("filtro-am")) {
        $("#ambientes")
            .find("li")
            .each(function a() {
                $(this).removeAttr("style");
            });
    }
    $("#props-wrapper").empty();
    property_data.rooms = $(this).attr("value");
    setUrl(property_data, property_tags);
    location.reload();
});
$("#dormitorios li").on("click", function (data) {
    if ($("filtro-do")) {
        $("#dormitorios")
            .find("li")
            .each(function a() {
                $(this).removeAttr("style");
            });
    }
    $("#props-wrapper").empty();
    property_data.suites = $(this).attr("value");
    setUrl(property_data, property_tags);
    location.reload();
});
$("#bathroom li").on("click", function (data) {
    if ($("filtro-ba")) {
        $("#bathroom")
            .find("li")
            .each(function a() {
                $(this).removeAttr("style");
            });
    }
    $("#props-wrapper").empty();
    property_data.bathrooms = $(this).attr("value");
    setUrl(property_data, property_tags);
    location.reload();
});

$(".tags-button").on("click", function (data) {
    property_data.tags = [];
    //recorro cada tag
    $('input[name="tagscheck"]:checked').each(function (e) {
        property_data.tags.push(this.value);
    });

    setUrl(property_data, property_tags);

    location.reload();
});

// $('#cubiertaBtn').on('click', function (data) {
//     let m2 = $('#hastacm2').val();
//     property_data.roofed = m2;
//     setUrl(property_data, property_tags);
//     location.reload();
// });

// $('#totalBtn').on('click', function (data) {
//     let m2 = $('#hastacm2total').val();
//     property_data.surface = m2;
//     setUrl(property_data, property_tags);
//     location.reload();
// });

// $('#superficieBtn').on('click', function (data) {
//     let m2 = $('#hastacm2').val();
//     let tipoSuperficie = $('input[name="tipoSuperficieDesktop"]:checked').val();

//     if (tipoSuperficie === 'total') {
//         property_data.surface = m2;
//     } else {
//         property_data.roofed = m2;
//     }
//     setUrl(property_data, property_tags);
//     location.reload();
// });

// $('#priceBtn').on('click', function (data) {
//     let price = $('#preciohasta').val();

//     let currency = $('input[name="currency"]:checked').val();

//     property_data.price = price.replaceAll('.', '');
//     property_data.currency = currency;
//     setUrl(property_data, property_tags);
//     location.reload();
// });

// $('#location-filtro').on('submit', function () {
//     //vacio el listado de propiedades
//     $('#props-wrapper').empty();
//     valor = $(this).find(":selected").val();
// });

function locationFiltro(str) {
    property_data.location_id = str.display_id;
    property_data.location = slugify(
        str.location_name != undefined
            ? str.location_name
            : str.development_name
    );

    property_data.is_development =
        str.development_name != undefined ? true : false;

    if (str.development_name != undefined) {
        property_data.operation_type = "emprendimiento";
    }
    setUrl(property_data, property_tags);
    location.reload();
}

//Al presionar el boton trae mas propiedades.
$("#loadMore").on("click", function () {
    //chequeo si es menor a la cantidad de paginas y le resto el limite
    let off = property_data.offset;

    property_data.offset = parseInt(off) + parseInt(limit);

    datosAjaxMore(property_data);
});

// Al presionar los botones de ordenamiento.
$("#orden").on("change", function (data) {
    //vacio el listado de propiedades
    $("#props-wrapper").empty();
    if ($("#orden option:selected").val() == "RECIENTES") {
        property_data.order = "DESC";
        property_data.order_by = "random";
    } else if ($("#orden option:selected").val() == "MENOR") {
        property_data.order = "ASC";
        property_data.order_by = "price";
    } else if ($("#orden option:selected").val() == "MAYOR") {
        property_data.order = "DESC";
        property_data.order_by = "price";
    }

    datosAjax(property_data);
});

// function setUrl(property_data, property_tags) {
//     let www = window.location.pathname.replace('/buscar/', '');
//     www = '';
//     urltipo = '';
//     urloper = '';
//     urlfiltros = '';
//     urltags = '';
//     urlcustom = '';
//     urlprecio = '';
//     urllocation = '';

//     if (property_data.property_type == "propiedades") {
//         urltipo = "propiedades";
//     } else {
//         urltipo = property_data.property_type;
//     }

//     switch (property_data.operation_type) {
//         case 'venta':
//             urloper = '-en-venta';
//             break;
//         case 'alquiler':
//             urloper = '-en-alquiler';
//             break;
//         case 'alquiler-temporario':
//             urloper = '-en-alquiler-temporario';
//             break;
//         case 'emprendimiento':
//             urloper = '-en-emprendimiento';
//             break;
//         default:
//             urloper = "-disponibles";
//             break;
//     }

//     if (property_data.price != "" && property_data.price != "0") {
//         urlprecio = urlprecio.concat('-con-presupuesto-' + property_data.price);
//         if (property_data.currency != "") {
//             urlprecio = urlprecio.concat('-' + property_data.currency);
//         }
//     }
//     if (property_data.surface != '0') {
//         urlfiltros = urlfiltros.concat('-con-' + property_data.surface + '-mts-total');
//     }
//     if (property_data.roofed != '0') {
//         urlfiltros = urlfiltros.concat('-con-' + property_data.roofed + '-mts-techado');
//     }
//     if (property_data.rooms != '0') {
//         if (property_data.rooms >= 5) {
//             urlfiltros = urlfiltros.concat('-con-mas-de-' + property_data.rooms + '-ambientes');
//         } else {
//             urlfiltros = urlfiltros.concat('-con-' + property_data.rooms + '-ambientes');
//         }
//     }
//     if (property_data.suites != '0') {
//         if (property_data.suites >= 5) {
//             urlfiltros = urlfiltros.concat('-con-mas-de-' + property_data.suites + '-dormitorios');
//         } else {
//             urlfiltros = urlfiltros.concat('-con-' + property_data.suites + '-dormitorios');
//         }
//     }
//     if (property_data.bathrooms != '0') {
//         if (property_data.bathrooms >= 5) {
//             urlfiltros = urlfiltros.concat('-con-mas-de-' + property_data.bathrooms + '-bathrooms');
//         } else {
//             urlfiltros = urlfiltros.concat('-con-' + property_data.bathrooms + '-bathrooms');
//         }
//     }
//     if ((property_data.tags != undefined) || (property_data.tags.length > 0)) {
//         $.each(property_data.tags, function (index, data) {
//             property_tags.forEach(item => {
//                 if (data == item.id) {
//                     urltags = urltags.concat('-con-' + slugify(item.name));
//                 }
//             });

//         });
//     }

//     urllocation = '-en-' + property_data.location.toLowerCase();

//     if (property_data.location_id != '') {
//         if (property_data.location_id != '0') {
//             idlocation = '_' + property_data.location_id;
//         } else {
//             idlocation = '';
//         }
//     } else {
//         idlocation = '';
//     }

//     www = www.concat(urltipo, urloper, urlprecio, urlfiltros, urltags, urlcustom, urllocation, idlocation);
//     //Actualizo la URL y pongo el precio siempre al final
//     history.pushState(null, "", www);
// }

// Funcion de Slugifiar texto.
// function slugify(text) {
//     const from = "ÁÃÀÁÄÂẼÈÉËÊÌÍÏÎÕÒÓÖÔÙÚÜÛÑáãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;"
//     const to = "AAAAAAEEEEEIIIIOOOOOUUUUNaaaaaaeeeeeiiiiooooouuuunc------"

//     const newText = text.split('').map(
//         (letter, i) => letter.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i)))

//     return newText
//         .toString()                     // Cast to string
//         .toLowerCase()                  // Convert the string to lowercase letters
//         .trim()                         // Remove whitespace from both sides of a string
//         .replace(/\s+/g, '-')           // Replace spaces with -
//         .replace(/&/g, '-y-')           // Replace & with 'and'
//         .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
//         .replace(/\-\-+/g, '-');        // Replace multiple - with single -
// }

/*
|--------------------------------------------------------------------------
| Quitar filtros de a uno.
|--------------------------------------------------------------------------
*/

// > Quitar filtro operación.
// function filtro_op() {
//     $('#props-wrapper').empty();
//     property_data.operation_type = "disponibles";
//     $('#filtro-op').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// };
// function filtro_ti(type = '') {
//     $('#props-wrapper').empty();
//     if (type != '') {
//         property_data.property_type = property_data.property_type.replace(type, '').replace('-', '');
//     } else {
//         property_data.property_type = "propiedades";
//     }
//     $('#filtro-ti').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_do() {
//     $('#props-wrapper').empty();
//     property_data.suites = '0';
//     $('#filtro-do').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_loc() {
//     $('#props-wrapper').empty();
//     property_data.location = appName;
//     property_data.location_id = '0';
//     $('#filtro-loc').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_am() {
//     $('#props-wrapper').empty();
//     property_data.rooms = '0';
//     $('#filtro-am').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_ba() {
//     $('#props-wrapper').empty();
//     property_data.bathrooms = '0';
//     $('#filtro-ba').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_pr() {
//     $('#props-wrapper').empty();
//     property_data.price = '0';
//     $('#filtro-pr').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_te() {
//     $('#props-wrapper').empty();
//     property_data.roofed = '0';
//     $('#filtro-te').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_su() {
//     $('#props-wrapper').empty();
//     property_data.surface = '0';
//     $('#filtro-su').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }
// function filtro_tag(tag) {
//     // vacio el listado de propiedades
//     $('#props-wrapper').empty();
//     $.each(property_data.tags, function (key, item) {
//         if (tag == item) {
//             property_data.tags.splice(key, 1);
//         }
//     });
//     $('#filtro-tag').remove();
//     setUrl(property_data, property_tags);
//     location.reload();
// }

function Capear(str) {
    text = str.replace(/\b[a-z]/g, function (txtjq) {
        return txtjq.toUpperCase();
    });

    return text;
}
