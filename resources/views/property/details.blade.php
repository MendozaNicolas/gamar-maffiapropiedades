@extends('layout.app')
@section('content')
<!-- Main Header -->
<header class="main-header fixed-header">
    <!-- Header Lower -->
    <div class="header-lower">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-container d-flex justify-content-between align-items-center">
                    <!-- Logo Box -->
                    <div class="logo-box">
                        <div class="logo"><a href="index.html"><img src="images/logo/logo@2x.png" alt="logo"
                                    width="125"></a></div>
                    </div>
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class=" home current"><a href="#">Inicio</a>

                                    </li>
                                    <li class="dropdown2"><a href="#">Propiedades</a>
                                        <ul>
                                            <li><a href="">Lotes en Venta</a> </li>
                                            <li><a href="">Casas de Verano</a></li>
                                            <li><a href="">Casas en Venta</a></li>
                                            <li><a href="">Departamentos en Alquiler</a></li>
                                            <li><a href="">Departamentos en Venta</a></li>
                                            <li><a href="">Oficinas</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="#">Emprendimientos</a> </li>
                                    <li><a href="#">Nosotros</a> </li>
                                    <li><a href="#">Contacto</a>

                                    </li>


                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    <div class="header-account">
                        <div class="register">
                            <ul class="d-flex">
                                <li><a href="#modalLogin" data-bs-toggle="modal">Login</a></li>
                                <li>/</li>
                                <li><a href="#modalRegister" data-bs-toggle="modal">Register</a></li>
                            </ul>
                        </div>
                        <div class="flat-bt-top">
                            <a class="tf-btn primary" href="add-property.html">Vendé</a>
                        </div>
                    </div>

                    <div class="mobile-nav-toggler mobile-button"><span></span></div>
                    <button class="tasa-ahora-btn"><b>Tasá Ahora</b></button>

                </div>
            </div>
        </div>
    </div>
    <!-- End Header Lower -->

    <!-- Mobile Menu  -->
    <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="images/logo/logo@2x.png" alt="nav-logo"
                        width="120"></a></div>
            <div class="bottom-canvas">
                <div class="login-box flex align-items-center">
                    <a href="#modalLogin" data-bs-toggle="modal">Login</a>
                    <span>/</span>
                    <a href="#modalRegister" data-bs-toggle="modal">Register</a>
                </div>
                <div class="menu-outer"></div>
                <div class="button-mobi-sell">
                    <a class="tf-btn primary" href="add-property.html">Vendé</a>
                </div>
                <div class="mobi-icon-box">
                    <div class="box d-flex align-items-center">
                        <span class="icon icon-phone2"></span>
                        <div>1-333-345-6868</div>
                    </div>
                    <div class="box d-flex align-items-center">
                        <span class="icon icon-mail"></span>
                        <div>themesflat@gmail.com</div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>
