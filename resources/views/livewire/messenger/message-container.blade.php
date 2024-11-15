<div class="d-flex @if ($msg->msg_by == Auth::user()->id) justify-content-end @else justify-content-start @endif)  mt-3">
    <div class="card" style="width:75%">
        {{-- style="border-radius: 0px !important;" --}}
        <div class="card-body text-dark py-2">
            <div class="">
                {{ $msg->message }}
            </div>
        </div>
    </div>
</div>