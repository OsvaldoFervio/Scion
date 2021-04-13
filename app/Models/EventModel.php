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

    protected $afterFind = [
        'getTypeName',
        'getCategoryName',
        'getDifficultyName',
        'getDateFormatted',
        'getTimeZoneData'
    ];

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

    protected function getCategoryName(array $data) {
        if(isset($data['id'])) {
            $item = $data['data'];
            $this->bindCategoryData($item);
        }
        return $data;
    }

    protected function getDifficultyName(array $data) {
        if(isset($data['id'])) {
            $item = $data['data'];
            $this->bindDifficultyData($item);
        }
        return $data;
    }

    protected function getDateFormatted(array $data) {
        if(isset($data['id'])) {
            $item = $data['data'];
            $dateString = $item->date;
            $date = \DateTime::createFromFormat('Y-m-d', $dateString);
            $item->date_formatted = $date->format('d \d\e M \d\e Y');
        }
        return $data;
    }

    protected function getTimezoneData(array $data) {
        if(isset($data['id'])) {
            $item = $data['data'];
            $this->bindTimeZoneData($item);
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

    protected function bindCategoryData($item) {
        $model = \model('CategoryModel');
        $item->category_name = $model->find($item->category_id)->name;
    }

    protected function bindDifficultyData($item) {
        $model = \model('DifficultyModel');
        $item->difficulty_name = $model->find($item->difficulty_id)->name;
    }

    protected function bindTimeZoneData($item) {
        $model = \model('TimeZoneModel');
        $item->timezone_name = $model->find($item->timezone_id)->name;
        $timezone = new \DateTimeZone($item->timezone_name);
        $offset_timezone = $timezone->getOffset(new \DateTime('now', $timezone));
        $hours = $offset_timezone / 3600;
        $item->timezone_offset = $hours;
    }

    protected function getCountryName($id) {
        $countryModel = \model('CountryModel');
        return $countryModel->find($id)->name;
    }
}