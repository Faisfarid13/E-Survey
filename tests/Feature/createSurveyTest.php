<?php

namespace Tests\Unit;
namespace App\Models;

use App\Filament\Resources\SurveyResource;
use App\Filament\Resources\SurveyResource\Pages\CreateSurvey;
use Filament\Notifications\Notification;
use App\Models\User;
use Livewire\Component;
use Tests\TestCase;

class CreateSurveyTest extends TestCase
{
    /** @test */
    public function it_returns_correct_resource_class()
    {
        $this->assertEquals(SurveyResource::class, CreateSurvey::$resource);
    }

    /** @test */
    public function it_returns_correct_redirect_url()
    {
        $createSurvey = new CreateSurvey();
        $redirectUrl = $createSurvey->getRedirectUrl();

        $expectedUrl = SurveyResource::getUrl('index');
        $this->assertEquals($expectedUrl, $redirectUrl);
    }

    /** @test */
    public function it_returns_correct_created_notification()
    {
        $createSurvey = new CreateSurvey();
        $notification = Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body('Anda telah membuat survei baru.');

        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertEquals('Berhasil!', $notification->toArray()['title']);
        $this->assertEquals('Anda telah membuat survei baru.', $notification->toArray()['body']);
    }

    /** @test */
    public function it_mutates_form_data_before_create()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $createSurvey = new CreateSurvey();
        $formData = [
            'name' => '',
            'description' => 'Deskripsi survei',
        ];

        $mutatedData = $createSurvey->mutateFormDataBeforeCreate($formData);

        $this->assertEquals($user->id, $mutatedData['user_id']);
        $this->assertEquals('NON-AKTIF', $mutatedData['status']);
        $this->assertEquals('Survei Baru', $mutatedData['name']);
        $this->assertEquals('Deskripsi survei', $mutatedData['description']);
    }
}