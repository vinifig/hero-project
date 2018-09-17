<?php

namespace App\Modules\Auth\Authorization\Enum;

use BenSampo\Enum\Enum;
/**
 * Authorization Status Response Definition
 */
final class AuthorizationStatusEnum extends Enum
{
    const Accept = 200;
    const InvalidToken = 400;
    const Unauthorized = 401;
    const ResourceNotFound = 404;
    const Unsetted = 500;
}
