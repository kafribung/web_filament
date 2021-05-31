<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models\Customer;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Forms\Components;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use Filament\Forms\Components\Component;

class CustomerResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    public static $model = Customer::class;


    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\FileUpload::make('img')
                ->required()
                ->placeholder('Drag and drop file')
                ->acceptedFileTypes(['image/*'])
                ->directory('img_customers')
                ->imagePreviewHeight(200)
                ->imageCropAspectRatio('1:1'),
                Components\TextInput::make('name')
                ->autofocus()
                ->required()
                ->min(3),
                Components\TextInput::make('phone')
                ->required()
                ->placeholder('ex. +6285331459400')
                ->label('Number Phone')
                ->helpMessage('no space'),
                Components\Textarea::make('address')
                ->required()
                ->disableAutocomplete(),
                // Relation one to many
                Components\BelongsToSelect::make('category_id')
                ->relationship('category', 'title')
                ->preload(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Image::make('takeImg')
                ->size(100),
                Columns\Text::make('name')
                ->searchable()
                ->sortable(),
                Columns\Text::make('phone')
                ->searchable()
                ->sortable()
                ->url(fn($customer) => "tel:{ $customer->phone }"),
                Columns\Text::make('address')
                ->searchable()
                ->sortable(),
                Columns\Text::make('category.title')
                ->label('category'),
                Columns\Text::make('created_at')->date()->label('tanggal_pembuatan'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListCustomers::routeTo('/', 'index'),
            Pages\CreateCustomer::routeTo('/create', 'create'),
            Pages\EditCustomer::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
