@extends('client.layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}" class="h2">
        <i class="bi bi-arrow-left"></i>
    </a>
    @include('client.partials.post-card')
@endsection