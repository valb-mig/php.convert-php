<?php

namespace App\Strategy\Converter;

use App\Entity\File;
use App\Object\{
  Path,
  Extension
};
use App\Service\Parser;
use App\Contract\ConvertStrategy;

class JsonConverter implements ConvertStrategy 
{
  public function convert(File $file): void 
  {
    $data = Parser::execute($file);
    
    $header = $data[0];
    unset($data[0]);

    $formatedData = [];

    foreach($data as $key => $item) {
      foreach($item as $row => $ln) {
        $formatedData[$key][$header[$row]] = $ln;
      }
    }

    $fileName = explode('.', $file->name)[0];
    $filePath = Path::OUTPUT."converted_".$fileName.Extension::JSON;

    file_put_contents($filePath, json_encode($formatedData));
  }
}