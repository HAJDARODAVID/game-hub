<div class="d-flex justify-content-between align-items-center">
    <div class="">
        <b>Game by: {{ $instance->getPlayer->name }}</b> <br>
        <span class="text-danger"><i class="bi bi-people"></i>: 00 | {{ $instance->created_at }}</span>
    </div>
    <div class=""><button class="btn btn-success btn-sm" style="border-radius: 0px !important;">Join</button></div>
</div>