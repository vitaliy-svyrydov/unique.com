<?php

namespace App\Http\Controllers;
use Validator;
use App\Service;
use Illuminate\Http\Request;

class ServiceEditController extends Controller
{
    public function execute(Service $service, Request $request){

        if($request->isMethod('delete')){
            $service->delete();
            return redirect()->route('service')->with('status', 'Запись успешно удалена');
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $massages = ['required' => 'Поле :attribute обязательно к заполнению',];
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required|max:255',
                'icon' => 'required',
            ], $massages);
            if($validator->fails()){
                return redirect()
                    ->route('serviceEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            $service->fill($input);
            if($service->update()){
                return redirect()->route('service')->with('status', 'Запись '.$input['name'].' обновлена');
            }
        }

        $old = $service->toArray();
        if(view()->exists('admin.service_edit')){
            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old,
            ];
            return view('admin.service_edit', $data);
        }
    }
}
