<?php

namespace App\Http\Controllers\Admin\File;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->file->store('uploads', 'public');
        $picture = Picture::create([
            'title'=> $request->title,
            'path' => $path,
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize(),
        ]);

        return $picture->id;
    }

    public function update(Request $request, Picture $picture)
    {
        //
    }

    public function destroy(Picture $picture)
    {
        if(! \Storage::disk('public')->delete($download->path)) {
            return;
        }

        if ($picture->delete()) {
            return ['result' => true];
        }
    }
}
