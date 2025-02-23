<?php
namespace App\Entity;

class File {
  public function __construct(
    public string $name, 
    public string $type, 
    public int    $size,
    public string $path
  ){}
}
