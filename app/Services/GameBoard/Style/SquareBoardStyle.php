<?php

namespace App\Services\GameBoard\Style;

class SquareBoardStyle
{
    private $defaultGridCount = 6;
    private $defaultGap       = 8;
    private $defaultHeight    = 91;

    private $gridColumns = NULL;
    private $gridRows = NULL;

    /**
     * CSS for the parent. CSS grid
     */
    private $parentStyleAttributes = [
        'display'               => 'grid',
        'grid-template-columns' => 'repeat(6, 1fr)',
        'grid-template-rows'    => 'repeat(6, 1fr)',
        'gap'                   => '8px',
        'height'                => '98vh',
        'align-items'           => 'stretch',
        'justify-items'         => 'stretch',
    ];

    private $centralAreaAttributes = [
        'grid-column'       => 'span 5 / span 5',
        'grid-row'          => 'span 4 / span 4',
        'grid-column-start' => 2,
        'grid-row-start'    => 2,
    ];

    private $bgType  = NULL;
    private $color   = NULL;
    private $colorII = NULL;
    private $bgAngel = 90;

    private $squareBoardFieldStyle = NULL;

    private function __construct()
    {
        $this->setDefaults();
    }

    public static function init()
    {
        return new self();
    }

    /**
     * This will set up on construct the default values on the css attributes.
     */
    private function setDefaults(){
        $this->setGridTemplateColumns($this->defaultGridCount)
            ->setGridTemplateRows($this->defaultGridCount)
            ->setGap($this->defaultGap)
            ->setHeight($this->defaultHeight);
        return $this;
    }

    /**
     * This will set the span of the column on the central area
     */
    private function setCentralAreaSpanColumn(){
        $span = $this->gridColumns - 2;
        $this->centralAreaAttributes['grid-column'] = 'span '.$span.' / span '. $span;
        return $this;
    }

    /**
     * This will set the span of the row on the central area
     */
    private function setCentralAreaSpanRow(){
        $span = $this->gridRows - 2;
        $this->centralAreaAttributes['grid-row'] = 'span '.$span.' / span '. $span;
        return $this;
    }

    /**
     * Set the gird columns count.
     */
    public function setGridTemplateColumns($count){
        $this->parentStyleAttributes['grid-template-columns'] = 'repeat('.$count.', 1fr)';
        $this->gridColumns = $count;
        $this->setCentralAreaSpanColumn();
        return $this;
    }

    /**
     * Set the gird rows count.
     */
    public function setGridTemplateRows($count){
        $this->parentStyleAttributes['grid-template-rows'] = 'repeat('.$count.', 1fr)';
        $this->gridRows = $count;
        $this->setCentralAreaSpanRow();
        return $this;
    }

    /**
     * Set the gird gap.
     */
    public function setGap($gap){
        $this->parentStyleAttributes['gap'] = $gap.'px';
        return $this;
    }

    /**
     * Set the gird height.
     */
    public function setHeight($height){
        $this->parentStyleAttributes['height'] = $height.'vh';
        return $this;
    }

    /**
     * Get the string for the parent div. 
     */
    public function getParentStyle(){
        $string = "";
        foreach($this->parentStyleAttributes as $key => $att){
            $string .= $key .': '. $att .'; ';
        }
        return $string;
    }
    
    /**
     * Get the string for the central area div. 
     */
    public function getCentralAreaStyle(){
        $string = "";
        foreach($this->centralAreaAttributes as $key => $att){
            $string .= $key .': '. $att .'; ';
        }
        return $string;
    } 

    /**
     * Get the style for game board field divs. 
     */
    public function getFieldGridStyle(){
        $divCount = 1;
        $style = [];

        for ($x=1; $x <= $this->gridColumns; $x++) { 
            $style['div'.$divCount] = 'grid-column-start: '.$x.'; grid-row-start: 1;';
            $divCount++;
        }
        for ($x=2; $x <= $this->gridRows-1; $x++) { 
            $style['div'.$divCount] = 'grid-column-start: '.$this->gridColumns.'; grid-row-start: '.$x.';';
            $divCount++;
        }
        for ($x=$this->gridColumns; $x >= 1; $x--) {
            $style['div'.$divCount] = 'grid-column-start: '.$x.'; grid-row-start: '.$this->gridRows.';';
            $divCount++;
        }
        for ($x=$this->gridRows-1; $x >= 2; $x--) {
            $style['div'.$divCount] = 'grid-column-start: 1; grid-row-start: '.$x.';';
            $divCount++;
        }
        return $style;
    } 

    /**
     * This will set the bg flag to radial
     */
    public function setBgTypeAsRadial(){
        $this->bgType = 'radial';
        return $this;
    }  

    /**
     * This will set the bg flag to linear
     */
    public function setBgTypeAsLinear(){
        $this->bgType = 'linear';
        return $this;
    }  

    /**
     * Set the bg color
     */
    public function setBgColor($hex){
        $this->color = $hex;
        return $this;
    }

    /**
     * Set the bg color
     */
    public function setBgColorII($hex){
        $this->colorII = $hex;
        return $this;
    }

    /**
     * Set the bg angel
     */
    public function setBgAngel($angel){
        $this->bgAngel = $angel;
        return $this;
    }

    /**
     * This will return the CSS for the bg
     */
    public function getBgStyle(){
        switch ($this->bgType) {
            case 'radial':
                return 'background: '.$this->color.'; background: radial-gradient(circle, '.$this->color.' 0%, '.$this->colorII.' 100%);';
                break;
            case 'linear':
                return 'background: '.$this->color.'; background: linear-gradient('.$this->bgAngel.'deg, '.$this->color.' 0%, '.$this->colorII.' 100%);';
                break;
        }
        return NULL;
    }

    public function setFieldStyles(SquareBoardFieldStyle $squareBoardFieldStyle){
        $this->squareBoardFieldStyle = $squareBoardFieldStyle;
        return $this;
    }

    public function getFieldStyles(){
        return $this->squareBoardFieldStyle;
    }
}