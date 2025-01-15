<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Traits\TokkoBroker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use TokkoBroker;
    
    function index(): View
    {
        $locations = $this->getTokkoPropertiesByLocation()['objects'];

        // Obtiene los datos de todas las locations
        $data = json_encode([
            "current_localization_id" => 0,
            "current_localization_type" => 'country',
            "property_types" => null,
            "price_from" => 0,
            "price_to" => 99999999,
            "operation_types" => null,
            "currency" => 'ANY',
            "filters" => [["is_starred_on_web","Yes",0]],
            "with_tags" => [],
            "with_custom_tags" => [],
        ]);

        // Prepara los parámetros de la consulta.
        $query = [
            'lang' => 'es_ar',
            'format' => 'json',
            'limit' => '4', // CAMBIAR ESTO SI QUERES PONER MAS ITEMS EN LAS DESTACADAS DEL HOMEPAGE // INDEX
            'offset' => 0,
            'order_by' => 'created_at',
            'order' => 'DESC',
            'data' => $data,
            'key' => config('services.tokko.key'),
        ];


        // Realiza la consulta a la API de Tokko.
        $properties = $this->getTokkoPropertiesSearch($query)['objects'];


        return view('homepage', compact('locations', 'properties'));
    }
}
