<?php


namespace App\Domain\General\Files\Files\Actions;


use App\Domain\General\Files\Files\DTO\FileDTO;
use App\Domain\General\Files\Files\Model\File;
use Illuminate\Support\Facades\Auth;

class FileCreateAction
{
    public static function execute(
        FileDTO $fileDTO
    ){

        $file = new File($fileDTO->toArray());
        $file->save();
        return $file;
    }
}
