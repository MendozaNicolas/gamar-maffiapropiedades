<div class="homeya-box list-style-1">
    <a href="./propiedad/{{Str::slug($property['id'] . '-' . $property['type']['name'] . $property['operations'][0]['operation_type'] . $property['location']['name'])}}" class="images-group">
    <div class="images-style">
            <img src="{{$property['photos'][0]['image']}}" alt="img">
        </div>
    </a>
    <div class="content">
        <div class="archive-top">
            <div class="h7 text-capitalize fw-3"><a href="./propiedad/{{Str::slug($property['id'] . '-' . $property['type']['name'] . $property['operations'][0]['operation_type'] . $property['location']['name'])}}"
                    class="link">{{$property['publication_title']}}</a></div>
            <div class="desc">
                <i class="icon icon-mapPin"></i>
                <p>{{$property['real_address']}}</p>
            </div>
            <ul class="meta-list">
                @if($property['type']['name'] === "Departamento" || $property['type']['name'] === "Casa")
                    <li class="item">
                        <i class="icon icon-bed"></i>
                        <span>
                            @if($property['type']['name'] === "Departamento")
                                {{$property['room_amount']}}
                            @else
                                {{$property['suite_amount']}}
                            @endif
                        </span>
                    </li>
                @endif
                @if($property['type']['name'] != "Terreno")
                    <li class="item">
                        <i class="icon icon-bathtub"></i>
                        <span>{{$property['bathroom_amount']}}</span>
                    </li>
                @endif
                <li class="item">
                    <i class="icon icon-ruler"></i>
                    <span>{{ explode('.', $property['surface'])[0]  }}m² Sup. Total</span>
                </li>
            </ul>
        </div>
        @php
            $operationTypes = [];
            foreach ($property['operations'] as $item) {
                $operationTypes[] = $item['operation_type'];
            }
        @endphp
        <div class="d-flex justify-content-between align-items-center">
            @if (in_array('Alquiler', $operationTypes) || in_array('Alquiler temporario', $operationTypes))
                <div class="d-flex gap-8 align-items-center">
                    <div class=" fw-4">Alquiler<Br /><span class="fw-7">
                        USD $
                            @foreach($property['operations'] as $operation)
                                @if($operation['operation_type'] != 'Venta')
                                    <span currency-format="usd" country-id="es-AR">{{$operation['prices'][0]['price']}}</span>
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
                            @foreach($property['operations'] as $operation)
                                @if($operation['operation_type'] == 'Venta')
                                    <span currency-format="usd" country-id="es-AR">{{$operation['prices'][0]['price']}}</span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>