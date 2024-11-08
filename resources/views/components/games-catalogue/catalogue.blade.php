<div class="card bg-dark" style="border-radius: 0px !important;">
    <div class="card-header text-white" style="background-color: rgb(27, 30, 33)">
        {{ strtoupper('Games catalogue') }}
    </div>

    <div class="card-body text-white">
        @for ($i = 1; $i <= $rows; $i++)
            <div class="row">
                @for ($g = 1; $g <= $perRow; $g++)
                    <div class="col-md">
                        @isset($games[$perRow*$i - $perRow +$g]) 
                        <x-games-catalogue.game-card :title='$games[$perRow*$i - $perRow +$g]' />
                        @endisset
                    </div>
                @endfor
            </div>
            
        @endfor
    </div>
</div>