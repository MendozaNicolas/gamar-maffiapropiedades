@extends('layout.app')
@section('content')
<!-- Slider -->
<section class="flat-slider home-1">
    <div class="container relative">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-content">
                    <div class="heading">
                        <h1 class="text-white animationtext slide">
                            Encontrá tu
                            <span class="tf-text s1 cd-words-wrapper">
                                <span class="item-text is-visible">casa</span>
                                <span class="item-text is-hidden">lote</span>
                                <span class="item-text is-hidden">departamento</span>
                                <span class="item-text is-hidden">oficina</span>
                            </span>
                        </h1>
                        <p class="subtitle-maffia text-white body-1 wow fadeIn hide-mobile" data-wow-delay=".8s"
                            data-wow-duration="2000ms">Contamos con más de 1000 propiedades ideales para vos.</p>
                    </div>
                    <div class="flat-tab flat-tab-form">
                        <ul class="nav-tab-form style-1 ml-10" role="tablist">
                            <li class="nav-tab-item" role="presentation">
                                <button
                                    style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                    onclick="document.getElementById('operationtype-input').value = 'venta'"><a
                                        href class="nav-link-item active"
                                        data-bs-toggle="tab">Comprar</a></button>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <button
                                    style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                    onclick="document.getElementById('operationtype-input').value = 'alquiler'"><a
                                        href class="nav-link-item" data-bs-toggle="tab">Alquilar</a></button>
                            </li>
                            <li class="nav-tab-item hide-mobile" role="presentation">
                                <button
                                    style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                    onclick="document.getElementById('operationtype-input').value = 'alquiler-temporario'"><a
                                        href class="nav-link-item" data-bs-toggle="tab">Alquiler
                                        Temporal</a></button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" role="tabpanel">
                                <div class="form-sl">
                                    <form method="GET" action="{{Route('property.slugify')}}">
                                        @csrf
                                        <input id="operationtype-input" type="hidden" value="venta"
                                            name="operation_type">
                                        <input id="locationid-input" type="hidden" name="id">
                                        <input id="locationname-input" type="hidden" name="name">
                                        <div class="wd-find-select">
                                            <div class="inner-group">
                                                <div class="form-group-3 form-style">
                                                    <label>Tipo de propiedad</label>
                                                    <div class="group-select">
                                                        <select name="property_type" class="nice-select"
                                                            tabindex="0"><span class="current">Seleccioná una
                                                                propiedad</span>
                                                            <option value="null">Seleccioná una propiedad</option>
                                                            <option value="casas-ph">Casas y Ph</option>
                                                            <option value="departamentos">Departamentos</option>
                                                            <option value="lotes-residenciales">Lotes</option>
                                                            <option value="oficinas">Oficinas</option>
                                                            <option value="oficinas">Oficinas comerciales</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group-2 form-style">
                                                    <label>Ubicación</label>
                                                    <div class="group-ip">
                                                        <input id="locationVenta" type="text" class="form-control"
                                                            placeholder="ingresá una localidad" value="" name="search"
                                                            title="Search for">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="tf-btn primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <div class="overlay"></div>
</section>
<!-- End Slider -->

