<?php

function env($key, $default = null) {
    static $vars = null;

    if ($vars === null) {
        $path = dirname(__DIR__) . '/.env';
        if (!file_exists($path)) return $default;

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $vars = [];

        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
            list($name, $value) = explode('=', $line, 2);
            $vars[trim($name)] = trim($value);
        }
    }

    return $vars[$key] ?? $default;
}
