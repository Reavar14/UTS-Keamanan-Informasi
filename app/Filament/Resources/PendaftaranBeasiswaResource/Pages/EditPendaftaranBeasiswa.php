<?php

namespace App\Filament\Resources\PendaftaranBeasiswaResource\Pages;

use App\Filament\Resources\PendaftaranBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranBeasiswa extends EditRecord
{
    protected static string $resource = PendaftaranBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
