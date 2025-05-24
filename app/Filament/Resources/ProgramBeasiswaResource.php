<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramBeasiswaResource\Pages;
use App\Filament\Resources\ProgramBeasiswaResource\RelationManagers;
use App\Models\ProgramBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramBeasiswaResource extends Resource
{
    protected static ?string $model = ProgramBeasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_program')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('jenis')
    ->label('Jenis')
    ->required()
    ->options([
        'akademik' => 'Akademik',
        'non_akademik' => 'Non Akademik',
        'lain' => 'Lain',
    ])
    ->native(false),
                Forms\Components\TextInput::make('penyelenggara')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_program')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penyelenggara')
                    ->searchable(),
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
            'index' => Pages\ListProgramBeasiswas::route('/'),
            'create' => Pages\CreateProgramBeasiswa::route('/create'),
            'edit' => Pages\EditProgramBeasiswa::route('/{record}/edit'),
        ];
    }
}
