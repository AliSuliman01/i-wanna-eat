<?php


namespace App\Http\ViewModels\General\Files\Files;

use App\Domain\General\Files\Files\Model\File;
use Illuminate\Contracts\Support\Arrayable;

class FileIndexVM implements Arrayable
{

    public function get_files(){
    	return File::all();
	}
    public function toArray(): array
    {
        return $this->get_files()->toArray();
    }
}
