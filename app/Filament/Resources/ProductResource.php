<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'Productos';
    protected static ?string $label = 'Producto';
    protected static ?string $pluralLabel = 'Productos';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema(
                    [
                        // Segmento de información del producto
                        Section::make('Información del Producto')->schema(
                            [
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre del Producto') // "Product Name" en español
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set)
                                    => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Identificador (Slug)') // "Slug" en español
                                    ->required()
                                    ->maxLength(255)
                                    ->disabled()
                                    ->dehydrated()
                                    ->unique(Product::class, 'slug', ignoreRecord: true),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label('Descripción') // "Description" en español
                                    ->columnSpanFull()
                                    ->required()
                                    ->fileAttachmentsDirectory('products')
                            ]
                        )->columns(2),

                        Section::make('Imágenes')->schema(
                            [
                                FileUpload::make('images')
                                    ->label('Subir Imágenes') // "Upload Images" en español
                                    ->multiple()
                                    ->directory('products')
                                    ->maxFiles(5)
                                    ->reorderable(),
                                FileUpload::make('imagen_promocion')
                                    ->label('Subir Imágenes para mostrar en promocion') // "Upload Images" en español
                                    ->multiple()
                                    ->directory('products_promocion')
                                    ->maxFiles(5)
                                    ->reorderable()
                            ]
                        )
                    ]
                )->columnSpan(2),

                Group::make()->schema(
                    [
                        Section::make('Precio')->schema([
                            TextInput::make('price')
                                ->label('Precio')
                                ->numeric()
                                ->required()
                                ->prefix('PEN')
                                ->reactive() // Actualiza reactivamente otros campos
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $discountPercentage = $get('porcentaje_descuento') ?? 0; // Obtiene el porcentaje de descuento
                                    $discountPrice = $state * (1 - $discountPercentage / 100); // Calcula el precio con descuento
                                    $set('discount_price', $discountPrice); // Asigna el valor al campo de precio con descuento
                                }),
                    
                            TextInput::make('porcentaje_descuento')
                                ->label('Porcentaje de descuento')
                                ->numeric()
                                ->prefix('%')
                                ->reactive()
                                ->disabled(fn (callable $get) => !$get('en_promocion'))
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $price = $get('price') ?? 0; // Obtiene el precio
                                    $discountPrice = $price * (1 - $state / 100); // Calcula el precio con descuento
                                    $set('discount_price', $discountPrice); // Asigna el valor al campo de precio con descuento
                                }),
                    
                            TextInput::make('discount_price')
                                ->label('Precio con descuento')
                                ->numeric()
                                ->prefix('PEN')
                                ->disabled(), // Campo calculado, no editable por el usuario
                    
                            DatePicker::make('fecha_inicio_promocion')
                                ->label('Fecha de inicio de promoción')
                                ->disabled(fn (callable $get) => !$get('en_promocion')),
                    
                            DatePicker::make('fecha_fin_promocion')
                                ->label('Fecha de fin de promoción')
                                ->disabled(fn (callable $get) => !$get('en_promocion')),
                        ]),
                    
                        Section::make('Asociaciones')->schema(
                            [
                                Select::make('category_id')
                                    ->label('Categoría') // "Category" en español
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->relationship('category', 'name'),

                                Select::make('brand_id')
                                    ->label('Marca') // "Brand" en español
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->relationship('brand', 'name'),

                            ]
                        ),
                        Section::make('Estado')->schema(
                            [
                                Toggle::make('in_stock')
                                    ->label('En Stock') // "In Stock" en español

                                    ->default(true),

                                Toggle::make('is_active')
                                    ->label('Activo') // "Is Active" en español

                                    ->default(true),

                                Toggle::make('is_featured')
                                    ->label('Destacado') // "Featured" en español
                                ,

                                Toggle::make('on_sale')
                                    ->label('En Oferta') // "On Sale" en español
                                ,
                                Toggle::make('en_promocion')
                                    ->label('En promoción temporal')
                                    ->reactive(), // Permite reaccionar a los cambios de valor
                                TextInput::make('rating')
                                    ->label('Calificación promedio')
                                    ->numeric()
                                    ->maxValue(5)
                                    ->step(1)
                                   ,

                            ]
                        )
                    ]
                )->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre') // "Name" en español
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría') // 
                    ->sortable(),

                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Marca') // 
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Precio') // 
                    ->money('PEN')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean(),

                Tables\Columns\IconColumn::make('in_stock')
                    ->label('En Stock')
                    ->boolean(),

                Tables\Columns\IconColumn::make('on_sale')
                    ->label('En Oferta')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                SelectFilter::make('brand')
                    ->relationship('brand', 'name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
