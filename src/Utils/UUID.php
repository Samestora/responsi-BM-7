<?php

namespace App\Utils;

class UUID
{
    public static function generate(): string
    {
        // Generate a random UUID
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Set the version to 0100
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Set the variant to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}