<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait TokkoBroker
{
    /**
     * Función que llama a la API de TokkoBroker y hace la consulta segun los parametros dados.
     * Se encarga de hacer la busqueda de propiedades por Location.
     * @param array $params
     * @return array
     */
    public function getTokkoPropertiesByLocation($params = [])
    {
        if ($params == []) {
            $data = json_encode([
                "current_localization_id" => 0,
                "current_localization_type" => "country",
                "price_from" => 0,
                "price_to" => 99999999,
                "operation_types" => [],
                "property_types" => [],
                "currency" => "ANY",
                "filters" => [],
                "with_tags" => [],
                "with_custom_tags" => []
            ]);
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'limit' => '999',
                'offset' => '0',
                'order_by' => 'price',
                'order' => 'DESC',
                'data' => $data,
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "property/by_location", $query);

            $result = json_decode($conn->getBody(), true);

        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }



    /**
     * Función que llama a la API de TokkoBroker
     * Hace la busqueda de propiedades.
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function getTokkoProperties($limit = 20, $offset = 0)
    {
        $query = [
            'lang' => 'es_ar',
            'format' => 'json',
            'limit' => $limit,
            'offset' => $offset,
            'key' => config('services.tokko.key')
        ];

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "property/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda de propiedades dependiendo los parametros dados.
     * @param array $params
     * @return array
     */
    public function getTokkoPropertiesSearch($params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'limit' => '10',
                'offset' => '0',
                'key' => config('services.tokko.key')
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "property/search", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda de todos los tags.
     * @param array $params
     * @return array
     */
    public function getTokkoTags($params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'limit' => '0',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "property_tag/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda de todos los desarrollos 
     * dependiendo los parametros dados.
     * @param array $params
     * @return array
     */
    public function getTokkoDevelopments($params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "development/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda los desarrollos por id
     * dependiendo los parametros dados.
     * @param int $id
     * @param array $params
     * @return array
     */
    public function getTokkoDevelopmentsDetails($id = 0, $params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "development/$id/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda las propiedades por id
     * dependiendo los parametros dados.
     * @param int $id
     * @param array $params
     * @return array
     */
    public function getTokkoPropertiesDetails($id = 0, $params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "property/$id/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda de locations por id
     * dependiendo los parametros dados.
     * @param int $id
     * @param array $params
     * @return array
     */
    public function getTokkoLocationsDetails($id = 0, $params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $conn = Http::withHeaders([
                'Connection' => 'keep-alive',
                'Keep-Alive' => 'timeout=5,max=100',
            ])->get(config('services.tokko.domain') . "location/$id/", $query);

            $result = json_decode($conn->getBody(), true);
        } catch (\Throwable $th) {
            $result["objects"] = $th->getMessage();
        }

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de hacer la busqueda de locations por nombre.
     * 
     * @param string $q
     * @return array
     */

    public function getTokkoQuicksearch($q = 'Argentina | G.B.A')
    {
        $query = [
            'lang' => 'es_ar',
            'format' => 'json',
            'q' => $q,
            'key' => config('services.tokko.key'),
        ];

        $conn = Http::withHeaders([
            'Connection' => 'keep-alive',
            'Keep-Alive' => 'timeout=5,max=100',
        ])->get(config('services.tokko.domain') . "location/quicksearch/", $query);

        $result = json_decode($conn->getBody(), true);

        return $result;
    }

    /**
     * Función que llama a la API de TokkoBroker
     * Se encarga de enviar el formulario de contacto
     * a la API de TokkoBroker
     * 
     * @param array $params
     * @return string
     */
    public function postTokkoContactForm($params = [])
    {
        if ($params == []) {
            $query = [
                'lang' => 'es_ar',
                'format' => 'json',
                'key' => config('services.tokko.key'),
            ];
        } else {
            $query = $params;
        }

        try {
            $result = Http::post(
                config('services.tokko.domain') . "webcontact/?key=" . config('services.tokko.key'),
                $query
            );
        } catch (\Throwable $th) {
            $result = $th->getMessage();
        }

        return $result;
    }
}
