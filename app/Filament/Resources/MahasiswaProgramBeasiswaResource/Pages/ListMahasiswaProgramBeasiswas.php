<?php

namespace App\Filament\Resources\MahasiswaProgramBeasiswaResource\Pages;

use App\Filament\Resources\MahasiswaProgramBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswaProgramBeasiswas extends ListRecords
{
    protected static string $resource = MahasiswaProgramBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
