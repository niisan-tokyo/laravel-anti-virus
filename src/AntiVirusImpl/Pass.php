<?php

namespace Niisan\LaravelAntiVirus\AntiVirusImpl;

use Illuminate\Http\UploadedFile;
use Niisan\LaravelAntiVirus\AntiVirus;

class Pass implements AntiVirus
{
    public function check(UploadedFile $file): void
    {
        \Log::debug($file->path());
    }
}