@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="container mt-5 justify-content-center">
        <div class="row justify-content-center">
            <form action="{{route('admin.addNews')}}" class="form-group col-5 mb-5" method="post">
                @csrf
                <h4>Добавьте свою новость</h4>
                <div class="form-group ">
                    <label for="newsTitle">Тема новости</label>
                    <input class="form-control" type="text" id="newsTitle" name="newsTitle" required>
                </div>
                <div class="form-group">
                    <label for="newsCategory">Категория новости</label>
                    <select name="category" class="form-control" id="newsCategory">
                        @foreach($categories as $item)
                            <option value="{{$item['id']}}">{{$item['description']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label for="newDescription">Текст новости</label>
                    <textarea type="text" name="newContent" class="form-control" id="newDescription" rows='5' required>
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить новость" id="addNews">
                </div>
            </form>
        </div>

    </div>

@endsection
