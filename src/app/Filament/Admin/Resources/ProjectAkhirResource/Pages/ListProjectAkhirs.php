<?php

namespace App\Filament\Admin\Resources\ProjectAkhirResource\Pages;

use App\Filament\Admin\Resources\ProjectAkhirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectAkhirs extends ListRecords
{
    protected static string $resource = ProjectAkhirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
