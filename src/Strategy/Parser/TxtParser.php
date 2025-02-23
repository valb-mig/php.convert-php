<?php

namespace App\Strategy\Parser;

use App\Entity\File;
use App\Contract\ParserStrategy;

class TxtParser implements ParserStrategy {
  public function parse(File $file): array {
    return [];
  }
}