<div class="card bg-dark mb-3 rounded" style="height: 140px; cursor: pointer;" onclick="location.href='{{ route('game', $gameInfo['name']) }}'">
    <div class="card-header text-white" style="background-color: rgb(36, 40, 44)">
        {{ strtoupper($gameInfo['title']) }}
    </div>

    <div class="card-body p-0 m-0">
        <div class="h-100 w-100" style="background-image: url('{{ url('img/games/catalogue/'.$gameInfo['cover'].'.png') }}');background-size: contain; background-repeat: no-repeat; background-size: 100% 100%; background-color: rgb(46, 52, 58)">
        </div>
    </div>
</div>