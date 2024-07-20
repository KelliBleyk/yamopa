@extends('layout')

@php
    $title = 'Main';
@endphp

@section('content')
    @forelse ($movies as $movie)
        <x-card :class="'movie'">
            <x-movie :movie="$movie" />
        </x-card>
    @empty
        <x-card>No movies</x-card>
    @endforelse
@endsection
