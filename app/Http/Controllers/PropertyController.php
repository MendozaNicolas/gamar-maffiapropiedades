<?php

namespace App\Http\Controllers;

use App\Traits\PropertyHelper;
use App\Traits\TokkoBroker;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Session;
use Str;

class PropertyController extends Controller
{
    use TokkoBroker, PropertyHelper;
    public function slugify(Request $request): RedirectResponse
    {
        // Obtiene el ID de la propiedad.
        $id = $request->id;


        // Ajusta el tipo de operación si es necesario.
        if ($request->operation_type == 'emprendimiento') {
            $request->property_type = 'propiedades';
        }
        if ($request->has('disponibles') && ($request->operation_type == 'venta' || $request->operation_type == 'alquiler')) {
            $request->operation_type = 'disponibles';
        }

        // Determina el tipo de propiedad.
        $property_type = match ($request->property_type) {
            'lotes-residenciales' => 'lotes-residenciales',
            'departamentos' => 'departamentos',
            'casas' => 'casas',
            'ph' => 'ph',
            'casas-ph' => 'casas-ph',
            'edificios-comerciales' => 'edificios-comerciales',
            'locales' => 'locales',
            'amarras' => 'amarras',
            'cocheras' => 'cocheras',
            'amarras-cocheras' => 'amarras-cocheras',
            'depositos' => 'depositos',
            'galpones' => 'galpones',
            'oficinas' => 'oficinas',
            'terrenos-comerciales' => 'terrenos-comerciales',
            default => 'propiedades',
        };

        // Determina el tipo de operación.
        $operation_type = match ($request->operation_type) {
            'venta' => 'en-venta',
            'alquiler' => 'en-alquiler',
            'alquiler-temporario' => 'en-alquiler-temporario',
            default => 'disponibles',
        };

        // Genera el nombre de localización.
        $localization_name = $request->name != null ? 'en-' . Str::slug($request->name, '-') . '_' . $id : 'en-' . config('app.inmobiliaria_name');

        // Inicializa los filtros.
        $filters = '';

        // Agrega filtros basados en los datos de la solicitud.
        if ($request->has('price') && $request->price != null) {
            $price = str_replace(".", "", $request->price);
            $filters .= '-con-presupuesto-' . $price;
            if ($request->currency == 'usd') {
                $filters .= '-usd';
            } else if ($request->currency == 'ars') {
                $filters .= '-ars';
            }
        }

        if ($request->has('surface') && $request->has('tipo_superficie') && $request->surface != "") {
            $surface = $request->surface;
            $filters .= $request->tipo_superficie == 'total' ? '-con-' . $surface . '-mts-total' : '-con-' . $surface . '-mts-techado';
        }

        if ($request->rooms) {
            $filters .= '-con-mas-de-' . $request->rooms . '-ambientes';
        }

        if ($request->suites) {
            $filters .= '-con-mas-de-' . $request->suites . '-dormitorios';
        }

        if ($request->bathrooms) {
            $filters .= '-con-mas-de-' . $request->bathrooms . '-banios';
        }
        if ($request->{44}) {
            $filters .= '-con-al-rio';
        }
        if ($request->{1456}) {
            $filters .= '-con-laguna-interior';
        }
        if ($request->{53}) {
            $filters .= '-con-vista-al-golf';
        }
        if ($request->{1501}) {
            $filters .= '-con-amarra';
        }
        if ($request->{51}) {
            $filters .= '-con-pileta';
        }
        if ($request->{38}) {
            $filters .= '-con-sala-de-juegos';
        }
        if ($request->{1591}) {
            $filters .= '-con-area-de-servicio';
        }
        if ($request->{27}) {
            $filters .= '-con-vestidor';
        }
        if ($request->{1524}) {
            $filters .= '-con-seguridad-24hs';
        }
        if ($request->{41}) {
            $filters .= '-con-sum';
        }
        if ($request->{33}) {
            $filters .= '-con-gimnasio';
        }
        if ($request->{32}) {
            $filters .= '-con-centro-de-deportes';
        }
        if ($request->operation_type == 'emprendimiento') {
            $filters .= '-en-emprendimiento';
        }

        // Construye el slug.
        $slug = $property_type . "-" . $operation_type . "" . $filters . "-" . $localization_name;

        // Redirige a la ruta de búsqueda con el slug generado.
        return redirect()->route('property.search', $slug);
    }

