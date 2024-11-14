<div class="modal pt-5 @if ($size) modal-{{ $size }} @endif" style="display: @if($show) block @endif; {{ $blur }};">
    <div class="modal-dialog @if ($position) {{ $position }} @endif" role="document" style=" @if($fullScreen) height: 80vh !important @endif">
        <div class="modal-content bg-dark" style="border-radius: 0px !important; @if($fullScreen) max-height: none !important; min-height: 100% !important  @endif">
            @if ($alert)
                <div class="alert @if ($aType) alert-{{ $aType }} @endif mb-0" role="alert">
                    <h4 class="alert-heading">{{ $mainTitle }}</h4>
                    <p>{{ $slot }}</p>
                    <hr>
                    {{ $footerItems }}
                </div>
            @else
                @if ($header)
                    <div class="modal-header text-white d-flex justify-content-between align-items-center py-0 py-2" style="border-style:none; border-radius: 0px !important; background-color: rgb(27, 30, 33)">
                            <div>
                                <h5 class="modal-title">
                                    {{ $mainTitle }}
                                </h5>
                                @if ($secTitle)
                                    <p class="mb-0">{{ $secTitle }}</p>  
                                @endif
                            </div>
                            <div>
                                {{ $headerBtn }}
                            </div>
                    </div>
                @endif
                
                @if ($body)
                    <div class="modal-body text-white">
                        {{ $slot }}
                    </div>
                @endif

                @if ($footer)
                    <div class="modal-footer" style="border-style:none; border-radius: 0px !important; background-color: rgb(27, 30, 33)">
                        {{ $footerItems }}
                    </div>
                @endif
            @endif            
        </div>
    </div>
</div>