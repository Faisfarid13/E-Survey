<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventResponse;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Saade\FilamentAutograph\Forms\Components\Enums\DownloadableFormat;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class EventResponsePost extends Component implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];
    public $event;

    public function mount(Event $event): void
    {
        $this->form->fill();
        $this->event = $event;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Status Pegawai')
                        ->schema([
                            Select::make('status_pegawai')
                                ->label('Status Pegawai')
                                ->required()
                                ->options([
                                    'asn' => 'ASN',
                                    'non_asn' => 'Non ASN',
                                ])
                        ]),
                    Wizard\Step::make('Data Pribadi')
                        ->schema([
                            Section::make('Identitas')
                            ->schema([
                                TextInput::make('nip')
                                    ->required()
                                    ->label('NIP')
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->maxLength(18),
                                TextInput::make('name')
                                    ->required()
                                    ->label('Nama')
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->unique(EventResponse::class, ignoreRecord:true),
                                Select::make('pangkat')
                                    ->label('Pangkat/Gol. Ruang')
                                    ->options([
                                        'Juru Muda (I/a)' => 'Juru Muda (I/a)',
                                        'Juru Muda Tk.I (I/b)' => 'Juru Muda Tk.I (I/b)',
                                        'Juru (I/c)' => 'Juru (I/c)',
                                        'Juru Tk.I (I/d)' => 'Juru Tk.I (I/d)',
                                        'Pengatur Muda (II/a)' => 'Pengatur Muda (II/a)',
                                        'Pengatur Muda Tk.I (II/b)' => 'Pengatur Muda Tk.I (II/b)',
                                        'Pengatur (II/c)' => 'Pengatur (II/c)',
                                        'Pengatur Tk.I (II/d)' => 'Pengatur Tk.I (II/d)',
                                        'Penata Muda (III/a)' => 'Penata Muda (III/a)',
                                        'Penata Muda Tk. I (III/b)' => 'Penata Muda Tk. I (III/b)',
                                        'Penata (III/c)' => 'Penata (III/c)',
                                        'Penata Tk. I (III/d)' => 'Penata Tk. I (III/d)',
                                        'Pembina (IV/a)' => 'Pembina (IV/a)',
                                        'Pembina Tk. I (IV/b)' => 'Penata Tk. I (IV/b)',
                                        'Pembina Utama Muda (IV/c)' => 'Pembina Utama Muda (IV/c)',
                                        'Pembina Utama Madya (IV/d)' => 'Pembina Utama Madya (IV/d)',
                                        'Pembina Utama (IV/e)' => 'Pembina Utama (IV/e)',
                                    ])
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->required(),
                                TextInput::make('unit_kerja')
                                    ->label('Unit Kerja')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->maxLength(100),
                                TextInput::make('jabatan')
                                    ->label('Jabatan')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->maxLength(150),
                                TextInput::make('place_of_birth')
                                    ->label('Tempat Lahir')
                                    ->required()
                                    ->maxLength(50),
                                DatePicker::make('date_of_birth')
                                    ->label('Tanggal Lahir')
                                    ->required()
                                    ->format('Y-m-d')
                                    ->displayFormat('d-m-Y'),
                                Radio::make('gender')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        '1' => 'Laki-laki',
                                        '0' => 'Perempuan',
                                    ])
                                    ->required(),
                                TextInput::make('pendidikan')
                                    ->label('Pendidikan')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->maxLength(200),
                                TextInput::make('university_of_origin')
                                    ->label('Asal Universitas')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'non_asn')
                                    ->maxLength(200),
                                TextInput::make('major')
                                    ->label('Jurusan')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'non_asn')
                                    ->maxLength(200),
                                TextInput::make('position')
                                    ->label('Posisi')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'non_asn')
                                    ->maxLength(200),
                                TextInput::make('phone_number')
                                    ->label('No. HP')
                                    ->prefix('+62'),
                                Textarea::make('home_address')
                                    ->label('Alamat Rumah')
                                    ->required()
                                    ->maxLength(200),
                                Textarea::make('office_address')
                                    ->label('Alamat Kantor')
                                    ->required()
                                    ->visible(fn (Get $get): bool => $get('status_pegawai') == 'asn')
                                    ->maxLength(200),
                            ])->columns([
                                    'default' => 1,
                                    'md' => 2,
                                ]),
                            Section::make('Detail')
                                ->schema([
                                    Repeater::make('org_experience')
                                        ->label('Pengalaman Organisasi')
                                        ->schema([
                                            TextInput::make('name')
                                                ->label('Pengalaman Organisasi')->required(),
                                        ])
                                ])->visible(fn (Get $get): bool => $get('status_pegawai') == 'non_asn'),
                        ]),
                    Wizard\Step::make('Data Lainnya')
                        ->schema([
                            Section::make('Bank')
                                ->schema([
                                    TextInput::make('bank')
                                        ->required()
                                        ->label('Nama Bank')
                                        ->maxLength(255),
                                    TextInput::make('no_rek')
                                        ->required()
                                        ->label('No. Rekening')
                                        ->maxLength(255),
                                    TextInput::make('rek_name')
                                        ->required()
                                        ->label('An. Rekening')
                                        ->maxLength(255),
                                    TextInput::make('npwp')
                                        ->label('NPWP')
                                        ->maxLength(50),
                                ])->columns([
                                    'default' => 1,
                                    'md' => 2,
                                ]),
                            Section::make('Lainnya')
                                ->schema([
                                    FileUpload::make('photo')
                                        ->label('Foto Profile')
                                        ->getUploadedFileNameForStorageUsing(function (Get $get, TemporaryUploadedFile $file): string {
                                            return (string) Str::of($get('name'))->slug('-').'-image-'.now()->timestamp.'.'.$file->getClientOriginalExtension();
                                        })
                                        ->maxSize(1024)
                                        ->image()
                                        ->required()
                                        ->disk('profile-photos'),
                                    Repeater::make('social_media')
                                        ->visible(fn (Get $get): bool => $get('status_pegawai') == 'non_asn')
                                        ->label('Media Sosial')
                                        ->schema([
                                            Select::make('social_media_key')
                                                ->label('Media Sosial')
                                                ->required()
                                                ->options([
                                                    'instagram' => 'Instagram',
                                                    'twitter' => 'X / Twitter',
                                                    'tiktok' => 'Tiktok',
                                                ])
                                                ->live()
                                                ->disableOptionWhen(function ($value, $state, Get $get) {
                                                    return collect($get('../*.social_media_key'))
                                                        ->reject(fn($key) => $key == $state)
                                                        ->filter()
                                                        ->contains($value);
                                                }),
                                            TextInput::make('value')
                                                ->label('URL')
                                                ->prefix('https://')
                                                ->required(),
                                        ]),
                                ]),
                            Section::make('Tandan Tangan')
                                ->schema([
                                    SignaturePad::make('sign_path')
                                        ->label(__('Tandan Tangan'))
                                        ->dotSize(2.0)
                                        ->lineMinWidth(0.5)
                                        ->lineMaxWidth(2.5)
                                        ->throttle(16)
                                        ->minDistance(5)
                                        ->velocityFilterWeight(0.7)
                                        ->backgroundColor('#fff')  // Background color on light mode
                                        ->backgroundColorOnDark('#000')     // Background color on dark mode (defaults to backgroundColor)
                                        ->exportBackgroundColor('#fff')     // Background color on export (defaults to backgroundColor)
                                        ->penColor('#000')                  // Pen color on light mode
                                        ->penColorOnDark('#fff')            // Pen color on dark mode (defaults to penColor)
                                        ->exportPenColor('#000')
                                        ->filename('autograph')             // Filename of the downloaded file (defaults to 'signature')
                                        ->downloadable()                    // Allow download of the signature (defaults to false)
                                        ->downloadableFormats([             // Available formats for download (defaults to all)
                                            DownloadableFormat::PNG,
                                            DownloadableFormat::JPG,
                                            DownloadableFormat::SVG,
                                        ])
                                        ->downloadActionDropdownPlacement('center-end')
                                ])->columns([
                                    'default' => 1,
                                    'sm' => 3,
                                ]),

                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
//                    Wizard\Step::make('Billing')
//                        ->schema([
//                            // ...
//                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                            size="sm"
                        >
                            Submit
                        </x-filament::button>
                    BLADE)))
//                    ->persistStepInQueryString()
            ])
            ->statePath('data');
    }
    public function create(): void
    {
//        dd($this->form->getState());
//        EventResponse::create($this->form->getState());
        $event = [
            'event_id' => $this->event->id,
            'uuid' => Str::uuid(),
        ];
        $data_event = array_merge($event,$this->form->getState());
//        dd($this->form->getState(),$data_event);
        $eventResponse = EventResponse::create($data_event);

        Notification::make()
            ->title('Form berhasil disimpan.')
            ->success()
            ->send();

        //reset form
        $this->form->fill();
//        $this->redirect('/form/'.$this->event->slug, navigate: true);
        $this->redirect('/form/'.$eventResponse->uuid.'/result', navigate: true);
    }
    public function render()
    {
        return view('livewire.event-response-post');
    }
}