    public function search(Request $request, $slug): View
    {
        // Deserializa los datos del slug.
        $properties_data = $this->deslugify($slug);
        Session::put('properties-data', $properties_data);

        $development = null;
        // Verifica si se trata de un desarrollo.
        if ($properties_data->has('emprendimiento')) {
            if ($properties_data['emprendimiento'] == true) {
                $development = $this->getTokkoDevelopmentsDetails($properties_data->idlocation);
            }
        }


        // Obtiene los datos de todas las locations
        $dataLocations = json_encode([
            "current_localization_id" => 0,
            "current_localization_type" => "country",
            "price_from" => 0,
            "price_to" => 999999999,
            "operation_types" => [],
            "property_types" => [],
            "currency" => "ANY",
            "filters" => []
        ]);

        $locationsParams = [
            'lang' => 'es_ar',
            'format' => 'json',
            'limit' => '999',
            'offset' => '0',
            'order_by' => 'location',
            'order' => 'ASC',
            'data' => $dataLocations,
            'key' => config('services.tokko.key'),
        ];

        $locations_with_properties = $this->getTokkoPropertiesByLocation($locationsParams)['objects'];

        $metadata = $this->getTokkoProperties()['meta'];


        $locations = $this->getTokkoPropertiesByLocation($locationsParams)['objects'];

        // Devuelve la vista con los resultados de la búsqueda.
        return view('property.list', compact('properties_data', 'slug', 'metadata', 'locations_with_properties', 'locations'));
    }

    public function getPropertyDetail($slug)
    {
        // Extrae el ID de la propiedad del slug.
        $id = explode('-', $slug)[0];

        // Obtiene los detalles de la propiedad desde la API de Tokko.
        $property = $this->getTokkoPropertiesDetails($id);

        // Devuelve la vista con los detalles de la propiedad.
        return view('property.details', compact(['property']));
    }

