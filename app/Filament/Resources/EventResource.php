<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationGroup = 'Kelola Form';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationLabel = 'Form Kegiatan';
    protected static ?string $modelLabel = 'Form Kegiatan';
    protected static ?int $navigationSort = -6;
    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Kegiatan')
                    ->schema([
                        Forms\Components\Textarea::make('name')
                            ->label('Nama Kegiatan')
                            ->required()
//                            ->live()
//                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::random(5)))
//                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
//                                if (($get('slug') ?? '') !== Str::slug($old)) {
//                                    return;
//                                }
//
//                                $set('slug', Str::slug($state));
//                            })
                            ->maxLength(200),
                        Forms\Components\RichEditor::make('desc')
                            ->label('Deskripsi')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                        Forms\Components\RichEditor::make('location')
                            ->label('Lokasi Kegiatan')
                            ->helperText('Nama hotel kegiatan diselenggarakan.')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                            //                        Forms\Components\TextInput::make('slug')
                            //                            ->disabledOn('edit'),
                            Forms\Components\DatePicker::make('date_start')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->required()
                            ->minDate(now())
                            ->format('Y-m-d')
                            ->displayFormat('d/m/Y'),
                            Forms\Components\DatePicker::make('date_end')
                            ->label('Tanggal Akhir')
                            ->native(false)
                            ->required()
                            ->format('Y-m-d')
                            ->afterOrEqual('startdate')
                            ->displayFormat('d/m/Y'),
                            Forms\Components\Select::make('criteria')
                            ->label('Kriteria')
                            ->options([
                                'internal' => 'Internal',
                                'eksternal' => 'Eksternal'
                            ]),
                            ])->columns(1)
                        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')->sortable()->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->html()
                    ->wrap()
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }
                        // Only render the tooltip if the column content exceeds the length limit.
                        return $state;
                    }),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->html()
                    ->wrap(),
                    Tables\Columns\TextColumn::make('event_response_count')
                        ->label('Isi Form')
                        ->color('danger')
                        ->alignCenter()
                        ->counts('eventResponse'),
                    Tables\Columns\TextColumn::make('date_start')->label('Tanggal Mulai')->sortable()->date('d F Y'),
                    Tables\Columns\TextColumn::make('date_end')->label('Tanggal Selesai')->date('d F Y'),
                    Tables\Columns\TextColumn::make('slug')->label('URL')
                        ->color('primary')
                        ->url(fn (Event $record): string => route('event.form', $record))
                        ->openUrlInNewTab(),
                    Tables\Columns\TextColumn::make('criteria')->label('Kriteria'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detail Survey')
                ->schema([
                    Infolists\Components\TextEntry::make('name')
                        ->label('Nama Kegiatan'),
                    Infolists\Components\Grid::make()->schema([
                        Infolists\Components\TextEntry::make('desc')
                            ->html()
                            ->label('Deskripsi'),
                        Infolists\Components\TextEntry::make('location')
                            ->html()
                            ->label('Tempat Kegiatan'),
                        Infolists\Components\TextEntry::make('criteria')
                            ->html()
                            ->label('Kriteria'),
                        Infolists\Components\TextEntry::make('date_start')
                            ->label('Tanggal Mulai')
                            ->color('warning')
                            ->date('d F Y'),
                        Infolists\Components\TextEntry::make('date_end')
                            ->label('Tanggal Selesai')
                            ->color('warning')
                            ->date('d F Y'),
                        Infolists\Components\TextEntry::make('slug')
                            ->label('URL')
                            ->color('primary')
                            ->formatStateUsing(fn (Event $record,string $state): string => route('event.form', $record))
                            ->url(fn (Event $record): string => route('event.form', $record))
                            ->openUrlInNewTab(),
                    ])->columns(2),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EventResponseRelationManager::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->id())->count();
    }
}
