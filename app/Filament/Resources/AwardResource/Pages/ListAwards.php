<?php

namespace App\Filament\Resources\AwardResource\Pages;

use App\Filament\Resources\AwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAwards extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = AwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
