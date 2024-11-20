<div 
    class="d-flex py-1 @if ($msg->msg_by == Auth::user()->id) justify-content-end @else justify-content-start @endif)  mt-3 p-0" 
    style="border-style: none !important; @if ($msg->msg_by != Auth::user()->id && is_null($msgSeen)) background-color: rgb(73, 73, 73) @endif;"
    x-data="{ isIntersecting: false }"
>
    <div 
        style="width:75%" 
        x-ref="scrollableDiv" 
        @if(is_null($msgSeen))
            x-intersect.full="isIntersecting = true; $wire.dispatch('seen-message', {msgId: {{ $msg->id }}})"
        @endif
    >
        <div class="card" style="border-width: 0px !important">
            <div class="card-body text-white py-2" style="@if ($msg->msg_by == Auth::user()->id) background-color: rgb(46, 49, 61) @else background-color: rgb(28, 31, 46) @endif">
                <div class="">
                    <div class="" style="font-size: 12px;">{{ $msg->getUser->name }}</div>
                    <hr class="p-0 m-0 my-1">
                    <div class="">{{ $msg->message }}</div>
                    <hr class="p-0 m-0 my-1">
                    <div class="d-flex justify-content-end" style="font-size: 10px;">{{ $msg->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
</div>