<div class="d-flex justify-content-between align-items-center">
    <div class="">
        <b>By: {{ $instance->getPlayer->name }}</b> <br>
        <span class="text-danger"><i class="bi bi-people"></i>: 00 | {{ date('d-m H:i',strtotime($instance->created_at)) }}</span>
    </div>
    <div class="d-flex gap-2">
        @if($instance->created_by == Auth::user()->id)
            @livewire('games.disable-game-instance-btn', ['gameInst' => $instance->id], key($instance->id . now()))
        @endif
        <button class="btn btn-success btn-sm" style="border-radius: 0px !important;">Join</button>
    </div>
</div>