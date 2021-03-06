<?php

namespace App\Filament\Roles;

use Filament\Roles\Role;

class Manager extends Role
{
    public static function authorization()
    {
        return [
            Roles\Manager::allow(),
        ];
    }
}
