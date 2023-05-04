<?php

namespace Controller\Interaction\Create;

use Model\Students;
use Model\Uploads;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UploadPhoto
{
    public function uploadPhotoGet(Request $request): string
    {
        $userId = $request->id;
        $upload = Uploads::where('id', $userId)->orderBy('created_at', 'desc');
        $upload = $upload->first();
        return new View('site.uploadPhoto', ['upload' => $upload]);
    }

    public function uploadPhoto(Request $request): string
    {
        if ($request->method === 'POST') {
            if (isset($_FILES['image'])) {
                $userId = $request->user;
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid().'.'.$ext;
                $fileTmpName = $_FILES['image']['tmp_name'];
                $pathFile = 'E:\OpenServer\OSPanel\domains\php-framework\public\assets\img\\' . $filename;

                if (!move_uploaded_file($fileTmpName, $pathFile)){
                    echo 'hasdf';
                }

                $upload = Uploads::create([
                    'upload_name' => $filename,
                    'id' => $userId,
                ]);
                app()->route->redirect('/uploadPhoto?id=' . $userId);
            }
        }
        return new View('site.uploadPhoto');
    }

}