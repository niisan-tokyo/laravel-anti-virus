<?php

namespace Niisan\LaravelAntiVirus\AntiVirusImpl;

use App\Utilities\AntiVirus;
use Illuminate\Http\UploadedFile;

class Pass implements AntiVirus
{
    public function check(UploadedFile $file): void
    {
        \Log::debug($file->path());
    }
}