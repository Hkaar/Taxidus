<?php

namespace App\Enums;

enum ObjectTypeEnum: int
{
    case Default = 1;
    case Item = 2;
    case Weapon = 3;
    case Tool = 4;
    case Consummble = 5;
    case Story = 6;
}
