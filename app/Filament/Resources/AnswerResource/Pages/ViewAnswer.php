<?php

namespace App\Filament\Resources\AnswerResource\Pages;

use App\Filament\Resources\AnswerResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use App\Models\Survey;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ViewRecord;

class ViewAnswer extends ViewRecord
{
    protected static string $resource = AnswerResource::class;
    // protected static string $view = 'filament.resources.answers.view';
    
    protected function getHeaderActions(): array
    {
        return [
            Action::make('Embedded Code')
            ->label('Embedded Code')
            ->icon('heroicon-o-chart-bar-square')
            ->form([
                Textarea::make('code')
                ->label('Embedded Code')
                ->required()
            ])
            ->action(function (array $data, Survey $record): void {
                Survey::where('id', $record->id)->update($data);
            })
        ];
    }
}
