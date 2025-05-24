<?php

namespace App\Filament\Resources\MahasiswaProgramBeasiswaResource\Pages;

use App\Filament\Resources\MahasiswaProgramBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMahasiswaProgramBeasiswa extends EditRecord
{
    protected static string $resource = MahasiswaProgramBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
