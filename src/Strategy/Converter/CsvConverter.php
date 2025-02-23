<?php

namespace App\Strategy\Converter;

use App\Entity\File;
use App\Contract\ConvertStrategy;

class CsvConverter implements ConvertStrategy {
  public function convert(File $file): void {
    // dd($file);
  }
}