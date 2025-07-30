<?php

namespace App\Services\GameController\ToeTacTic;

trait FieldStyleAttTrait
{
    private $LINE_WEIGHT = 4;
    private $LINE_TYPE = 'solid';

    public $containerStyle = [
        'display: grid',
        'grid-template-columns: repeat(4, 1fr)',
        'grid-template-rows: repeat(4, 1fr)',
        'grid-column-gap: 0px',
        'grid-row-gap: 0px',
    ];

    public $fields = [
        'field11' => [
            'style' => ['grid-area: 1 / 1 / 2 / 2', 'border-right: 4px solid'],
        ],
        'field12' => [
            'style' => ['grid-area: 1 / 2 / 2 / 3'],
        ],
        'field13' => [
            'style' => ['grid-area: 1 / 3 / 2 / 4'],
        ],
        'field14' => [
            'style' => ['grid-area: 1 / 4 / 2 / 5'],
        ],
        'field21' => [
            'style' => ['grid-area: 2 / 1 / 3 / 2'],
        ],
        'field22' => [
            'style' => ['grid-area: 2 / 2 / 3 / 3'],
        ],
        'field23' => [
            'style' => ['grid-area: 2 / 3 / 3 / 4'],
        ],
        'field24' => [
            'style' => ['grid-area: 2 / 4 / 3 / 5'],
        ],
        'field31' => [
            'style' => ['grid-area: 3 / 1 / 4 / 2'],
        ],
        'field32' => [
            'style' => ['grid-area: 3 / 2 / 4 / 3'],
        ],
        'field33' => [
            'style' => ['grid-area: 3 / 3 / 4 / 4'],
        ],
        'field34' => [
            'style' => ['grid-area: 3 / 4 / 4 / 5'],
        ],
        'field41' => [
            'style' => ['grid-area: 4 / 1 / 5 / 2'],
        ],
        'field42' => [
            'style' => ['grid-area: 4 / 2 / 5 / 3'],
        ],
        'field43' => [
            'style' => ['grid-area: 4 / 3 / 5 / 4'],
        ],
        'field44' => [
            'style' => ['grid-area: 4 / 4 / 5 / 5'],
        ],
    ];
    public $filedHeightAtt = 67;


    private $lr = 'border-right: ' . $this->LINE_WEIGHT . 'px ' . $this->LINE_TYPE;
    private $ll = 'border-left: 4px solid';
}
