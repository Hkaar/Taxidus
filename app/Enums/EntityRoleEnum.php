<?php

namespace App\Enums;

enum EntityRoleEnum: int
{
    case Default = 1;
    case Uncommon = 2;
    case Rare = 3;
    case Boss = 4;
    case StoryBoss = 5;
}
