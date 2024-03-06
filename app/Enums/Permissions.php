<?php

namespace App\Enums;


enum Permissions: string {

    use \App\Trait\EnumToArray;

    case EDIT_ARTICLES = 'edit articles';
    case UPDATE_ARTICLES = 'update articles';
    case DELETE_ARTICLES = 'delete articles';
    case READ_USERS = 'read users';
    case UPDATE_USERS = 'update users';
    case DELETE_USERS = 'delete users';
    case CREATE_USERS = 'create users';
    case PHONE_CONFIRM_USERS = 'phone confirm users';
    case PHONE_EMAIL_USERS = 'phone email users';
    case BANNED_USERS = 'banned users';
    case UNBANNED_USERS = 'unbanned users';
}