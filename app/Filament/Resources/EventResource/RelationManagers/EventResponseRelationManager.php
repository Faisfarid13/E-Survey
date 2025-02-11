<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResponseRelationManager extends RelationManager
{
    protected static string $relationship = 'eventResponse';
    protected static ?string $title = 'Peserta Kegiatan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('nip')
                    ->searchable()
                    ->default('-')
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('status_pegawai')->label('Status Pegawai')
                    ->formatStateUsing(fn (string $state) => $state == 'asn' ? 'ASN' : 'Non ASN'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn (): bool => auth()->user()->hasRole(['super_admin'])),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn (): bool => auth()->user()->hasRole(['super_admin'])),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (): bool => auth()->user()->hasRole(['super_admin'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
