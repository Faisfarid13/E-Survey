<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    public static string $resource = UserResource::class;
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    public function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah mendaftarkan pengguna baru.');
    }
    public function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone_number'] = '+62'.$data['phone_number'];
        return $data;
    }
}
