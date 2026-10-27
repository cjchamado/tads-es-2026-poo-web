<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * @requestMediaType multipart/form-data
     */
    public function __invoke(
        UploadRequest $request
    ) {
        $path = $request->file->store('files');
        $url = Storage::url($path);

        return [
            'path' => $path,
            'url' => $url,
        ];
    }
}
