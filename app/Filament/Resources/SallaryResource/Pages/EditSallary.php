<?php

namespace App\Filament\Resources\SallaryResource\Pages;

use App\Filament\Resources\SallaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSallary extends EditRecord
{
    protected static string $resource = SallaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
