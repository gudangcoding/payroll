<?php

namespace App\Filament\Resources\SallaryResource\Pages;

use App\Filament\Resources\SallaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSallaries extends ListRecords
{
    protected static string $resource = SallaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
