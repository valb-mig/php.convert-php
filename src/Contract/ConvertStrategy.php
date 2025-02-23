<?php

namespace App\Contract;

use App\Entity\File;

interface ConvertStrategy {
    public function convert(File $file): void;
}
