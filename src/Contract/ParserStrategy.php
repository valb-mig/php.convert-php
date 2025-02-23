<?php

namespace App\Contract;

use App\Entity\File;

interface ParserStrategy {
    public function parse(File $file): array;
}
