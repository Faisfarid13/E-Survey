<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SurveyResource;

class EditSurvey extends EditRecord
{
    protected static string $resource = SurveyResource::class;
    public function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah memperbarui survei.');
    }
}
