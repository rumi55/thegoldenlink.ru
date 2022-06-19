<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Enums\Currency;
use App\Models\Event;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 50;

    protected static function getNavigationGroup(): ?string
    {
        return __('Events');
    }

    public static function getLabel(): string
    {
        return __('Event');
    }

    public static function getPluralLabel(): string
    {
        return __('Events');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make(__('General'))
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Toggle::make('is_published')
                                        ->label(__('Is published'))
                                        ->default(true),

                                    Forms\Components\Toggle::make('is_hot')
                                        ->label(__('Is hot'))
                                        ->default(false),

                                    ...LangField::from(
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->label(__('Title'))
                                    ),
                                    ...LangField::from(
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label(__('Subtitle'))
                                    ),
                                    ...LangField::from(
                                        Forms\Components\RichEditor::make('text_preview')
                                            ->label(__('Text of preview'))
                                            ->columnSpan(2)
                                    ),

                                    Forms\Components\BelongsToSelect::make('venue_id')
                                        ->relationship('venue', 'name')
                                        ->label(__('Venue')),

                                    Forms\Components\BelongsToManyMultiSelect::make('tags')
                                        ->preload()
                                        ->relationship('tags', 'name')
                                        ->label(__('Tags')),

                                    Forms\Components\BelongsToManyMultiSelect::make('teachers')
                                        ->required()
                                        ->preload()
                                        ->relationship('teachers', 'name')
                                        ->label(__('Teachers'))
                                        ->columnSpan(2),

                                ])
                                ->columns(2)
                        ]),

                    Forms\Components\Wizard\Step::make(__('Classes'))
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Repeater::make(__('Classes'))
                                        ->schema([
                                            Forms\Components\Toggle::make('is_payable')
                                                ->label(__('Is payable'))
                                                ->default(true),

                                            Forms\Components\Toggle::make('is_free')
                                                ->label(__('Is free'))
                                                ->default(false),

                                            ...LangField::from(
                                                Forms\Components\TextInput::make('name')
                                                    ->required()
                                                    ->label(__('Name'))
                                            ),
                                            ...LangField::from(
                                                Forms\Components\TextInput::make('subtitle')
                                                    ->label(__('Subtitle'))
                                            ),

                                            Forms\Components\Repeater::make(__('Dates'))
                                                ->schema([
                                                    Forms\Components\DateTimePicker::make('start_at')
                                                        ->label(__('Start at')),

                                                    Forms\Components\DateTimePicker::make('end_at')
                                                        ->label(__('End at')),
                                                ])
                                                ->columns(2)
                                                ->columnSpan(2)
                                                ->createItemButtonLabel(__('Add date')),

                                            Forms\Components\Repeater::make(__('Prices'))
                                                ->schema([
                                                    Forms\Components\TextInput::make('price')
                                                        ->numeric()
                                                        ->label(__('Price')),

                                                    Forms\Components\DateTimePicker::make('expire_at')
                                                        ->label(__('Expire at')),

                                                    Forms\Components\Select::make('currency')
                                                        ->options(Currency::options())
                                                        ->label(__('Currency')),
                                                ])
                                                ->columns(3)
                                                ->columnSpan(2)
                                                ->createItemButtonLabel(__('Add price'))
                                        ])
                                        ->columns(2)
                                        ->createItemButtonLabel(__('Add class'))
                                ]),
                        ]),

                    Forms\Components\Wizard\Step::make(__('View'))
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([

                                ])
                        ]),
                ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('venue_id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('subtitle'),
                Tables\Columns\TextColumn::make('dates'),
                Tables\Columns\TextColumn::make('text_preview'),
                Tables\Columns\BooleanColumn::make('is_hot'),
                Tables\Columns\BooleanColumn::make('is_published'),
                Tables\Columns\TextColumn::make('views'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
