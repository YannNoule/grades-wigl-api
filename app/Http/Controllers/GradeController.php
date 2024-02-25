<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = config('grades.all_grades');
        $advantages = config('advantages');
        $gradesWithAdvantages = [];
        foreach ($grades as $key => $grade) {
            foreach ($advantages as $name => $advantageData) {
                $data = [];
                $data[$name] = $advantageData['grade_'.$key];
                $gradesWithAdvantages['grade_'.$key] = $data;
            }
        }

        return response()->json($gradesWithAdvantages);
    }

    public function userGrade(Request $request, User $user)
    {
        $userGrade = Utils::getUserGrade($user);

        return response()->json([
            'grade' => $userGrade,
        ]);
    }

    public function gradeCashback(Request $request, $grade)
    {
        return response()->json([
            'cashback' => config('advantages.cashback.'.'grade_'.$grade),
        ]);
    }

    public function userCashback(Request $request, User $user)
    {
        $userCashback = Utils::getUserCashback($user);

        return response()->json([
            'cashback' => $userCashback,
        ]);
    }

    public function userAmountCashback(Request $request, User $user, int $amount)
    {
        return response()->json([
            'cashback' => Utils::getUserAmountCashback($user, $amount),
        ]);
    }
}
