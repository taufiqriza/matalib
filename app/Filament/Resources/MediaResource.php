<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Upload Media')
                    ->schema([
                        Forms\Components\FileUpload::make('path')
                            ->label('File')
                            ->required()
                            ->directory('media')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/*', 'application/pdf', 'video/*'])
                            ->maxSize(10240)
                            ->imagePreviewHeight('200')
                            ->columnSpanFull()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if ($state) {
                                    $file = collect($state)->first();
                                    if ($file) {
                                        $set('name', pathinfo($file, PATHINFO_FILENAME));
                                        $set('file_name', basename($file));
                                    }
                                }
                            }),
                    ]),

                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('file_name')
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\TextInput::make('alt_text')
                            ->maxLength(255)
                            ->helperText('Alternative text for images'),

                        Forms\Components\Textarea::make('caption')
                            ->rows(2),

                        Forms\Components\TextInput::make('folder')
                            ->maxLength(255)
                            ->helperText('Optional folder for organization'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        $isGrid = request()->query('view', 'grid') === 'grid';

        return $table
            ->contentGrid($isGrid ? [
                'md' => 3,
                'xl' => 4,
                '2xl' => 5,
            ] : null)
            ->columns($isGrid ? [
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('path')
                        ->height('auto')
                        ->width('100%')
                        ->disk('public')
                        ->extraImgAttributes(['class' => 'object-cover w-full aspect-[4/3] rounded-lg shadow-sm border border-gray-100']),
                    
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->weight('bold')
                            ->lineClamp(1)
                            ->size('sm')
                            ->tooltip(fn (Media $record) => $record->name),
                        
                        Tables\Columns\TextColumn::make('human_size')
                            ->color('gray')
                            ->size('xs'),
                    ])->space(1),
                ])->space(2)->extraAttributes(['class' => 'p-2']),
            ] : [
                Tables\Columns\ImageColumn::make('path')
                    ->label('Preview')
                    ->disk('public')
                    ->width(80)
                    ->height(60),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('file_name')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Type')
                    ->badge()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('human_size')
                    ->label('Size'),

                Tables\Columns\TextColumn::make('folder')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('uploader.name')
                    ->label('Uploaded By')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('folder')
                    ->options(fn () => Media::distinct()->whereNotNull('folder')->pluck('folder', 'folder')->toArray()),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
