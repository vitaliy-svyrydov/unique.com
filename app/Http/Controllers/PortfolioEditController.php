<?php

namespace App\Http\Controllers;
use Validator;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request){

        if($request->isMethod('delete')){
            $portfolio->delete();
            return redirect()->route('portfolio')->with('status', 'Запись успешно удалена');
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
            ];
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'filter' => 'required|max:255',
            ], $massages);
            if($validator->fails()){
                return redirect()
                    ->route('portfolioEdit', ['portfolio' => $input['id']])
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
            $portfolio->fill($input);
            if($portfolio->update()){
                return redirect()->route('portfolio')->with('status', 'Запись '.$input['name'].' обновлена');
            }
        }

        $old = $portfolio->toArray();
        if(view()->exists('admin.portfolio_edit')){
            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old,
            ];
            return view('admin.portfolio_edit', $data);
        }
    }
}
