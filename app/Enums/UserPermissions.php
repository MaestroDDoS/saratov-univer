<?php

namespace App\Enums;

use BenSampo\Enum\FlaggedEnum;

final class UserPermissions extends FlaggedEnum
{

    const ReadOrders  = 1 << 0;
    const WriteOrders = 1 << 1;

    const ReadUsers  = 1 << 2;
    const WriteUsers = 1 << 3;

    const ReadPartners  = 1 << 4;
    const WritePartners = 1 << 5;

    const ReadProducts  = 1 << 6;
    const WriteProducts = 1 << 7;

    const ReadArticles  = 1 << 8;
    const WriteArticles = 1 << 9;

    const ReadNotifications  = 1 << 10;
    const WriteNotifications = 1 << 11;

}
