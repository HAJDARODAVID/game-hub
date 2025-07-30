@extends('layouts.game-board-app')

@section('content')

<div class="p-0">
    {{-- <x-game-boards.templates.square-board  /> --}}
    @livewire('game-board.controller')
</div>

@endsection