<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use Doctrine\DBAL\Schema\Column;
use Faker\Core\Number;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number as SupportNumber;
use PHPUnit\Framework\Attributes\RequiresPhp;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;
use Symfony\Contracts\Service\Attribute\Required;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Crearemos los componenetes para el formulario 
                Group::make()->schema(
                    [
                        // un select para el campo nombre
                        Section::make('Order Imforamtion')->schema([
                            Select::make('user_id')
                                ->label('Customer')
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('payment_method')
                                ->options([
                                    'stripe' => 'Stripe',
                                    'cod' => 'Cash on Delivery'
                                ])
                                ->required(),
                            Select::make('payment_status')
                                ->options([
                                    'pending' => 'Pending',
                                    'paid' => 'Paid',
                                    'faild' => 'Failed'
                                ])
                                ->default('pending')
                                ->required(),
                            ToggleButtons::make('status')
                                ->inline()
                                ->default('new')
                                ->required()
                                ->options([
                                    'new' => 'New',
                                    'processing' => 'Processing',
                                    'shipped' => 'Shipped',
                                    'delivered' => 'Delivered',
                                    'cancelled' => 'Cancelled'

                                ])
                                ->colors(
                                    [
                                        'new' => 'info',
                                        'processing' => 'warning',
                                        'shipped' => 'success',
                                        'delivered' => 'success',
                                        'cancelled' => 'danger'
                                    ]
                                )
                                ->icons([
                                    'new' => 'heroicon-m-sparkles',
                                    'processing' => 'heroicon-m-arrow-path',
                                    'shipped' => 'heroicon-m-truck',
                                    'delivered' => 'heroicon-m-check-badge',
                                    'cancelled' => 'heroicon-m-x-circle'
                                ]),


                            Select::make('currency') //  moneda
                                ->options([
                                    'sol peruano' => 'Sol Peruano',
                                    'usd' => 'USD'
                                ]),
                            Select::make('shipping_method') //  
                                ->options([
                                    'Fedex' => 'FedEx',
                                    'olvacurrier' => 'OlvaCurrier',
                                    'shalom' => 'Shalom',
                                ]),
                            Textarea::make('notes')
                                ->columnSpanFull()
                        ])->columns(2),
                        Section::make('Order Items')->schema(
                            [
                                Repeater::make('items')
                                    ->relationship()
                                    ->schema([
                                        Select::make('product_id')
                                            ->relationship('product', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->distinct()
                                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                            ->columnSpan(4)
                                            ->reactive()
                                            ->afterStateUpdated(fn ($state, Set $set) => $set('unit_amount', Product::find($state)?->price ?? 0))
                                            ->afterStateUpdated(fn ($state, Set $set) => $set('total_amount', Product::find($state)?->price ?? 0)),

                                        TextInput::make('quantity')
                                            ->numeric()
                                            ->required()
                                            ->default(1)
                                            ->minValue(1)
                                            ->columnSpan(2)
                                            ->reactive()
                                            ->afterStateUpdated(fn ($state, Set $set, Get $get) => $set('total_amount', $state * $get('unit_amount'))),

                                        TextInput::make('unit_amount')
                                            ->label('Precio Unitario')
                                            ->numeric()
                                            ->required()
                                            ->disabled()
                                            ->dehydrated()
                                            ->columnSpan(2),
                                        TextInput::make('total_amount')
                                            ->numeric()
                                            ->required()
                                            ->dehydrated()
                                            ->columnSpan(3),
                                    ])->columns(12),
                                //
                                Placeholder::make('gran_total_placeholder')
                                    ->label('Grand Total')
                                    // sumar si no se repite 
                                    ->content(function (Get $get, Set $set) {
                                        $total = 0;
                                        if (!$repeaters = $get('items')) {
                                            return $total;
                                        }
                                        foreach ($repeaters as $key => $repeater) {
                                            // calcular el total de todos lo pedidos sleccionados 
                                            $total += $get("items.{$key}.total_amount");
                                        }
                                        $set('grand_total', $total);
                                        return SupportNumber::currency($total, 'PEN');
                                    }),
                                Hidden::make('grand_total')
                                    ->default(0)
                            ]
                        )

                    ]
                )->columnSpanFull()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('S/.'),
                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('currency')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('shipping_method')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled'
                    ])
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
            // se crean  las relaciones para el address
            AddressRelationManager::class


        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();

    }
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count()>10?'success':'danger';
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
