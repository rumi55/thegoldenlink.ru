<?php

namespace App\Filament\Resources\RoleResource\RelationManagers;

use App\Filament\Helpers\LangField;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'display_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...LangField::from(
                    Forms\Components\TextInput::make('display_name')
                        ->label('Display name')
                        ->required()
                        ->maxLength(255),
                ),

                Forms\Components\TextInput::make('name')
                    ->label('Slug name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_name')
                    ->label(__('Display name')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('Slug name')),
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
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
