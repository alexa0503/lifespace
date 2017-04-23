<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    //
    public function upload(Request $request, $name = 'file')
    {
        $file = $request->file($name);
        $path = 'uploads/'.date('Ymd').'/';
        if( !is_array($file) ){
            if ($file->getError() != 0) {
                return $file->getErrorMessage();
            }
            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $file->move(public_path($path), $file_name);
            return [
                'initialPreview' => [
                    asset($path.$file_name),
                ],
                'initialPreviewConfig' => [
                    ['caption' => $file_name, 'size' => $file->getClientSize(), 'width' => '400px', 'url' => url('admin/file/delete'), 'key' => $file_name, 'value'=>$path.$file_name, 'extra'=>['name'=>$path.$file_name]],
                ],
                'append' => false, // whether to append these configurations to initialPreview.
                // if set to false it will overwrite initial preview
                // if set to true it will append to initial preview
                // if this propery not set or passed, it will default to true.
            ];
        }
        else{
            $preview = [];
            $config = [];
            foreach($file as $v){
                if ($v->getError() != 0) {
                    return $v->getErrorMessage();
                }
                $entension = $v->getClientOriginalExtension();
                $file_name = uniqid().'.'.$entension;
                $v->move(public_path($path), $file_name);
                $preview[] = asset($path.$file_name);
                $config[] = ['caption' => $file_name, 'size' => $v->getClientSize(), 'width' => '400px', 'url' => url('admin/file/delete'), 'key' => $path.$file_name, 'value'=>$path.$file_name, 'extra'=>['name'=>$path.$file_name]];
            }
            return [
                'initialPreview' => $preview,
                'initialPreviewConfig' => $config,
                'append' => true, // whether to append these configurations to initialPreview.
                // if set to false it will overwrite initial preview
                // if set to true it will append to initial preview
                // if this propery not set or passed, it will default to true.
            ];
        }

    }
    public function delete(Request $request)
    {
        $name = $request->input('name');
        return ['ret'=>0,'name'=>$name];
    }
}
