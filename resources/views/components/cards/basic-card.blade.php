<div class="card bg-dark {{ $classAtt }}" style="border-radius: 0px !important;">
    @if($header)
        <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: rgb(27, 30, 33)">
            <div class="d-flex gap-2 align-items-center">
                @if($headerIcon) {{ $headerIcon }} @endif
                <div>
                    {{ strtoupper($title) }}<br>
                    @if ($secTitle)
                        {{ strtoupper($secTitle) }}
                    @endif    
                </div>
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