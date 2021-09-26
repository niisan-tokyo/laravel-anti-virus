<?php

namespace App\Utilities;

use Illuminate\Http\UploadedFile;

interface AntiVirus
{

    /**
     * ウイルスチェックを実行する
     *
     * @param UploadedFile $file
     * @return void
     */
    public function check(UploadedFile $file): void;
}