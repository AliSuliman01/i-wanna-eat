<?php


namespace App\Domain\General\Files\Files\Actions;


use App\Domain\General\Files\Files\DTO\FileDTO;
use App\Domain\General\Files\Files\Model\File;
use Illuminate\Support\Facades\Auth;

class FileUpdateAction
{

    public static function execute(
        FileDTO $fileDTO
    ){
        $file = File::find($fileDTO->id);
        $file->update(array_filter($fileDTO->toArray()));
        $file->save();
        return $file;
    }
}
