<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComentariosRelationManagerResource\RelationManagers\ComentarioRelationManager;
use App\Filament\Resources\TestimonioResource\Pages;
use App\Filament\Resources\TestimonioResource\RelationManagers;
use App\Models\Testimonio;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
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

class TestimonioResource extends Resource
{
    protected static ?string $model = Testimonio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required(),

                Textarea::make('contenido')
                    ->label('Contenido')
                    ->rows(6),

                Select::make('categoria')
                    ->label('Categoría')
                    ->options([
                        'Experiencia' => 'Experiencia',
                        'Logro' => 'Logro',
                        'Otro' => 'Otro',
                    ])
                    ->required(),

                FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image()
                    ->directory('testimonios')
                    ->required(),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('categoria')
                    ->label('Categoría')
                    ->sortable(),

                TextColumn::make('vistas')
                    ->label('Vistas')
                    ->sortable(),

                TextColumn::make('comentarios_count')
                    ->label('Comentarios')
                    ->counts('comentarios')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
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
        //   ComentarioRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonios::route('/'),
            'create' => Pages\CreateTestimonio::route('/create'),
            'edit' => Pages\EditTestimonio::route('/{record}/edit'),
        ];
    }
}
