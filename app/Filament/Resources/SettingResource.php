<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('group')
                            ->options([
                                'general' => 'General',
                                'seo' => 'SEO',
                                'social' => 'Social Media',
                                'mail' => 'Mail',
                                'appearance' => 'Appearance',
                            ])
                            ->required()
                            ->default('general'),

                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Unique identifier, e.g. site_name'),

                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'boolean' => 'Boolean',
                                'number' => 'Number',
                                'json' => 'JSON',
                                'image' => 'Image',
                            ])
                            ->default('text')
                            ->required()
                            ->live(),

                        Forms\Components\Toggle::make('is_public')
                            ->label('Public')
                            ->helperText('Accessible via API'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Value')
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'text')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'textarea')
                            ->rows(5),

                        Forms\Components\Toggle::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'boolean'),

                        Forms\Components\TextInput::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'number')
                            ->numeric(),

                        Forms\Components\Textarea::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'json')
                            ->rows(10)
                            ->helperText('Enter valid JSON'),

                        Forms\Components\FileUpload::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'image')
                            ->image()
                            ->directory('settings'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'primary',
                        'seo' => 'success',
                        'social' => 'info',
                        'mail' => 'warning',
                        'appearance' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('type'),

                Tables\Columns\IconColumn::make('is_public')
                    ->boolean()
                    ->label('Public'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => 'General',
                        'seo' => 'SEO',
                        'social' => 'Social Media',
                        'mail' => 'Mail',
                        'appearance' => 'Appearance',
                    ]),

                Tables\Filters\TernaryFilter::make('is_public')
                    ->label('Public'),
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
            ->groups([
                Tables\Grouping\Group::make('group')
                    ->collapsible(),
            ])
            ->defaultGroup('group');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
