<?php

namespace App\Services\Posts;

use Illuminate\Http\Request;

use App\Post;

class UpdateAttributesService
{
    public function __construct() {

    }
    public function update($request, $post)
    {
        $postimage = $request->file('postimage');
        if ($postimage) {
            $extension = $postimage->getClientOriginalExtension();
            Storage::disk('public')->put($postimage->getFilename().'.'.$extension,  File::get($postimage));
            $post->mime = $postimage->getClientMimeType();
            $post->original_filename = $postimage->getClientOriginalName();
            $post->filename = $postimage->getFilename().'.'.$extension;
        }

        $post->title = request("title");
        $post->content = request("content");
        $post->save();

        return redirect ('/');
    }

}
