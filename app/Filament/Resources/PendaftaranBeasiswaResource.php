<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranBeasiswaResource\Pages;
use App\Filament\Resources\PendaftaranBeasiswaResource\RelationManagers;
use App\Models\PendaftaranBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranBeasiswaResource extends Resource
{
    protected static ?string $model = PendaftaranBeasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mahasiswa_id')
                    ->label('Mahasiswa')
                    ->relationship('mahasiswa', 'nama')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('program_beasiswa_id')
                    ->label('Program Beasiswa')
                    ->relationship('programBeasiswa', 'nama_program')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_daftar')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'diajukan' => 'Diajukan',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('file_persyaratan')
                    ->label('Upload File Persyaratan')
                    ->directory('persyaratan')
                    ->preserveFilenames(),

                Forms\Components\TextInput::make('nilai_akademik')
                    ->numeric()
                    ->step(0.01)
                    ->label('Nilai Akademik')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mahasiswa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('program_beasiswa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_daftar')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('file_persyaratan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_akademik')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftaranBeasiswas::route('/'),
            'create' => Pages\CreatePendaftaranBeasiswa::route('/create'),
            'edit' => Pages\EditPendaftaranBeasiswa::route('/{record}/edit'),
        ];
    }
}
