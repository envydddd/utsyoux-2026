<?php

namespace App\Filament\Admin\Resources\TopUpPaymentResource\Pages;

use App\Filament\Admin\Resources\TopUpPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopUpPayments extends ListRecords
{
    protected static string $resource = TopUpPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // no create action for payments
        ];
    }
}
