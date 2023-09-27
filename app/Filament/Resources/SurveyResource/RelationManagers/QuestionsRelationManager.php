<?php

namespace App\Filament\Resources\SurveyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('question_category_id')
                    ->relationship('question_category', 'type')
                    ->live()
                    ->afterStateUpdated(fn (Select $component) => $component
                    ->getContainer()
                    ->getComponent('dynamicTypeFields')
                    ->getChildComponentContainer()
                    ->fill())
                    ,    
                    Grid::make(1)
                    ->schema(fn (Get $get): array => match ($get('question_category_id'))
                    {
                        '4'=> [
                            Forms\Components\Repeater::make('answers')
                            ->schema([
                                Forms\Components\TextInput::make('value')->label('Skala')->required(),
                            ])
                            ],
                        '5'=> [
                            Forms\Components\Repeater::make('answers')
                            ->schema([
                                Forms\Components\TextInput::make('value')->label('Pilihan Ganda')->required(),
                            ])
                            ],
                        default => [],
                    }
                    
                ),
                Forms\Components\Section::make('Validasi')
                    ->schema([
                        Forms\Components\Repeater::make('validation')
                        ->schema([
                            Forms\Components\Select::make('type')
                                ->label('Jenis')
                                ->options([
                                    'required' => 'Wajib Diisi',
                                    'numeric' => 'Jawaban Hanya Berisi Angka',
                                    'string' => 'Jawaban Bisa Berisi Apa Saja',
                                    'minLength' => 'Huruf Minimal',
                                    'maxLength' => 'Huruf Maksimal',
                                ])
                                ->required()
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(fn (Select $component) => $component
                                ->getContainer()
                                ->getComponent('dynamicTypeFields')
                                ->getChildComponentContainer()
                                ->fill())
                                ,    
                                Grid::make(1)
                                ->schema(fn (Get $get): array => match ($get('type')) {
                                    'minLength' => [
                                        Forms\Components\TextInput::make('value')
                                            ->required(),
                                    ],
                                    'maxLength' => [
                                        Forms\Components\TextInput::make('value')
                                            ->required(),
                                    ],
                                    default => [],
                                })
                                ->key('dynamicTypeFields')
                                
                                
                             
                            // Forms\Components\TextInput::make('value')
                            //     ->hidden(function (Get $get) 
                            // {
                            //     if (in_array($get['validation'],['required','numeric','string']))
                            //     {
                            //         true;
                            //     } else{
                            //         false;
                            //     }
                            
                            // }),
                        ])
                        
                        ->columns(1)
                    ]),

            ]);
    }
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Pertanyaan'),
                Tables\Columns\TextColumn::make('question_category.type')
                    ->label('Jenis Pertanyaan')->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

// if (in_array($state,['required','numeric','string']))
// {
//     $set('value', hidden(true));
// }
// else{
//     $set('value')->hidden(false);
// }
// }
