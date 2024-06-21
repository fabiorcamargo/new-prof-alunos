<?php

namespace App\Filament\Resources\CademiResource\Pages;

use App\Filament\Resources\CademiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCademi extends EditRecord
{
    protected static string $resource = CademiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
