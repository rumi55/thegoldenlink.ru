<?php

namespace App\Filament\Resources;

use App\Filament\Helpers\LangField;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Enums\Currency;
use App\Models\Enums\EventViews;
use App\Models\Event;
use App\Models\EventClass;
use App\Services\Helpers\Forms\FileUpload;
use App\Services\Helpers\Forms\Placeholder;
use App\Services\Utils\Tag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\HtmlString;

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

    public static function general(): Forms\Components\Card
    {
        return Forms\Components\Card::make()
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

                Forms\Components\MultiSelect::make('tags')
                    ->required()
                    ->preload()
                    ->relationship('tags', 'name')
                    ->label(__('Tags')),

                Forms\Components\MultiSelect::make('teachers')
                    ->required()
                    ->preload()
                    ->relationship('teachers', 'name')
                    ->label(__('Teachers')),

                Forms\Components\SpatieMediaLibraryFileUpload::make('preview_image')
                    ->required()
                    ->label(__('Preview image'))
                    ->collection('preview_image'),

                Forms\Components\Select::make('venue_id')
                    ->relationship('venue', 'name')
                    ->label(__('Venue')),
            ])
            ->columns(2);
    }

    public static function classes(): Forms\Components\Card
    {
        return Forms\Components\Card::make()
            ->schema([
                Forms\Components\RelationshipRepeater::make('classes')
                    ->label(__('Classes'))
                    ->relationship('classes')
                    ->defaultItems(0)
                    ->schema([
                        Forms\Components\Toggle::make('is_payable')
                            ->label(__('Is payable'))
                            ->default(true),

                        Forms\Components\Toggle::make('is_free')
                            ->label(__('Is free'))
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

                        Forms\Components\MultiSelect::make('emailTemplatesAfterRegister')
                            ->label(__('Email template after register'))
                            ->relationship('emailTemplatesAfterRegister', 'name')
                            ->preload(),

                        Forms\Components\MultiSelect::make('emailTemplatesAfterPay')
                            ->label(__('Email template after pay'))
                            ->relationship('emailTemplatesAfterPay', 'name')
                            ->preload(),

                        Forms\Components\MultiSelect::make('emailTemplatesAfterClass')
                            ->label(__('Email template after class'))
                            ->relationship('emailTemplatesAfterClass', 'name')
                            ->preload(),

                        Forms\Components\MultiSelect::make('emailTemplatesAfterEvent')
                            ->label(__('Email template after event'))
                            ->relationship('emailTemplatesAfterEvent', 'name')
                            ->preload(),

                        Forms\Components\TextInput::make('link_to_class')
                            ->label(__('Link to translation (Zoom or other platform)')),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->label(__('Image'))
                            ->collection(EventClass::COLLECTION)
                            ->image(),

                        Forms\Components\Repeater::make('dates')
                            ->label(__('Dates'))
                            ->schema([
                                Forms\Components\DateTimePicker::make('start_at')
                                    ->required()
                                    ->label(__('Start at')),

                                Forms\Components\DateTimePicker::make('end_at')
                                    ->label(__('End at')),
                            ])
                            ->columns(2)
                            ->columnSpan(2)
                            ->createItemButtonLabel(__('Add date')),

                        Forms\Components\RelationshipRepeater::make('prices')
                            ->label(__('Prices'))
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->numeric()
                                    ->label(__('Price')),

                                Forms\Components\DateTimePicker::make('expire_at')
                                    ->label(__('Expire at')),

                                Forms\Components\Select::make('currency')
                                    ->default(Currency::RUB)
                                    ->options(Currency::options())
                                    ->label(__('Currency')),
                            ])
                            ->defaultItems(0)
                            ->columns(3)
                            ->columnSpan(2)
                            ->createItemButtonLabel(__('Add price')),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel(__('Add class')),
            ]);
    }

    public static function eventView(): Forms\Components\Card
    {
        return Forms\Components\Card::make()
            ->schema([
                Forms\Components\Builder::make('views')
                    ->label(__('Blocks'))
                    ->createItemButtonLabel(__('Add'))
                    ->createItemBetweenButtonLabel(__('Add'))
                    ->blocks([
                        Forms\Components\Builder\Block::make(EventViews::HEADER_HORIZONTAL->name)
                            ->label(EventViews::options(EventViews::HEADER_HORIZONTAL))
                            ->schema([
                                FileUpload::imageForEventView()
                                    ->required(),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/header_horizontal.png'
                                ),
                            ]),

                        Forms\Components\Builder\Block::make(EventViews::HEADER_VERTICAL->name)
                            ->label(EventViews::options(EventViews::HEADER_VERTICAL))
                            ->schema([
                                FileUpload::imageForEventView()
                                    ->required(),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/header_vertical.png'
                                ),
                            ]),

                        Forms\Components\Builder\Block::make(EventViews::VIDEO->name)
                            ->label(EventViews::options(EventViews::VIDEO))
                            ->schema([
                                ...LangField::from(
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required()
                                ),

                                Forms\Components\TextInput::make('link_to_youtube')
                                    ->label(__('Link to youtube'))
                                    ->required()
                                    ->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/video.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::TEXT_WITH_TAGS->name)
                            ->label(EventViews::options(EventViews::TEXT_WITH_TAGS))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\RichEditor::make('text')
                                        ->label(__('Text'))
                                        ->required()
                                        ->columnSpan(2),

                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\TextInput::make('subtitle')
                                        ->label(__('Subtitle')),
                                ]),

                                Forms\Components\Toggle::make('is_show_tags')
                                    ->label(__('Is show tags'))
                                    ->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/text_with_tags.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::LIST->name)
                            ->label(EventViews::options(EventViews::LIST))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\TextInput::make('subtitle')
                                        ->label(__('Subtitle')),
                                ]),

                                Forms\Components\Repeater::make('items')
                                    ->label(__('Items'))
                                    ->schema([
                                        ...LangField::fromArray([
                                            Forms\Components\TextInput::make('title')
                                                ->label(__('Title'))
                                                ->required(),

                                            Forms\Components\RichEditor::make('text')
                                                ->label(__('Text'))
                                                ->required(),
                                        ])
                                    ])
                                    ->columnSpan(2)
                                    ->createItemButtonLabel(__('Add'))
                                    ->columns(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/list.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::LEFT_IMAGE_RIGHT_TEXT->name)
                            ->label(EventViews::options(EventViews::LEFT_IMAGE_RIGHT_TEXT))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\RichEditor::make('text')
                                        ->label(__('Text')),
                                ]),

                                Forms\Components\Repeater::make('items')
                                    ->label(__('Items'))
                                    ->schema([
                                        ...LangField::from(
                                            Forms\Components\RichEditor::make('text')
                                                ->label(__('Text'))
                                                ->required(),
                                        )
                                    ])
                                    ->columnSpan(2)
                                    ->createItemButtonLabel(__('Add'))
                                    ->columns(2),

                                FileUpload::imageForEventView()->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/left_image_right_text.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::RIGHT_IMAGE_LEFT_TEXT->name)
                            ->label(EventViews::options(EventViews::RIGHT_IMAGE_LEFT_TEXT))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\RichEditor::make('text')
                                        ->label(__('Text')),
                                ]),

                                Forms\Components\Repeater::make('items')
                                    ->label(__('Items'))
                                    ->schema([
                                        ...LangField::from(
                                            Forms\Components\RichEditor::make('text')
                                                ->label(__('Text'))
                                                ->required(),
                                        )
                                    ])
                                    ->columnSpan(2)
                                    ->createItemButtonLabel(__('Add'))
                                    ->columns(2),

                                FileUpload::imageForEventView()->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/right_image_left_text.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::SCHEDULE->name)
                            ->label(EventViews::options(EventViews::SCHEDULE))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\TextInput::make('line_1')
                                        ->label(__('Line 1')),

                                    Forms\Components\TextInput::make('line_2')
                                        ->label(__('Line 2')),
                                ]),

                                Forms\Components\Repeater::make('days')
                                    ->label(__('Days'))
                                    ->createItemButtonLabel(__('Add'))
                                    ->columnSpan(2)
                                    ->schema([
                                        Forms\Components\DatePicker::make('date')
                                            ->label(__('Date'))
                                            ->required(),

                                        Forms\Components\Repeater::make('time')
                                            ->label(__('Time'))
                                            ->createItemButtonLabel(__('Add'))
                                            ->columnSpan(2)
                                            ->columns(2)
                                            ->schema([
                                                ...LangField::from(
                                                    Forms\Components\TextInput::make('text')
                                                        ->label(__('Text'))
                                                        ->required(),
                                                ),

                                                Forms\Components\TextInput::make('start_at')
                                                    ->mask(
                                                        fn(Forms\Components\TextInput\Mask $mask
                                                        ) => $mask->pattern('00:00')
                                                    )
                                                    ->label(__('Start at'))
                                                    ->required(),

                                                Forms\Components\TextInput::make('finish_at')
                                                    ->mask(
                                                        fn(Forms\Components\TextInput\Mask $mask
                                                        ) => $mask->pattern('00:00')
                                                    )
                                                    ->label(__('Finish at')),
                                            ]),
                                    ]),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/schedule.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::TEXT_ON_IMAGE->name)
                            ->label(EventViews::options(EventViews::TEXT_ON_IMAGE))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\RichEditor::make('subtitle')
                                        ->label(__('Subtitle')),
                                ]),

                                FileUpload::imageForEventView()->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/text_on_image.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::TEXT_ON_IMAGE_2->name)
                            ->label(EventViews::options(EventViews::TEXT_ON_IMAGE_2))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('title')
                                        ->label(__('Title'))
                                        ->required(),

                                    Forms\Components\TextInput::make('subtitle')
                                        ->label(__('Subtitle')),
                                ]),

                                FileUpload::imageForEventView()->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/text_on_image_2.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),

                        Forms\Components\Builder\Block::make(EventViews::QUOTE->name)
                            ->label(EventViews::options(EventViews::QUOTE))
                            ->schema([
                                ...LangField::fromArray([
                                    Forms\Components\TextInput::make('author')
                                        ->label(__('Author'))
                                        ->required(),

                                    Forms\Components\Textarea::make('text')
                                        ->label(__('Text')),
                                ]),

                                FileUpload::imageForEventView()->columnSpan(2),

                                Placeholder::howItWillLook(
                                    '/images/admin/event/views/quote.png'
                                )->columnSpan(2),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make(__('General'))
                        ->schema([
                            static::general(),
                        ]),

                    Forms\Components\Wizard\Step::make(__('Classes'))
                        ->schema([
                            static::classes(),
                        ]),

                    Forms\Components\Wizard\Step::make(__('View'))
                        ->schema([
                            static::eventView(),
                        ]),
                ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_start')
                    ->label(__('Date start'))
                    ->sortable()
                    ->dateTime(),
            ])
            ->defaultSort('date_start', 'asc')
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
            'index'  => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit'   => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
