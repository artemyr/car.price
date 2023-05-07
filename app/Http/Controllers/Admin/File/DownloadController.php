<?php

namespace App\Http\Controllers\Admin\File;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $path = $request->file->store('uploads', 'public');
        $download = Download::create([
            'title'=> $request->title,
            'path' => $path,
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize(),
        ]);

        return $download->id;
    }

    public function update(Request $request, Download $download)
    {
        //
    }

    public function destroy(Download $download)
    {
        if(! \Storage::disk('public')->delete($download->path)) {
            return;
        }

        if ($download->delete()) {
            return ['result' => true];
        }
    }
}
