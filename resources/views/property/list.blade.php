@extends('layout.app')
@section('content')
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

<!-- footer -->
<footer class="footer">
    <div class="top-footer">
        <div class="container">
            <div class="content-footer-top">
                <div class="footer-logo">
                    <img src="images/logo/logo-footer@2x.png" alt="logo-footer" width="174" height="44">
                </div>
                <div class="wd-social">
                    <span>Seguinos:</span>
                    <ul class="list-social d-flex align-items-center">
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-facebook"></i></a></li>
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-linkedin"></i></a></li>


                        <li><a href="#" class="box-icon w-40 social"><i class="icon lni lni-instagram-original"></i></a>
                        </li>
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <div class="content-footer-bottom">
                <div class="copyright">©2024 Virginia Maffia Propiedades. Todos los derechos reservados. Un diseño de
                    <strong>gam.ar</strong></div>
                <ul class="menu-bottom">
                    <li><a href="our-service.html">Usos del Sitio</a> </li>
                    <li><a href="contact.html">Sitemap</a> </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
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
    <script>
        // Constante usada para filtrar las propiedades
        property_data = @json($properties_data);

        var locationsCompleteRaw = @json($locations);
        var locationsComplete = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('location_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: locationsCompleteRaw
        });

        typeaheadOptions = {
            hint: true,
            highlight: true,
            minLength: 1
        };


        // Custom tokenizer that replaces non-breaking spaces with regular spaces
        // function customTokenizer(str) {
        //     if (!str) return [];
        //     // Replace non-breaking spaces with regular spaces
        //     str = str.replace(/[\u00A0]/g, ' ').replace(/\s+/g, ' ');
        //     return str.split(' ');
        // }

        // var locationsComplete = new Bloodhound({
        //     datumTokenizer: function (datum) {
        //         return datum.display_name ? customTokenizer(datum.display_name) : [];
        //     },
        //     queryTokenizer: customTokenizer,
        //     local: locationsCompleteRaw,
        //     sorter: function (a, b) {
        //         // Custom sorting function based on location_type hierarchy
        //         return a.location_type - b.location_type;
        //     }
        // });

        $('#location-input').typeahead({
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
            filterfy('location:' + suggestion.location_name + '&location_id:' + suggestion.location_id);
        });

        // Tambien está el elemento tt-menu que crea la libreria
        // Modificando tt-menu podes cambiar el fondo del select
        // tambien en la funcion prepend podes poner un header del select
        $('.tt-menu').prepend(`
                        <h6 style="background-color: #fff; padding: 10px;">Resultados encontrados</h6>
                    `);
    </script>
    <script src="{{ asset('js/utils/tokko-tags.js') }}"></script>
    <script src="{{asset('js/utils/filterfy.js')}}"></script>
    <script src="{{asset('js/utils/format.js')}}"></script>
    <script src="{{asset('js/property/list.js')}}"></script>
@endpush