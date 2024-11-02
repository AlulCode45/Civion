<?php

namespace App\Enums;

enum RiskLevelEnum: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';
    case NonPriority = 'non-priority';
}