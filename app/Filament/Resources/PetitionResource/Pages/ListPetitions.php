<?php

namespace App\Filament\Resources\PetitionResource\Pages;

use App\Filament\Resources\PetitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPetitions extends ListRecords
{
    protected static string $resource = PetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
