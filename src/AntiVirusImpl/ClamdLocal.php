<?php

namespace Niisan\LaravelAntiVirus\AntiVirusImpl;

use App\Utilities\AntiVirus;
use Illuminate\Http\UploadedFile;

class ClamdLocal implements AntiVirus
{
    public function check(UploadedFile $file): void
    {
        $socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
        socket_connect($socket, '/var/run/clamav/clamd.ctl');
        $command = 'SCAN ' . $file->path;
        socket_send($socket, $command, strlen($command), 0);
        socket_recv($socket, $result, 65536, MSG_WAITALL);
        if (trim(substr(strrchr($result, ":"), 1)) !== 'OK') {
            throw new \Exception('ウイルスチェックエラー');
        }
    }
}