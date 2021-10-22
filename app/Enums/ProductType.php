<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductType extends Enum
{
    const normal =   0;
    const unlimited_stock =   1;
    const virtual_composition = 2;
    const composition_with_stock = 3;
}
