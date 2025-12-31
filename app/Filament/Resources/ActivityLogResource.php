<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Activity Logs';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Activity Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('user.name')
                            ->label('User'),

                        Infolists\Components\TextEntry::make('action')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'created' => 'success',
                                'updated' => 'warning',
                                'deleted' => 'danger',
                                default => 'gray',
                            }),

                        Infolists\Components\TextEntry::make('model_name')
                            ->label('Model'),

                        Infolists\Components\TextEntry::make('model_id')
                            ->label('Record ID'),

                        Infolists\Components\TextEntry::make('ip_address')
                            ->label('IP Address'),

                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Timestamp')
                            ->dateTime(),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Changes')
                    ->schema([
                        Infolists\Components\KeyValueEntry::make('old_values')
                            ->label('Old Values')
                            ->columnSpan(1),

                        Infolists\Components\KeyValueEntry::make('new_values')
                            ->label('New Values')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Request Info')
                    ->schema([
                        Infolists\Components\TextEntry::make('user_agent')
                            ->label('User Agent')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('action')
                    ->colors([
                        'success' => 'created',
                        'warning' => 'updated',
                        'danger' => 'deleted',
                        'info' => 'viewed',
                    ]),

                Tables\Columns\TextColumn::make('model_name')
                    ->label('Model'),

                Tables\Columns\TextColumn::make('model_id')
                    ->label('ID')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->options([
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted',
                        'viewed' => 'Viewed',
                    ]),

                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name'),

                Tables\Filters\SelectFilter::make('model_type')
                    ->label('Model')
                    ->options(fn () => ActivityLog::distinct()->pluck('model_type', 'model_type')
                        ->mapWithKeys(fn ($type) => [$type => class_basename($type)])
                        ->toArray()
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
            'view' => Pages\ViewActivityLog::route('/{record}'),
        ];
    }
}
