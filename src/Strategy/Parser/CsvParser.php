<?php

namespace App\Strategy\Parser;

use App\Entity\File;
use App\Contract\ParserStrategy;

class CsvParser implements ParserStrategy {
  public function parse(File $file): array {
    $content = file_get_contents($file->path);

    $parseFileContent = array_filter(explode("\n", $content), function($item){
      return !empty($item);
    });

    $parseContent = [];

    foreach($parseFileContent as $line)
    {
      $parseContent[] = explode(';', $line);
    }

    return $parseContent;
  }
}