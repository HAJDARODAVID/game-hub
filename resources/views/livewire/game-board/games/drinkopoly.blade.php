<div>
    @php $unserializedGameBoardStyle = unserialize($gameBoardStyle); @endphp
    <x-game-boards.templates.square-board :squareBoardStyle="$unserializedGameBoardStyle" :fieldComponent="$fieldCompName">
        {{-- CENTRAL AREA --}}
        <x-slot name="centralArea">
            <div class="row p-3 px-4 gap-3" style="height: 100%;">
                <div class="col" ></div>
                <div class="col-5">
                    <div class="d-flex justify-content-center pt-5">
                        <h1 class="display-1" style="font-weight: 900;"><b>DRINKOPOLY</b></h1>
                    </div>
                    
                </div>
                <div class="col"></div>
            </div>
        </x-slot>       
    </x-game-boards.templates.square-board>
</div>
