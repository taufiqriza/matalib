<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'allItems';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('type')
                    ->options([
                        'custom' => 'Custom Link',
                        'page' => 'Page',
                        'category' => 'Category',
                        'post' => 'Post',
                    ])
                    ->default('custom')
                    ->live()
                    ->required(),

                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->maxLength(255)
                    ->visible(fn (Forms\Get $get) => $get('type') === 'custom'),

                Forms\Components\Select::make('parent_id')
                    ->label('Parent Item')
                    ->options(fn () => $this->getOwnerRecord()->allItems()->pluck('title', 'id'))
                    ->searchable(),

                Forms\Components\Select::make('target')
                    ->options([
                        '_self' => 'Same Window',
                        '_blank' => 'New Window',
                    ])
                    ->default('_self'),

                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('Heroicon name, e.g. heroicon-o-home'),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent'),

                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'custom',
                        'success' => 'page',
                        'warning' => 'category',
                        'info' => 'post',
                    ]),

                Tables\Columns\TextColumn::make('url')
                    ->limit(30),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order');
    }
}
