<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Models\User;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditUser extends EditRecord
{
    public static string $resource = UserResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (User $record){
                    if($record->photo){
                        Storage::disk('public')->delete($record->photo);
                    }
                }
            ),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah memperbarui pengguna.');
    }
    public function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone_number'] = '+62'.$data['phone_number'];

        return $data;
    }
}
