<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CademiResource\Pages;
use App\Filament\Resources\CademiResource\RelationManagers;
use App\Models\Cademi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CademiResource extends Resource
{
    protected static ?string $model = Cademi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('celular')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('login_auto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('gratis')
                    ->required(),
                Forms\Components\DatePicker::make('criado_em'),
                Forms\Components\Toggle::make('visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('celular')
                    ->searchable(),
                Tables\Columns\TextColumn::make('login_auto')
                    ->searchable(),
                Tables\Columns\IconColumn::make('gratis')
                    ->boolean(),
                Tables\Columns\TextColumn::make('criado_em')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('visible')
                    ->boolean(),
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
            'index' => Pages\ListCademis::route('/'),
            'create' => Pages\CreateCademi::route('/create'),
            'edit' => Pages\EditCademi::route('/{record}/edit'),
        ];
    }
}
