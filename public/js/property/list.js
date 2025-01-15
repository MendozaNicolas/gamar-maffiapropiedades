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
        offset: 0,
        limit: limit,
        tags: [],
    };
}

property_tags = [];

$(window).on("load", function () {
    $("#loadMore").css("visibility", "hidden");
    // cleavePresupuesto = new Cleave(".presupuesto", cleaveConfig); // Este es el formato del input de presupuesto.
    cleavePresupuesto2 = new Cleave(".presupuesto-desk", cleaveConfig); // Este es el formato del input de presupuesto.


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

    $("#props-wrapper").html("");

    getProps(property_data);
});

// Funcion que trae los datos con ajax de la API
function getProps(request) {
    $.ajax({
        url: "/get/properties",
        type: "GET",
        data: request,
        beforeSend: function () {
            // Mostrar gif de carga
            // loader = `
            //         <div class="col-sm-2 offset-sm-5" id="loading">
            //             <div class="ajax-load"></div>
            //         </div>
            //     `;
            // $("#loadMore").append(loader);
        },
        success: function (data) {
            $("#loading").remove();
            console.log(data);
            console.log(request);
            if (data.meta != null || data.meta != undefined) {
                let total = data.meta.total_count;
                let limit = data.meta.limit;
                let offset = request.offset;
                let propertyCount = limit + offset;

                $("#props-wrapper").html("");

                // Cada item en el bucle
                $.each(data.objects, function (i, item) {
                    loadCard(item);
                });
                $("#meta-actual").text(
                    (data.meta.limit + Number(request.offset) > data.meta.total_count) ? data.meta.total_count : data.meta.limit + Number(request.offset) 
                );
                $("#meta-total").text(data.meta.total_count);

                if (propertyCount >= total || total == 0 || limit >= total) {
                    $("#loadMore").css("visibility", "hidden");
                    $(".no-data").css("display", "block");
                } else {
                    $("#loadMore").css("visibility", "visible");
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
function getNextProps(request) {
    $.ajax({
        url: "/get/properties",
        type: "GET",
        data: request,
        beforeSend: function () {
            //Mostrar gif de carga
            // loader = `
            //         <div class="col-sm-2 offset-sm-5" id="loading">
            //             <div class="ajax-load"></div>
            //         </div>`;
            // $("#loadMore").append(loader);
        },
        success: function (data) {
            console.log(data);
            console.log(request);
            $("#loading").remove();

            if (data.meta != null || data.meta != undefined) {
                let total = data.meta.total_count;
                let limit = data.meta.limit;
                let offset = request.offset;
                let propertyCount = limit + offset;


                $.each(data.objects, function (i, item) {
                    loadCard(item);
                });

                $("#meta-actual").text(
                    (data.meta.limit + Number(request.offset) > data.meta.total_count) ? data.meta.total_count : data.meta.limit + Number(request.offset) 
                );
                $("#meta-total").text(data.meta.total_count);

                if (propertyCount >= total || total == 0 || limit >= total) {
                    $("#loadMore").css("visibility", "hidden");
                    $(".no-data").css("display", "block");
                } else {
                    $("#loadMore").css("visibility", "visible");
                }
            } else {
                $("#loadMore").css("visibility", "hidden");
                //Si no hay datos
                $(".no-data").css("display", "block");
            }
        },
    });
}
function loadCard(item) {
    // Si muestro la misma propiedad por cada operacion.
    console.log('Property card: ', item);

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
                                        ${
                                            item.room_amount != 0 &&
                                            item.type.name == "Departamento"
                                                ? `<i class="icon icon-bed"></i><span>${item.room_amount} Ambientes</span>`
                                                : ""
                                        }
                                        ${
                                            item.suite_amount != 0 &&
                                            item.type.name != "Departamento"
                                                ? `<i class="icon icon-bed"></i><span>${item.suite_amount} Dormitorios</span>`
                                                : ""
                                        }
                                    </li>
                                    <li class="item">
                                        ${
                                            item.bathroom_amount != 0
                                                ? `<i class="icon icon-bathtub"></i><span>${item.bathroom_amount} Baños</span>`
                                                : ""
                                        }
                                    </li>
                                    <li class="item">
                                        
                                        ${((item.surface != 0 && item.type.name != "Departamento")) ?
                                        `<i class="icon icon-ruler"></i>
                                        <span>${Number(
                                            item.surface
                                        ).toFixed(0)} m² Sup. Total </span>` : ''}
                                    </li>
                                    <li class="item">
                                        
                                        ${item.roofed_surface != 0 ?
                                        `<i class="icon icon-ruler"></i>
                                        <span> ${Number(
                                            item.roofed_surface
                                        ).toFixed(0)}m² Sup.Cub </span>` : ''}
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
    $("#props-wrapper").append(code);
}
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
    let offset = property_data.offset;

    property_data.offset = parseInt(offset) + parseInt(limit);

    getNextProps(property_data);
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

    getProps(property_data);
});

function Capear(str) {
    text = str.replace(/\b[a-z]/g, function (txtjq) {
        return txtjq.toUpperCase();
    });

    return text;
}
