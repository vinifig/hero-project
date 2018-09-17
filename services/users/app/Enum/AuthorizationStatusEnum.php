<?php

namespace App\Enum;

use BenSampo\Enum\Enum;
/**
 * Authorization Status Response Definition
 */
final class AuthorizationStatusEnum extends Enum
{
    const OK = 200;
    const InvalidToken = 400;
    const Unauthorized = 401;
    const ResourceNotFound = 404;
    const Unsetted = 500;
}
