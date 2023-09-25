<?php

namespace App\Filament\Resources\SurveyResource\Widgets;

use App\Models\Survey;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $inactive = Survey::where('status', 'NON-AKTIF')->count();
        $active = Survey::where('status', 'AKTIF')->count();
        $done = Survey::where('status', 'SELESAI')->count();
        return [
            Stat::make('Survey Non-aktif', $inactive),
            Stat::make('Survey Aktif', $active),
            Stat::make('Survey Selesai', $done),
        ];
    }
}
