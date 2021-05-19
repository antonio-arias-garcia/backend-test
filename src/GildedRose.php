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
        
                    $item->increaseQuality();
                    if ($item->sell_in < 11) {
                        if ($item->sell_in < 50) {
                            $item->increaseQuality();
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->sell_in < 50) {
                            $item->increaseQuality();
                        }
                    }
                    
                    $item->sell_in = $item->sell_in - 1;
                    if ($item->sell_in < 0) {
                        if ($item->quality < 50) {
                            $item->increaseQuality();
                        }
                        $item->quality = 0;
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
