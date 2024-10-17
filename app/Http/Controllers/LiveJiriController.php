<?php

namespace App\Http\Controllers;

use App\Http\Requests\LiveJiriStoreRequest;
use App\Models\Jiri;
use App\Notifications\JiriStarted;
use Illuminate\Http\RedirectResponse;

class LiveJiriController extends Controller
{
    public function store(LiveJiriStoreRequest $request): RedirectResponse
    {

        $jiri = auth()->user()?->jiris()->findOrFail($request->validated()['id']);

        $evaluators = $jiri?->evaluators;

        foreach ($evaluators as $evaluator) {
            $attendance = $evaluator->pivot;
            $evaluator->notify(new JiriStarted($attendance->id));
        }

        return redirect()->route('jiris.show', ['jiri' => $jiri]);
    }

    public function show(Jiri $jiri)
    {
        $token = request('token');

        return $jiri->evaluators()
            ->wherePivot('token', $token)
            ->firstOrFail()
            ->fullname;
    }
}
