<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComentarioResource\Pages;
use App\Filament\Resources\ComentarioResource\RelationManagers;
use App\Models\Comentario;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComentarioResource extends Resource
{
    protected static ?string $model = Comentario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('testimonio_id')
                ->label('Nombre')
                ->searchable()
                ->required()
                ->preload()
                ->relationship('testimonio','titulo'),
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required(),

                Textarea::make('contenido')
                    ->label('Contenido')
                    ->rows(4)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable(),

                TextColumn::make('contenido')
                    ->label('Contenido')
                    ->limit(50),
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
            'index' => Pages\ListComentarios::route('/'),
            'create' => Pages\CreateComentario::route('/create'),
            'edit' => Pages\EditComentario::route('/{record}/edit'),
        ];
    }
}
