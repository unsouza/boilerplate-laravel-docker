<?php

namespace Core\Activity;

use Illuminate\Http\Request;
use Core\Activity\DTOs\ActivityDTO;
use App\Http\Controllers\Controller;
use Core\Activity\Cases\CreateActivity;

class ActivityController extends Controller
{
    public function store(Request $request, CreateActivity $case)
    {
        $data = $request->validate([
            'description' => 'required',
            'points' => 'required',
            'user_id' => 'required',
        ]);

        $payload = new ActivityDTO(
            description: $data['description'],
            points: $data['points'],
            userID: $data['user_id'],
        );

        return $case->execute($payload);
    }
}
