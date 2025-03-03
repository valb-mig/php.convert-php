<?php

namespace App\Strategy\Parser;

use App\Entity\File;
use App\Contract\ParserStrategy;

class JsonParser implements ParserStrategy {
  public function parse(File $file): array {
    $content = file_get_contents($file->path);

    $count = 0;

    $parseContent = [];

    foreach(json_decode($content, true) as $item)
    {
      if($count == 0) {
        foreach($item as $key => $_) {
          $parseContent[$count][] = $key;
          
        }

        $count++;
      }

      foreach($item as $_ => $value) {
        $parseContent[$count][] = $value;
      }

      $count++;
    }

    return $parseContent;
  }
}