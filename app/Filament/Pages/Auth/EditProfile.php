<?php
 
namespace App\Filament\Pages\Auth;
 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
 
class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('phone_number')
                    ->required()
                    ->maxLength(255)
                    ->prefix('+62'),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone_number'] = '+62'.$data['phone_number'];

        return $data;
    }
}