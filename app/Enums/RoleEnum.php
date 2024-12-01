<?php

namespace App\Enums;

enum RoleEnum: int
{
    case Member = 1;
    case Moderator = 2;
    case Operator = 3;
    case Admin = 4;
}
