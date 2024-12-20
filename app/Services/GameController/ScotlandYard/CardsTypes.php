<?php

namespace App\Services\GameController\ScotlandYard;

/**
 * Class CardsTypes.
 */
class CardsTypes
{
    const TAXI = 1; 
    const BUS = 2;
    const METRO = 3;

    const TYPE_DESCRIPTIONS = [
        self::TAXI  => 'Taxi',
        self::BUS   => 'Bus',
        self::METRO => 'Metro'
    ];

    const TYPE_ICON = [
        self::TAXI  => 'bi bi-taxi-front',
        self::BUS   => 'bi bi-bus-front',
        self::METRO => 'bi bi-train-front',
    ];

    const TYPE_BG_COLOR = [
        self::TAXI  => 'warning',
        self::BUS   => 'success',
        self::METRO => 'danger',
    ];

    private $cardType;

    private function __construct($cardType)
    {
        $this->cardType = $cardType;
    }

    public static function setType($type)
    {
        return new self($type);
    }

    public static function taxi()
    {
        return new self(self::TAXI);
    }

    public function getCardDescription(){
        return self::TYPE_DESCRIPTIONS[$this->cardType];
    }

    public function getCardIcon(){
        return self::TYPE_ICON[$this->cardType];
    }

    public function getCardBgColor(){
        return self::TYPE_BG_COLOR[$this->cardType];
    }


}
