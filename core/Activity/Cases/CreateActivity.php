<?php

namespace Core\Activity\Cases;

use Core\Activity\Models\Activity;
use Core\Activity\DTOs\ActivityDTO;

class CreateActivity
{
    public function execute(ActivityDTO $payload)
    {
        Activity::create([
            'description' => $payload->description,
            'points' => $payload->points,
            'user_id' => $payload->userID,
        ]);

        return ['activity_created' => true];
    }
}
