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
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new FileIndexVM())->toArray()));
    }

    public function show(FileShowRequest $fileShowRequest){

        return response()->json(Helpers::createSuccessResponse((new FileShowVM(['id' => $fileShowRequest->route('id')]))->toArray()));
    }

    public function create(FileCreateRequest $fileCreateRequest){

        $extension = $fileCreateRequest->file->getClientOriginalExtension() ;
        $fileName = $fileCreateRequest->file_name . '_' . time(). '.'.$extension ;
        $access_path = '/uploads/'.$fileCreateRequest->file_path .'/'.$fileName  ;

        Storage::disk('google')->put($fileName, $fileCreateRequest->file('file')->getContent());

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
