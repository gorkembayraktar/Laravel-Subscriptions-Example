<?php

namespace App\Enums;

enum Roles: string {
    use \App\Trait\EnumToArray;

    case SUPERVISOR = 'supervisor';
    case ADMIN = 'admin';
    case WRITER = 'writer';
}