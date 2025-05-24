<?php

namespace App\Filament\Resources\ProgramBeasiswaResource\Pages;

use App\Filament\Resources\ProgramBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramBeasiswa extends EditRecord
{
    protected static string $resource = ProgramBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
