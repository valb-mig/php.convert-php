<?php

namespace App\Strategy\Converter;

use App\Entity\File;
use App\Contract\ConvertStrategy;

class TxtConverter implements ConvertStrategy {
  public function convert(File $file): void {
    // dd($file);
  }
}