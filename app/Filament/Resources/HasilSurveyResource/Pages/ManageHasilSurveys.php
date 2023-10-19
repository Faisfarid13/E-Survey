<?php

namespace App\Filament\Resources\HasilSurveyResource\Pages;

use App\Filament\Resources\HasilSurveyResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHasilSurveys extends ManageRecords
{
    protected static string $resource = HasilSurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
