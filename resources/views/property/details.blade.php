@extends('layout.app')
@section('content')
<section class="flat-location flat-slider-detail-v1">
    <div class="swiper tf-sw-location" data-preview-lg="2.03" data-preview-md="2" data-preview-sm="2" data-space="20"
        data-centered="true" data-loop="true">
        <div class="swiper-wrapper">
            @forelse ($property['photos'] as $photo)
                <div class="swiper-slide">
                    <a href="{{ $photo['image'] }}" data-fancybox="gallery" class="box-imgage-detail d-block">
                        <img src="{{ $photo['image'] }}" alt="img-property"
                            style="width:100%; height:450px; object-fit: cover; object-position: center;">
                    </a>
                </div>
            @empty
                <div class="swiper-slide">
                    <a href data-fancybox="gallery" class="box-imgage-detail d-block">
                        <img src="{{asset('/images/no-image.webp')}}" alt="img-property"
                            style="width:100%; height:450px; object-fit: cover; object-position: center;">
                    </a>
                </div>
            @endforelse
        </div>
        <div class="box-navigation">
            <div class="navigation swiper-nav-next nav-next-location"><span class="icon icon-arr-l"></span></div>
            <div class="navigation swiper-nav-prev nav-prev-location"><span class="icon icon-arr-r"></span></div>
        </div>
        <!-- <div class="icon-box">
                        <a href="#" class="item"><span class="icon icon-map-trifold"></span></a>
                        <a href="images/banner/banner-property-1.jpg" class="item active" data-fancybox="gallery"><span class="icon icon-images"></span></a>
                    </div> -->
    </div>
</section>

