<div>
    <x-cards.basic-card classAtt='mb-2'> 
        <x-slot:title>open games</x-slot:title>
        @if ($instances->isEmpty())
            <x-cards.item-card :noItems=TRUE />   
        @else
            @foreach ($instances as $inst)
                <x-cards.item-card>
                    <x-cards.open-game-info :instance=$inst />
                </x-cards.item-card>   
            @endforeach
        @endif    
    </x-cards.basic-card>
</div>
