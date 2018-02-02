<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function execute(){
        if(view()->exists('admin.service')){
            $service = Service::all();
            $data = [
                'title' => 'Сервисы',
                'service' => $service,
            ];
            return view('admin.service', $data);
        }
        abort(404);
    }
}
