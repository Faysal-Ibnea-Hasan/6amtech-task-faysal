<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function labels(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }


}
