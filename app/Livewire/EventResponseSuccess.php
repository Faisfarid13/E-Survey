<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventResponse;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class EventResponseSuccess extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;
    public $eventResponse,$event;

    public function mount(EventResponse $eventResponse): void
    {
        $this->form->fill();
        $this->eventResponse = $eventResponse;
        $this->event = Event::find($eventResponse->event_id);
//        $this->eventResponse = EventResponse::with('event')->find($eventResponse);
    }
    public function formInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->eventResponse)
            ->schema([
                Section::make('Curriculum Vitae')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama'),
                        TextEntry::make('email')
                            ->label('Email'),
                        TextEntry::make('nip')
                            ->visible(fn (Model $record): bool => $record->status_pegawai == 'asn')
                            ->label('NIP'),
                        TextEntry::make('pangkat')
                            ->visible(fn (Model $record): bool => $record->status_pegawai == 'asn')
                            ->label('Pangkat'),
                        TextEntry::make('unit_kerja')
                            ->visible(fn (Model $record): bool => $record->status_pegawai == 'asn')
                            ->label('Unit Kerja'),
                        TextEntry::make('jabatan')
                            ->visible(fn (Model $record): bool => $record->status_pegawai == 'asn')
                            ->label('Jabatan'),
                        TextEntry::make('date_of_birth')
                            ->label('Tempat/ tanggal lahir')
                            ->formatStateUsing(fn (Model $record,string $state): string => $record->place_of_birth.', '.date('d-m-Y',strtotime($state))),
                        TextEntry::make('gender')
                            ->label('Jenis Kelamin')
                            ->badge()
                            ->color('danger')
                            ->formatStateUsing(fn (string $state) => $state == '1' ? 'Laki-Laki' : 'Perempuan'),
                        TextEntry::make('uuid')
                            ->label('URL hasil isi form')
                            ->formatStateUsing(fn (Model $record,string $state): string => 'https://esurveykemenag.site/form/'.$state.'/result')
                            ->copyable()
                            ->copyMessage('Disalin!')
                            ->copyMessageDuration(1500)
                    ])->columns(2)
            ]);
    }
    public function render()
    {
        return view('livewire.event-response-success');
    }
}
