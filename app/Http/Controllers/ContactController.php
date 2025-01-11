<?php

namespace App\Http\Controllers;

use App\Traits\TokkoBroker;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| ContactController
|--------------------------------------------------------------------------
|
| ContactController tiene 1 función principal que se encargan
| del envio del formulario de contacto hacia TokkoBroker.
|
*/

class ContactController extends Controller
{
    use TokkoBroker;
    public function sendContactForm(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:13',
            'message' => 'required|string',
            'propertyTitle' => 'nullable|string|max:255',
            'propertyId' => 'nullable|integer',
            'developmentTitle' => 'nullable|string|max:255',
            'developmentId' => 'nullable|integer',
            'tasaProperty' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'agentEmail' => 'nullable|email|max:255',
            'branch' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        // Verificar el token de reCaptcha
        $response = $this->verifyRecaptcha($request->recaptcha_token);
        

        $id = null; // ID de la propiedad (por defecto null).
        $tag = ''; // Etiqueta para la consulta (por defecto vacía).
        $type = ''; // Tipo de consulta (por defecto vacía).
        $name = $request->name; // Nombre del usuario.
        $phone = $request->phone; // Número de teléfono del usuario.
        $email = $request->email; // Email del usuario.
        $url = $request->url ? $request->url : 'vmaffiapropiedades.com.ar'; // URL de la página web.
        $branch = $request->branch ? $request->branch : null; // Sucursal de la inmobiliaria.
        $agent_email = $request->agentEmail ? $request->agentEmail : null; // Email del agente.

        // Determina el tipo de consulta y construye el mensaje
        switch ($request->type) {
            case 'propiedad':
                $message = 'Consulta desde la web por la propiedad ' . $request->propertyTitle . ' (' . $request->id . ')';
                $id = $request->propertyId;
                $type = $request->type;
                $tag = $request->propertyTitle;
                break;
            case 'emprendimiento':
                $message = 'Consulta desde la web por el emprendimiento ' . $request->developmentTitle . ' (' . $request->id . ')';
                $id = $request->developmentId;
                $type = $request->type;
                $tag = $request->developmentTitle;
                break;
            case 'tasacion':
                // Maneja valores no deseados en el campo 'tasaProperty'
                // Este switch lo hago solamente por si entra un Input no deseado dentro de tasaProperty tenga asi un caso default.
                switch ($request->tasaProperty) {
                    case 'casa':
                        $request->tasaProperty = 'una casa';
                        break;
                    case 'departamento':
                        $request->tasaProperty = 'un departamento';
                        break;
                    case 'oficina':
                        $request->tasaProperty = 'un local/oficina';
                        break;
                    case 'lote':
                        $request->tasaProperty = 'un lote';
                        break;
                    default:
                        $request->tasaProperty = 'una propiedad';
                        break;
                }
                $message = 'Consulta desde la WEB por tasaciones para tasar ' . $request->tasaProperty . ' en ' . $request->location;
                $type = $request->type;
                break;
            case 'contacto':
                $message = 'Consulta desde la WEB por contacto';
                $type = $request->type;
                break;
        }

        // Agrega el mensaje del usuario a la consulta
        $message = $message . "\n" . $request->message;


        $params = [
            'agent_email' => $agent_email,
            'work_name' => $branch,
            'cellphone' => $phone,
            'tags' => ["$url", "$type", "$tag"],
            'properties' => $id,
            'phone' => $phone,
            'email' => $email,
            'name' => $name,
            'text' => $message,
        ];

        

        // Envía la consulta a TokkoBroker
        $conn = $this->postTokkoContactForm($params);

        // Redirige a la página de agradecimiento según el tipo de consulta
        return $request->type == 'tasacion' ? redirect()->route('gracias.tasaciones') : redirect()->route('gracias.general');
    }


    public function verifyRecaptcha($token): mixed
    {
        // Enviar la solicitud a la API de reCaptcha usando Http
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $token,
        ]);

        // Decodificar la respuesta de reCaptcha
        return $response->json();
    }

}
