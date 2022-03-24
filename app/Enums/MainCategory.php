<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MainCategory extends Enum
{
    const MensWear =   0;
    const WomensWear =   1;
    const ELECTRONICS = 2;


    public static function getDescription($value): string
    {
        if ($value === self::MensWear) 
        {
            return "MEN'S WEAR";
        }else if($value === self::MensWear){
            return "WOMEN'S WEAR";
        }

        return parent::getDescription($value);
    }
}
