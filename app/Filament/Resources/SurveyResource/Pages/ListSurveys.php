<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use App\Models\Survey;
use Filament\Forms\Get;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SurveyResource;
use App\Filament\Resources\SurveyResource\Widgets\StatsOverview;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;

class ListSurveys extends ListRecords
{
    protected static string $resource = SurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Survey'),
            // Action::make('Bagikan Survey')
            //     ->label('Bagikan Survey')
            //     ->icon('heroicon-o-share')
            //     ->form([
            //         Select::make('title')
            //             ->label('Judul Survey')
            //             ->options(Survey::query()->pluck('title', 'id'))
            //             ->required()
            //             ->live()
            //             ->afterStateUpdated(fn (Select $component) => $component
            //             ->getContainer()
            //             ->getComponent('dynamicTypeFields')
            //             ->getChildComponentContainer()
            //             ->fill()),

            //         Grid::make(1)
            //                     ->schema(fn (Get $get): array => match ($get('title')) {
            //                         $get('title') => 
            //                             [
            //                             RichEditor::make('description')
            //                             ->label('Deskripsi')
            //                             ->default(strip_Tags(Survey::Where('id' , $get('title'))->pluck('description')))
            //                             ->required()
            //                         ],
            //                         default => [],
            //                     })
            //                     ->key('dynamicTypeFields'),
            //     ])
            //     ->action(function (array $data, Survey $record): void {
            //         $record->author()->associate($data['id']);
            //         $record->save();
            //     })
            //     ->extraModalFooterActions([
            //         Action::make('Copy Link')
            //             ->icon('heroicon-o-clipboard')
            //             ->color('secondary')
            //             ->form([
            //                 TextInput::make('Links')
            //                 ->default(url()->previous())
            //                 // ->copyable()
            //                 // ->copyMessage('Link copied to clipboard')
            //                 // ->copyMessageDuration(1500)
            //             ])
            //     ])
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }

    
}
