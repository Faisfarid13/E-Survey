<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Filament\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswerResource extends Resource
{
    protected static ?string $model = Survey::class;
    protected static ?string $label = 'Hasil Survey';
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'SELESAI');
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                ->label('Deskripsi')->html()
                ->tooltip(fn ($state): string => $state), 
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\AnswerRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
            'view' => Pages\ViewAnswer::route('/{record}'),
        ];
    }

     public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('Detail Survey')
                    ->schema([
                        Infolists\Components\TextEntry::make('title'),
                        Infolists\Components\TextEntry::make('description')->html()->limit(30),
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
                    ,
                
            ]);
    }    
}
