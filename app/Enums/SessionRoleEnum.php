<?php

namespace App\Enums;

enum SessionRoleEnum: int
{
    case Default = 1;
    case Moderator = 2;
    case Admin = 3;
}
