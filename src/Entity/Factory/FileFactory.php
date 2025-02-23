<?php
namespace App\Entity\Factory;

use App\Entity\File;

class FileFactory {
  public static function create(string $filePath)
  {
    $dirPath = "public/files/raw/$filePath";

    if(!is_file($dirPath)){
      throw new \InvalidArgumentException("File not found: $filePath");
    }

    $info = pathinfo($dirPath);
    $size = (int) filesize($dirPath);

    return new File(
      $info['basename'],
      $info['extension'],
      $size,
      $dirPath
    );
  }
}