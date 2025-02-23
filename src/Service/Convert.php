<?php
namespace App\Service;

use App\Entity\File;
use App\Strategy\Converter\Factory\ConvertStrategyFactory;

class Convert {
  public static function execute(File $file, string $extension): void
  {
    $converter = ConvertStrategyFactory::set($extension);
    $converter->convert($file);
  }
}