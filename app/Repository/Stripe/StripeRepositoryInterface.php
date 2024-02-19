<?php

namespace App\Repository\Stripe;

interface StripeRepositoryInterface
{
    public function search($data);
    public function getCounts();
    public function update($data);
    public function uniqueEvents();
    public function uniquePlayers();
    public function existingPlayers();
    public function existingCamps();

}