<?php

namespace App\Filament\Resources\CademiCourseResource\Pages;

use App\Filament\Resources\CademiCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCademiCourses extends ListRecords
{
    protected static string $resource = CademiCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
