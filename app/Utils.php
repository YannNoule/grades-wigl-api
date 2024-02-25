<?php

namespace App;

class Utils
{
    public static function getUserGrade($user): int
    {
        $userGrade = '0';
        $thresholds = config('grades.thresholds');
        $plans = config('grades.plans');
        foreach ($thresholds as $grade => $threshold) {
            if ($user->token_balance >= $threshold && in_array($grade, $plans[$user->plan->slug]['eligible_for'])) {
                $userGrade = $grade;
            }
        }

        return (int) $userGrade;
    }

    public static function getUserCashback($user)
    {
        $userGrade = self::getUserGrade($user);

        return config('advantages.cashback.'.'grade_'.$userGrade.'.'.$user->plan->slug) ?? 0;
    }

    public static function getUserAmountCashback($user, $amount)
    {
        return ($amount > config('advantages.cashback.min_transaction_amounts.'.$user->plan->slug)) ?
            self::getUserCashback($user) : 0;
    }
}
