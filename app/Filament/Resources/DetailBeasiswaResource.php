<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailBeasiswaResource\Pages;
use App\Filament\Resources\DetailBeasiswaResource\RelationManagers;
use App\Models\DetailBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailBeasiswaResource extends Resource
{
    protected static ?string $model = DetailBeasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('program_beasiswa_id')
                    ->relationship('programBeasiswa', 'nama_program')
                    ->required(),
                Forms\Components\Textarea::make('syarat')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('informasi_tambahan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('programBeasiswa.nama_program')
                    ->label('Program Beasiswa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
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
            'index' => Pages\ListDetailBeasiswas::route('/'),
            'create' => Pages\CreateDetailBeasiswa::route('/create'),
            'edit' => Pages\EditDetailBeasiswa::route('/{record}/edit'),
        ];
    }
}
