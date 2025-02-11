<?php

namespace App\Filament\Resources\SurveyResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Card;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;

class SectionRelationManager extends RelationManager
{
    protected static string $relationship = 'section';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([Forms\Components\TextInput::make('section')
                    ->required()
                    ->label('Section')
                    ->maxLength(255),
                    Forms\Components\RichEditor::make('deskripsi')
                    // ->required()
                    ->label('Deskripsi'),
            ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            
            ->recordTitleAttribute('section')
            ->columns([
                Tables\Columns\TextColumn::make('section')->label('Name'),
                Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')->html(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    

    
}
