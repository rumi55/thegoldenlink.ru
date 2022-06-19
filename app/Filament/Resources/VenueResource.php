<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueResource\Pages;
use App\Filament\Resources\VenueResource\RelationManagers;
use App\Forms\Components\MapPicker;
use App\Models\Venue;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 200;

    protected static function getNavigationGroup(): ?string
    {
        return __('Events');
    }

    public static function getLabel(): string
    {
        return __('Venue');
    }

    public static function getPluralLabel(): string
    {
        return __('Venues');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name.ru')
                            ->label(__('Name'))
                            ->ruHelp()
                            ->required(),

                        Forms\Components\TextInput::make('name.en')
                            ->label(__('Name'))
                            ->enHelp()
                            ->required(),

                        Forms\Components\TextInput::make('address.ru')
                            ->label(__('Address'))
                            ->ruHelp(),

                        Forms\Components\TextInput::make('address.en')
                            ->label(__('Address'))
                            ->enHelp(),

                        Forms\Components\BelongsToSelect::make('city_id')
                            ->label(__('City'))
                            ->required()
                            ->relationship('city', 'name'),
                    ])
                    ->columns(),

                Forms\Components\RichEditor::make('description.ru')
                    ->label(__('Description'))
                    ->columnSpan(2)
                    ->ruHelp(),

                Forms\Components\RichEditor::make('description.en')
                    ->label(__('Description'))
                    ->columnSpan(2)
                    ->enHelp(),

                MapPicker::make('coordinates')
                    ->label(__('Location'))
                    ->center([
                        'lat' => '55.722700',
                        'lng' => '37.572200',
                    ])
                    ->columnSpan(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),

                Tables\Columns\TextColumn::make('city.name')
                    ->label(__('City')),

                Tables\Columns\TextColumn::make('address')
                    ->label(__('Address')),
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
            'index' => Pages\ListVenues::route('/'),
            'create' => Pages\CreateVenue::route('/create'),
            'edit' => Pages\EditVenue::route('/{record}/edit'),
        ];
    }
}
