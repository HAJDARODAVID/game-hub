<div class="d-flex @if ($msg->msg_by == Auth::user()->id) justify-content-end @else justify-content-start @endif)  mt-3 p-0" style="border-style: none !important">
    <div class="card" style="border-width: 0px !important;">
        {{-- style="border-radius: 0px !important;" --}}
        <div class="card-body text-white py-2" style="@if ($msg->msg_by == Auth::user()->id) background-color: rgb(46, 49, 61) @else background-color: rgb(28, 31, 46) @endif">
            <div class="">
                <div class="">{{ $msg->getUser->name }}</div>
                <hr class="p-0 m-0 my-1">
                <div class="">{{ $msg->message }}</div>
                <hr class="p-0 m-0 my-1">
                <div class="d-flex justify-content-end" style="font-size: 10px;">{{ $msg->created_at }}</div>
            </div>
        </div>
    </div>
</div>