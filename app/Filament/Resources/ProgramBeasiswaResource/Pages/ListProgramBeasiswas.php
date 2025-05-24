<?php

namespace App\Filament\Resources\ProgramBeasiswaResource\Pages;

use App\Filament\Resources\ProgramBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramBeasiswas extends ListRecords
{
    protected static string $resource = ProgramBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
