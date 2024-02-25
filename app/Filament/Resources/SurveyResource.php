<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResource\Pages;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Actions\Action;


class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;
    protected static ?int $navigationSort = -8;
    protected static ?string $navigationGroup = 'Kelola Survey';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationLabel = 'Survey';
    protected static ?string $modelLabel = 'Survey';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
         Card::make()->schema([
                Forms\Components\TextInput::make('title')
                ->label('Judul')


                ->required(),
                Forms\Components\RichEditor::make('description')
                ->label('Deskripsi')
                ->required(),
                Forms\Components\Select::make('criteria')
                ->label('Kriteria')
                ->options([
                    'pegawai' => 'PEGAWAI',
                    'unit' => 'UNIT',
                    'umum' => 'UMUM',
                ])
                ->required(),
                
                Forms\Components\DatePicker::make('tanggal_mulai')
                ->required()
                ->minDate(date("Y-m-d", strtotime("-1 hour", strtotime(now())))),
                Forms\Components\DatePicker::make('tanggal_selesai')
                ->required()
                ->afterOrEqual('tanggal_mulai'),
                ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                ->label('Judul')->sortable()->searchable()->limit(15)
                ->tooltip(fn ($state): string => $state),
                Tables\Columns\TextColumn::make('description')
                ->label('Deskripsi')->html()->limit(15)
                ->tooltip(fn ($state): string => $state),

                Tables\Columns\TextColumn::make('criteria')->label('Kriteria'),
                TextColumn::make('status')
                ->action(function($record, $column){
                    $name = $column->getName();
                    if ($record->tanggal_selesai < now()) {
                        $record->update([
                            'status' => 'selesai',
                        ]);
                    }
                }),
                Tables\Columns\BooleanColumn::make('is_active')
                ->action(function($record, $column){
                    $name = $column->getName();
                    if ($record->$name == 0) {
                        $record->update([
                            $name => !$record->$name,
                            'status' => 'aktif',
                        ]);
                    }
                    else {
                        $record->update([
                            $name => !$record->$name,
                            'status' => 'non-aktif',
                        ]);
                    }
                    return $record->$name ? 'aktif' : 'non-aktif';
                }),
                Tables\Columns\TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')->label('Tanggal Selesai'),
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\SectionRelationManager::class,
            RelationManagers\QuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
            'view' => Pages\ViewSurvey::route('/{record}'),
        ];
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
            Section::make('Detail Survey')
                ->schema([

                Section::make('Detail Survey')
                    ->schema([
                        Infolists\Components\TextEntry::make('title'),
                        Infolists\Components\TextEntry::make('description')->html()->limit(300),
                        Infolists\Components\TextEntry::make('criteria'),
                        Infolists\Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'AKTIF' => 'success',
                                'NON-AKTIF' => 'danger',
                                'SELESAI' => 'warning',
                            })
                            ,
                        Infolists\Components\TextEntry::make('tanggal_mulai')->dateTime('d F Y'),
                        Infolists\Components\TextEntry::make('tanggal_selesai')->dateTime('d F Y'),
                    ])->columns(2)

                ]),

            ]);
    }
}