<!-- Location -->
<section class="flat-section-v3 flat-location bg-surface">
    <div class="container-full">
        <div class="box-title text-center wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
            <div class="text-subtitle text-primary">Mudate a la vida que querés.</div>
            <h4 class="mt-4">Nuestras zonas</h4>
        </div>
        <div class="wow fadeInUpSmall" data-wow-delay=".4s" data-wow-duration="2000ms">
            <div class="swiper tf-sw-location overlay" data-preview-lg="4.1" data-preview-md="3" data-preview-sm="2"
                data-space="30" data-centered="true" data-loop="true">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="" class="box-location">
                            <div class="image">
                                <img src="https://d1v2p1s05qqabi.cloudfront.net/sites/320/media/1686086632151.webp?v=9"
                                    alt="image-location">
                            </div>
                            <div class="content">
                                <span class="sub-title">Casas en venta en Nordelta</span>
                                <h6 class="title">Nordelta, Tigre</h6>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="" class="box-location">
                            <div class="image">
                                <img src="https://d1v2p1s05qqabi.cloudfront.net/3150815/24078477004709880812079334202526294131554997236344912071511030567294450968536.jpg"
                                    alt="image-location">
                            </div>
                            <div class="content">
                                <span class="sub-title">Oficinas en Alquiler</span>
                                <h6 class="title">Pueblo Caamaño</h6>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="" class="box-location">
                            <div class="image">
                                <img src="https://static.tokkobroker.com/water_pics/65602795529075104354202997649107471741351481886641144111574864647161883522146.jpg"
                                    alt="image-location">
                            </div>
                            <div class="content">
                                <span class="sub-title">Locales comerciales</span>
                                <h6 class="title">Ingeniero Maschwitz, Tigre</h6>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="" class="box-location">
                            <div class="image">
                                <img src="https://imgar.zonapropcdn.com/avisos/1/00/51/97/16/10/1200x1200/1882560757.jpg?isFirstImage=true"
                                    alt="image-location">
                            </div>
                            <div class="content">
                                <span class="sub-title">Casas en San Sebastián</span>
                                <h6 class="title">Escobar</h6>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="" class="box-location">
                            <div class="image">
                                <img src="https://d1v2p1s05qqabi.cloudfront.net/785529/60512183022162341592970052656507607783660910529578735180869439696105606860245.jpg"
                                    alt="image-location">
                            </div>
                            <div class="content">
                                <span class="sub-title">Casas en Alquiler Temporal</span>
                                <h6 class="title">Rincón de Milberg, Tigre</h6>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="box-navigation">
                    <div class="navigation swiper-nav-next nav-next-location"><span class="icon icon-arr-l"></span>
                    </div>
                    <div class="navigation swiper-nav-prev nav-prev-location"><span class="icon icon-arr-r"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Location -->

<!-- Property  -->
<section class="flat-section flat-property">
    <div class="container">
        <div class="box-title style-1 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
            <div class="box-left">
                <div class="text-subtitle text-primary">Propiedades más interesantes</div>
                <h4 class="mt-4">Las recomendadas</h4>
            </div>
            <a href="#" class="tf-btn primary size-1">Ver todas</a>
        </div>
        <div class="wrap-property">
            <div class="box-left  wow fadeInLeftSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                <div class="homeya-box lg">
                    <div class="archive-top">
                        <a href="ficha.html" class="images-group">
                            <div class="images-style">
                                <img src="https://static.tokkobroker.com/w_pics/6118362_64501578973936695344099515106555743910172019129060087372967275992689225169284.jpg"
                                    alt="img">
                            </div>

                        </a>
                        <div class="content">
                            <h5 class="fw-3"><a href="ficha.html" class="link"> Alquiler temporal La Delfina - Pilar -
                                    Frente al Hospital Austral</a></h5>
                            <div class="desc"><i class="icon icon-mapPin"></i>
                                <p>Avenida Rolón 3400, Lomas de San Isidro, San Isidro</p>
                            </div>

                            <ul class="meta-list">
                                <li class="item">
                                    <i class="icon icon-bed"></i>
                                    <span>4</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-bathtub"></i>
                                    <span>2</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>600 Sup. Total</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="archive-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-8 align-items-center">
                            <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                        </div>
                        <div class="d-flex gap-8 align-items-center">
                            <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-right wow fadeInRightSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                <div class="homeya-box list-style-1">
                    <a href="property-details-v1.html" class="images-group">
                        <div class="images-style">
                            <img src="https://static.tokkobroker.com/w_pics/6118362_64501578973936695344099515106555743910172019129060087372967275992689225169284.jpg"
                                alt="img">
                        </div>

                    </a>
                    <div class="content">
                        <div class="archive-top">
                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Alquiler temporal La
                                    Delfina - </a></div>
                            <div class="desc">
                                <i class="icon icon-mapPin"></i>
                                <p>Avenida Libertador 18000, San isidro</p>
                            </div>
                            <ul class="meta-list">
                                <li class="item">
                                    <i class="icon icon-bed"></i>
                                    <span>4</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-bathtub"></i>
                                    <span>2</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>600m², Sup. Total</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="homeya-box list-style-1">
                    <a href="ficha.html" class="images-group">
                        <div class="images-style">
                            <img src="https://static.tokkobroker.com/w_pics/6163943_101500208500650703435093299336957320059296155478694986738925915755017055932419.jpg"
                                alt="img">
                        </div>

                    </a>
                    <div class="content">
                        <div class="archive-top">
                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Alquiler temporal La
                                    Delfina - Pilar...</a></div>
                            <div class="desc"><i class="icon icon-mapPin"></i>
                                <p>145 Brooklyn Ave, Califonia, New York</p>
                            </div>
                            <ul class="meta-list">
                                <li class="item">
                                    <i class="icon icon-bed"></i>
                                    <span>4</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-bathtub"></i>
                                    <span>2</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>600m² Sup. Cubierta</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="homeya-box list-style-1">
                    <a href="property-details-v1.html" class="images-group">
                        <div class="images-style">
                            <img src="https://static.tokkobroker.com/water_pics/13189665647666139169816260051114795360087888557017275650103167469248947913944.jpg"
                                alt="img">
                        </div>

                    </a>
                    <div class="content">
                        <div class="archive-top">
                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Casa en Venta en
                                    Pilar</a></div>
                            <div class="desc"><i class="icon icon-mapPin"></i>
                                <p>Avenida Ricarod Garay 1200, Pilar</p>
                            </div>
                            <ul class="meta-list">
                                <li class="item">
                                    <i class="icon icon-bed"></i>
                                    <span>4</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-bathtub"></i>
                                    <span>2</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>600m²</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Property  -->

