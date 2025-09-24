<?php

namespace App\Services\GameController\ToeTacTic;

class GameBoardStyle
{
    const LINE_WEIGHT = 2;
    const LINE_TYPE = 'solid';

    const CELL_HEIGHT = 67;

    private $containerStyle = [
        'display: grid',
        'grid-template-columns: repeat(4, 1fr)',
        'grid-template-rows: repeat(4, 1fr)',
        'grid-column-gap: 0px',
        'grid-row-gap: 0px',
    ];

    private $fields;

    public function __construct()
    {
        $this->createGridLayout()
            ->setCellsHeight()
            ->setCellsBorders();
    }

    public static function init()
    {
        return new self();
    }

    public function getContainerStyle()
    {
        return $this->containerStyle;
    }

    public function getFieldsStyle()
    {
        return $this->fields;
    }

    private function createGridLayout()
    {
        $rows = 4;
        $columns = 4;
        $array = [];
        // Loop through each row
        for ($row = 1; $row <= $rows; $row++) {
            // Loop through each column
            for ($column = 1; $column <= $columns; $column++) {
                // Calculate the grid lines for the current cell
                // grid-row-start: current row line
                // grid-column-start: current column line
                // grid-row-end: current row line + 1 (to span one row track)
                // grid-column-end: current column line + 1 (to span one column track)

                $gridRowStart = $row;
                $gridColumnStart = $column;
                $gridRowEnd = $row + 1;
                $gridColumnEnd = $column + 1;

                // Generate the CSS string for grid-area
                $gridAreaValue = "grid-area: {$gridRowStart} / {$gridColumnStart} / {$gridRowEnd} / {$gridColumnEnd}";

                // You would typically apply this to a specific grid item, e.g., .item-rowX-colY
                $this->fields['field' . $row . $column]['style'][] = $gridAreaValue;
            }
        }
        return $this;
    }

    private function setCellsHeight()
    {
        foreach ($this->fields as $fieldName => $field) {
            $this->fields[$fieldName]['style'][] = 'height: ' . self::CELL_HEIGHT . 'px';
        }
        return $this;
    }

    private function setCellsBorders()
    {
        /**Set the rule where not to put boarders */
        $rules = [
            'field11' => ['t', 'l'],
            'field12' => ['t'],
            'field13' => ['t'],
            'field14' => ['t', 'r'],
            'field21' => ['l'],
            'field31' => ['l'],
            'field41' => ['l', 'b'],
            'field24' => ['r'],
            'field34' => ['r'],
            'field44' => ['r', 'b'],
            'field42' => ['b'],
            'field43' => ['b'],
        ];
        $borderStylesAlias = [
            't' => 'border-top',
            'b' => 'border-bottom',
            'r' => 'border-right',
            'l' => 'border-left',
        ];

        foreach ($this->fields as $fieldName => $field) {
            if (key_exists($fieldName, $rules)) {
                foreach ($borderStylesAlias as $key => $styleAtt) {
                    //dd($key, $styleAtt, $rules[$fieldName]);
                    if (!in_array($key, $rules[$fieldName])) {
                        $this->fields[$fieldName]['style'][] = $styleAtt . ': ' . self::LINE_WEIGHT . 'px ' . self::LINE_TYPE;
                    }
                }
            } else {
                $this->fields[$fieldName]['style'][] = 'border: ' . self::LINE_WEIGHT . 'px ' . self::LINE_TYPE;
            }
        }
        return $this;
    }
}
