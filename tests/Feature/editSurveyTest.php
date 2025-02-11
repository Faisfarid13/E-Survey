<?php

namespace Tests\Unit\Filament\Resources\SurveyResource\Pages;

use App\Filament\Resources\SurveyResource;
use App\Filament\Resources\SurveyResource\Pages\EditSurvey;
use App\Models\Survey;
use Filament\Actions;
use Filament\Notifications\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditSurveyTest extends TestCase
{
    use RefreshDatabase;

    public function testGetHeaderActions()
    {
        $editSurveyPage = new EditSurvey();
        $headerActions = $editSurveyPage->getHeaderActions();

        $this->assertCount(1, $headerActions);
        $this->assertContainsOnlyInstancesOf(Actions\DeleteAction::class, $headerActions);
    }

    public function testGetSavedNotification()
    {
        $editSurveyPage = new EditSurvey();
        $notification = $editSurveyPage->getSavedNotification();

        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertTrue($notification->status());
        $this->assertEquals('Berhasil!', $notification->getTitle());
        $this->assertEquals('Anda telah memperbarui survei.', $notification->getBody());
    }

    public function testEditSurvey()
    {
        $survey = Survey::factory()->create();

        $this->actingAs($this->createAdminUser());

        $response = $this->get(route('filament.resources.surveys.edit', ['record' => $survey]));

        $response->assertSuccessful();
        $response->assertViewIs('filament::resources.pages.edit-record');
        $response->assertViewHas('record', $survey);
    }

    private function createAdminUser()
    {
        return User::factory()->create(['is_admin' => true]);
    }
}