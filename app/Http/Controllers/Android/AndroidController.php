<?php

namespace App\Http\Controllers\Android;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Android\AndroidSearchRequest;
use App\Http\ViewModels\Android\HomePageVM;

class AndroidController extends Controller
{

    public function home_page(){
        return Helpers::createSuccessResponse((new HomePageVM())->toArray());
    }
    public function search(AndroidSearchRequest $androidSearchRequest){
        return Helpers::createSuccessResponse((new AndroidSearchVM())->toArray());
    }
}
