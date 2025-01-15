<!-- Main Header -->
<header class="main-header fixed-header">
    <!-- Header Lower -->
    <div class="header-lower">
        <div class="row">                      
            <div class="col-lg-12">         
                <div class="inner-container d-flex justify-content-between align-items-center">
                    <!-- Logo Box -->
                    <div class="logo-box">
                        <div class="logo"><a href="/"><img src="{{asset('images/logo/logo@2x.png')}}" alt="logo" width="125"></a></div>
                    </div>
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class=" home current"><a href="/">Inicio</a></li>
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
                                    <li><a href="{{Route('development.slugify')}}">Emprendimientos</a> </li>
                                    <li><a href="{{Route('nosotros')}}">Nosotros</a></li>
                                    <li><a href="{{Route('contacto')}}">Contacto</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    <div class="header-account">
                        <div class="register">
                            {{-- <ul class="d-flex">
                                <li><a href="#modalLogin" data-bs-toggle="modal">Login</a></li>
                                <li>/</li>
                                <li><a href="#modalRegister" data-bs-toggle="modal">Register</a></li>
                            </ul> --}}
                        </div>
                        <div class="flat-bt-top">
                            <a class="tf-btn primary" href="{{Route('tasaciones')}}">Vendé</a>
                        </div>  
                    </div>
                    <div class="mobile-nav-toggler mobile-button"><span></span></div>
                    <a href="{{Route('tasaciones')}}" class="tasa-ahora-btn"><b>Tasá Ahora</b></a>
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
            <div class="nav-logo"><a href="index.html"><img src="images/logo/logo@2x.png" alt="nav-logo" width="120" ></a></div>
            <div class="bottom-canvas">
                <div class="login-box flex align-items-center">
                    {{-- <a href="#modalLogin" data-bs-toggle="modal">Login</a>
                    <span>/</span>
                    <a href="#modalRegister" data-bs-toggle="modal">Register</a> --}}
                </div>
                <div class="menu-outer"></div>
                <div class="button-mobi-sell">
                    <a class="tf-btn primary" href="add-property.html">Vendé</a>
                </div> 
                <div class="mobi-icon-box">
                    <div class="box d-flex align-items-center">
                        <span class="icon icon-phone2"></span>
                        <a href="https://api.whatsapp.com/send?phone=5491157802131&text=Quisiera%20contactarme%20con%20ustedes">+5491157802131</a>
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