@extends('layout')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%;">
            <h2 class="display-2 text-white">Todo App - Edit</h2>
            <h3 class="text-white pt-5">Edit your todos</h3>
            <form action="{{route('todo.update', $todo->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group mb-3 w-100">
                    <input class="form-control form-control-lg" type="text" name="title" value="{{$todo->title}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection