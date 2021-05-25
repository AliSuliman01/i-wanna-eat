<?php


namespace App\Http\ViewModels\General\Languages;

use App\Domain\General\Languages\Model\Language;
use Illuminate\Contracts\Support\Arrayable;


class LanguageShowVM implements Arrayable
{

    private $languageId;

    public function __construct($languageId)
    {
        $this->languageId = $languageId ;
    }

    private function get_Language(){
        return Language::find($this->languageId);
    }
    public function toArray(): array
    {
        return [
            'Language' => $this->get_Language()
        ];
    }
}
