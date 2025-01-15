document.addEventListener("DOMContentLoaded", () => {
    loadFilters(property_data, property_tags);
    hideFilters(property_data.property_type);
});

function removeFilter(f) {
    if (f == "location") {
        property_data.location = appName;
        property_data.location_id = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "operation_type") {
        property_data.operation_type = "disponibles";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "property_type") {
        property_data.property_type = "propiedades";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "rooms") {
        property_data.rooms = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "bathrooms") {
        property_data.bathrooms = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "suites") {
        property_data.suites = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "price") {
        property_data.price = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "surface") {
        property_data.surface = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f == "roofed") {
        property_data.roofed = "0";
        insertSlug(property_data);
        location.reload();
    }
    if (f.startsWith("tags")) {
        const tagId = f.split(":")[1];
        property_data.tags = property_data.tags.filter((tag) => tag != tagId);
        insertSlug(property_data);
        location.reload();
    }
}

function loadFilters(pd, pt) {
    Object.keys(pd).forEach((key) => {
        value = pd[key];
        const activeFiltersWrappers = document.querySelectorAll(
            ".active-filter-wrapper"
        );

        activeFiltersWrappers.forEach((wrapper) => {
            if (
                value != appName &&
                value != "0" &&
                value != "" &&
                value != "disponibles" &&
                value != "propiedades" &&
                value != "ANY" &&
                key != "order" &&
                key != "order_by" &&
                key != "location_id"
            ) {
                element = "";
                switch (key) {
                    case "rooms":
                        value = pd[key] + " ambientes";
                        break;
                    case "suites":
                        value = pd[key] + " dormitorios";
                        break;
                    case "bathrooms":
                        value = pd[key] + " baños";
                        break;
                    case "price":
                        value = "$" + pd[key] + " presupuesto";
                        break;
                    case "roofed":
                        value = pd[key] + "mts techado";
                        break;
                    case "surface":
                        value = pd[key] + "mts total";
                        break;
                }
                if (key == "tags") {
                    console.log("value", value);
                    value.forEach((tagId) => {
                        const tag = tokko_tags.find((t) => t.id == tagId);
                        if (tag) {
                            element = `<button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="removeFilter('tags:${
                                tag.id
                            }')"><li><a href class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i>${deslugify(
                                tag.name
                            )}</a></li></button>`;
                            wrapper.innerHTML += element;
                        }
                    });
                } else {
                    element = `<button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="removeFilter('${key}')"><li><a href class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i>${deslugify(
                        value
                    )}</a></li></button>`;
                    wrapper.innerHTML += element;
                }
            }
        });

        // console.log(`${key}: ${value}`);
    });

    if (pd.operation_type != "disponibles") {
        // Desktop
        document
            .querySelector(
                `[data-filterfy-info="operation_type:${pd.operation_type}"]`
            )
            .classList.add("d-none");
        // Mobile
        const eMobile = document.querySelector(`[name="operation_type"]`);
        const siblingsMobile =
            eMobile.parentElement.querySelectorAll(".nice-select");
        if (siblingsMobile.length > 0) {
            const sibling = siblingsMobile[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = deslugify(pd.operation_type);
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === deslugify(pd.operation_type)) {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
    }

    if (pd.property_type != "propiedades") {
        // Desktop
        document
            .querySelector(
                `[data-filterfy-info="property_type:${pd.property_type}"]`
            )
            .classList.add("d-none");
        // Mobile
        const eMobile = document.querySelector(`[name="property_type"]`);
        const siblingsMobile =
            eMobile.parentElement.querySelectorAll(".nice-select");
        if (siblingsMobile.length > 0) {
            const sibling = siblingsMobile[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = deslugify(pd.property_type);
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === deslugify(pd.property_type)) {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
    }

    // > Inicializa valores de ambientes

    // Desktop
    if (pd.rooms != "0" && pd.rooms != "") {
        const e = document.querySelector(`[data-filterfy-info="rooms:value"]`);
        const eMobile = document.querySelector(`[name="rooms"]`);
        const siblings = e.parentElement.querySelectorAll(".nice-select");
        const siblingsMobile =
            eMobile.parentElement.querySelectorAll(".nice-select");
        if (siblings.length > 0) {
            const sibling = siblings[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.rooms + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.rooms + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }

        // Mobile
        if (siblingsMobile.length > 0) {
            const sibling = siblingsMobile[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.rooms + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.rooms + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
    }

    // > Inicializa valores de baños

    // Desktop
    if (pd.bathrooms != "0" && pd.bathrooms != "") {
        const e = document.querySelector(
            `[data-filterfy-info="bathrooms:value"]`
        );
        const eMobile = document.querySelector(`[name="bathrooms"]`);
        const siblings = e.parentElement.querySelectorAll(".nice-select");
        const siblingsMobile =
            eMobile.parentElement.querySelectorAll(".nice-select");
        if (siblings.length > 0) {
            const sibling = siblings[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.bathrooms + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.bathrooms + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }

        // Mobile
        if (siblingsMobile.length > 0) {
            const sibling = siblingsMobile[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.bathrooms + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.bathrooms + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
    }

    // > Inicializa valores de dormitorios
    if (pd.suites != "0" && pd.suites != "") {
        const e = document.querySelector(`[data-filterfy-info="suites:value"]`);
        const siblings = e.parentElement.querySelectorAll(".nice-select");
        const eMobile = document.querySelector(`[name="suites"]`);
        const siblingsMobile =
            eMobile.parentElement.querySelectorAll(".nice-select");

        // Desktop
        if (siblings.length > 0) {
            const sibling = siblings[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.suites + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.suites + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
        // Mobile
        if (siblingsMobile.length > 0) {
            const sibling = siblingsMobile[1];
            if (sibling) {
                const firstChild = sibling.children[0];
                const secondChild = sibling.children[1];
                firstChild.innerText = pd.suites + "+";
                secondChild.querySelectorAll("li");
                Array.from(secondChild.children).forEach((child) => {
                    child.classList.remove("selected");
                    child.classList.remove("focus");
                    if (child.innerText === pd.suites + "+") {
                        child.classList.add("selected");
                        child.classList.add("focus");
                    }
                });
            }
        }
    }

    // > Inicializa valores de precio
    // if (pd.price != "0" && pd.price != "") {
    //     // Desktop
    //     const e = document.querySelector(`[data-filterfy-info="price:value"]`);
    //     e.value = pd.price;
    //     // Mobile
    //     // const eMobile = document.querySelector(`[name="price"]`);
    //     // eMobile.value = pd.price;
    // }

    // > Inicializa valores de dormitorios
    // if (pd.surface != "0" && pd.surface != "") {
    //     // Desktop
    //     const e = document.querySelector(
    //         `[data-filterfy-info="surface:value"]`
    //     );
    //     e.value = pd.surface;
    //     // Mobile
    //     const eMobile = document.querySelector(`[name="surface"]`);
    //     eMobile.value = pd.surface;
    // }

    // if (pd.roofed != "0" && pd.roofed != "") {
    //     // Desktop
    //     const e = document.querySelector(`[data-filterfy-info="roofed:value"]`);
    //     e.value = pd.roofed;
    //     // Mobile
    //     const eMobile = document.querySelector(`[name="roofed_surface"]`);
    //     eMobile.value = pd.roofed;
    // }

    // const eI = document.querySelector(`#amenities-input`);
    // if (pd.tags.length > 0) {
    //     const e = document.querySelectorAll(`[name="amenities_desktop"]`);
    //     if (eI) {
    //         eI.placeholder = pd.tags
    //             .map((tagId) => {
    //                 const tag = property_tags.find((t) => t.id == tagId);
    //                 return tag ? tag.name : tagId;
    //             })
    //             .join(", ");
    //     }
    //     if (e.length > 0) {
    //         Array.from(e).forEach((child) => {
    //             if (pd.tags.includes(parseInt(child.value))) {
    //                 child.checked = true;
    //             }
    //         });
    //     }
    // } else {
    //     eI.placeholder = "Sin amenities seleccionados";
    // }

    // if (pd.location != appName) {
    //     const e = document.querySelector(`[data-filterfy-info="location:value"]`);
    //     e.value = pd.location;
    // }
}

document.querySelectorAll("[data-filterfy-event]").forEach((element) => {
    const eventType = element.getAttribute("data-filterfy-event");
    if (eventType === "change") {
        const siblings = element.parentElement.querySelectorAll(".nice-select");
        if (siblings.length > 0) {
            const sibling = siblings[1];
            if (sibling) {
                const secondChild = sibling.children[1];
                Array.from(secondChild.children).forEach((child) => {
                    child.setAttribute(
                        "data-filterfy-info",
                        siblings[0]
                            .getAttribute("data-filterfy-info")
                            .split(":")[0] +
                            ":" +
                            child.getAttribute("data-value")
                    );
                    child.addEventListener("click", (event) => {
                        const filterValue =
                            event.target.getAttribute("data-filterfy-info");
                        filterfy(filterValue);
                    });
                });
            }
        }
    }
    if (eventType === "keypress") {
        element.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                event.target.setAttribute(
                    "data-filterfy-info",
                    event.target
                        .getAttribute("data-filterfy-info")
                        .split(":")[0] +
                        ":" +
                        event.target.value
                );
                const filterValue =
                    event.target.getAttribute("data-filterfy-info");
                filterfy(filterValue);
            }
        });
    } else {
        element.addEventListener(eventType, (event) => {
            // tuve que agregarle al target el parentElement porque tomaba el span
            const filterValue =
                event.target.parentElement.getAttribute("data-filterfy-info");
            filterfy(filterValue);
        });
    }
    if (eventType === "submit") {
        element.addEventListener("submit", (event) => {
            event.preventDefault();
            const formTags = element.querySelectorAll("input[type='checkbox']");
            const selectedTags = Array.from(formTags)
                .filter((tag) => tag.checked)
                .map((tag) => tag.value)
                .join(",");

            const filterValue = `tags:${selectedTags}`;
            filterfy(filterValue);
        });
    }
});

// function locationFiltro(str) {
//     property_data.location_id = str.display_id;
//     property_data.location = slugify(str.location_name != undefined ? str.location_name :
//         str.development_name);

//     property_data.is_development = str.development_name != undefined ? true : false;

//     if(str.development_name != undefined){
//         property_data.operation_type =  'emprendimiento';
//     }
//     setUrl(property_data, property_tags);
//     location.reload();
// }

// document.querySelectorAll('[data-filterfy-event]').forEach(element => {
//     const eventType = element.getAttribute('data-filterfy-event');
//     element.addEventListener(eventType, event => {
//         const filterValue = event.target.getAttribute('data-filterfy-info');
//         filterfy(filterValue);
//     });
// });

// Ejemplo de como se usa el filterfy
// filterfy('bathrooms:2&rooms:3&price:100000-200000&area:100-200');
function filterfy(filters) {
    // if(filters == null) return;
    let _f = filters.split("&");

    f = _f.reduce((acc, e) => {
        let [k, v] = e.split(":");
        console.log(k, v);
        if (v === "value") {
            v = document.querySelector(`[data-filterfy-info="${k}"]`).value;
        }
        acc[k] = v;
        return acc;
    }, {});

    Object.keys(f).forEach((key) => {
        f[key] = f[key].split(",");
    });

    // let f = _f.reduce((acc, e) => {
    //     let [k, v] = e.split(':');
    //     acc[k] = v;
    //     return acc;
    // }, {});

    Object.keys(property_data).forEach((key) => {
        if (f.hasOwnProperty(key)) {
            property_data[key] = f[key];
        }
    });

    return insertSlug(property_data);
}

function insertSlug(f) {
    www = "";
    if (f.property_type && f.property_type != "") {
        www += `${f.property_type}`;
    } else {
        www += "propiedades";
    }
    if (f.operation_type && f.operation_type != "") {
        switch (f.operation_type[0]) {
            case "venta":
                www += `-en-${f.operation_type[0]}`;
                break;
            case "alquiler":
                www += `-en-${f.operation_type[0]}`;
                break;
            case "alquiler-temporario":
                www += `-en-${f.operation_type[0]}`;
            default:
                www += `-disponibles`;
                break;
        }
    } else {
        www += "-disponibles";
    }
    if (f.price && f.price != "0") {
        let price = f.price;
        www += `-con-presupuesto-${price[0].replaceAll('.', '')}`;
        if (f.currency && f.currency != "") {
            www += `-${f.currency}`;
        }
    }
    if (f.surface && f.surface != "0") {
        www += `-con-${f.surface}-mts-total`;
    }
    if (f.roofed && f.roofed != "0") {
        www += `-con-${f.roofed}-mts-techado`;
    }
    if (f.rooms && f.rooms != "0") {
        www += `-con-mas-de-${f.rooms}-ambientes`;
    }
    if (f.suites && f.suites != "0") {
        www += `-con-mas-de-${f.suites}-dormitorios`;
    }
    if (f.bathrooms && f.bathrooms != "0") {
        www += `-con-mas-de-${f.bathrooms}-banios`;
    }
    // if (objeto.tags != undefined || objeto.tags.length > 0) {
    //     $.each(objeto.tags, function (index, data) {
    //         carritoTags.forEach((item) => {
    //             if (data == item.id) {
    //                 urltags = urltags.concat("-con-" + slugify(item.name));
    //             }
    //         });
    //     });
    // }
    if (f.tags && f.tags.length > 0) {
        f.tags.forEach((t) => {
            property_tags.forEach((tag) => {
                if (tag.id == Number(t)) {
                    www += `-con-${slugify(tag.name)}`;
                }
            });
            // if (matchingTag) {
            //     www += `-con-${slugify(matchingTag.text)}`;
            // }
        });
    }
    if (f.location != "" && f.location != appName) {
        www += `-en-${slugify(f.location)}`;
    } else {
        www += `-en-${appName}`;
    }

    if (f.location_id && f.location_id != "") {
        if (f.location_id != "0") {
            www += `_${f.location_id}`;
        }
    }
    history.pushState(null, "", www);
    return window.location.reload();
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

function deslugify(text) {
    return text
        .split("-")
        .map((word) => {
            return word.charAt(0).toUpperCase() + word.slice(1);
        })
        .join(" ");
}

// LOGICA PARA MOSTRAR/OCULTAR FILTROS DE BUSQUEDA

// Al cargar la pagina refreshea los filtros
refreshFiltros($("#mobile-property-type").val());
refreshFiltros($("#desktop-property-type").val());

$("#mobile-property-type").on("change", function () {
    refreshFiltros($(this).val());
});
// Este es por si el filtro desktop tiene un select
// $("#desktop-property-type").on("change", function () {
//     refreshFiltros($(this).val());
// });

function refreshFiltros(value) {
    ocultarTodos();
    switch (value) {
        case "lotes-residenciales":
            mostrarFiltrosLotes();
            break;
        case "departamentos":
            mostrarFiltrosDepartamentos();
            break;
        case "casas":
            mostrarCasasPH();
            break;
        case "ph":
            mostrarCasasPH();
            break;
        case "casas-ph":
            mostrarCasasPH();
            break;
        case "edificios-comerciales":
            mostrarEdificiosComerciales();
            break;
        case "cocheras":
            mostrarCocheras();
            break;
        case "locales":
            mostrarLocales();
            break;
        case "oficinas":
            mostrarOficinas();
            break;
        case "depositos":
            mostrarDepositos();
            break;
        default:
            mostrarTodos();
            break;
    }
}

function hideFilters(value) {
    ocultarTodos();
    switch (value) {
        case "lotes-residenciales":
            mostrarFiltrosLotes();
            break;
        case "departamentos":
            mostrarFiltrosDepartamentos();
            break;
        case "casas":
            mostrarCasasPH();
            break;
        case "ph":
            mostrarCasasPH();
            break;
        case "casas-ph":
            mostrarCasasPH();
            break;
        case "edificios-comerciales":
            mostrarEdificiosComerciales();
            break;
        case "cocheras":
            mostrarCocheras();
            break;
        case "amarras":
            mostrarCocheras();
            break;
        case "amarras-cocheras":
            mostrarCocheras();
            break;
        case "locales":
            mostrarLocales();
            break;
        case "oficinas":
            mostrarOficinas();
            break;
        case "galpones":
            mostrarDepositos();
            break;
        case "depositos":
            mostrarDepositos();
            break;
        default:
            mostrarTodos();
            break;
    }
}

function ocultarTodos() {
    document
        .querySelectorAll('[data-filterfy-wrapper="rooms"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="suites"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="roofed"]')
        .forEach((element) => {
            element.style.display = "none";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "none";
        });
}

function mostrarTodos() {
    document
        .querySelectorAll('[data-filterfy-wrapper="rooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="suites"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="roofed"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarFiltrosLotes() {
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarFiltrosDepartamentos() {
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="rooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarCasasPH() {
    document
        .querySelectorAll('[data-filterfy-wrapper="rooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarCocheras() {
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarLocales() {
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarEdificiosComerciales() {
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarOficinas() {
    document
        .querySelectorAll('[data-filterfy-wrapper="bathrooms"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="amenities"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

function mostrarDepositos() {
    document
        .querySelectorAll('[data-filterfy-wrapper="price"]')
        .forEach((element) => {
            element.style.display = "block";
        });
    document
        .querySelectorAll('[data-filterfy-wrapper="surface"]')
        .forEach((element) => {
            element.style.display = "block";
        });
}

//! ESTO ES TEMPORAL Y LUEGO TENGO QUE CAMBIARLO E INTEGRARLO A FILTERFY.

document.querySelectorAll("[data-beta-filterfy-event]").forEach((element) => {
    const attribute = element
        .getAttribute("data-beta-filterfy-event")
        .split(":");

    const eventType = attribute[0];
    const formType = attribute[1];

    if (eventType === "submit") {
        element.addEventListener(eventType, (event) => {
            event.preventDefault();
            if (formType === "price") {
                const currency = event.target.querySelectorAll(
                    "input[name='currency']:checked"
                )[0].value;
                const price = event.target.querySelectorAll(
                    "input[name='price']"
                )[0].value;

                console.log(currency, price);

                const filterValue = `price:${price}&currency:${currency}`;
                filterfy(filterValue);
            }

            if (formType === "surface") {
                const surfaceType = event.target.querySelectorAll(
                    "input[name='surface_type']:checked"
                )[0].value;
                const surface = event.target.querySelectorAll(
                    "input[name='surface']"
                )[0].value;

                console.log(surface, surfaceType);

                const filterValue = `${surfaceType}:${surface}`;
                filterfy(filterValue);
            }
        });
    }
    console.log(eventType, formType);
});
