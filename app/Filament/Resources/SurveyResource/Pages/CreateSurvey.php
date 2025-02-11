<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\SurveyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSurvey extends CreateRecord
{
    public static string $resource = SurveyResource::class;
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    public function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah membuat survei baru.');
    }

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['status'] = 'NON-AKTIF';
 
        return $data;
    }
}
