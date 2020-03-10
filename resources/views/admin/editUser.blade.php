@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('nav')
    @include('menu.admin', ['categories'=>$categories])
@endsection
@section('content')

    <div class="container mt-5 justify-content-center">
        <div class="row justify-content-center">
            <form action="{{route('admin.saveUser', $user)}}" class="form-group col-5 mb-5" method="post">
                @csrf
                <h4>Редактирование пользователя</h4>
                <div class="form-group ">
                    <label for="name">Имя</label>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input class="form-control" type="text" id="name" name="name" required value="{{$user->name}}">
                </div>
                <div class="form-group ">
                    <label for="email">E-mail</label>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('email') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input class="form-control" type="text" id="email" name="email" required value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="role_id">Категория пользователя</label>
                    @if ($errors->has('role_id'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('role_id') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <select name="role_id" class="form-control" id="category_id">
                        @foreach($roles as $item)
                            <option value="{{$item->id}}" @if ($user->role_id == $item->id) selected @endif>{{$item->description}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Изменить данные" id="change_user">
                </div>
            </form>
        </div>
    </div>

@endsection


