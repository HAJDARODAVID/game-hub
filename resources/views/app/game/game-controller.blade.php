@extends('layouts.main-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <x-cards.basic-card>
                <x-slot:headerIcon><i class="bi bi-controller"></i></x-slot:headerIcon>
                <x-slot:title>{{ $gameInfo->getTitle() }}</x-slot:title>
                <x-slot:headerOptions>
                </x-slot:headerOptions>
                <div class="row">
                    <div class="col-md">
                        <x-cards.basic-card classAtt='mb-2' :header=FALSE> 
                            @livewire('game-controller.game-controller-component', [
                                'gameName' => $gameInfo->getName(),
                                'gameID' => $gameInfo->getGameId(),
                                'instanceID' => $gameInfo->getInstanceId(),
                            ])

                        </x-cards.basic-card>
                    </div>
                </div>
            </x-cards.basic-card>
        </div>
    </div>
</div>
@endsection
