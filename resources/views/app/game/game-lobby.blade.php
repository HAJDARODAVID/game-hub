@extends('layouts.main-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <x-cards.basic-card>
                <x-slot:title>game lobby</x-slot:title>
                <x-slot:secTitle>{{ $gameInst->getGame->title }} #{{ $gameInst->id }}</x-slot:title>
                <x-slot:headerOptions>
                    <div class="d-flex gap-1">
                        @livewire('games.disable-game-instance-btn', ['gameInst' => $gameInst->id, 'options' => 'goHome'], key($gameInst . now()))
                        <x-v-divider />
                        @livewire('games.start-game-instance-btn', ['gameInst' => $gameInst->id], key($gameInst . now()))
                    </div>
                </x-slot:headerOptions>
                <div class="row">
                    <div class="col-md">
                        <x-cards.basic-card classAtt='mb-2'>
                            <x-slot:title>players</x-slot:title>
                        </x-cards.basic-card>
                    </div>
                </div>
            </x-cards.basic-card>
        </div>
    </div>
</div>
@endsection
