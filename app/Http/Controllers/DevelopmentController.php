<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Traits\DevelopmentHelper;
use Illuminate\Http\Request;
use App\Traits\TokkoBroker;
use Str;


class DevelopmentController extends Controller
{
    use DevelopmentHelper, TokkoBroker;


    public function slugify(Request $request): RedirectResponse
    {

        if (isset($request->search)) {
            $slug = 'emprendimiento-' . Str::slug($request->search) . '_' . $request->developmentId;

            return redirect()->route('developments.search', $slug);
        }

        /*
        /   Si es necesario testear como slugifea los datos de la request utilizar la siguiente url.
        /   http://127.0.0.1:8000/emprendimientos?location=pilar&construction_status=finalizado&50077=on
        */


        $construction_status = '';
        $custom_tags = '';
        $development_name = '';
        $development_id = '';
        $location_name = '';
        $location_id = '';
        $custom_tags = '';

        switch ($request->location) {
            case 'pilar':
                $location_name = '-en-pilar';
                $location_id = '_25127';
                break;
            case 'san-isidro':
                $location_name = '-en-san-isidro';
                $location_id = '_25469';
                break;
            case 'tigre':
                $location_name = '-en-tigre';
                $location_id = '_25620';
                break;
            case 'san-fernando':
                $location_name = '-en-san-fernando';
                $location_id = '_25436';
                break;
            case 'escobar':
                $location_name = '-en-escobar';
                $location_id = '_24820';
                break;
            case 'nordelta':
                $location_name = '-en-nordelta';
                $location_id = '_25666';
                break;
            default:
                $location_name = '-en-' . $_ENV['INMOBILIARIA_NAME'];
                $location_id = '';
                break;
        }


        if (isset($request->construction_status)) {
            switch ($request->construction_status) {
                case 'desconocido':
                    $construction_status = '-desconocidos';
                    break;
                case 'Reuniendo-inversores':
                    $construction_status = '-reuniendo-inversores';
                    break;
                case 'en-pozo':
                    $construction_status = '-en-pozo';
                    break;
                case 'en-construccion':
                    $construction_status = '-en-construccion';
                    break;
                case 'detenido':
                    $construction_status = '-detenidos';
                    break;
                case 'finalizado':
                    $construction_status = '-finalizados';
                    break;
                default:
                    $construction_status = '-desconocidos';
                    break;
            }
        }

        /*
        /   Agregar custom tags por el id del tag
        */

        if ($request->{50077}) {
            $custom_tags .= '-con-apto-blanqueo';
        }

        // if ($request->{000}) {
        //     $custom_tags .= '-tag-de-ejemplo';
        // }

        $slug = 'todos-los-emprendimientos' . $construction_status . $custom_tags . $location_name . $location_id;
        return redirect()->route('development.search', $slug);
    }

    public function search(string $slug): View
    {
        // $development_data = $this->deslugifyDevelopment($slug);

        // $developments_all = FeaturedDevelopment::all()->filter(function ($development) {
        //     return $development->visible == 1;
        // })->values();
        $developments = $this->getTokkoDevelopments()['objects'];

        return view('development.list', compact(['developments']));
    }




}