<!-- Service & Counter  -->
<section>
    <div class="container">
        <div class="box-title style-1 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
            <div class="box-left">
                <div class="text-subtitle text-primary">Tasá tu propiedad</div>
                <h4 class="mt-4">Tasamos hoy?</h4>
            </div>
            <a href="#" class="btn-view"><span class="text">View All Services</span> <span
                    class="icon icon-arrow-right2"></span> </a>
        </div>
        <div class="flat-service wrap-service wow fadeInUpSmall" data-wow-delay=".4s" data-wow-duration="2000ms">
            <div class="box-service hover-btn-view">
                <div class="icon-box">
                    <span class="icon icon-buy-home"></span>
                </div>
                <div class="content">
                    <h6 class="title">Buy A New Home</h6>
                    <p class="description">Discover your dream home effortlessly. Explore diverse properties and expert
                        guidance for a seamless buying experience.</p>
                    <a href="#" class="btn-view style-1"><span class="text">Learn More</span> <span
                            class="icon icon-arrow-right2"></span> </a>
                </div>
            </div>
            <div class="box-service hover-btn-view">
                <div class="icon-box">
                    <span class="icon icon-rent-home"></span>
                </div>
                <div class="content">
                    <h6 class="title">Rent a home</h6>
                    <p class="description">Discover your perfect rental effortlessly. Explore a diverse variety of
                        listings tailored precisely to suit your unique lifestyle needs.</p>
                    <a href="#" class="btn-view style-1"><span class="text">Learn More</span> <span
                            class="icon icon-arrow-right2"></span> </a>
                </div>
            </div>
            <div class="box-service hover-btn-view">
                <div class="icon-box">
                    <span class="icon icon-sale-home"></span>
                </div>
                <div class="content">
                    <h6 class="title">Sell a home</h6>
                    <p class="description">Sell confidently with expert guidance and effective strategies, showcasing
                        your property's best features for a successful sale.</p>
                    <a href="#" class="btn-view style-1"><span class="text">Learn More</span> <span
                            class="icon icon-arrow-right2"></span> </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Service & Counter -->
@endsection

@push('scripts')searchVenta
<script src="{{ asset('vendor/cleave.min.js') }}"></script>
{{--
<script src="{{ asset('js/utils/format.js') }}"></script> --}}
<script src="{{ asset('vendor/typeahead.bundle.min.js') }}"></script>

