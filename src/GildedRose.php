<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const AGED = 'Aged Brie';

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case self::SULFURAS:

                    break;
                case self::BACKSTAGE:
        
                    $item->decreaseQuality();
                    $item->decreaseSellIn();
                    if ($item->sell_in < 0) {
                        $item->decreaseQuality();
                    }

                    $item->increaseQuality();
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item->increaseQuality();
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item->increaseQuality();
                        }
                    }
                    if ($item->sell_in < 0) {
                        if ($item->quality < 50) {
                            $item->increaseQuality();
                        }
                    }
                    break;
                case self::AGED:
                    if ($item->quality < 50) {
                        $item->increaseQuality();
                    }
                    $item->decreaseSellIn();
        
                    if ($item->sell_in < 0) {
                        if ($item->quality < 50) {
                            $item->increaseQuality();
                        }
                    }
                
                    break;
                default:
                    $item->decreaseQuality();
                    $item->decreaseSellIn();
                    if ($item->sell_in < 0) {
                        $item->decreaseQuality();
                    }
                    break;
            }
        }
    }
}
