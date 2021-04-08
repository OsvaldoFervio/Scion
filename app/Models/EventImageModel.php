<?php


namespace App\Models;


use CodeIgniter\Model;

class EventImageModel extends Model
{
    protected $table = 'event_images';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventImage';

    protected $allowedFields = [
        'event_id',
        'image_url',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}