<?php

namespace App\Http\Controllers;

use App\Page;
use Validator;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request){

        if($request->isMethod('delete')){
            $page->delete();
            return redirect()->route('pages')->with('status', 'Запись успешно удалена');
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
            ];
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required|max:255|unique:pages,alias,'.$input['id'],
                'alias' => 'required',
            ], $massages);
            if($validator->fails()){
                return redirect()
                    ->route('pagesEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }
            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }
            else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);
            $page->fill($input);
            if($page->update()){
                return redirect()->route('pages')->with('status', 'Запись '.$input['name'].' обновлена');
            }
        }

        $old = $page->toArray();
        if(view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old,
            ];
            return view('admin.pages_edit', $data);
        }
    }
}
