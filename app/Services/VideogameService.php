<?php

namespace App\Services;

class VideogameService
{

    protected $model = null;
    protected $videogamePlatformModel = null;
    protected $platformModel = null;

    public function __construct()
    {
        $this->model = model('VideogameModel');
        $this->videogamePlatformModel = model('VideogamePlatformModel');
        $this->platformModel = model('PlatformModel');
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
        $this->videogamePlatformModel->insertBatch($platformsData);
        return $id;
    }

    public function getPlatforms($id) {
        $columns = 'videogame_platforms.id, platforms.id as platform_id, platforms.name';
        $join = 'videogame_platforms.platform_id = platforms.id and videogame_platforms.videogame_id = '.$id;
        $builder = $this->platformModel->builder();
        $query = $builder->select($columns)
                        ->join('videogame_platforms', $join, 'left')
                        ->get();
        return $query->getResult();
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $this->model->save($data);
        $platforms_ids = $data['platform_id'];
        $this->updatePlatforms($id, $platforms_ids);
    }

    protected function updatePlatforms($id, $platforms)
    {
        $platformsData = $this->buildVideogamePlatformsData($platforms, $id);
        foreach($platformsData as $data) {
            $result = $this->videogamePlatformModel->where($data)->first();
            if(! $result)
                $this->videogamePlatformModel->insert($data);
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
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