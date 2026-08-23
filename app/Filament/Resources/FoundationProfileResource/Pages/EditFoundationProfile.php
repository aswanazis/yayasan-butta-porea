<?php

namespace App\Filament\Resources\FoundationProfileResource\Pages;

use App\Filament\Resources\FoundationProfileResource;
use App\Models\FoundationProfile;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoundationProfile extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = FoundationProfileResource::class;

    /**
     * Resource ini singleton (cuma 1 baris data), jadi tidak butuh
     * parameter {record} di URL — selalu langsung edit baris id=1.
     */
    public function mount($record = null): void
    {
        parent::mount(FoundationProfile::current()->getKey());
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
