<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah mendaftarkan pengguna baru.');
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone_number'] = '+62'.$data['phone_number'];

        return $data;
    }
}
