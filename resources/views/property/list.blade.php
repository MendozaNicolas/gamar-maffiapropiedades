@push('head')
    <link rel="stylesheet" href="{{asset('/css/awesomplete.css')}}" />
@endpush
@extends('layout.app')
@section('content')
<datalist id="locations_list"></datalist>
<section class="flat-section-v6 flat-recommended flat-sidebar">
    <div class="container">
        <div class="box-title-listing">
            <h5>Resultados de búsqueda</h5>
            <div class="box-filter-tab hide-mobile">


                <div class="nice-select list-sort " tabindex="0"><span class="current">Sort by (Default)</span>
                    <ul class="list">
                        <li data-value="default" class="option selected">Sort by (Default)</li>
                        <li data-value="new" class="option">Newest</li>
                        <li data-value="old" class="option">Oldest</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5 hide-mobile">
                <div class="widget-sidebar fixed-sidebar">
                    <div class="flat-tab flat-tab-form widget-filter-search widget-box bg-surface">
                        <div class="d-flex flex-wrap align-items-center gap-12" style="margin-bottom: 30px;">
                            <div class="h7 title fw-7">Filtros activos</div>
                            <ul class="active-filter-wrapper d-flex flex-wrap gap-12">
                                <!-- <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i> Casas</a></li>
                                <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i> Venta</a></li>
                                <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i>Pilar</a></li> -->
                            </ul>
                        </div>
                        <x-property.filter />
                    </div>

                </div>

            </div>
            <div class="col-xl-8 col-lg-7">
                <div>
                    <div id="props-wrapper" class="row"></div>
                    <ul class="justify-content-center wd-navigation">
                        <li><a href="#" class="nav-item active">1</a></li>
                        <li><a href="#" class="nav-item">2</a></li>
                        <li><a href="#" class="nav-item">3</a></li>
                        <li><a href="#" class="nav-item"><i class="icon icon-arr-r"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /#page -->

</div>

<!-- go top -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;">
        </path>
    </svg>
</div>

<!-- canvas filter -->
<div class="offcanvas offcanvas-start canvas-filter-mb" id="filterSearchMb">
    <div class="flat-tab flat-tab-form">
        <!-- <ul class="nav-tab-form style-4 justify-content-center" role="tablist">
    <li class="nav-tab-item" role="presentation">   
        <a href="#forRent" class="nav-link-item active"  data-bs-toggle="tab">For Rent</a>
    </li>
    <li class="nav-tab-item" role="presentation">
        <a href="#forSale" class="nav-link-item" data-bs-toggle="tab">For Sale</a>
    </li>
</ul> -->
        <div class="canvas-content">
            <div class="tab-content">
                <div class="tab-pane fade active show" role="tabpanel">
                    <div class="form-sl">
                        <x-property.filter-mobile />
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>
<!-- End canvas filter -->
@endsection

@push('scripts')
    <script src="{{ asset('vendor/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/awesomplete.min.js') }}" async></script>
    <script src="{{ asset('vendor/cleave.min.js') }}"></script>
    <script>
        // Constante usada para filtrar las propiedades
        property_data = @json($properties_data);

        var locations = @json($locations);
        locations.forEach(element => {
            const locationsDataList = document.getElementById('locations_list');
            const newOption = document.createElement("option");
            const newContent = document.createTextNode(element.location_name);

            newOption.appendChild(newContent);
            newOption.setAttribute("value", element.location_id);


            locationsDataList.appendChild(newOption);
        });

        document.getElementById('location_input')
            .addEventListener("awesomplete-selectcomplete", (event) => {
                document.getElementById('location_input').value = event.text.label;
                filterfy('location:' + event.text.label + '&location_id:' + event.text.value);
            });
    </script>

    <script src="{{ asset('js/utils/tokko-tags.js') }}"></script>
    <script src="{{ asset('js/utils/filterfy.js') }}"></script>
    <script src="{{ asset('js/utils/format.js') }}"></script>
    <script src="{{ asset('js/property/list.js') }}"></script>

    @if (env('APP_DEBUG'))
        <script>console.log('locations', locations)</script>
    @endif
@endpush