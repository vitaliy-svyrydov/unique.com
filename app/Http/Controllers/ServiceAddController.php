<?php

namespace App\Http\Controllers;

use Validator;
use App\Service;
use Illuminate\Http\Request;

class ServiceAddController extends Controller
{
    public function execute(Request $request){
        if($request->isMethod('post')){
            $input = $request->except('_token');
            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению'];
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'icon' => 'required|max:255',
                'text' => 'required',
            ], $massages);
            if($validator->fails()){
                return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
            }

            $page = new Service();
            $page->fill($input);
            if($page->save()){
                return redirect()->route('service')->with('status', 'Страница добавлена');
            }
        }

        if(view()->exists('admin.service_add')){
            $data = [
                'title' => 'Новый сервис'
            ];
            return view('admin.service_add', $data);
        }
        abort(404);
    }
}
