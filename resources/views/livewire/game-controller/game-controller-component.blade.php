<div>
    {{-- TURN STATUS --}}
   
       <div>
            @if (FALSE)
            <x-cards.basic-card :header=FALSE classAtt='mb-2'>
                <div class="row"> <div class="col-md">
                        <span class="text-danger"><i><b>It's not your turn!</b></i></span> 
                </div> </div>
            </x-cards.basic-card>
            @endif
        </div> 

    {{-- GAME OPTIONS / CONTROLLER --}}
    <div class="row"> 
        <div class="col-md">
            @foreach ($gameOptions as $option)
                @livewire("game-controller.$gameName.$option",[
                    'gameInstance' => $instanceID,
                ])
            @endforeach
        </div> 
    </div>
</div>
