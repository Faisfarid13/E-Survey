<?php

namespace App\Filament\Resources\SurveyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use App\Models\Section;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('question')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('section_id')
                    ->label('Section')
                    ->disabledOn('edit')
                    ->required()
                    ->options(function (RelationManager $livewire): array {
                    return $livewire->getOwnerRecord()->section()
                        ->pluck('section','id')
                        ->toArray();
                }),
                Forms\Components\Select::make('question_category_id')
                    ->relationship('question_category', 'type')->relationship('question_category', 'type')
                    ->live()
                    ->required()
                    ->visibleOn('create')
                    ->disabledOn('edit')
                    ->afterStateUpdated(fn (Select $component) => $component
                    ->getContainer()
                    ->getComponent('dynamicTypeFields')
                    ->getChildComponentContainer()
                    ->fill()),        
                    Grid::make(1)
                    ->schema(fn (Get $get): array => match ($get('question_category_id'))
                    {
                        '4', '5','6','7'=> [
                            Forms\Components\Repeater::make('choice')
                            ->relationship()
                             ->visibleOn('create')
                            ->schema([
                                Forms\Components\TextInput::make('pilihan_pertanyaan')->label('Pilihan_pertanyaan')->required(),
                            ])
                            ],
                        default => [],
                    },)
                    ->key('dynamicTypeFields'),

                    // Forms\Components\Select::make('question_category_id')
                    // ->relationship('question_category', 'type')->relationship('question_category', 'type')
                    // ->disabledOn('create')
                    // ->visibleOn('edit')
                    // ->afterStateUpdated(fn (Select $component) => $component
                    // ->getContainer()
                    // ->getComponent('cobacoba')
                    // ->getChildComponentContainer()
                    // ->fill()),

                    // Grid::make(1)
                    // ->schema(fn (Get $get): array => match ($get('question_category_id'))
                    // {
                    //     '4', '5'=> [
                    //         Forms\Components\Repeater::make('choice')
                    //         ->relationship()
                    //          ->visibleOn('edit')
                    //         ->schema([
                    //             Forms\Components\TextInput::make('pilihan_pertanyaan')->label('Pilihan_pertanyaan')->required(),
                    //         ])
                    //         ],
                    //     default => [],
                    // },)
                    // ->key('cobacoba'),




                    
                    Grid::make(1)
                    ->schema([
                        Forms\Components\Repeater::make('choice')
                            ->visibleOn('edit')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('pilihan_pertanyaan')->label('Pilihan_pertanyaan')->required(),
                            ])
                    ]),

                    Forms\Components\TagsInput::make('validation')
                    ->suggestions([
                        'required',
                        'min:2',
                        'max:8',
                    ])
                    ->separator(','),

                // Forms\Components\Section::make('Validasi')
                //     ->schema([
                //         Forms\Components\Repeater::make('validation')
                //         ->schema([
                //             Forms\Components\Select::make('type')
                //                 ->label('Jenis')
                //                 ->options([
                //                     'required' => 'Wajib Diisi',
                //                     'numeric' => 'Jawaban Hanya Berisi Angka',
                //                     'string' => 'Jawaban Bisa Berisi Apa Saja',
                //                     'minLength' => 'Huruf Minimal',
                //                     'maxLength' => 'Huruf Maksimal',
                //                 ])
                //                 ->required()
                //                 ->searchable()
                //                 ->live()
                //                 ->afterStateUpdated(fn (Select $component) => $component
                //                 ->getContainer()
                //                 ->getComponent('dynamicTypeFields')
                //                 ->getChildComponentContainer()
                //                 ->fill())
                //                 ,    
                //                 Grid::make(1)
                //                 ->schema(fn (Get $get): array => match ($get('type')) {
                //                     'minLength' => [
                //                         Forms\Components\TextInput::make('value')
                //                             ->required(),
                //                     ],
                //                     'maxLength' => [
                //                         Forms\Components\TextInput::make('value')
                //                             ->required(),
                //                     ],
                //                     default => [],
                //                 })
                //                 ->key('dynamicTypeFields')
                //         ])
                        
                //         ->columns(1)
                //     ]),

            ])->columns(1);
    }
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                Tables\Columns\TextColumn::make('section.section')
                    ->label('Section'),
                Tables\Columns\TextColumn::make('question')
                    ->label('Pertanyaan'),
                Tables\Columns\TextColumn::make('question_category.type')
                    ->label('Jenis Pertanyaan'),
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}

