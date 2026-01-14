<?php

namespace App\Enum;

enum Priority: string
{
    case low = 'Basse';
    case medium = 'Moyenne';
    case high = 'Haute';
}