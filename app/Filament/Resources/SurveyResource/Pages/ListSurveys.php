<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use App\Models\Survey;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SurveyResource;
use App\Filament\Resources\SurveyResource\Widgets\StatsOverview;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextInputColumn;

class ListSurveys extends ListRecords
{
    protected static string $resource = SurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Survey'),
            Action::make('settings')
            ->label('Bagikan Survey')
            ->form([
                Select::make('title')
                    ->label('Judul Survey')
                    ->options(Survey::query()->pluck('title', 'id'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn (Select $component) => $component
                    ->getContainer()
                    ->getComponent('dynamicTypeFields')
                    ->getChildComponentContainer()
                    ->fill()),

                    Grid::make(1)
                                ->schema(fn (Get $get): array => match ($get('title')) {
                                    $get('title') => 
                                        [
                                        RichEditor::make('description')
                                        ->label('Deskripsi')
                                        ->default(strip_Tags(Survey::Where('id' , $get('title'))->pluck('description')))
                                        ->required()
                                    ],
                                    default => [],
                                })
                                ->key('dynamicTypeFields'),

                 // bingung di ngisi bagian sininya
            ])
            ->action(function (array $data, Survey $record): void {
                $record->author()->associate($data['id']);
                $record->save();
            })
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }

    
}
