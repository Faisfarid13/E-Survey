<?php

namespace Tests\Unit\Http\Responses\Auth;

use Filament\Http\Responses\Auth\LoginResponse;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Features\SupportRedirects\Redirector;
use Tests\TestCase;

class loginTest extends TestCase
{
    /**
     * Test redirect response for admin user.
     *
     * @return void
     */
    public function testAdminUserRedirect()
    {
        $user = new User(['id' => 1]);
        $this->mock(Auth::class, function ($mock) use ($user) {
            $mock->shouldReceive('user')
                ->once()
                ->andReturn($user);
        });

        $this->mock(\App\Models\User::class, function ($mock) {
            $mock->shouldReceive('Role')
                ->with('pegawai')
                ->once()
                ->andReturn(new \Illuminate\Support\Collection([2, 3]));
        });

        $response = (new LoginResponse())->toResponse(request());

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(URL::to('/dashboard'), $response->getTargetUrl());
    }

    /**
     * Test redirect response for non-admin user.
     *
     * @return void
     */
    public function testNonAdminUserRedirect()
    {
        $user = new User(['id' => 4]);
        $this->mock(Auth::class, function ($mock) use ($user) {
            $mock->shouldReceive('user')
                ->once()
                ->andReturn($user);
        });

        $this->mock(\App\Models\User::class, function ($mock) {
            $mock->shouldReceive('Role')
                ->with('pegawai')
                ->once()
                ->andReturn(new \Illuminate\Support\Collection([2, 3]));
        });

        $response = (new LoginResponse())->toResponse(request());

        $this->assertInstanceOf(Redirector::class, $response);
        $this->assertEquals(URL::to(filament()->getUrl()), $response->redirect);
    }
}