<script>
    var locationsCompleteRaw = @json($locations);

    var locationsComplete = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('location_name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: locationsCompleteRaw
    });


    $('#locationVenta').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'locationsComplete',
        source: locationsComplete,
        displayKey: 'location_name',
        templates: {

            // Aca personalizas el mensaje que salta cuando no se encuentra 
            // ninguna localidad.
            empty: [
                '<div style="background-color: white;">',
                'No se encontró ninguna localidad',
                '</div>'
            ].join('\n'),
            suggestion: function (data) {

                // Aca es donde se puede personalizar el input,
                // fijate que le puse unos estilos por defecto para que mas 
                // o menos se vea decente.


                return `
            <li style="background-color: #fff; list-style:none;">
                <div style="background-color: #fff;">
                    <div class="item_title">
                        <i class="flaticon-maps pe-2"></i>
                        ${data.location_name.replace(/ /g, '\xa0')}  
                    </div>
                </div>
            </li>
            `;
            }
        }
    }).on('typeahead:selected', function (event, suggestion) {
        $('#locationid-input').val(suggestion.location_id);
        $('#locationname-input').val(suggestion.location_name != undefined ? suggestion.location_name :
            suggestion.development_name);
    });




    $('#location-input-alquiler').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'locationsComplete',
        source: locationsComplete,
        displayKey: 'location_name',
        templates: {

            // Aca personalizas el mensaje que salta cuando no se encuentra 
            // ninguna localidad.
            empty: [
                '<div style="background-color: white;">',
                'No se encontró ninguna localidad',
                '</div>'
            ].join('\n'),
            suggestion: function (data) {

                // Aca es donde se puede personalizar el input,
                // fijate que le puse unos estilos por defecto para que mas 
                // o menos se vea decente.


                return `
            <li style="background-color: #fff; list-style:none;">
                <div style="background-color: #fff;">
                    <div class="item_title">
                        <i class="flaticon-maps pe-2"></i>
                        ${data.location_name.replace(/ /g, '\xa0')}  
                    </div>
                </div>
            </li>
            `;
            }
        }
    }).on('typeahead:selected', function (event, suggestion) {
        $('#locationid-input-alquiler').val(suggestion.location_id);
        $('#locationname-input-alquiler').val(suggestion.location_name != undefined ? suggestion.location_name :
            suggestion.development_name);
        $('#operationtype-input-alquiler').val(suggestion.location_name != undefined ? 'alquiler' :
            'emprendimiento');
    });
    $('#location-input-alquiler-temporal').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'locationsComplete',
        source: locationsComplete,
        displayKey: 'location_name',
        templates: {

            // Aca personalizas el mensaje que salta cuando no se encuentra 
            // ninguna localidad.
            empty: [
                '<div style="background-color: white;">',
                'No se encontró ninguna localidad',
                '</div>'
            ].join('\n'),
            suggestion: function (data) {

                // Aca es donde se puede personalizar el input,
                // fijate que le puse unos estilos por defecto para que mas 
                // o menos se vea decente.


                return `
            <li style="background-color: #fff; list-style:none;">
                <div style="background-color: #fff;">
                    <div class="item_title">
                        <i class="flaticon-maps pe-2"></i>
                        ${data.location_name.replace(/ /g, '\xa0')}  
                    </div>
                </div>
            </li>
            `;
            }
        }
    }).on('typeahead:selected', function (event, suggestion) {
        $('#locationid-input-alquiler-temporal').val(suggestion.location_id);
        $('#locationname-input-alquiler-temporal').val(suggestion.location_name != undefined ? suggestion
            .location_name :
            suggestion.development_name);
        $('#operationtype-input-alquiler-temporal').val(suggestion.location_name != undefined ?
            'alquiler-temporal' :
            'emprendimiento');
    });

    // Tambien está el elemento tt-menu que crea la libreria
    // Modificando tt-menu podes cambiar el fondo del select
    // tambien en la funcion prepend podes poner un header del select
    $('.tt-menu').prepend(`
    <h6 style="background-color: #fff; padding: 10px 5em">Resultados encontrados</h6>
`);


</script>
@endpush