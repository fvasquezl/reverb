<?php

namespace App\Filament\Resources;

use App\Events\PostChanged;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a Post')
                    ->description('Fill in the details for your post')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\CheckboxList::make('houses')
                            ->relationship('houses', 'name')
                            ->searchable()
                            ->columnSpanFull()
                            ->nullable(),
                    ])->columnSpan(1)
                    ->columns(2),
                Section::make('Meta')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->directory('posts')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('active')
                            ->label('Active')
                            ->helperText('When activated, other posts for the same houses will be deactivated')
                            ->columnSpanFull(),
                    ])->columnSpan(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->width(200)
                    ->height(50)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Estado')
                    ->onColor('success')
                    ->offColor('gray')
                    ->onIcon('heroicon-m-check-circle')
                    ->offIcon('heroicon-m-x-circle')
                    ->alignCenter()
                    ->sortable()
                    ->afterStateUpdated(function ($record, $state) {
                        \Filament\Notifications\Notification::make()
                            ->title($state ? 'Post activado' : 'Post desactivado')
                            ->body($state ? 'Este post ahora está visible en las casas asociadas.' : 'El post ha sido desactivado.')
                            ->success()
                            ->send();
                    }),
                Tables\Columns\TextColumn::make('houses.name')
                    ->icon('heroicon-o-home')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }


}
