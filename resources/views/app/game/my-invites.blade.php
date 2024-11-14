@extends('layouts.main-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <x-cards.basic-card>
                <x-slot:title>my invites</x-slot:title>
                @livewire('games.my-invites-list')
            </x-cards.basic-card>
        </div>
    </div>
</div>
@endsection
