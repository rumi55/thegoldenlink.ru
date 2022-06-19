<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\OrganizerResource\Pages;
use App\Filament\Resources\OrganizerResource\RelationManagers;
use App\Models\Organizer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class OrganizerResource extends Resource
{
    protected static ?string $model = Organizer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 200;

    protected static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getLabel(): string
    {
        return __('Organizer');
    }

    public static function getPluralLabel(): string
    {
        return __('Organizers');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        ...LangField::from(
                            Forms\Components\TextInput::make('name')
                                ->label(__('Organizer name'))
                                ->required(),
                        ),

                        Forms\Components\TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\BelongsToSelect::make('city_id')
                            ->label(__('City'))
                            ->required()
                            ->relationship('city', 'name'),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('photo')
                            ->label(__('Photo'))
                            ->required()
                            ->collection('photo'),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('city.name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizers::route('/'),
            'create' => Pages\CreateOrganizer::route('/create'),
            'edit' => Pages\EditOrganizer::route('/{record}/edit'),
        ];
    }
}
