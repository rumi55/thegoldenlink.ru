<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\CustomBlockResource\Pages;
use App\Filament\Resources\CustomBlockResource\RelationManagers;
use App\Models\CustomBlock;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CustomBlockResource extends Resource
{
    protected static ?string $model = CustomBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 50;

    protected static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function getLabel(): string
    {
        return __('Custom Block');
    }

    public static function getPluralLabel(): string
    {
        return __('Custom Blocks');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        ...LangField::from(
                            Forms\Components\TextInput::make('name')
                                ->label(__('Name'))
                                ->required(),
                        ),
                        ...LangField::from(
                            Forms\Components\Textarea::make('text')
                                ->label(__('Text')),
                        ),

                        Forms\Components\Select::make('type')
                            ->label(__('Place on site'))
                            ->options(CustomBlock::types())
                            ->required(),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->label(__('Image'))
                            ->required()
                            ->collection('image'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
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
            'index' => Pages\ListCustomBlocks::route('/'),
            'create' => Pages\CreateCustomBlock::route('/create'),
            'edit' => Pages\EditCustomBlock::route('/{record}/edit'),
        ];
    }
}
