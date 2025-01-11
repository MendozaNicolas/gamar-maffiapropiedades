<form method="post">
    <div class="wd-find-select style-3">
        <div class="inner-group inner-filter">
            <div class="form-group-3 form-style">
                <div class="group-select">
                    <select class="nice-select" name="property_type">
                        <option value="null">Seleccioná una propiedad</option>
                        <option value="departamento">Departamento</option>
                        <option value="casas">Casas</option>
                        <option value="lotes-residenciales">Lotes Residenciales</option>
                        <option value="oficinas">Oficinas</option>
                        <option value="locales">Locales</option>
                        <option value="cocheras/amarras">Cocheras y Amarras</option>
                    </select>
                </div>
            </div>

            <div class="form-group-3 form-style">
                <div class="group-select">
                    <select name="operation_type" class="nice-select">
                        <option value="null">Seleccioná una operación</option>
                        <option value="venta">Venta</option>
                        <option value="alquiler">Alquiler</option>
                        <option value="alquiler-temporario">Alquiler Temporal</option>
                    </select>
                </div>
            </div>

            <div class="form-style">
                <div class="group-ip ip-icon">
                    <select class="nice-select location fw-normal" aria-placeholder="Tipea una Localidad">
                        <option>Tipea una Localidad</option>
                        <option value="1">Location #1</option>
                    </select>
                    <a href="#" class="icon-right icon-location"></a>
                </div>
            </div>

            <!-- mostrar solo para departaentos-->
            <div class="form-group-3 form-style">

                <div class="group-select">
                    <div class="label">Ambientes</div>
                    <select name="rooms" class="nice-select fw-normal">
                        <option value="1">1 Ambiente o Monoambiente</option>
                        <option value="2">2 o más ambientes</option>
                        <option value="3">3 o más ambientes</option>
                        <option value="4">4 o más ambientes</option>
                        <option value="4">Más de 5 ambientes</option>
                    </select>
                </div>
            </div>

            <div class="form-group-3 form-style">

                <div class="group-select">
                    <div class="label">Dormitorios</div>
                    <select name="suites" class="nice-select fw-normal">
                        <option value="1">1 dormitorio o más</option>
                        <option value="2">2 o más dormitorios</option>
                        <option value="3">3 o más dormitorios</option>
                        <option value="4">4 o más dormitorios</option>
                        <option value="4">Más de 5 dormitorios</option>
                    </select>
                </div>
            </div>

            <!-- mostrar solo para casas departaemntos locales y oficinas-->
            <div class="form-group-3 form-style">

                <div class="group-select">
                <div class="label">Baños</div>
                    <select name="bathrooms" class="nice-select fw-normal">
                        <option value="1">1 baño o más</option>
                        <option value="2">2 o más baños</option>
                        <option value="3">3 o más baños</option>
                        <option value="4">4 o más baños</option>
                        <option value="4">Más de 5 baños</option>
                    </select>
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
                        <input type="text" class="form-control" placeholder="Ingresá tu presupuesto" value=""
                            name="location" title="Search for" required="">

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
                        <input type="text" class="form-control" placeholder="Ingresá los m² deseados" value=""
                            name="location" title="Search for" required="">

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