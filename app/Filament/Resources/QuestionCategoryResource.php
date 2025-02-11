<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionCategoryResource\Pages;
use App\Models\QuestionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;

class QuestionCategoryResource extends Resource
{
    protected static ?string $model = QuestionCategory::class;
    protected static ?int $navigationSort = -7;
    protected static ?string $navigationGroup = 'Kelola Survey';
    protected static ?string $recordTitleAttribute = 'type';
    protected static ?string $navigationLabel = 'Pertanyaan Survey';
    protected static ?string $modelLabel = 'Pertanyaan Survey';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('type')
                    ->label('Jenis Pertanyaan')
                    ->minLength(5)
                    ->maxLength(50)
                    ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->label('Jenis Pertanyaan')->sortable()->searchable(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageQuestionCategories::route('/'),
        ];
    }
}
