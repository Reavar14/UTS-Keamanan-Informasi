<?php

namespace App\Filament\Resources\DetailBeasiswaResource\Pages;

use App\Filament\Resources\DetailBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailBeasiswa extends EditRecord
{
    protected static string $resource = DetailBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
