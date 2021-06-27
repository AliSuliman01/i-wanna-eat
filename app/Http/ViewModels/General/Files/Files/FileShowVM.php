<?php


namespace App\Http\ViewModels\General\Files\Files;

use App\Domain\General\Files\Files\Model\File;
use Illuminate\Contracts\Support\Arrayable;


class FileShowVM implements Arrayable
{

    private $fileId;

    public function __construct($props)
    {
        $this->fileId = $props['id'] ;
    }

    private function get_File(){
        return File::find($this->fileId);
    }
    public function toArray(): array
    {
        return  $this->get_File()->toArray();
    }
}
