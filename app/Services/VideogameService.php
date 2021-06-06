<?php

namespace App\Services;

class VideogameService
{

    protected $model = null;
    protected $platformModel = null;

    public function __construct()
    {
        $this->model = model('VideogameModel');
        $this->platformModel = model('VideogamePlatformModel');
    }

    public function getAll()
    {
        return $this->model->findAll();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        $this->model->save($data);
        $id = $this->model->insertID;
        $platform_ids = $data['platform_id'];
        $platformsData = $this->buildVideogamePlatformsData($platform_ids, $id);
        $this->platformModel->insertBatch($platformsData);
        return $id;
    }

    protected function buildVideogamePlatformsData($platforms, $videogame_id): array
    {
        return array_map(function($item) use ($videogame_id) {
            return [
                'videogame_id' => $videogame_id,
                'platform_id' => $item
            ];
        }, $platforms);
    }
}