<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailingListResource\Pages;
use App\Filament\Resources\MailingListResource\RelationManagers;
use App\Models\Event;
use App\Models\MailingList;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class MailingListResource extends Resource
{
    protected static ?string $model = MailingList::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 5000;

    protected static function getNavigationGroup(): ?string
    {
        return __('Email');
    }

    public static function getLabel(): string
    {
        return __('MailingList');
    }

    public static function getPluralLabel(): string
    {
        return __('MailingLists');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make(__('Naming'))
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label(__('Name of mailing list'))
                                ->required()
                                ->maxLength(255),

                            Forms\Components\Select::make('emailTemplate')
                                ->options([])
                                ->label(__('Email template'))
                                ->required()
                        ]),
                    Forms\Components\Wizard\Step::make(__('Events'))
                        ->schema([
                            Forms\Components\MultiSelect::make('whom.events')
                                ->getSearchResultsUsing(function (string $search) {
                                    return Event::query()
                                        ->where('title', 'like', "%{$search}%")
                                        ->orderByDesc('id')
                                        ->limit(15)
                                        ->pluck('title', 'id');
                                })
                                ->getOptionLabelsUsing(fn (array $values) => Event::find($values)->pluck('name')),
                        ]),
                    Forms\Components\Wizard\Step::make(__('Users'))
                        ->schema([
                            Forms\Components\MultiSelect::make('whom.users')
                                ->getSearchResultsUsing(function (string $search) {
                                    return User::query()
                                        ->where('name', 'like', "%{$search}%")
                                        ->orWhere('email', 'like', "%{$search}%")
                                        ->orderByDesc('id')
                                        ->limit(15)
                                        ->pluck('name', 'id');
                                })
                                ->getOptionLabelsUsing(fn (array $values) => User::find($values)->pluck('name')),
                        ]),
                    Forms\Components\Wizard\Step::make(__('Sending'))
                        ->schema([
                            // ...
                        ]),
                ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('sent_at')
                    ->dateTime(),
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
            'index' => Pages\ListMailingLists::route('/'),
            'create' => Pages\CreateMailingList::route('/create'),
            'edit' => Pages\EditMailingList::route('/{record}/edit'),
        ];
    }
}
