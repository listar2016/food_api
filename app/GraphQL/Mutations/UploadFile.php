<?php

namespace App\GraphQL\Mutations;

class UploadFile
{
    /**
     * Upload a file, store it on the server and return the path.
     *
     * @param  mixed  $root
     * @param  mixed[]  $args
     * @return string|null
     */
    public function resolve($root, array $args): ?string
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $args['file'];

        return $file->storePublicly('uploads');

        // if(!$request->hasFile(‘data’)) {
        //     return response()->json([‘upload_file_not_found’], 400);
        // }
        // $file = $request->file(‘data’);
        // if(!$file->isValid()) {
        //     return response()->json([‘invalid_file_upload’], 400);
        // }
        // $path = public_path() . ‘/uploads/’;
        // $file->move($path, $file->getClientOriginalName() );
        // return response()->json(compact(‘path’));

    }
}