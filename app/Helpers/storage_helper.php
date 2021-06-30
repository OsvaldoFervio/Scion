<?php

if(! function_exists('store_image'))
{
    function store_image($image, $folder, $filename = null)
    {
        $uploadFolder = 'uploads';
        $uploadsPath = 'public/'.$uploadFolder.'/'.$folder.'/';
        $urlPath = 'public/'.$folder.'/';
        //$urlPath = $uploadFolder.'/'.$folder.'/';
        $imagePath = null;
        if($image->isValid() && ! $image->hasMoved()) {
            if(! $filename)
                $filename = $image->getRandomName();
            $image->move(ROOTPATH.$uploadsPath, $filename);
            $imagePath = $urlPath.$filename;
        }
        return $imagePath;
    }
}

if(! function_exists('store_images'))
{
    function store_images($images, $folder)
    {
        $imagePaths = [];
        if($images) {
            foreach($images['images'] as $image) {
                array_push($imagePaths, save($image, $folder));
            }
        }
    }
}