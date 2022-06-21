<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 400;

    protected static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getLabel(): string
    {
        return __('Review');
    }

    public static function getPluralLabel(): string
    {
        return __('Reviews');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        ...LangField::from(
                            Forms\Components\TextInput::make('name')
                                ->label(__('Review from'))
                                ->required()
                        ),
                        ...LangField::from(
                            Forms\Components\Textarea::make('text')
                                ->label(__('Text'))
                        ),
                        Forms\Components\TextInput::make('link_to_youtube')
                            ->label(__('Link to youtube video'))
                            ->maxLength(255),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('photo')
                            ->label(__('Photo'))
                            ->collection(Review::COLLECTION)
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\TextColumn::make('link_to_youtube'),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
