<?php

namespace Tests\Unit\App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_deletes_existing_photo_on_delete()
    {
        $user = User::factory()->create(['photo' => 'path/to/photo.jpg']);
        $this->actingAs(User::factory()->create());

        $editUser = new EditUser();
        $editUser->delete($user->id);

        $this->assertFalse(Storage::disk('public')->exists($user->photo));
    }

    /** @test */
    public function it_skips_deleting_photo_if_not_present()
    {
        $user = User::factory()->create();
        $this->actingAs(User::factory()->create());

        $editUser = new EditUser();
        $editUser->delete($user->id);

        $this->assertTrue(Storage::disk('public')->files() === []); // No existing files
    }

    /** @test */
    public function it_returns_correct_redirect_url()
    {
        $editUser = new EditUser();
        $redirectUrl = $editUser->getRedirectUrl();

        $expectedUrl = UserResource::getUrl('index');
        $this->assertEquals($expectedUrl, $redirectUrl);
    }

    /** @test */
    public function it_returns_correct_created_notification()
    {
        $editUser = new EditUser();
        $notification = $editUser->Notification::make()
        ->success()
        ->title('Berhasil!')
        ->body('Anda telah memperbarui pengguna.');

        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertEquals('Berhasil!', $notification->toArray()['title']);
        $this->assertEquals('Anda telah memperbarui pengguna.', $notification->toArray()['body']);
    }

    /** @test */
    public function it_prepends_country_code_to_phone_number()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone_number' => '1234567890',
        ];

        $editUser = new EditUser();
        $mutatedData = $editUser->mutateFormDataBeforeSave($data);

        $this->assertEquals('+621234567890', $mutatedData['phone_number']);
    }

    /** @test */
    public function it_does_not_modify_other_form_data()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone_number' => '1234567890',
            'other_field' => 'some value',
        ];

        $editUser = new EditUser();
        $mutatedData = $editUser->mutateFormDataBeforeSave($data);

        $this->assertEquals($data['name'], $mutatedData['name']);
        $this->assertEquals($data['email'], $mutatedData['email']);
        $this->assertEquals($data['other_field'], $mutatedData['other_field']);
    }
}
