<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostsResource\Pages;
use App\Filament\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label("Title")
                ->columnSpan([
                    'sm' => 8,
                ])
                ->required(),
                Forms\Components\RichEditor::make('content')
                ->label("Content")
                ->columnSpan([
                    'sm' => 8,
                ])
                ->required(),
                Forms\Components\TextInput::make('url')
                ->label("url")
                ->columnSpan([
                    'sm' => 8,
                ])
                ->required(),
                Forms\Components\TextInput::make("order")
                ->numeric()
                ->label("order")
                ->columnSpan([
                    'sm' => 4,
                ])
                ->required(),
                Forms\Components\Select::make("status")
                ->label("status")
                ->options([
                    '1' => 'Published',
                    '0' => 'Draft',
                ])
                ->columnSpan([
                    'sm' => 4,
                ])
                ->required(),
                Forms\Components\FileUpload::make('image')
                ->label('Featured Image')
                ->columnSpan([
                    'sm' => 1,
                ]),
                
                Forms\Components\TagsInput::make('tags')
                ->label("tags")->columnSpan([
                    'sm' => 1,
                ]),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                
        
                
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
            'create' => Pages\CreatePosts::route('/create'),
            'edit' => Pages\EditPosts::route('/{record}/edit'),
        ];
    }    
}
