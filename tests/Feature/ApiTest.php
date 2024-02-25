<?php

/**
 * - Récupération de la liste des grades disponibles et des avantages associés
 */
it('can get available grades and associated advantages', function () {
    $response = $this->get('/api/grades/');
    expect($response->status())->toBe(200)->and(count($response->json()))->toBe(4);
    $response->assertJsonPath('grade_0.cashback.premium', 4);
    $response->assertJsonMissingPath('grade_3.cashback.start');
});

/**
 * - Récupération du grade d’un client spécifique.
 */
it('can get user grade', function () {
    $this->seed(\Database\Seeders\PlanSeeder::class);
    $user1 = \App\Models\User::factory()->create(['token_balance' => 10000, 'plan_id' => 3]);
    $response = $this->get('/api/grade/'.$user1->id);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('grade', 2);

    $user2 = \App\Models\User::factory()->create(['token_balance' => 4000, 'plan_id' => 3]);
    $response = $this->get('/api/grade/'.$user2->id);
    $response->assertJsonPath('grade', 0);

    $user3 = \App\Models\User::factory()->create(['token_balance' => 50, 'plan_id' => 1]);
    $response = $this->get('/api/grade/'.$user3->id);
    $response->assertJsonPath('grade', 0);

    $user4 = \App\Models\User::factory()->create(['token_balance' => 100000, 'plan_id' => 2]);
    $response = $this->get('/api/grade/'.$user4->id);
    $response->assertJsonPath('grade', 2);

    $user4 = \App\Models\User::factory()->create(['token_balance' => 100000, 'plan_id' => 3]);
    $response = $this->get('/api/grade/'.$user4->id);
    $response->assertJsonPath('grade', 3);

    $user5 = \App\Models\User::factory()->create(['token_balance' => 5000, 'plan_id' => 3]);
    $response = $this->get('/api/grade/'.$user5->id);
    $response->assertJsonPath('grade', 1);
});

/**
 * - Affichage de la valeur du pourcentage de cashback d’un grade spécifique.
 */
it('can get grade cashback value', function () {
    $grade0 = 0;
    $response = $this->get('/api/cashback/grade/'.$grade0);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('cashback', [
        'start' => 0.5,
        'smart' => 2.5,
        'premium' => 4,
    ]);

});

/**
 * - Affichage de la valeur du pourcentage de cashback d’un client spécifique.
 */
it('can get user cashback value', function () {
    $this->seed(\Database\Seeders\PlanSeeder::class);
    $user1 = \App\Models\User::factory()->create(['token_balance' => 10000, 'plan_id' => 3]);
    $response = $this->get('/api/cashback/user/'.$user1->id);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('cashback', 5.5);

});

/**
 * - Affichage de la valeur du pourcentage de cashback d’un client spécifique en fonction du montant de sa transaction.
 */
it('can get user cashback on amount value ', function () {
    $this->seed(\Database\Seeders\PlanSeeder::class);
    $user1 = \App\Models\User::factory()->create(['token_balance' => 10000, 'plan_id' => 3]);
    $amount = 10;
    $response = $this->get('/api/cashback/user/'.$user1->id.'/amount/'.$amount);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('cashback', 0);

    $user1 = \App\Models\User::factory()->create(['token_balance' => 10000, 'plan_id' => 3]);
    $amount = 100;
    $response = $this->get('/api/cashback/user/'.$user1->id.'/amount/'.$amount);
    $response->assertJsonPath('cashback', 5.5);

    $user1 = \App\Models\User::factory()->create(['token_balance' => 6000, 'plan_id' => 3]);
    $amount = 24;
    $response = $this->get('/api/cashback/user/'.$user1->id.'/amount/'.$amount);
    $response->assertJsonPath('cashback', 4.5);
});

/**
 * - Affichage de la valeur du boost de rendement d’un grade spécifique.
 */
it('can get grade rendement boost', function () {
    $grade0 = 0;
    $response = $this->get('/api/rendement/grade/'.$grade0);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('rendement', [
        'start' => 1,
        'smart' => 1.5,
        'premium' => 2,
    ]);
});

/**
 * - Affichage de la valeur du boost de rendement d’un client spécifique.
 */
it('can get user rendement value', function () {
    $this->seed(\Database\Seeders\PlanSeeder::class);
    $user1 = \App\Models\User::factory()->create(['token_balance' => 10000, 'plan_id' => 3]);
    $response = $this->get('/api/rendement/user/'.$user1->id);
    expect($response->status())->toBe(200);
    $response->assertJsonPath('rendement', 2.4);

});
