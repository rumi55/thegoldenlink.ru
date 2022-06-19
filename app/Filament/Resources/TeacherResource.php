<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 100;

    protected static function getNavigationGroup(): ?string
    {
        return __('Events');
    }

    public static function getLabel(): string
    {
        return __('Teacher');
    }

    public static function getPluralLabel(): string
    {
        return __('Teachers');
    }

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        ...LangField::from(
                            Forms\Components\TextInput::make('name')
                                ->label(__('Teacher name'))
                                ->required()
                        ),
                        ...LangField::from(
                            Forms\Components\RichEditor::make('preview_text')
                                ->label(__('Text of preview'))
                                ->columnSpan(2),
                        ),
                        ...LangField::from(
                            Forms\Components\RichEditor::make('text')
                                ->label(__('Text'))
                                ->columnSpan(2),
                        ),
                    ])
                    ->columns(2),

                    Forms\Components\SpatieMediaLibraryFileUpload::make('preview_photo')
                        ->label(__('Photo of preview'))
                        ->collection('preview_photo'),

                Forms\Components\SpatieMediaLibraryFileUpload::make('photo')
                    ->label(__('Photo'))
                    ->collection('photo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('photo')
                    ->label(__('Photo'))
                    ->collection('photo')
                    ->rounded()
                    ->height(80),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('Teacher name')),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
