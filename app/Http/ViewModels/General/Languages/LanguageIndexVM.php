<?php


namespace App\Http\ViewModels\General\Languages;

use App\Domain\General\Languages\Model\Language;
use Illuminate\Contracts\Support\Arrayable;

class LanguageIndexVM implements Arrayable
{

    public function get_languages(){
    	return Language::all();
	}
    public function toArray(): array
    {
        return [
            'languages' => $this->get_languages()
        ];
    }
}
