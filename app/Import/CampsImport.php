<?php

namespace App\Import;

use Carbon\Carbon;
use App\Models\Camp;

class CampsImport
{
    public static function import($camp, $club)
    {
        $startingAt = (array) $camp->startingAt;
        $endingAt = (array) $camp->endingAt;

        $createdAt = (array) $camp->createdAt;
        $updatedAt = (array) $camp->updatedAt;

        $club->camps()->create([
            'm_id' => $camp->_id,
            'm_teams' => count($camp->teams) ? json_encode($camp->teams) : null,
            'invoiced' => $camp->invoiced,
            'paid' => $camp->paid,
            'pending' => $camp->pending,
            'registrations' => $camp->registrations,
            'm_club_id' => $camp->clubId,
            'name' => $camp->name,
            'price' => $camp->price,
            'type' => $camp->campType,
            'is_visible' => $camp->isVisible,
            'is_removed' => $camp->isRemoved,
            'include_due_amount' => isset($camp->includeDueAmount) ? $camp->includeDueAmount : false,
            'start_date' => !is_null($camp->startingAt) ? Carbon::parse($startingAt['$date']) : now(),
            'end_date' => !is_null($camp->endingAt) ? Carbon::parse($endingAt['$date']) : now(),
            'installments' => $camp->installments,
            'm_installment_dates' => (isset($camp->installmentDates) && count($camp->installmentDates)) ? json_encode($camp->installmentDates) : null,
            'payment_type' => $camp->selectedPayment,
            'processing_fee_credit_card' => $camp->processingFee,
            'total_price_credit_card' => $camp->fullPaymentProcessingFee,
            'processing_bank_account' => $camp->bankAccountProcessingFee,
            'total_price_bank_account' => $camp->fullBankAccountPaymentProcessingFee,
            'created_at' => isset($startingAt['$date']) ? Carbon::parse($createdAt['$date']) : now(),
            'updated_at' => isset($startingAt['$date']) ? Carbon::parse($updatedAt['$date']) : now(),
        ]);
    }
}
