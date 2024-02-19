<?php

namespace App\Imports;

use App\Models\TempTransaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToCollection,  WithHeadingRow
{
    protected function columns($row)
    {
        return [
            'customer_email' => $row['customer_email'],
            'description' => $row['description'],
            'event_name' => $row['eventname_metadata'],
            'created_date' => $row['created_date_utc'],
            'customer_id' => $row['customer_id'],
            'status' => $row['status'],
            'invoice_number' => $row['invoice_number'],
            'amount' => $row['amount'],
            'currency' => $row['currency'],
            'is_link' => filter_var($row['is_link'], FILTER_VALIDATE_BOOLEAN),
            'mode' => $row['mode'],
            'payment_intent_id' => $row['paymentintent_id'],
            'statement_descriptor' => $row['statement_descriptor'],
            'customer_description' => $row['customer_description'],
            'customer_phone' => $row['customer_phone'],
            'application_id' => $row['application_id'],
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $model = TempTransaction::where('event_name', $row['eventname_metadata'])->first();

            if ($model) {
                TempTransaction::create($this->columns($row) + ['camp_id' => $model->camp_id]);
            } else {
                $model = TempTransaction::create($this->columns($row));
            }
        }
    }
}