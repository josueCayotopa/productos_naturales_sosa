<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $navigationLabel = 'Marcas';
    protected static ?string $label = 'Marca';
    protected static ?string $pluralLabel = 'Marcas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Creación de sección y labels en español
                Section::make()
                    ->schema([
                        Grid::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nombre') // Etiqueta en español para "name"
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn(string $operation, $state, Set $set) =>
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                    ),
                                TextInput::make('slug')
                                    ->label('Slug') // Etiqueta en español para "slug"
                                    ->required()
                                    ->disabled()
                                    ->maxLength(255)
                                    ->dehydrated()
                                    ->unique(Brand::class, 'slug', ignoreRecord: true),
                            ]),
                        FileUpload::make('image')
                            ->label('Imagen de la marca') // Etiqueta en español para "image"
                            ->image()
                            ->directory('brands'),
                        Toggle::make('is_active')
                            ->label('¿Activo?') // Etiqueta en español para "is_active"
                            ->required()
                            ->default(true)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre') // Etiqueta en español para "name"
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagen'), // Etiqueta en español para "image"

                Tables\Columns\TextColumn::make('slug')
                    ->label('Identificador') // Etiqueta en español para "slug"
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('¿Activo?') // Etiqueta en español para "is_active"
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación') // Etiqueta en español para "created_at"
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última actualización') // Etiqueta en español para "updated_at"
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make(
                    [ // botones que se necesitan para editar  y elimnar 
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\DeleteAction::make(),
                    ]
                )
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
