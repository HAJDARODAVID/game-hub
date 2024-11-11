@extends('layouts.main-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <x-cards.basic-card>
                <x-slot:title>{{ $gameInfo->getTitle() }}</x-slot:title>
                <x-slot:headerOptions>
                    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;"><i class="bi bi-plus-circle"></i></button>
                </x-slot:headerOptions>
                <div class="row">
                    <div class="col-md">
                        <x-cards.basic-card classAtt='mb-2'> 
                            <x-slot:title>My game stats</x-slot:title>
                            <div class="row">
                                <div class="col">
                                    Games played = 0 <br>
                                    Games won = 0 <br>
                                    Games lost = 0 <br>
                                </div>
                                <div class="col display-1">
                                    0.00%
                                </div>
                            </div>
                        </x-cards.basic-card>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <x-cards.basic-card classAtt='mb-2'> 
                            <x-slot:title>open games</x-slot:title>
                            <div class="card bg-dark" style="border-radius: 0px !important;">
                                <div class="card-body text-white py-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <b>Game by: david69</b> <br>
                                            <span class="text-danger">Players in game: 12</span>
                                        </div><br>
                                        <div class=""><button class="btn btn-success btn-sm" style="border-radius: 0px !important;">Join</button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark" style="border-radius: 0px !important;">
                                <div class="card-body text-white py-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <b>Game by: david69</b> <br>
                                            <span class="text-danger">Players in game: 12</span>
                                        </div><br>
                                        <div class=""><button class="btn btn-success btn-sm" style="border-radius: 0px !important;">Join</button></div>
                                    </div>
                                </div>
                            </div>
                            <x-cards.item-card noItems=TRUE />
                        </x-cards.basic-card>
                    </div>
                </div>
            </x-cards.basic-card>
        </div>
    </div>
</div>
@endsection
