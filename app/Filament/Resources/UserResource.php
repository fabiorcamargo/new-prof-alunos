<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email2')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('two_factor_secret')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                Forms\Components\TextInput::make('cellphone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('cellphone2')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('city2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('uf')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('uf2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('payment')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('observation')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('ouro'),
                Forms\Components\TextInput::make('secretary')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('document')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_accountable_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('seller')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('courses')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('codesale')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Toggle::make('first'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\DateTimePicker::make('contract_date'),
                Forms\Components\DateTimePicker::make('access_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cellphone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cellphone2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('ouro')
                    ->boolean(),
                Tables\Columns\TextColumn::make('secretary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_accountable_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seller')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codesale')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('first')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('contract_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('access_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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
            UserResource\RelationManagers\CademisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
