$(window).on("load", function () {    
    
    $("#props-wrapper").html("");
    getProps(property_data);
});




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





function loadCard(item) {
    const code = `
            <div class="swiper-slide">
                <div class="homeya-box style-2">
                    <div class="archive-top">
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
                            <div class="h7 text-capitalize fw-7"><a href="../propiedad/${slugify(
                                item.id +
                                    "-" +
                                    item.type.name +
                                    "-en-" +
                                    item.operations[0].operation_type +
                                    "-en-" +
                                    item.location.name
                            )}" class="link">${item.publication_title}</a></div>
                                <div class="desc"><i class="fs-16 icon icon-mapPin"></i>
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
                                    </li>
                                    <li class="item">
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
                        </div>
                        <div class="archive-bottom d-flex justify-content-between align-items-center">
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
        `;
        $("#props-wrapper").append(code);
}

function Capear(str) {
    text = str.replace(/\b[a-z]/g, function (txtjq) {
        return txtjq.toUpperCase();
    });

    return text;
}


function slugify(text) {
    text = `${text}`;
    const from = "ÁÃÀÁÄÂẼÈÉËÊÌÍÏÎÕÒÓÖÔÙÚÜÛÑáãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    const to = "AAAAAAEEEEEIIIIOOOOOUUUUNaaaaaaeeeeeiiiiooooouuuunc------";

    const newText = text
        .split("")
        .map((letter) =>
            from.includes(letter) ? to.charAt(from.indexOf(letter)) : letter
        )
        .join("");

    return newText
        .toLowerCase() // Convert the string to lowercase letters
        .trim() // Remove whitespace from both sides of a string
        .replace(/\s+/g, "-") // Replace spaces with -
        .replace(/&/g, "-y-") // Replace & with 'and'
        .replace(/[^\w\-]+/g, "") // Remove all non-word chars
        .replace(/\-\-+/g, "-"); // Replace multiple - with single -
}