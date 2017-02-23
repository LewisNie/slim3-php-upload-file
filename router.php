<?php
    require('vendor/autoload.php');

    $app = new \Slim\App();
    $app->get('/hello',function($req,$res,$next){
        return $res->withStatus(400)->write('Bad Request');
    });
    $app->post('/upload',function($req,$res,$next){
        $files = $req->getUploadedFiles();
        $targetPath = "public/uploads";
        $newfile = $files['fileToUpload'];
        $uploadFileName = $newfile->getClientFilename();
        $newfile->moveTo("public/uploads/$uploadFileName");
//        print_r($files);
    });

    $app->run();
?>