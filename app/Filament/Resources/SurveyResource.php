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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;


class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
         Card::make()->schema([
                Forms\Components\TextInput::make('title')
                ->label('Judul')
                // ->alphaNum()
                ->required(),
                Forms\Components\Textarea::make('description')
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
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('criteria')->label('Kriteria'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
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
    public static function infolist(Infolist $infolist): Infolist
{
    return $infolist
        ->schema([
        Section::make('Detail Survey')
            ->schema([
                Infolists\Components\TextEntry::make('title'),
                Infolists\Components\TextEntry::make('description'),
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
