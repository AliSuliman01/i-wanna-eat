<?php


namespace App\Http\ViewModels\General\Users\Users;

use App\Domain\General\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;


class UserShowVM implements Arrayable
{

    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId ;
    }

    private function get_User(){
        return User::find($this->userId);
    }
    public function toArray(): array
    {
        return $this->get_User()->toArray();
    }
}
