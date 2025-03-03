<?php

namespace App\Strategy\Converter\Factory;

use App\Contract\ConvertStrategy;
use App\Strategy\Converter\{
    JsonConverter,
    CsvConverter,
    XlsxConverter,
};

class ConvertStrategyFactory {
    public static function set(string $extension): ConvertStrategy {
        return match ($extension) {
            'json' => new JsonConverter(),
            'csv'  => new CsvConverter(),
            'xlsx' => new XlsxConverter(),
            default => throw new \InvalidArgumentException("Not suported extension: $extension"),
        };
    }
}