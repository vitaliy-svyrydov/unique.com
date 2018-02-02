<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use DB;
use Mail;

class IndexController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('post')){
            $messages =[
                'required' => "Поле :attribute обязательное к заполнинию",
                'email' => "Поле :attribute должно быть email",
            ];
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required',
            ], $messages);

            $data = $request->all();

            $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data) {
                $mail_admin = 'svyrydov.vitaliy@gmail.com';

                $message->from($data['email'],$data['name']);
                $message->to($mail_admin)->subject('Question');
            });
            if($result){
                return redirect()->route('main')->with('status', 'Сообщение отправлено');
            }
        }


        $pages = Page::get(array('name', 'alias','text', 'images'));
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::get(array('name', 'text', 'icon'));
        $peoples = People::get(array('name', 'position', 'text', 'images'));
        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];
        foreach ($pages as $page){
            $item = ['title' => $page->name, 'alias' => $page->alias];
            array_push($menu, $item);
        }

        $item = ['title' =>'Services', 'alias' => 'service'];
        array_push($menu, $item);
        $item = ['title' =>'Portfolio', 'alias' => 'Portfolio'];
        array_push($menu, $item);
        $item = ['title' =>'Team', 'alias' => 'team'];
        array_push($menu, $item);
        $item = ['title' =>'Contact', 'alias' => 'contact'];
        array_push($menu, $item);


        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'portfolios' => $portfolios,
            'services' => $services,
            'peoples' => $peoples,
            'tags' => $tags,
        ]);
    }
}
