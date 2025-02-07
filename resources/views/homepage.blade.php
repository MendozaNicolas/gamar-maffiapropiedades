@push('head')
    <link rel="stylesheet" href="{{asset('/css/awesomplete.css')}}" />
@endpush
@extends('layout.app')
@section('content')
<datalist id="locations_list"></datalist>

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
                                    onclick="document.getElementById('operationtype-input').value = 'venta'"><a href
                                        class="nav-link-item active" data-bs-toggle="tab">Comprar</a></button>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <button
                                    style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                    onclick="document.getElementById('operationtype-input').value = 'alquiler'"><a href
                                        class="nav-link-item" data-bs-toggle="tab">Alquilar</a></button>
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
                                                        <input id="location_input" type="text"
                                                            class="form-control awesomplete"
                                                            placeholder="ingresá una localidad" value="" name="search"
                                                            title="Buscar..." list="locations_list">
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
                        <a href="./propiedad/{{Str::slug($properties[0]['id'] . '-' . $properties[0]['type']['name'] . $properties[0]['operations'][0]['operation_type'] . $properties[0]['location']['name'])}}"
                            class="images-group">
                            <div class="images-style">
                                <img src="{{$properties[0]['photos'][0]['image']}}" alt="img">
                            </div>

                        </a>
                        <div class="content">
                            <h5 class="fw-3"><a
                                    href="./propiedad/{{Str::slug($properties[0]['id'] . '-' . $properties[0]['type']['name'] . $properties[0]['operations'][0]['operation_type'] . $properties[0]['location']['name'])}}"
                                    class="link"> {{$properties[0]['publication_title']}}</a>
                            </h5>
                            <div class="desc"><i class="icon icon-mapPin"></i>
                                <p>{{$properties[0]['real_address']}}</p>
                            </div>

                            <ul class="meta-list">
                                @if($properties[0]['type']['name'] === "Departamento" || $properties[0]['type']['name'] === "Casa")
                                    <li class="item">
                                        <i class="icon icon-bed"></i>
                                        <span>
                                            @if($properties[0]['type']['name'] === "Departamento")
                                                {{$properties[0]['room_amount']}}
                                            @else
                                                {{$properties[0]['suite_amount']}}
                                            @endif
                                        </span>
                                    </li>
                                @endif
                                @if($properties[0]['type']['name'] != "Terreno")
                                    <li class="item">
                                        <i class="icon icon-bathtub"></i>
                                        <span>
                                            {{$properties[0]['bathroom_amount']}}
                                        </span>
                                    </li>
                                @endif
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>{{ explode('.', $properties[0]['surface'])[0] }}m² Sup. Total</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @php
                        $operationTypes = [];
                        foreach ($properties[0]['operations'] as $item) {
                            $operationTypes[] = $item['operation_type'];
                        }
                    @endphp
                    <div class="archive-bottom d-flex justify-content-between align-items-center">
                        @if (in_array('Alquiler', $operationTypes) || in_array('Alquiler temporario', $operationTypes))
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">
                                        USD $ @foreach($properties[0]['operations'] as $operation)
                                            @if($operation['operation_type'] != 'Venta')
                                                <span currency-format="usd"
                                                    country-id="es-AR">{{$operation['prices'][0]['price']}}</span>
                                            @endif
                                        @endforeach
                                        /mes
                                    </span>
                                </div>

                            </div>
                        @endif
                        @if (in_array('Venta', $operationTypes))
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">
                                        USD $
                                        @foreach($properties[0]['operations'] as $operation)
                                            @if($operation['operation_type'] == 'Venta')
                                                <span currency-format="usd"
                                                    country-id="es-AR">{{$operation['prices'][0]['price']}}</span>
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-right wow fadeInRightSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                @forelse ($properties as $key => $property)
                    @if($key != 0)
                        <x-homepage.starred-card :property="$property" />
                    @endif
                @empty
                    En este momento no hay propiedades destacadas
                @endforelse
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

@push('scripts')
    <script src="{{ asset('vendor/cleave.min.js') }}"></script>
    <script src="{{ asset('js/utils/format.js') }}"></script>
    <script src="{{ asset('vendor/awesomplete.min.js') }}" async></script>
    <script>
        const locations = @json($locations);

        locations.forEach(element => {
            const locationsDataList = document.getElementById('locations_list');
            const newOption = document.createElement("option");
            const newContent = document.createTextNode(element.location_name);

            newOption.appendChild(newContent);
            newOption.setAttribute("value", element.location_id);


            locationsDataList.appendChild(newOption);
        });

        document.getElementById('location_input')
            .addEventListener("awesomplete-highlight", (event) => {
                document.getElementById('locationname-input').value = event.text.label;
                document.getElementById('locationid-input').value = event.text.value;
                document.getElementById('location_input').value = event.text.label;
            });
        document.getElementById('location_input')
            .addEventListener("awesomplete-selectcomplete", (event) => {
                document.getElementById('locationname-input').value = event.text.label;
                document.getElementById('locationid-input').value = event.text.value;
                document.getElementById('location_input').value = event.text.label;
            });
    </script>

    @if (env('APP_DEBUG'))
        <script>console.log('locations', locations)</script>
    @endif
@endpush