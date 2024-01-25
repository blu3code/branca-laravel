<?php

namespace Blu3\Branca;

use Branca\Branca as BaseBranca;
use Illuminate\Support\Facades\Config;
use RuntimeException;

final class Branca {

    private static function client(): BaseBranca {
        $key = Config::get('app.key');

        if (str_starts_with($key, 'base64:')){
            $key = substr($key, 7);
        }

        return new BaseBranca(base64_decode($key));
    }

    public static function encrypt(array $payload, int $timestamp = null): string {
        return self::client()->encode(json_encode($payload), $timestamp);
    }

    public static function decrypt(string $payload, int $ttl = null): array {
        $data = @self::client()->decode($payload, $ttl);

        if (!json_validate($data)){
            throw new RuntimeException('JSON Validation failed');
        }

        return json_decode($data, true);
    }

}