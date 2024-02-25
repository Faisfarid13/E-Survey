<?php
 
namespace App\Filament\Pages\Auth;
 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Radio;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
 
class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // FileUpload::make('image')
                //         ->hidden(),
                FileUpload::make('photo')
                        ->label('Foto Profil'),
                TextInput::make('phone_number')
                    ->maxLength(20)
                    ->prefix('+62'),
                TextInput::make('nip')
                    ->label('NIP')
                    ->required()
                    ->maxLength(255),
                TextInput::make('pangkat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('place_of_birth')
                    ->required()
                    ->maxLength(255),
                Radio::make('gender')
                    ->required()
                    ->options([
                        '0' => 'Perempuan',
                        '1' => 'Laki-laki'
                    ]),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone_number'] = $data['phone_number'];
        // $data['image'] = $data['photo'];
        
        return $data;
    }
}