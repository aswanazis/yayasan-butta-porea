<?php

namespace App\Filament\Resources\AwardResource\Pages;

use App\Filament\Resources\AwardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAward extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = AwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
