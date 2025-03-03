<?php

namespace App\Strategy\Parser\Factory;

use App\Contract\ParserStrategy;
use App\Strategy\Parser\{
    JsonParser,
    CsvParser,
    XlsxParser,
};

class ParserStrategyFactory {
    public static function set(string $extension): ParserStrategy {
        return match ($extension) {
            'json' => new JsonParser(),
            'csv'  => new CsvParser(),
            'xlsx' => new XlsxParser(),
            default => throw new \InvalidArgumentException("Not suported extension: $extension"),
        };
    }
}