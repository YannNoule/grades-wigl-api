<?php

namespace App\Http\Resources;

use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'token_balance' => $this->token_balance,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'created_at' => $this->created_at,
            'plan' => new PlanResource($this->whenLoaded('plan')),
            'grade' => Utils::getUserGrade($this),
            'cashback' => Utils::getUserCashback($this),
            'rendement' => Utils::getUserRendement($this),
        ];
    }
}
