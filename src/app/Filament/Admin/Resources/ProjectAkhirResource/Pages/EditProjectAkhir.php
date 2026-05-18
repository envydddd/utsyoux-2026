<?php

namespace App\Filament\Admin\Resources\ProjectAkhirResource\Pages;

use App\Filament\Admin\Resources\ProjectAkhirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectAkhir extends EditRecord
{
    protected static string $resource = ProjectAkhirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
