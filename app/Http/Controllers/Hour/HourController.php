<?php

namespace App\Http\Controllers\Hour;

use App\Http\Resources\Hour\HourResource;
use App\Models\Day;
use App\Models\Hour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Hour\CreateHourRequest;
use App\Http\Requests\Hour\UpdateHourRequest;

class HourController extends Controller
{
    public function create_hour(CreateHourRequest $request, Day $day)
    {

        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->day) {
                if (Auth::user()->doctor->id == $day->doctor_id) {
                    $timeSlots = [];
                    $validated = $request->validated();
                    $hour = Hour::create([
                        'start_hour' => $validated['start_hour'],
                        'end_hour' => $validated['end_hour'],
                        'day_id' => $day->id
                    ]);
                    $timeSlots = $this->divideTimeRange($validated['start_hour'], $validated['end_time']);

                    return new HourResource($hour);
                } else {
                    abort(403, "You can't set hour for other day!");
                }
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }


    public function delete_hour(Hour $hour)
    {
        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->day) {
                if (Auth::user()->doctor->day->id == $hour->day_id) {
                    $hour->delete();
                    return response()->json([
                        'message' => "deleted successfylly"
                    ]);
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }


    public function update_hour(Hour $hour, UpdateHourRequest $request)
    {
        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->day) {
                if (Auth::user()->doctor->day->id == $hour->day_id) {
                    $validated = $request->validated();
                    $hour->update($validated);
                    return new HourResource($hour);
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }


    function divideTimeRange($startTime, $endTime)
    {
        // تبدیل رشته‌ها به اشیاء Carbon
        $start = \Carbon\Carbon::createFromFormat('H:i', $startTime);
        $end = \Carbon\Carbon::createFromFormat('H:i', $endTime);

        $timeSlots = [];

        // تقسیم زمان به بازه‌های 15 دقیقه‌ای
        while ($start < $end) {
            $next = $start->copy()->addMinutes(15); // زمان بعدی

            // افزودن بازه زمانی به آرایه
            $timeSlots[] = [
                'start' => $start->format('H:i'),
                'end' => $next->format('H:i'),
            ];

            // برو به زمان بعدی
            $start = $next;
        }

        return $timeSlots;
    }
}
