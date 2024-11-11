<div class="card bg-dark {{ $classAtt }}" style="border-radius: 0px !important;">
    @if($header)
        <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: rgb(27, 30, 33)">
            <div>
                {{ strtoupper($title) }}
            </div>
            <div>
                {{ $headerOptions }}
            </div>
        </div>
    @endif
    <div class="card-body text-white">
        {{ $slot }}
    </div>
</div>