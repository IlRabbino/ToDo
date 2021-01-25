@extends('layout')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%;">
            <h2 class="display-2 text-white">Todo App</h2>
            <h3 class="text-white pt-5">What next? Add something to your list!</h3>
            <form action="{{route('todo.store')}}" method="post">
                @csrf
                <div class="input-group mb-3 w-100">
                    <input class="form-control form-control-lg" type="text" name="title" placeholder="Type here... " aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">Add to the list</button>
                    </div>
                </div>
            </form>

            <h3 class="text-white pt-3">My Todo List:</h3>

            <div class="bg-white w-100">
                @foreach ($todos as $todo)
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="p-3">
                            @if ($todo->completed==0)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                            @endif
                            {{$todo->title}}
                        </div>

                        <div class="mr-4 d-flex align-items-center">
                            @if ($todo->completed == 0)
                                <form action="{{route('todo.update', $todo)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="completed" value="1" hidden>
                                    <button type="submit" class="btn btn-success">Mark as Completed</button>
                                </form>
                            @else
                                <form action="{{route('todo.update', $todo)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="completed" value="0" hidden>
                                    <button type="submit" class="btn btn-warning">Mark as Uncompleted</button>
                                </form>
                            @endif
                            <a href="{{route('todo.edit', $todo)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>
                            <form action="{{route('todo.destroy', $todo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-transparent border-0" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection