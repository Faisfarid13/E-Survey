<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\SurveyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSurvey extends CreateRecord
{
    protected static string $resource = SurveyResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah membuat survei baru.');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();
    $data['status'] = 'NON-AKTIF';
 
    return $data;
}
}
