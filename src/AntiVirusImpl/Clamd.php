<?php

namespace Niisan\LaravelAntiVirus\AntiVirusImpl;

use Illuminate\Http\UploadedFile;
use Niisan\ClamAV\Scanner;
use Niisan\LaravelAntiVirus\AntiVirus;

/**
 * Use ClamAV Daemon Server
 */
class Clamd implements AntiVirus
{

    private Scanner $scanner;

    public function __construct(Scanner $scanner)
    {
        $this->scanner = $scanner;
    }

    public function check(UploadedFile $file): void
    {
        if ($this->scanner->scan($file->path())) {
            return;
        }

        throw new \RuntimeException('Find Virus in file: ' . $file->path());
    }
}