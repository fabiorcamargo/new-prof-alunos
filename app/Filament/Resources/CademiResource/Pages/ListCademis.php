<?php

namespace App\Filament\Resources\CademiResource\Pages;

use App\Filament\Resources\CademiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCademis extends ListRecords
{
    protected static string $resource = CademiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
