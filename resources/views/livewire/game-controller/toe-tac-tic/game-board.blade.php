<div>
    <div style="{{ implode('; ', $containerStyle) }}; width: 100%">
        @foreach ($fields as $fieldName => $fieldInfo)
            <div class="d-flex justify-content-center align-items-center" style="{{ implode('; ', $fieldInfo['style']) }}">
                <button class="btn btn-success" style="border-style: none !important; border-radius: 0px !important; width: 100%; height:100%; background-color: rgb(33,37,41)" wire:click='movement("{{ $fieldName }}")' wire:target="movement" wire:loading.attr="disabled">
                    @isset($filledFields[$fieldName])
                        <i class="bi bi-x-lg fs-1"></i>
                    @endisset
                </button>

            </div>
        @endforeach
    </div>
</div>
