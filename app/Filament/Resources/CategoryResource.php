<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Table;

class CategoryResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    public static $model = Category::class;

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('title')
                ->required()
                ->autofocus()
                ->disableAutocomplete(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('title')
                ->searchable()
                ->sortable()
            ])
            ->filters([
                //
            ]);
    }

    public static function routes()
    {
        return [
            Pages\ListCategories::routeTo('/', 'index'),
            Pages\CreateCategory::routeTo('/create', 'create'),
            Pages\EditCategory::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