<section class="flat-section pt-0 flat-property-detail">
    <div class="container">
        <div class="header-property-detail">
            <div class="content-top d-flex justify-content-between align-items-center">
                <div class="boxname-ficha">
                    @php
                        $operationTypes = [];
                        foreach ($property['operations'] as $item) {
                            $operationTypes[] = $item['operation_type'];
                        }
                    @endphp
                    @if (in_array('Venta', $operationTypes) && in_array('Alquiler', $operationTypes))
                        <a href="#" class="flag-tag primary">En Venta</a><a href="#" class="flag-tag primary">En
                            Alquiler</a>
                    @elseif (in_array('Venta', $operationTypes))
                        <a href="#" class="flag-tag primary">En Venta</a>
                    @elseif (in_array('Alquiler', $operationTypes))
                        <a href="#" class="flag-tag primary">En Alquiler</a>
                    @elseif (in_array('Alquiler temporario', $operationTypes))
                        <a href="#" class="flag-tag primary">En Alquiler temporario</a>
                    @endif
                    <h4 class="title link">{{ $property['publication_title'] }}</h4>
                </div>
                <div class="box-price d-flex align-items-center">

                    <h5>u$d <span currency-format="usd"
                            country-id="es-AR">{{ $property['operations'][0]['prices'][0]['price'] }}</span> <span
                            class="body-1 text-variant-1"></span>

                        <br />

                        <!-- u$d 250 <span class="body-1 text-variant-1">/mes</span> -->
                    </h5>

                </div>
            </div>
            <div class="content-bottom hide-mobile">
                <!-- <div class="info-box">
                                <div class="label">Aspectos rápidos de la propiedad:</div>
                                <ul class="meta">
                                    <li class="meta-item"><span class="icon icon-bed"></span> 2 Dormitorios</li>
                                    <li class="meta-item"><span class="icon icon-bed"></span> 2 Ambientes</li>
                                    <li class="meta-item"><span class="icon icon-bathtub"></span> 2 Baños</li>
                                    <li class="meta-item"><span class="icon icon-ruler"></span> 600 m² Cubiertos</li>
                                    <li class="meta-item"><span class="icon icon-ruler"></span> 600 m² Totales</li>
                                </ul>
                            </div> -->
                <div class="info-box">
                    <div class="label">Ubicación:</div>
                    <p class="meta-item"><span class="icon icon-mapPin"></span>
                        {{ $property['location']['short_location'] }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="single-property-element single-property-desc">
                    <div class="h7 title fw-7">Descripción de la propiedad</div>
                    <p class="body-2 text-variant-1" id="rich-description">
                    {!! str_replace(['<div>', '</div>'], ['<p>', '</p>', '<br>', '<br/>'], $property['rich_description']) !!}
                    </p>
                </div>
                <div class="single-property-element single-property-overview">
                    <div class="h7 title fw-7">Aspectos generales</div>
                    <ul class="info-box">
                        <li class="item">
                            <a href class="box-icon w-52"><i class="icon icon-house-line"></i></a>
                            <div class="content">
                                <span class="label">ID:</span>
                                <span>{{ $property['id'] }}</span>
                            </div>
                        </li>
                        @if($property['suite_amount'] > 0)
                            <li class="item">
                                <a href class="box-icon w-52"><i class="icon icon-bed"></i></a>
                                <div class="content">
                                    <span class="label">Dormitorios:</span>
                                    <span>{{ $property['suite_amount'] }}</span>
                                </div>
                            </li>
                        @endif
                        @if($property['room_amount'] > 0)
                            <li class="item">
                                <a href class="box-icon w-52"><i class="icon icon-bed"></i></a>
                                <div class="content">
                                    <span class="label">Ambientes:</span>
                                    <span>{{ $property['room_amount'] }}</span>
                                </div>
                            </li>
                        @endif
                        @if($property['bathroom_amount'] > 0)
                            <li class="item">
                                <a href class="box-icon w-52"><i class="icon icon-bathtub"></i></a>
                                <div class="content">
                                    <span class="label">Baños:</span>
                                    <span>{{ $property['bathroom_amount'] }}</span>
                                </div>
                            </li>
                        @endif
                        @if($property['parking_lot_amount'] > 0)
                            <li class="item">
                                <a href class="box-icon w-52"><i class="icon icon-garage"></i></a>
                                <div class="content">
                                    <span class="label">Garages:</span>
                                    <span>{{ $property['parking_lot_amount'] }}</span>
                                </div>
                            </li>
                        @endif
                        @if($property['roofed_surface'] > 0)
                            <li class="item">
                                <a href class="box-icon w-52"><i class="icon icon-ruler"></i></a>
                                <div class="content">
                                    <span class="label">Sup.Cubierta:</span>
                                    <span>{{ $property['roofed_surface'] }} m²</span>
                                </div>
                            </li>
                        @endif
                        <li class="item">
                            <a href class="box-icon w-52"><i class="icon icon-crop"></i></a>
                            <div class="content">
                                <span class="label">Sup.Total:</span>
                                <span>{{ $property['surface'] }} m²</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href class="box-icon w-52"><i class="icon icon-hammer"></i></a>
                            <div class="content">
                                <span class="label">Antiguedad:</span>
                                <span>{{ $property['age'] ? $property['age'] : 'A estrenar' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @if ($property['videos'] != [])
                    <div class="single-property-element ">
                        <div class="h7 title fw-7">Video</div>
                        <div class="img-video">
                            <iframe width="100%" height="410" src="{{ $property['videos'][0]['player_url'] }}"
                                title="{{ $property['videos'][0]['title'] }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <!-- <img src="images/banner/img-video.jpg" alt="img-video">

                                                        <a href="https://youtu.be/t_0RC96t0Wc" data-fancybox="gallery2" class="btn-video"> <span class="icon icon-play"></span></a> -->
                        </div>
                    </div>
                @endif
                <!-- <div class="single-property-element single-property-explore">
                    <div class="h7 title fw-7">Matterport 360</div>
                    <div class="box-img">
                        <img src="images/banner/img-explore.jpg" alt="img">
                        <div class="box-icon w-80">
                            <span class="icon icon-360"></span>
                        </div>
                    </div>
                </div> -->
                <div class="single-property-element single-property-info">
                    <div class="h7 title fw-7">
                        Detalles de la propiedad:
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Tokko ID:</span>
                                <div class="content fw-7">{{$property['reference_code']}}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Dormitorios:</span>
                                <div class="content fw-7">4</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Ambientes:</span>
                                <div class="content fw-7">1</div>
                            </div>
                        </div>

                        @foreach($property['operations'] as $operation)
                            @if($operation['operation_type'] == 'Venta')
                                <div class="col-md-6">
                                    <div class="inner-box">
                                        <span class="label">Precio de Venta: </span>
                                        <div class="content fw-7">u$d <span currency-format="usd"
                                                country-id="es-AR">{{$operation['prices'][0]['price']}}</span></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @foreach($property['operations'] as $operation)
                            @if($operation['operation_type'] != 'Venta')
                                <div class="col-md-6">
                                    <div class="inner-box">
                                        <span class="label">Precio de Alquiler: </span>
                                        <div class="content fw-7">u$d <span currency-format="usd"
                                                country-id="es-AR">{{$operation['prices'][0]['price']}}</span><span
                                                class="caption-1 fw-4 text-variant-1">/mes</span></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @if($property['bathroom_amount'] > 0)
                            <div class="col-md-6">
                                <div class="inner-box">
                                    <span class="label">Baños:</span>
                                    <div class="content fw-7">{{$property['bathroom_amount']}}</div>
                                </div>
                            </div>
                        @endif
                        @if($property['surface'] > 0)
                            <div class="col-md-6">
                                <div class="inner-box">
                                    <span class="label">Sup. Total:</span>
                                    <div class="content fw-7">{{$property['surface']}} m²</div>
                                </div>
                            </div>
                        @endif


                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Antiguedad:</span>
                                <div class="content fw-7">
                                    {{ $property['age'] ? $property['age'] . " Años" : 'A estrenar' }}
                                </div>
                            </div>
                        </div>
                        @if($property['roofed_surface'] > 0)
                            <div class="col-md-6">
                                <div class="inner-box">
                                    <span class="label">Sup. Cubierta:</span>
                                    <div class="content fw-7">{{ $property['roofed_surface'] }} m²</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Orientación:</span>
                                <div class="content fw-7">{{$property['orientation']}}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Cocheras:</span>
                                <div class="content fw-7">{{ $property['parking_lot_amount'] > 0 ? 'Si' : 'No' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-property-element single-property-feature">
                    <div class="h7 title fw-7">Amenities y Servicios</div>
                    <div class="wrap-feature">
                        <div class="box-feature">

                            <ul>
                                @forelse ($property['tags'] as $tag)
                                    <li class="feature-item">
                                        <span class="icon lni lni-checkmark-circle"></span>
                                        {{ $tag['name'] }}
                                    </li>
                                @empty
                                    <li>No hay servicios disponibles</li>
                                @endforelse
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- <div class="single-property-element single-property-map">
                    <div class="h7 title fw-7">Ubicación</div>
                    <div id="map-single" class="map-single" data-map-zoom="16" data-map-scroll="true"></div>
                </div> -->



                <!-- <div class="single-property-element single-property-loan">
                    <div class="h7 title fw-7">Simulador de Prestamo Hipotecario</div>
                    <form action="#" class="box-loan-calc">
                        <div class="box-top">
                            <div class="item-calc">
                                <label for="loan1" class="label">Precio de la propiedad:</label>
                                <input type="number" id="loan1" value="250.000" class="form-control" disabled>
                            </div>
                            <div class="item-calc">
                                <label for="loan1" class="label">Seleccioná un Banco</label>
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Seleccioná una
                                            propiedad</span>
                                        <ul class="list">

                                            <li data-value="villa" class="option">Banco Hipotecario</li>
                                            <li data-value="studio" class="option">Banco Frances</li>
                                            <li data-value="office" class="option">Santander Rio</li>
                                            <li data-value="house" class="option">Supervielle </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="item-calc">
                                <label for="loan1" class="label">Deberás contar con: xx%</label>
                                <input type="number" id="loan1" value="25.000" class="form-control" disabled>
                            </div>
                            <div class="item-calc">
                                <label for="loan1" class="label">Down Payment:</label>
                                <input type="number" id="loan1" placeholder="3000" class="form-control">
                            </div>
                            <div class="item-calc">
                                <label for="loan1" class="label">Amortization Period (months):</label>
                                <input type="number" id="loan1" placeholder="12" class="form-control">
                            </div>
                            <div class="item-calc">
                                <label for="loan1" class="label">Interest rate (%):</label>
                                <input type="number" id="loan1" placeholder="5" class="form-control">
                            </div>
                        </div>
                        <div class=" col-md-12  flat-quote">
                            <blockquote class="quote">
                                “El BBVA ofrece un topa máximo de usd 150.000 y deberás contar con el 20%. La tasa
                                actual del bbva es del 70%”
                            </blockquote>

                        </div>
                        <div class="box-bottom">
                            <button class="tf-btn primary">Calcular</button>
                            <div class="d-flex gap-4">
                                <span class="h7 fw-7">Cuota Aproximada por mes:</span>
                                <span class="result h7 fw-7">$ 599.250</span>
                            </div>
                        </div>

                    </form>
                </div> -->


            </div>
            <div class="col-lg-4">
                <div class="widget-sidebar fixed-sidebar wrapper-sidebar-right">
                    <div class="widget-box single-property-contact bg-surface">
                        <div class="h7 title fw-7">Contactate por esta propiedad</div>
                        <div class="box-avatar">
                            <div class="avatar avt-90 round">
                                <img src="{{ $property['branch']['logo'] }}" alt="avatar">
                            </div>
                            <div class="info">
                                <div class="text-1 name">{{ $property['branch']['display_name'] }}</div>
                                <span><i class="icon lni lni-phone"></i> <a target="_blank" rel="noopener noreferrer"
                                        href="https://api.whatsapp.com/send/?phone={{ $property['branch']['alternative_phone_country_code'] . $property['branch']['alternative_phone_area'] . $property['branch']['alternative_phone'] }}&text=Me+gustar%C3%ADa+ser+contactado+para+consultarles+por+una+propiedad.&type=phone_number&app_absent=0">{{ $property['branch']['alternative_phone_area'] . $property['branch']['alternative_phone'] }}</a><br />
                                    <i class="icon lni lni-envelope"></i> <a
                                        href="mailto:{{ $property['branch']['email'] }}">{{ $property['branch']['email'] }}</a></span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('contact') }}" class="contact-form">
                            @csrf
                            <input type="hidden" name="type" value="propiedad">
                            <input type="hidden" name="branch" value="{{ $property['branch']['name'] }}">
                            <input type="hidden" name="agentEmail" value="{{ $property['branch']['email'] }}">
                            <input type="hidden" name="propertyId" value="{{ $property['id'] }}">
                            <div class="ip-group">
                                <label for="fullname">Nombre Completo</label>
                                <input type="text" placeholder="Ingresá tu nombre" class="form-control" name="name"
                                    required>
                            </div>
                            <div class="ip-group">
                                <label for="phone">Teléfono de Contacto</label>
                                <input type="text" placeholder="1122334455" class="form-control" name="phone" required>
                            </div>
                            <div class="ip-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="text" placeholder="ejemplo@gmail.com" class="form-control" name="email"
                                    required>
                            </div>
                            <div class="ip-group">
                                <label for="message">Consulta:</label>
                                <textarea id="comment-message" name="message" rows="4" tabindex="4"
                                    placeholder="Mensaje" aria-required="true"></textarea>
                            </div>
                            <button type="submit" class="tf-btn primary w-100">Envíar Consulta</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>

</section>
<section class="flat-section pt-0 flat-latest-property">
    <div class="container">
        <div class="box-title">
            <div class="text-subtitle text-primary">Propiedades similares</div>
            <h4 class="mt-4">También te puede interesar</h4>
        </div>
        <div class="swiper tf-latest-property" data-preview-lg="3" data-preview-md="2" data-preview-sm="2"
            data-space="30" data-loop="true">
            <div class="swiper-wrapper" id="props-wrapper"></div>
        </div>
    </div>
</section>
<script>
    property_data = {
        is_development: false,
        property_type: "",
        operation_type: "",
        rooms: "",
        suites: "",
        bathrooms: "",
        roofed: "",
        surface: "",
        price: {{$property['operations'][0]['prices'][0]['price']}},
        location: "",
        location_id: "",
        order_by: "",
        order: "",
        currency: "",
        offset: 0,
        limit: 8,
        tags: [],
    };

</script>
<script src="{{asset('/js/utils/format.js')}}"></script>
<script src="{{asset('/js/property/details.js')}}"></script>
@endsection