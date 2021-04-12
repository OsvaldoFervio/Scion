<?php

namespace App\Services;

class EventService
{

    protected $model = null;

    public function __construct()
    {
        $this->model = model('EventModel');
    }

    public function create($data)
    {
        $eventModel = model('EventModel');
        $userId = session()->get('user_id');
        $eventData = $this->buildEventData($userId, $data);
        $eventModel->save($eventData);

        $eventId = $eventModel->insertID;

        $this->createEventDetails($eventId, $data);
        $this->createEventPlatforms($eventId, $data);
        $this->createEventAwards($eventId, $data);
        $this->createEventStages($eventId, $data);
    }

    public function getById($id) {
        return $event = $this->model->find($id);
    }

    public function getDetailsByEventId($id) {
        $model = model('EventDetailModel');
        return $model->where('event_id', $id)->first();
    }

    public function getAwardsByEventId($id) {
        $model = model('EventAwardModel');
        return $model->where('event_id', $id)->findAll();
    }

    public function getStagesByEventId($id) {
        $model = model('EventStageModel');
        return $model->where('event_id', $id)->findAll();
    }

    protected function createEventDetails($eventId, $data)
    {
        $model = model('EventDetailModel');
        $eventDetailsData = $this->buildEventDetailsData($eventId, $data);
        $model->save($eventDetailsData);
    }

    protected function createEventPlatforms($eventId, $data)
    {
        $model = model('EventPlatformModel');
        $platforms = $data['platform'];
        $eventPlatformData = $this->buildEventPlatformsData($eventId, $platforms);
        $model->insertBatch($eventPlatformData);
    }

    protected function createEventAwards($eventId, $data)
    {
        $model = model('EventAwardModel');
        $awardNames = $data['award_name'];
        $awardQuantities = $data['award_quantity'];
        $eventAwardData = $this->buildEventAwardsData($eventId, $awardNames, $awardQuantities);
        $model->insertBatch($eventAwardData);
    }

    protected function createEventStages($eventId, $data)
    {
        $model = model('EventStageModel');
        $stageNames = $data['stage_name'];
        $stageDescriptions = $data['stage_description'];
        $eventStageData = $this->buildEventStagesData($eventId, $stageNames, $stageDescriptions);
        $model->insertBatch($eventStageData);
    }

    protected function buildEventData($user_id, $data): array
    {
        return [
            'name' => $data['name'],
            'user_id' => $user_id,
            'type_id' => $data['event_type'],
            'category_id' => $data['category'],
            'difficulty_id' => $data['difficulty'],
            'videogame_id' => $data['videogame'],
            'date' => $data['date'],
            'time' => $data['time'],
            'timezone_id' => $data['timezone'],
            'country_id' => isset($data['country_id']) ? $data['country_id'] : null,
            'max_participants' => $data['max_participants'],
            'min_participants' => $data['min_participants'],
            'price' => $data['price'],
            'currency_id' => isset($data['currency']) ? $data['currency'] : null,
        ];
    }

    protected function buildEventDetailsData($eventId, $data): array
    {
        return [
            'event_id' => $eventId,
            'description' => $data['description'],
            'rules' => $data['rules']
        ];
    }

    protected function buildEventPlatformsData($eventId, $data): array
    {
        return array_map(function($item) use ($eventId) {
            return [
                'event_id' => $eventId,
                'platform_id' => $item,
            ];
        }, $data);
    }

    protected function buildEventAwardsData($eventId, $data, $data1): array
    {
        return array_map(function($item, $item1) use ($eventId){
            return [
                'event_id' => $eventId,
                'name' => $item,
                'amount' => $item1
            ];
        }, $data, $data1);
    }

    protected function buildEventStagesData($eventId, $data, $data1): array
    {
        return array_map(function($item, $item1) use ($eventId){
            return [
                'event_id' => $eventId,
                'name' => $item,
                'description' => $item1
            ];
        }, $data, $data1);
    }
}