<div>
    @php $cardInfo = CardsTypes::setType($type) @endphp
    <button class="btn btn-{{ $cardInfo->getCardBgColor() }}" wire:click='test()'>
        <i class="{{ $cardInfo->getCardIcon() }} fs-2 text-dark"></i><span class='fs-4'> | 666</span>
    </button>
</div>
