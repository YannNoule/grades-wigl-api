<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return PlanResource::collection(Plan::all());
    }

    public function store(PlanRequest $request)
    {
        return new PlanResource(Plan::create($request->validated()));
    }

    public function show(Plan $plan)
    {
        return new PlanResource($plan);
    }

    public function update(PlanRequest $request, Plan $plan)
    {
        $plan->update($request->validated());

        return new PlanResource($plan);
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return response()->json();
    }
}
