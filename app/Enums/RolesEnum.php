<?php

namespace App\Enums;

enum RolesEnum: string
{
    case Member = 'member';
    case Goverment = 'goverment';
    case Admin = 'admin';
}