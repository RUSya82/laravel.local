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
            <form action="{{route('admin.addNews')}}" class="form-group col-5 mb-5" method="post">
                @csrf
                <h4>Добавьте свою новость</h4>
                <div class="form-group ">
                    <label for="title">Тема новости</label>
                    @if ($errors->has('title'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('title') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input class="form-control" type="text" id="title" name="title" required value="{{$news->title}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория новости</label>
                    @if ($errors->has('category_id'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('category_id') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach($categories as $item)
                            <option  @if (($item->id) == ($news->category_id)) selected @endif value="{{$item->id}}">
                                {{$item->description}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label for="content">Текст новости</label>
                    @if ($errors->has('content'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('content') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <textarea type="text" name="content" class="form-control" id="content" rows='5' required>{{$news->content}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить новость" id="addNews">
                </div>
            </form>
        </div>

    </div>

@endsection
