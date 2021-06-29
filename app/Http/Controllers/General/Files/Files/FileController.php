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
use League\Flysystem\Filesystem;

class GoogleDriveFile {

    var $type, $name, $subject, $path, $filename, $extension, $timestamp, $mimetype, $size, $dirname, $basename;

    public function __construct($data) {
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->path = $data['path'];
        $this->filename = $data['filename'];
        $this->extension = $data['extension'];
        $this->timestamp = $data['timestamp'];
        $this->mimetype = $data['mimetype'];
        $this->size = $data['size'];
        $this->dirname = $data['dirname'];
        $this->basename = $data['basename'];
    }
}
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

        $fileName =  $fileCreateRequest->file_name . '_' .time() . '.'.$extension ;

        $disk = Storage::disk('google');

        $disk->put($fileName, $fileCreateRequest->file('file')->getContent());

        $path = null ;

        foreach ($disk->listContents() as $file){
            if($file['name'] == $fileName){
                $path = $file['path'];
                break ;
            }
        }

        $access_path = config('prefixes.google_drive_prefix').$path ;

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