<!-- End Main Header -->
<!-- End Main Header -->
<section class="flat-location flat-slider-detail-v1">
    <div class="swiper tf-sw-location" data-preview-lg="2.03" data-preview-md="2" data-preview-sm="2" data-space="20"
        data-centered="true" data-loop="true">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="https://static.tokkobroker.com/w_pics/6332363_80030490472589901115583304616671263286826825446747699715079623077850635184604.jpg"
                    data-fancybox="gallery" class="box-imgage-detail d-block">
                    <img src="https://static.tokkobroker.com/w_pics/6332363_80030490472589901115583304616671263286826825446747699715079623077850635184604.jpg"
                        alt="img-property"
                        style="width:100%; height:450px; object-fit: cover; object-position: center;">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://static.tokkobroker.com/water_pics/25763292296179383353184157344601370295377976810234231090096549814494259248212.jpg"
                    data-fancybox="gallery" class="box-imgage-detail d-block">
                    <img src="https://static.tokkobroker.com/water_pics/25763292296179383353184157344601370295377976810234231090096549814494259248212.jpg"
                        alt="img-property"
                        style="width:100%; height:450px; object-fit: cover; object-position: center;">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://static.tokkobroker.com/water_pics/56470070233221965558548950070800036068681535512156240091801870486014628276055.jpg"
                    data-fancybox="gallery" class="box-imgage-detail d-block">
                    <img src="https://static.tokkobroker.com/water_pics/56470070233221965558548950070800036068681535512156240091801870486014628276055.jpg"
                        alt="img-property"
                        style="width:100%; height:450px; object-fit: cover; object-position: center;">
                </a>
            </div>
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
                    <a href="#" class="flag-tag primary">En Venta</a>
                    <a href="#" class="flag-tag primary">El Alquier</a>
                    <h4 class="title link">Alquiler temporal La Delfina - Pilar - Frente al Hospital Austral</h4>
                </div>
                <div class="box-price d-flex align-items-center">

                    <h5>u$d 250.000 <span class="body-1 text-variant-1"></span>

                        <br />

                        u$d 250 <span class="body-1 text-variant-1">/mes</span>
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
                    <p class="meta-item"><span class="icon icon-mapPin"></span> Jorge Newbery 1200, Pilar</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="single-property-element single-property-desc">
                    <div class="h7 title fw-7">Descripción de la propiedad</div>
                    <p class="body-2 text-variant-1">Alquiler de Duplex amueblado - Lagoon Pilar



                        Se puede alquilar por 1, 2 o 3 años

                        Totalmente amueblado y equipado. Excelente estado, recien pintado



                        Cocina comedor, galeria, jardin. Tres habitaciones

                        Expensas y servicios a cargo del inquilino. Arba a cargo de propietario



                        Requisitos

                        - Mes de alquiler y mes de deposito

                        - Garantia propietaria o seguro de caución

                        - Recibo de sueldo o demostracion de ingresos</p>


                </div>
                <div class="single-property-element single-property-overview">
                    <div class="h7 title fw-7">Aspectos generales</div>
                    <ul class="info-box">
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-house-line"></i></a>
                            <div class="content">
                                <span class="label">ID:</span>
                                <span>2297</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-arrLeftRight"></i></a>
                            <div class="content">
                                <span class="label">Sup.Total:</span>
                                <span>600 m²</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-bed"></i></a>
                            <div class="content">
                                <span class="label">Dormitorios:</span>
                                <span>2 </span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-bathtub"></i></a>
                            <div class="content">
                                <span class="label">Baños:</span>
                                <span>2 </span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-garage"></i></a>
                            <div class="content">
                                <span class="label">Garages:</span>
                                <span>p/ 2 Autos</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-ruler"></i></a>
                            <div class="content">
                                <span class="label">Sup.Cubierta:</span>
                                <span>600 m²</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-crop"></i></a>
                            <div class="content">
                                <span class="label">Sup.Total:</span>
                                <span>600 m²</span>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="box-icon w-52"><i class="icon icon-hammer"></i></a>
                            <div class="content">
                                <span class="label">Antiguedad:</span>
                                <span>2018</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="single-property-element ">
                    <div class="h7 title fw-7">Video</div>
                    <div class="img-video">
                        <iframe width="100%" height="410" src="https://www.youtube.com/embed/t_0RC96t0Wc"
                            title="Pellegrini" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <!-- <img src="images/banner/img-video.jpg" alt="img-video">
                                   
                                    <a href="https://youtu.be/t_0RC96t0Wc" data-fancybox="gallery2" class="btn-video"> <span class="icon icon-play"></span></a> -->
                    </div>
                </div>
                <div class="single-property-element single-property-explore">
                    <div class="h7 title fw-7">Matterport 360</div>
                    <div class="box-img">
                        <img src="images/banner/img-explore.jpg" alt="img">
                        <div class="box-icon w-80">
                            <span class="icon icon-360"></span>
                        </div>
                    </div>
                </div>
                <div class="single-property-element single-property-info">
                    <div class="h7 title fw-7">
                        Detalles de la propiedad:
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Tokko ID:</span>
                                <div class="content fw-7">AVT1020</div>
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
                                <span class="label">Precio de Venta: </span>
                                <div class="content fw-7">u$d 250.000</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Ambientes:</span>
                                <div class="content fw-7">1</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Precio de Alquiler: </span>
                                <div class="content fw-7">u$d 250.000<span
                                        class="caption-1 fw-4 text-variant-1">/month</span></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Baños:</span>
                                <div class="content fw-7">1</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Sup. Total:</span>
                                <div class="content fw-7">600 m²</div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Antiguedad:</span>
                                <div class="content fw-7">3 Años</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Sup. Cubierta:</span>
                                <div class="content fw-7">600 m²</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Orientación:</span>
                                <div class="content fw-7">Este</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="inner-box">
                                <span class="label">Cocheras:</span>
                                <div class="content fw-7">1</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="single-property-element single-property-feature">
                    <div class="h7 title fw-7">Amenities y Servicios</div>
                    <div class="wrap-feature">
                        <div class="box-feature">

                            <ul>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Aire Acondicionado
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Calefacción Central
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Pileta
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Balcón
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Seguridad 24 hrs
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Aire Acondicionado
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Calefacción Central
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Pileta
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Balcón
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Seguridad 24 hrs
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Aire Acondicionado
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Calefacción Central
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Pileta
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Balcón
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Seguridad 24 hrs
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Aire Acondicionado
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Calefacción Central
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Pileta
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Balcón
                                </li>
                                <li class="feature-item">
                                    <span class="icon lni lni-checkmark-circle"></span>
                                    Seguridad 24 hrs
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="single-property-element single-property-map">
                    <div class="h7 title fw-7">Ubicación</div>
                    <div id="map-single" class="map-single" data-map-zoom="16" data-map-scroll="true"></div>

                </div>



                <div class="single-property-element single-property-loan">
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
                </div>


            </div>
            <div class="col-lg-4">
                <div class="widget-sidebar fixed-sidebar wrapper-sidebar-right">
                    <div class="widget-box single-property-contact bg-surface">
                        <div class="h7 title fw-7">Contactate por esta propiedad</div>
                        <div class="box-avatar">
                            <div class="avatar avt-90 round">
                                <img src="images/logo/logo@2x.png" alt="avatar">
                            </div>
                            <div class="info">
                                <div class="text-1 name">Virginia Maffia</div>
                                <span><i class="icon lni lni-phone"></i> 4567-8907<br /> <i
                                        class="icon lni lni-envelope"></i> info@virginiamaffia.com.ar</span>
                            </div>
                        </div>
                        <form action="#" class="contact-form">
                            <div class="ip-group">
                                <label for="fullname">Nombre Completo</label>
                                <input type="text" placeholder="Ingresá tu nombre" class="form-control" required>
                            </div>
                            <div class="ip-group">
                                <label for="phone">Teléfono de Contacto</label>
                                <input type="text" placeholder="1122334455" class="form-control" required>
                            </div>
                            <div class="ip-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="text" placeholder="themesflat@gmail.com" class="form-control" required>
                            </div>
                            <div class="ip-group">
                                <label for="message">Consulta:</label>
                                <textarea id="comment-message" name="message" rows="4" tabindex="4"
                                    placeholder="Message" aria-required="true"></textarea>
                            </div>
                            <button class="tf-btn primary w-100">Envíar Consulta</button>
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
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="homeya-box style-2">
                        <div class="archive-top">
                            <a href="#" class="images-group">
                                <div class="images-style">
                                    <img src="https://static.tokkobroker.com/water_pics/50570651301868238462882218016317417820021925240332846465262447919005171948367.jpg"
                                        alt="img">
                                </div>

                            </a>
                            <div class="content">
                                <div class="h7 text-capitalize fw-7"><a href="#" class="link"> Sunset Heights Estate,
                                        Beverly Hills</a></div>
                                <div class="desc"><i class="fs-16 icon icon-mapPin"></i>
                                    <p>1040 Ocean, Santa Monica, California</p>
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
                        </div>
                        <div class="archive-bottom d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                <div class=" fw-4">Alquiler Temporario<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="homeya-box style-2">
                        <div class="archive-top">
                            <a href="#" class="images-group">
                                <div class="images-style">
                                    <img src="https://static.tokkobroker.com/w_pics/6301867_52133587760306425920978975864805535554448894184803572618216500197148571442465.jpg"
                                        alt="img">
                                </div>

                            </a>
                            <div class="content">
                                <div class="h7 text-capitalize fw-7"><a href="#" class="link">Coastal Serenity
                                        Cottage</a></div>
                                <div class="desc"><i class="fs-16 icon icon-mapPin"></i>
                                    <p>21 Hillside Drive, Beverly Hills, California</p>
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
                        </div>
                        <div class="archive-bottom d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                <div class=" fw-4">Alquiler Temporario<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Venta<Br /><span class="fw-7">USD 750.000</span></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="homeya-box style-2">
                        <div class="archive-top">
                            <a href="#" class="images-group">
                                <div class="images-style">
                                    <img src="https://static.tokkobroker.com/w_pics/6338057_10159487052184649202069148169785577219492258863077179767683687090926827595018.jpg"
                                        alt="img">
                                </div>

                            </a>
                            <div class="content">
                                <div class="h7 text-capitalize fw-7"><a href="#" class="link">Barrio Pellegrini III</a>
                                </div>
                                <div class="desc"><i class="fs-16 icon icon-mapPin"></i>
                                    <p>Calle San Martín 800, Pilar</p>
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
                        </div>
                        <div class="archive-bottom d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-8 align-items-center">
                                <div class=" fw-4">Alquiler<Br /><span class="fw-7">USD 750/mes</span></div>

                            </div>
                            <div class="d-flex gap-8 align-items-center hide-mobile">
                                <div class=" fw-4">Alquiler Temporario<Br /><span class="fw-7">USD 750/mes</span></div>

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
                    <strong>gam.ar</strong>
                </div>

                <ul class="menu-bottom">
                    <li><a href="our-service.html">Usos del Sitio</a> </li>


                    <li><a href="contact.html">Sitemap</a> </li>

                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
@endsection