<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Survey;
use Filament\Infolists;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Filament\Resources\SurveyResource\Widgets\StatsOverview;


class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;
    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
         Card::make()
         ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Judul')
                // ->alphaNum()
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
                Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'AKTIF' => 'AKTIF',
                    'NON-AKTIF' => 'NON-AKTIF',
                    'SELESAI' => 'SELESAI',
                ])
                ->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')
                ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                ->required(),
                ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi')->formatStateUsing(fn (string $state): string => strip_tags($state))->limit(25),
                Tables\Columns\TextColumn::make('criteria')->label('Kriteria'),
                Tables\Columns\TextColumn::make('status')->label('Status')->color(fn (string $state): string => match ($state) {
                    'AKTIF' => 'success',
                    'NON-AKTIF' => 'danger',
                    'SELESAI' => 'warning',
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
    public static function getWidgets(): array{
        return [
            StatsOverview::class
        ];
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
            Section::make('Detail Survey')
                ->schema([
                    Infolists\Components\TextEntry::make('title'),
                    Infolists\Components\TextEntry::make('description')->formatStateUsing(fn (string $state): string => strip_tags($state))->limit(30),
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
                    Infolists\Components\TextEntry::make('tanggal_selesai')->dateTime('d F Y')
                        ,
                ])->columns(2)
            ]);
    }    
}
