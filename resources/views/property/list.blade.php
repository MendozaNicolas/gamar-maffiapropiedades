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
                            <ul class="d-flex flex-wrap gap-12">
                                <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i> Casas</a></li>
                                <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i> Venta</a></li>
                                <li><a href="#" class="blog-tag"><i class="icon lni lni-close" style="font-size: 16px;"></i>Pilar</a></li>
                            </ul>
                        </div>
                        <x-property.filter />
                    </div>
                    
                </div>
                
            </div>
            <div class="col-xl-8 col-lg-7">
                    <div>
                        <div id="props-wrapper" class="row">
                            <!-- casa / ph -->
                            <!-- <div class="col-md-12">
                                <div class="homeya-box list-style-1 list-style-2">
                                    <a href="ficha.html" class="images-group">
                                        <div class="images-style">
                                            <img src="https://static.tokkobroker.com/w_pics/6118362_64501578973936695344099515106555743910172019129060087372967275992689225169284.jpg" alt="img">
                                        </div>
                                    </a>
                                    <div class="content">
                                        <div class="archive-top">
                                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Alquiler temporal La Delfina - Pilar - Frente al Hospital Austral</a></div>
                                            <div class="desc">
                                                <i class="icon icon-mapPin"></i><p>Avenida Libertador 18000, San isidro</p> 
                                            </div>
                                            <ul class="meta-list">
                                                <li class="item">
                                                    <i class="icon icon-bed"></i>
                                                    <span>4 Dormitorios</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>2 Baños</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>600m² Sup. Total</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>600m² Sup.Cub</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Alquiler<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                                <div class=" fw-4">Alquiler Temporario<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Venta<Br/><span class="fw-7">USD 750.000</span></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- oficina-->
                            <div class="col-md-12">
                                <div class="homeya-box list-style-1 list-style-2">
                                    <a href="ficha.html" class="images-group">
                                        <div class="images-style">
                                            <img src="https://static.tokkobroker.com/water_pics/13790174452682946932957355480242727568417201025578922564205040234591034117307.jpg" alt="img">
                                        </div>
                                        
                                    </a>
                                    <div class="content">
                                        <div class="archive-top">
                                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Oficina en Venta en Agora III</a></div>
                                            <div class="desc">
                                                <i class="icon icon-mapPin"></i><p>Pilar</p> 
                                            </div>
                                            <ul class="meta-list">
                                                
                                                <li class="item">
                                                    <i class="icon icon-garage"></i>
                                                    <span>2 Autos</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>2 Baños</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>600m² Sup. Cubierta</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Alquiler<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                                <div class=" fw-4">Alquiler Temporario<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Venta<Br/><span class="fw-7">USD 750.000</span></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- lote-->
                            <div class="col-md-12">
                                <div class="homeya-box list-style-1 list-style-2">
                                    <a href="ficha.html" class="images-group">
                                        <div class="images-style">
                                            <img src="https://static.tokkobroker.com/w_pics/5900125_65133377039999896417487014407694499768372181472666612955002156833182367164591.jpg" alt="img">
                                        </div>
                                        
                                    </a>
                                    <div class="content">
                                        <div class="archive-top">
                                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Venta increible lote 536,6 mts2 - Santa Lucia - Pilar del Este</a></div>
                                            <div class="desc">
                                                <i class="icon icon-mapPin"></i><p>Pilar</p> 
                                            </div>
                                            <ul class="meta-list">
                                                
                                                <li class="item">
                                                    <i class="icon icon-crop"></i>
                                                    <span>600m² Sup. Total</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-arrLeftRight"></i>
                                                    <span>Orientación Norte</span>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Alquiler<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                                <div class=" fw-4">Alquiler Temporario<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Venta<Br/><span class="fw-7">USD 750.000</span></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- departamentos -->
                            <div class="col-md-12">
                                <div class="homeya-box list-style-1 list-style-2">
                                    <a href="ficha.html" class="images-group">
                                        <div class="images-style">
                                            <img src="https://static.tokkobroker.com/water_pics/61201749920906722986033751861474703239885725833032323827594992031024964486397.jpg" alt="img">
                                        </div>
                                        
                                    </a>
                                    <div class="content">
                                        <div class="archive-top">
                                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Lagoon Pilar</a></div>
                                            <div class="desc">
                                                <i class="icon icon-mapPin"></i><p>Pilar</p> 
                                            </div>
                                            <ul class="meta-list">
                                                <li class="item">
                                                    <i class="icon lni lni-grid-alt"></i>
                                                    <span>4 Ambientes</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>2 Baños</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-garage"></i>
                                                    <span>2 Autos</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>6000m² Sup. Cubierta</span>
                                                </li>
                                                
                                                
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Alquiler<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                                <div class=" fw-4">Alquiler Temporario<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Venta<Br/><span class="fw-7">USD 750.000</span></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- depositos-->
                            <div class="col-md-12">
                                <div class="homeya-box list-style-1 list-style-2">
                                    <a href="ficha.html" class="images-group">
                                        <div class="images-style">
                                            <img src="https://static.tokkobroker.com/water_pics/13229796399905766381171996401529921487775707399785767587083137199855453375207.jpg" alt="img">
                                        </div>
                                        
                                    </a>
                                    <div class="content">
                                        <div class="archive-top">
                                            <div class="h7 text-capitalize fw-3"><a href="ficha.html" class="link">Ignacio Warnes al 3500 , Olivos</a></div>
                                            <div class="desc">
                                                <i class="icon icon-mapPin"></i><p>Olivos</p> 
                                            </div>
                                            <ul class="meta-list">
                                                
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>2 Baños</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-garage"></i>
                                                    <span>2 Autos</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>6000m² Sup. Cubierta</span>
                                                </li>
                                                
                                                
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Alquiler<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                                <div class=" fw-4">Alquiler Temporario<Br/><span class="fw-7">USD 750/mes</span></div>
                                                
                                            </div>
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class=" fw-4">Venta<Br/><span class="fw-7">USD 750.000</span></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                             -->
                        </div>
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
                
                
                <li><a href="#" class="box-icon w-40 social"><i class="icon lni lni-instagram-original"></i></a></li>
                <li><a href="#" class="box-icon w-40 social"><i class="icon icon-youtube"></i></a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
   
    <div class="bottom-footer">
      <div class="container">
        <div class="content-footer-bottom">
            <div class="copyright">©2024 Virginia Maffia Propiedades. Todos los derechos reservados. Un diseño de <strong>gam.ar</strong></div>
              
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
<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
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
                <form method="post">
                    <div class="wd-find-select style-3">
                        <div class="inner-group inner-filter">
                            <div class="form-group-3 form-style">
                                
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Seleccioná una propiedad</span>
                                        <ul class="list">  
                                                                                                  
                                            <li data-value="villa" class="option">Casas y Ph</li>
                                            <li data-value="studio" class="option">Departamentos</li>
                                            <li data-value="office" class="option">Lotes</li>
                                            <li data-value="house" class="option">Oficinas </li>
                                            <li data-value="house" class="option">Locales comerciales</li>

                                        </ul>
                                    </div>
                                </div>                                                    
                            </div>

                            <div class="form-group-3 form-style">
                                
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Seleccioná una operación</span>
                                        <ul class="list">  
                                                                                                  
                                            <li data-value="villa" class="option">En Venta</li>
                                            <li data-value="studio" class="option">En Alquiler</li>
                                            <li data-value="office" class="option">Alquiler Temporal</li>
                                            
                                        </ul>
                                    </div>
                                </div>                                                    
                            </div>

                            <div class="form-style">
                                
                                <div class="group-ip ip-icon">
                                    <input type="text" class="form-control" placeholder="Tipea una localidad" value="" name="s" title="Search for" required="">
                                    <a href="#" class="icon-right icon-location"></a>
                                </div>
                            </div>

                            <!-- mostrar solo para departaentos-->
                            <div class="form-group-3 form-style">
                                
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Ambientes</span>
                                        <ul class="list">  
                                                                                                  
                                            <li data-value="villa" class="option">1 Ambiente o Monoambiente</li>
                                            <li data-value="studio" class="option">2 o más ambientes</li>
                                            <li data-value="office" class="option">3 o más ambientes</li>
                                            <li data-value="office" class="option">4 o más ambientes</li>
                                            <li data-value="office" class="option">Más de 5 ambientes</li>
                                        </ul>
                                    </div>
                                </div>                                                    
                            </div>
                            
                            <div class="form-group-3 form-style">
                                
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Dormitorios</span>
                                        <ul class="list">  
                                                                                                  
                                            <li data-value="villa" class="option">1 dormitorio o más</li>
                                            <li data-value="studio" class="option">2 o más dormitorios </li>
                                            <li data-value="office" class="option">3 o más dormitorio</li>
                                            <li data-value="office" class="option">4 o más dormitorio</li>
                                            <li data-value="office" class="option">Más de 5 dormitorio</li>
                                        </ul>
                                    </div>
                                </div>                                                    
                            </div>

                            <!-- mostrar solo para casas departaemntos locales y oficinas-->
                            <div class="form-group-3 form-style">
                                
                                <div class="group-select">
                                    <div class="nice-select" tabindex="0"><span class="current">Baños</span>
                                        <ul class="list">  
                                                                                                  
                                            <li data-value="villa" class="option">1 baño o más</li>
                                            <li data-value="studio" class="option">2 o más baños </li>
                                            <li data-value="office" class="option">3 o más baños</li>
                                            <li data-value="office" class="option">4 o más baños</li>
                                            <li data-value="office" class="option">Más de 5 baños</li>
                                        </ul>
                                    </div>
                                </div>                                                    
                            </div>
                            
                            
                            <div class="form-style btn-show-advanced-mb">
                                <span class="icon icon-faders"></span> 
                                <span class="text-advanced">Más Filtros</span>                                                                      
                            </div>
                            <div class="form-style wd-amenities wd-show-filter-mb">
                                
                                <!-- Presupuesto -->
                                <div class="form-style">
                                    <label class="title-select">¿Cuál es tu presupuesto?</label>
                                    <div class="box-radio-check" style="display: flex;">
                                        
                                        <fieldset class="fieldset-radio">
                                            <input type="radio" class="tf-radio" name="radio" id="radio1" checked> 
                                            <label for="radio1" class="text-radio">ARS</label>
                                        </fieldset>
                                        <fieldset class="fieldset-radio" style="margin-left: 20px;">
                                            <input type="radio" class="tf-radio" name="radio" id="radio2"> 
                                            <label for="radio2" class="text-radio">USD</label>
                                        </fieldset>
                                    </div>
                                    <div class="group-ip ip-icon">
                                        <input type="text" class="form-control" placeholder="Ingresá tu presupuesto" value="" name="location" title="Search for" required="">
                                        
                                    </div>
                                   
                                </div>
                                <!-- fin preuspuesto-->
                                
                                <!-- Superficie -->
                                <div class="form-style">
                                    <label class="title-select">¿Que superficie buscás?</label>
                                    <div class="box-radio-check" style="display: flex;">
                                        
                                        <fieldset class="fieldset-radio">
                                            <input type="radio" class="tf-radio" name="radios" id="supto" checked> 
                                            <label for="supto" class="text-radio">Superfice Total</label>
                                        </fieldset>
                                        <fieldset class="fieldset-radio" style="margin-left: 20px;">
                                            <input type="radio" class="tf-radio" name="radios" id="supcub"> 
                                            <label for="supcub" class="text-radio">Superficie Cubierta</label>
                                        </fieldset>
                                    </div>
                                    <div class="group-ip ip-icon">
                                        <input type="text" class="form-control" placeholder="Ingresá los m² deseados" value="" name="location" title="Search for" required="">
                                        
                                    </div>
                                   
                                </div>
                                <!-- fin superficie-->
                                
                                
                                <div class="form-style group-checkbox">
                                    <div class="text-1">Amenities y Servicios:</div>
                                    <div class="group-amenities">
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs1" checked> 
                                            <label for="cbs1" class="text-cb-amenities">Amenitie #1</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs2"> 
                                            <label for="cbs2" class="text-cb-amenities">Amenitie #2</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs3"> 
                                            <label for="cbs3" class="text-cb-amenities">Amenitie #3</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs4" checked> 
                                            <label for="cbs4" class="text-cb-amenities">Amenitie #4</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs5"> 
                                            <label for="cbs5" class="text-cb-amenities">Amenitie #5</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs6"> 
                                            <label for="cbs6" class="text-cb-amenities">Amenitie #6</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs7"> 
                                            <label for="cbs7" class="text-cb-amenities">Amenitie #7</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs8"> 
                                            <label for="cbs8" class="text-cb-amenities">Amenitie #8</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs9" checked> 
                                            <label for="cbs9" class="text-cb-amenities">Amenitie #9</label>
                                        </fieldset>
                                        <fieldset class="amenities-item">
                                            <input type="checkbox" class="tf-checkbox style-1" id="cbs10"> 
                                            <label for="cbs10" class="text-cb-amenities">Amenitie #10</label>
                                        </fieldset>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="form-style">
                                <button type="submit" class="tf-btn primary" href="#">Aplicar Filtros</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
    
</div>


</div>
<!-- End canvas filter -->
@endsection

@push('scripts')
<script>
    property_data = @json($properties_data);
</script>
<script src="{{asset('js/utils/filterfy.js')}}"></script>
<script src="{{asset('js/utils/format.js')}}"></script>
<script src="{{asset('js/property/list.js')}}"></script>    
@endpush