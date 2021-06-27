<?php


namespace App\Http\Controllers\General\Files\Files;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Files\Files\Actions\FileCreateAction;
use App\Domain\General\Files\Files\Actions\FileDestroyAction;
use App\Domain\General\Files\Files\Actions\FileUpdateAction;
use App\Domain\General\Files\Files\DTO\FileDTO;
use App\Http\Requests\General\Files\Files\FileCreateRequest;
use App\Http\Requests\General\Files\Files\FileUpdateRequest;
use App\Http\Requests\General\Files\Files\FileDestroyRequest;
use App\Http\Requests\General\Files\Files\FileShowRequest;
use App\Http\ViewModels\General\Files\Files\FileShowVM;
use App\Http\ViewModels\General\Files\Files\FileIndexVM;

class FileController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new FileIndexVM())->toArray()));
    }

    public function show(FileShowRequest $fileShowRequest){

        return response()->json(Helpers::createSuccessResponse((new FileShowVM(['id' => $fileShowRequest->route('id')]))->toArray()));
    }

    public function create(FileCreateRequest $fileCreateRequest){

        $fileName = $fileCreateRequest->file_name . '_' . time() ;
        $extension = $fileCreateRequest->file->getClientOriginalExtension() ;
        $store_path = $fileCreateRequest->file('file')->storeAs('/public/'.$fileCreateRequest->file_path ,$fileName.'.'. $extension);
        $access_path = '/storage/'.$fileCreateRequest->file_path .'/'.$fileName . '.'. $extension ;

        $fileDTO = FileDTO::fromRequest([
            'file_name' => $fileName,
            'file_path' => $access_path,
        ]);

        $file = FileCreateAction::execute($fileDTO);

        return response()->json(Helpers::createSuccessResponse((new FileShowVM($file->toArray()))->toArray()));
    }

    public function destroy(FileDestroyRequest $fileDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(FileDestroyAction::execute(FileDTO::fromRequest($fileDestroyRequest->validated()))));
    }

}
