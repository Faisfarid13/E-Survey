<?php

namespace Tests\Unit;
namespace App\Livewire;

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Notifications\Notification;
use Livewire\Component;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /** @test */
    public function it_returns_correct_resource_class()
    {
        $this->assertEquals(UserResource::class, CreateUser::$resource);
    }

    /** @test */
    public function it_returns_correct_redirect_url()
    {
        $createUser = new CreateUser();
        $redirectUrl = $createUser->getRedirectUrl();

        $expectedUrl = UserResource::getUrl('index');
        $this->assertEquals($expectedUrl, $redirectUrl);
    }

/** @test */
public function it_returns_correct_created_notification()
{
    $createUser = new CreateUser();
    $notification = Notification::make()
        ->success()
        ->title('Berhasil!')
        ->body('Anda telah mendaftarkan pengguna baru.');

    $this->assertInstanceOf(Notification::class, $notification);
    $this->assertEquals('Berhasil!', $notification->toArray()['title']);
    $this->assertEquals('Anda telah mendaftarkan pengguna baru.', $notification->toArray()['body']);
}

    /** @test */
    public function it_mutates_form_data_before_save()
    {
        $createUser = new CreateUser();
        $formData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '812345678'
        ];

        $mutatedData = $createUser->mutateFormDataBeforeSave($formData);

        $this->assertEquals('+62812345678', $mutatedData['phone_number']);
        $this->assertEquals('John Doe', $mutatedData['name']);
        $this->assertEquals('john@example.com', $mutatedData['email']);
    }
}