<?php
namespace App\Service;

use App\Entity\File;
use App\Strategy\Parser\Factory\ParserStrategyFactory;

class Parser {
  public static function execute(File $file): array
  {
    $converter = ParserStrategyFactory::set($file->type);
    return $converter->parse($file);
  }
}