<div class="parent p-2" style="{{ $parentStyle }} {{ $bgStyle }}">
    <div class="central-area" style="{{ $centralAreaStyle }} border-style: solid;}">7</div>
    @foreach ($fieldGridStyle as $fieldName => $fieldGrid)
        <div class="{{ $fieldName }}" style="{{ $fieldGrid }} {{ $fieldStyle->getFieldStyle($fieldName) }}">{{ $fieldName }}</div>
    @endforeach
    
</div>