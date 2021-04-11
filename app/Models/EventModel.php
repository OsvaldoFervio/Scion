<?php


namespace App\Models;


use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Event';

    protected $allowedFields = [
        'user_id',
        'type_id',
        'category_id',
        'difficulty_id',
        'timezone_id',
        'videogame_id',
        'name',
        'date',
        'time',
        'country_id',
        'price',
        'currency_id',
        'min_participants',
        'max_participants',
        'active'
    ];


    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $afterFind = ['getTypeName'];

    protected function getTypeName(array $data) {
        if(isset($data['id'])) {
            $item = $data['data'];
            $this->bindEventTypeData($item);
        } else {
            foreach ($data['data'] as $item) {
                $this->bindEventTypeData($item);
            }
        }
        return $data;
    }

    protected function bindEventTypeData($item) {
        $eventTypeModel = \model('EventTypeModel');
        if(isset($item->type_id)){
            if ($item->type_id == 3 && $item->country_id) {
                $item->country_name = $this->getCountryName($item->country_id);
            } else {
                $typeName = $eventTypeModel->find($item->type_id)->name;
                $item->type_name = $typeName;
            }
        }
    }

    protected function getCountryName($id) {
        $countryModel = \model('CountryModel');
        return $countryModel->find($id)->name;
    }
}