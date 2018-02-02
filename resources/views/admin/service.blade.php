@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($service)

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Текст</th>
                    <th>Дата создания</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach($service as $k => $item)

                    <tr>

                        <td>{{ $item->id }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{ $item->text }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            {!! Form::open(['url'=>route('serviceEdit',['service'=>$item->id]), 'class'=>'form-horizontal','method' => 'GET']) !!}

                            {!! Form::button('Редактировать',['class'=>'btn btn-info','type'=>'submit']) !!}

                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['url'=>route('serviceEdit',['service'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                            {{ method_field('delete') }}
                            {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        @endif
        <div class="portfolio">

            <div id="filters" class="sixteen columns">
                <ul style="padding:0px 0px 0px 0px">
                    <li><a  href="{{route('serviceAdd')}}">
                            <h5>Новый сервис</h5>
                        </a>
                    </li>
                    <li><a  href="{{route('main')}}">
                            <h5>Перейти на сайт</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection