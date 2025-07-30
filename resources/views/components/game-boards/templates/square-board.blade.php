<div class="parent p-2" style="{{ $parentStyle }} {{ $bgStyle }}">
    <div class="central-area" style="{{ $centralAreaStyle }}">{{ $centralArea }}</div>
    @foreach ($fieldGridStyle as $fieldName => $fieldGrid)
        <div class="{{ $fieldName }}" style="{{ $fieldGrid }} {{ $fieldStyle->getFieldStyle($fieldName) }}">
            @if($showFieldName) {{ $fieldName }} @endif
            
            @if($fieldComponentExists) @livewire("game-board.games.$fieldComponent", ['fieldName' => $fieldName], key($fieldName)) @endif
        </div>
    @endforeach
</div>