<?php

namespace App\Filament\Admin\Resources\PortfolioProfileResource\Pages;

use App\Filament\Admin\Resources\PortfolioProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioProfiles extends ListRecords
{
    protected static string $resource = PortfolioProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