    public function getProperties(Request $request)
    {
        // Inicializa las variables con valores por defecto.
        $localization_type = 'country';
        $localization_id = '0';
        $operation_type = null;
        $property_type = [];
        $suites = null;
        $rooms = null;
        $roofed = null;
        $surface = null;
        $bathrooms = null;
        $price_min = 0;
        $price_max = 0;
        $offset = 0;
        $tags = [];
        $custom_tags = "";
        $order_by = 'created_at';
        $order = 'DESC';
        $currency = 'ANY';

        // Obtiene el desplazamiento de la página.
        if ($request->offset) {
            $offset = $request->offset;
        }

        // Obtiene el criterio de ordenación.
        if ($request->order_by) {
            $order_by = $request->order_by;
        }
        if ($request->order) {
            $order = $request->order;
        }

        // Obtiene la moneda preferida.
        if ($request->currency) {
            $currency = $request->currency;
        }


        // Procesa el tipo de operación.
        if ($request->operation_type) {
            $operation_type = $request->operation_type;

            // Convierte el tipo de operación a su equivalente numérico.
            switch ($operation_type) {
                case 'venta':
                    $operation_type = 1;
                    break;
                case 'alquiler':
                    $operation_type = 2;
                    break;
                case 'alquiler-temporario':
                    $operation_type = 3;
                    break;
                default:
                    $operation_type = null;
                    break;
            }
        }

        // Procesa el tipo de propiedad.
        if ($request->property_type) {
            $_property_type = $request->property_type;

            // Convierte el tipo de propiedad a su equivalente numérico.
            switch ($_property_type) {
                case 'lotes-residenciales':
                    array_push($property_type, 1);
                    break;
                case 'departamentos':
                    array_push($property_type, 2);
                    break;
                case 'casas-ph':
                    array_push($property_type, 3);
                    array_push($property_type, 13);
                    break;
                case 'casas':
                    array_push($property_type, 3);
                    break;
                case 'quintas':
                    array_push($property_type, 4);
                    break;
                case 'oficinas':
                    array_push($property_type, 5);
                    break;
                case 'amarras':
                    array_push($property_type, 6);
                    break;
                case 'locales':
                    array_push($property_type, 7);
                    break;
                case 'edificios-comerciales':
                    array_push($property_type, 8);
                    break;
                case 'campo':
                    array_push($property_type, 9);
                    break;
                case 'cocheras':
                    array_push($property_type, 10);
                    break;
                case 'hotel':
                    array_push($property_type, 11);
                    break;
                case 'nave-industrial':
                    array_push($property_type, 12);
                    break;
                case 'ph':
                    array_push($property_type, 13);
                    break;
                case 'depositos':
                    array_push($property_type, 14);
                    break;
                case 'fondo-comercio':
                    array_push($property_type, 15);
                    break;
                case 'baulera':
                    array_push($property_type, 16);
                    break;
                case 'bodega':
                    array_push($property_type, 17);
                    break;
                case 'finca':
                    array_push($property_type, 18);
                    break;
                case 'chacra':
                    array_push($property_type, 19);
                    break;
                case 'cama-nautica':
                    array_push($property_type, 20);
                    break;
                case 'isla':
                    array_push($property_type, 21);
                    break;
                case 'terraza':
                    array_push($property_type, 23);
                    break;
                case 'galpones':
                    array_push($property_type, 24);
                    break;
                case 'villa':
                    array_push($property_type, 25);
                    break;
                case 'lote-comercial':
                    array_push($property_type, 26);
                    break;
                case 'lote-industrial':
                    array_push($property_type, 27);
                    break;
                default:
                    $property_type = [];
                    break;
            }
        }


        // Procesa los tags.
        if ($request->tags) {
            $tags = $request->tags;
        }

        // Procesa los tags personalizados.
        if ($request->custom_tags) {
            $custom_tags = $request->custom_tags;
        }

        // Procesa el precio máximo.
        if ($request->price) {
            if ($request->price != null && $request->price != 0 && $request->price != '0') {
                $price_max = $request->price;
            }
        }

        // Procesa la cantidad de dormitorios.
        if ($request->suites) {
            $suites = $request->suites;
        }

        // Procesa la cantidad de ambientes.
        if ($request->rooms) {
            $rooms = $request->rooms;
        }

        // Procesa la cantidad de baños.
        if ($request->bathrooms) {
            $bathrooms = $request->bathrooms;
        }

        // Procesa la superficie techada.
        if ($request->roofed) {
            if ($request->roofed != 0) {
                $roofed = $request->roofed;
            }
        }

        // Procesa la superficie total.
        if ($request->surface) {
            if ($request->surface != 0) {
                $surface = $request->surface;
            }
        }

        // Construye los filtros.
        $filters = [];
        $filtros = '[]';
        $data = '';

        // Agrega el filtro de dormitorios si es necesario.
        if ($suites != null && $suites != 0) {
            array_push($filters, ["suite_amount", ">", $suites - 1]);
        }


        // Agrega el filtro de ambientes si es necesario.
        if ($rooms != null && $rooms != 0) {
            array_push($filters, ["room_amount", ">", $rooms - 1]);
        }

        // Agrega el filtro de baños si es necesario.
        if ($bathrooms != null && $bathrooms != 0 && $bathrooms != '0') {
            array_push($filters, ["bathroom_amount", ">", $bathrooms - 1]);
        }

        // Agrega el filtro de superficie techada si es necesario.
        if ($roofed != null) {
            array_push($filters, ["roofed_surface", "<", $roofed]);
        }

        // Agrega el filtro de superficie total si es necesario.
        if ($surface != null) {
            array_push($filters, ["surface", "<", $surface]);
        }

        // if ($cochera != null) {
        //     array_push($filters, ["parking_lot_amount", "=", $cochera]);
        // }


        // Ajusta el precio mínimo y máximo si es necesario.
        // Si viene un precio especificado del usuario, pongo un valor aproximado a las busquedas, sino queda normal.
        if ($price_max != 0) {
            // Pongo un 15 de rango desde el precio seleccionado
            $price = floatval($price_max * 20 / 100);
            $price_min = round(($price_max - $price), 0, PHP_ROUND_HALF_UP);
            $price_max = round(($price_max + $price), 0, PHP_ROUND_HALF_UP);
        } else {
            $price_max = 99999999;
            $price_min = 0;
        }

        // Procesa la ubicación.
        if ($request->location_id != null) {
            if ($request->location_id == '0') {
                $localization_type = 'country';
                $localization_id = '0';
            } else {
                $localization_type = 'division';
                if (str_contains($request->location_id, ',')) {
                    $localization_id = explode(',', $request->location_id);
                    foreach ($localization_id as $key => $value) {
                        $localization_id[$key] = intval($value);
                    }
                } else {
                    $localization_id = $request->location_id;
                }
            }
        }

        // Construye los datos para la consulta.
        if ($request->emprendimiento == 'true') {
            $data = json_encode([
                "current_localization_id" => 1,
                "current_localization_type" => 'country',
                "property_types" => $property_type,
                "price_from" => $price_min,
                "price_to" => $price_max,
                "operation_types" => [$operation_type],
                "currency" => $currency,
                "filters" => [["development__id", "op", "$localization_id"]],
                "with_tags" => [],
                "with_custom_tags" => [$custom_tags],
            ]);
        } else {
            $data = json_encode([
                "current_localization_id" => $localization_id,
                "current_localization_type" => $localization_type,
                "property_types" => $property_type,
                "price_from" => $price_min,
                "price_to" => $price_max,
                "operation_types" => [$operation_type],
                "currency" => $currency,
                "filters" => $filters,
                "with_tags" => $tags,
                "with_custom_tags" => [$custom_tags],
            ]);
        }

        // Prepara los parámetros de la consulta.
        $query = [
            'lang' => 'es_ar',
            'format' => 'json',
            'limit' => '20',
            'offset' => $offset,
            'order_by' => $order_by,
            'order' => $order,
            'data' => $data,
            'key' => config('services.tokko.key'),
        ];


        // Realiza la consulta a la API de Tokko.
        $properties = $this->getTokkoPropertiesSearch($query);

        // Devuelve los resultados en formato JSON.
        return response()->json($properties);
    }

    public function getPropertyTags(): JsonResponse
    {
        // Obtiene los tags de la API de Tokko.
        $tags = $this->getTokkoTags()['objects'];

        // Devuelve los tags en formato JSON.
        return response()->json($tags);
    }
}
