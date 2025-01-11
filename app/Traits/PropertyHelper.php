<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Str;

trait PropertyHelper
{
    use TokkoBroker;

    /**
     * Función para leer el ID del estado actual de los emprendimientos y devolver el nombre.
     *
     * @param int $statusID
     * @return string
     */
    public function getConstructionStatus(int $statusID)
    {
        $status = '';
        switch ($statusID) {
            case 1:
                $status = 'Desconocido';
                break;
            case 2:
                $status = 'Reuniendo inversores';
                break;
            case 3:
                $status = 'En pozo';
                break;
            case 4:
                $status = 'En construccion';
                break;
            case 5:
                $status = 'Detenido';
                break;
            case 6:
                $status = 'Finalizado';
                break;
            default:
                $status = 'Desconocido';
        }
        return $status;
    }

    /**
     * Función para leer la URL e identificar parámetros.
     *
     * @param string $slug
     * @return string
     */
    public function deslugify(string $slug): Collection
    {
        //objeto que sera devuelto.
        $emprendimiento = false;
        $operation_type = 'disponibles';
        $property_type = 'propiedades';
        $dormitorios = '0';
        $ambientes = '0';
        $banios = '0';
        $cubierto = '0';
        $surface = '0';
        $currency = '';
        $price = '0';
        $order_by = 'price';
        $order = 'asc';
        $tags = [];


        $slug = strtolower($slug);

        /*
        |--------------------------------------------------------------------------
        | Busca el tipo de propiedad. Ej: departamentos, locales, etc.
        |--------------------------------------------------------------------------
        */

        switch (true) {
            case Str::contains($slug, 'lotes-residenciales'):
                $property_type = "lotes-residenciales";
                break;
            case Str::contains($slug, 'departamentos'):
                $property_type = "departamentos";
                break;
            case Str::contains($slug, 'casas-ph'):
                $property_type = "casas-ph";
                break;
            case Str::contains($slug, 'casas'):
                $property_type = "casas";
                break;
            case Str::contains($slug, 'quinta'):
                $property_type = "quinta";
                break;
            case Str::contains($slug, 'oficinas'):
                $property_type = "oficinas";
                break;
            case Str::contains($slug, 'amarras'):
                $property_type = "amarras";
                break;
            case Str::contains($slug, 'locales'):
                $property_type = "locales";
                break;
            case Str::contains($slug, 'cocheras'):
                $property_type = "cocheras";
                break;
            case Str::contains($slug, 'amarras-cocheras'):
                $property_type = "amarras-cocheras";
                break;
            case Str::contains($slug, 'depositos'):
                $property_type = "depositos";
                break;
            case Str::contains($slug, 'terrazas'):
                $property_type = "terrazas";
                break;
            case Str::contains($slug, 'galpones'):
                $property_type = "galpones";
                break;
            case Str::contains($slug, 'edificios-comerciales'):
                $property_type = "edificios-comerciales";
                break;
            case Str::contains($slug, 'lotes-comerciales'):
                $property_type = "lotes-comerciales";
                break;
            case Str::contains($slug, 'ph'):
                $property_type = "ph";
                break;
            default:
                $property_type = "propiedades";
                break;
        }
        $slug = Str::replace($property_type, '', $slug);
        /*
        |--------------------------------------------------------------------------
        | Busca el tipo de operación. Ej: venta, alquiler, etc.
        |--------------------------------------------------------------------------
        */

        switch (true) {
            case Str::contains($slug, 'venta'):
                $operation_type = "venta";
                $slug = Str::replace('-en-' . $operation_type, '', $slug);
                break;
            case Str::contains($slug, 'temporario'):
                $operation_type = "alquiler-temporario";
                $slug = Str::replace('-en-' . $operation_type, '', $slug);
                break;
            case Str::contains($slug, 'en-alquiler'):
                $operation_type = "alquiler";
                $slug = Str::replace('-en-' . $operation_type, '', $slug);
                break;
            default:
                $operation_type = "disponibles";
                $slug = Str::replace('-' . $operation_type, '', $slug);
                break;
        }


        // > Si es emprendimiento
        if (Str::contains($slug, '-en-' . 'emprendimiento')) {
            $emprendimiento = true;
            $slug = Str::replace('-' . 'en-emprendimiento', '', $slug);
        }

        /*
        |--------------------------------------------------------------------------
        | Busca tipos de filtros. Ej: ambientes, dormitorios, etc.
        |--------------------------------------------------------------------------
        */


        // > Busca precio.
        if (Str::contains($slug, '-con-presupuesto-')) {
            preg_match_all('/[0-9]+/', $slug, $matchesPresupuesto);
            $price = $matchesPresupuesto[0][0];
            $slug = Str::replace('-con-presupuesto-' . $price, '', $slug);
        }

        // > Busca tipo de moneda.
        switch (true) {
            case Str::contains($slug, '-' . 'usd'):
                $currency = 'usd';
                $slug = Str::replace('-' . $currency, '', $slug);
                break;
            case Str::contains($slug, '-' . 'ars'):
                $currency = 'ars';
                $slug = Str::replace('-' . $currency, '', $slug);
                break;
            default:
                $currency = 'ANY';
                $slug = Str::replace('-' . $currency, '', $slug);
                break;
        }


        // > Busca superficie total.
        if (Str::contains($slug, 'total')) {
            preg_match_all('/[0-9]+/', $slug, $matchesSurface);

            $surface = $matchesSurface[0][0];
            $slug = Str::replace('-con-' . $surface . '-mts-total', '', $slug);
        }

        // > Busca cubierta.
        if (Str::contains($slug, 'techado')) {
            preg_match_all('/[0-9]+/', $slug, $matchesTechado);

            $cubierto = $matchesTechado[0][0];
            $slug = Str::replace('-con-' . $cubierto . '-mts-techado', '', $slug);
        }

        // > Busca ambientes.
        if (Str::contains($slug, 'ambientes')) {
            preg_match_all('/[0-9]+/', $slug, $matchesAmbientes);
            $ambientes = $matchesAmbientes[0][0];
            if (Str::contains($slug, '-con-mas-de-' . $ambientes . '-ambientes')) {
                $slug = Str::replace('-con-mas-de-' . $ambientes . '-ambientes', '', $slug);
            } else {
                $slug = Str::replace('-con-' . $ambientes . '-ambientes', '', $slug);
            }
        }
        // dd($slug);

        // > Busca dormitorios.
        if (Str::contains($slug, 'dormitorios')) {
            preg_match_all('/[0-9]+/', $slug, $matchesDormitorios);
            $dormitorios = $matchesDormitorios[0][0];
            if (Str::contains($slug, '-con-mas-de-' . $dormitorios . '-dormitorios')) {
                $slug = Str::replace('-con-mas-de-' . $dormitorios . '-dormitorios', '', $slug);
            } else {
                $slug = Str::replace('-con-' . $dormitorios . '-dormitorios', '', $slug);
            }
        }

        // > Busca baños.
        if (Str::contains($slug, 'banios')) {
            preg_match_all('/[0-9]+/', $slug, $matchesBanios);
            $banios = $matchesBanios[0][0];

            if (Str::contains($slug, '-con-mas-de-' . $banios . '-banios')) {
                $slug = Str::replace('-con-mas-de-' . $banios . '-banios', '', $slug);
            } else {
                $slug = Str::replace('-con-' . $banios . '-banios', '', $slug);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Busca tags.
        |--------------------------------------------------------------------------
        */

        $_tags = $this->getTokkoTags()['objects'];
        // dd($_tags);

        unset($_tags[30]); // Removemos la etiqueta <Calefacción> por problemas con la otra etiqueta <Calefacción Central>
        unset($_tags[40]); // Removemos la etiqueta <Bar> por problemas con las localidades.

        foreach ($_tags as $key => $value) {
            // Sacamos caracteres especiales de los tags
            $str = $value['name'];
            $str = htmlentities($str, ENT_NOQUOTES, 'utf-8');

            $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
            $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
            $str = preg_replace('#&[^;]+;#', '', $str);

            $value['name'] = $str;


            // Excepcion seguridad 24hs, tuve que hacer esto porque antes del tag seguridad 24 hs 
            // hay otros tags que incluyen la palabra seguridad y tomaban esos tags en vez del correcto.
            if (Str::contains($slug, 'seguridad-24hs')) {
                array_push($tags, 1524);
                $slug = Str::replace('-con-seguridad-24hs', '', $slug);
            }



            if (Str::contains($slug, Str::slug($value['name']))) {
                array_push($tags, $value['id']);
                $slug = Str::replace('-con-' . Str::slug($value['name']), '', $slug);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Busca la ubicación.
        |--------------------------------------------------------------------------
        */

        $slug = Str::replace('-en-', '', $slug);
        $corte = explode('_', $slug);
        $location = $corte[0];

        if (isset($corte[1])) {
            $id = $corte[1];
        } else {
            $id = '';
        }




        /*
        |--------------------------------------------------------------------------
        | Asigno todos los valores que extraje del slug.
        |--------------------------------------------------------------------------
        */
        $data = [];
        $data['is_development'] = $emprendimiento;
        $data['operation_type'] = $operation_type;
        $data['property_type'] = $property_type;
        $data['suites'] = $dormitorios;
        $data['rooms'] = $ambientes;
        $data['bathrooms'] = $banios;
        $data['roofed'] = $cubierto;
        $data['surface'] = $surface;
        $data['price'] = $price;
        $data['currency'] = $currency;
        $data['location'] = $location;
        $data['location_id'] = $id;
        $data['tags'] = $tags;
        $data['order_by'] = $order_by;
        $data['order'] = $order;

        $data = collect($data);

        return $data;
    }
}
