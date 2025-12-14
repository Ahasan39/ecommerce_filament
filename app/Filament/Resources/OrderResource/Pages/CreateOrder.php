<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    // This method lets you modify the form data before creating the record
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Add a fixed delivery charge of 100 BDT
        $data['delivery_charge'] = 130;

        // If you want, you can update grand_total accordingly here
        // For example:
        // $data['grand_total'] = ($data['grand_total'] ?? 0) + 100;

        return $data;
    }
}
