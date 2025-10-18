<?php

/*
This file is part of SeAT

Copyright (C) 2015 to 2020  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace H4zz4rdDev\Seat\SeatBuyback\Helpers;

use H4zz4rdDev\Seat\SeatBuyback\Models\BuybackPriceData;
use Illuminate\Support\Facades\DB;
use H4zz4rdDev\Seat\SeatBuyback\Models\BuybackMarketConfig;

/**
 * Class PriceCalculationHelper
 *
 * @package H4zz4rdDev\Seat\SeatBuyback\Helpers
 */
class PriceCalculationHelper {

    /**
     * @return float|int|null
     */
    public static function calculateItemPrice(int $typeId, int $quantity, BuybackPriceData $buybackPriceData) : ?float {

        $marketConfig = BuybackMarketConfig::where('typeId', $typeId)->first();

        $baseline_settings = setting('seat_buyback_baseline_price_settings', true);
        $baseline_enabled = $baseline_settings['enable-baseline-price'] ?? false;
        $baseline_market_operation = $baseline_settings['market-operation'] ?? 0;
        $baseline_percentage = $baseline_settings['market-percentage'] ?? 1;

        if($marketConfig == null && !$baseline_enabled) {
            return null;
        }

        if($marketConfig !== null && $marketConfig->price > 0) {
            return $quantity * $marketConfig->price;
        }

        $priceSum = $quantity * $buybackPriceData->getItemPrice();

        $pricePercentage = $priceSum * ($marketConfig!=null ? $marketConfig->percentage : $baseline_percentage) / 100;

        return ($marketConfig!=null ? $marketConfig->marketOperationType: $baseline_market_operation) ? $priceSum + $pricePercentage : $priceSum - $pricePercentage;
    }

    /**
     * @return float|null
     */
    public static function calculateFinalPrice(array $itemData) : ?float {

        $finalPrice = 0;

        foreach ($itemData as $item) {
            $finalPrice += $item["typeSum"];
        }

        return $finalPrice;

    }
}