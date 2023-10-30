<?php

namespace App\Filament\Resources\AnswerResource\Pages;

use App\Filament\Resources\AnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAnswer extends ViewRecord
{
    protected static string $resource = AnswerResource::class;
    // protected static string $view = 'filament.resources.answers.view';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()->label('Unduh CSV'),
        ];
    }
}
