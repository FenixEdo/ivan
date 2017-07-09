@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <nav class>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <form action="/messages/create" method="post">
            <div class="form-group @if($errors->has('message')) has-danger @endif">
                {{ csrf_field() }}
                <input type="text" name="message" class="form-control" placeholder="Que estas pensando?">
                @if ($errors->has('message'))
                    @foreach ($errors->get('message') as $error)
                        <div class="form-control-feedback">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>

    <div class="row">
        @forelse($messages as $message)
            <div class="col-6">
                <img src="{{ $message->image }}" alt="img" class="thumbnail">
                <p class="card-text">
                    {{ $message['content'] }}
                    <a href="/messages/{{ $message->id }}">Leer mas</a>
                </p>
            </div>
        @empty
            <p>No hay mensajes destacados.</p>
        @endforelse

        @if(count($messages))
        <div class="mt-2 mx-auto">
            {{ $messages->links('pagination::bootstrap-4') }}
        </div>
        @endif

    </div>

@endsection