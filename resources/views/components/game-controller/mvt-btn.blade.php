<div>
    @php $cardInfo = CardsTypes::setType($type) @endphp
    <button class="btn btn-{{ $cardInfo->getCardBgColor() }} " 
        wire:click='@isset($wireClick['method']){{ $wireClick['method'] }}@endisset @isset($wireClick['params']){{ __('(')}}{{ json_encode($wireClick['params']) }}{{ __(')')}}@endisset' style="width: 102.41px">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <i class="{{ $cardInfo->getCardIcon() }} fs-2 text-dark"></i>
            </div>
            <div class="">
                <span class='fs-4'> | </span>
            </div>
            <div class="">
                <span class='fs-4'> 66 </span>
            </div>
        </div>
    </button>
</div>
