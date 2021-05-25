<?php


namespace App\Http\Controllers\General\Roles\Roles;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Roles\Roles\Actions\RoleCreateAction;
use App\Domain\General\Roles\Roles\Actions\RoleDestroyAction;
use App\Domain\General\Roles\Roles\Actions\RoleUpdateAction;
use App\Domain\General\Roles\Roles\DTO\RoleDTO;
use App\Http\Requests\General\Roles\Roles\RoleCreateRequest;
use App\Http\Requests\General\Roles\Roles\RoleUpdateRequest;
use App\Http\Requests\General\Roles\Roles\RoleDestroyRequest;
use App\Http\Requests\General\Roles\Roles\RoleShowRequest;
use App\Http\ViewModels\General\Roles\Roles\RoleShowVM;
use App\Http\ViewModels\General\Roles\Roles\RoleIndexVM;

class RoleController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RoleIndexVM())->toArray()));
    }

    public function show(RoleShowRequest $roleShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new RoleShowVM($roleShowRequest->route('id')))->toArray()));
    }

    public function create(RoleCreateRequest $roleCreateRequest){
        $data = $roleCreateRequest->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);
        
        $role = RoleCreateAction::execute($roleDTO);

        $role = new RoleShowVM($role->id);

        $response = Helpers::createSuccessResponse($role->toArray());

        return response()->json($response);
    }

    public function update(RoleUpdateRequest $roleUpdateRequest){
        $data = $roleUpdateRequest->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);
        
        $role = RoleUpdateAction::execute($roleDTO);

        $role = new RoleShowVM($role->id);
        
        $response = Helpers::createSuccessResponse($role->toArray());

        return response()->json($response);
    }

    public function destroy(RoleDestroyRequest $roleDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RoleDestroyAction::execute(RoleDTO::fromRequest($roleDestroyRequest->validated()))));
    }

}
