<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Number;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use Filament\Tables\Actions\DeleteAction as ActionsDeleteAction;
use Filament\Tables\Actions\EditAction as ActionsEditAction;
use Filament\Tables\Actions\ViewAction as ActionsViewAction;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Grid;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Customer Name')
                                    ->required(),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->unique('users', 'email'),

                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->minLength(6),
                            ]),

                    Section::make('Guest Info (if no user)')
                        ->relationship('address') // ✅ খুব গুরুত্বপূর্ণ
                        ->schema([
                            TextInput::make('first_name')
                                ->label('First Name')
                                ->requiredWithout('user_id'),

                            TextInput::make('last_name')
                                ->label('Last Name')
                                ->requiredWithout('user_id'),

                            TextInput::make('phone')
                                ->label('Phone')
                                ->requiredWithout('user_id'),

                            TextInput::make('street_address')
                                ->label('Street Address')
                                ->requiredWithout('user_id'),

                            TextInput::make('city')
                                ->label('City')
                                ->requiredWithout('user_id'),
                        ])
                        ->columns(2),


                        Select::make('payment_method')
                            ->options([
                                'stripe' => 'Stripe',
                                'cod' => 'Cash On Delivery',
                                'bkash' => 'Bkash',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
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
                                'cancelled' => 'Cancelled',
                            ])
                            ->colors([
                                'new' => 'info',
                                'processing' => 'warning',
                                'shipped' => 'success',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'processing' => 'heroicon-m-arrow-path',
                                'shipped' => 'heroicon-m-truck',
                                'delivered' => 'heroicon-m-check-badge',
                                'cancelled' => 'heroicon-m-x-circle',
                            ]),

                        Select::make('currency')
                            ->options([
                                'usd' => 'USD',
                                'bdt' => 'BDT',
                            ])
                            ->default('bdt')
                            ->required(),

                        Select::make('shipping_method')
                            ->options([
                                'pickup' => 'Pickup',
                                'delivery' => 'Delivery',
                            ]),

                        Textarea::make('notes')
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Order Items')->schema([
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
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->minValue(0)
                                    ->dehydrated()
                                    ->columnSpan(3),

                                TextInput::make('total_amount')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->dehydrated()
                                    ->columnSpan(3),
                            ])
                            ->columns(12),

                        Grid::make(3)->schema([
                            TextInput::make('delivery_charge')
                                ->label('Delivery Charge')
                                ->numeric()
                                ->default(0)
                                ->minValue(0)
                                ->prefix('BDT')
                                ->reactive(),

                            TextInput::make('discount')
                                ->label('Discount')
                                ->numeric()
                                ->default(0)
                                ->minValue(0)
                                ->prefix('BDT')
                                ->reactive(),
                            
                            TextInput::make('total_weight')
                                ->label('Total Weight (kg)')
                                ->numeric()
                                ->minValue(0)
                                ->default(0)
                                ->required()
                                ->prefix('kg'),
                        ]),

                        Placeholder::make('grand_total_placeholder')
                                ->label('Grand Total')
                                ->reactive()
                                ->content(function (Get $get) {
                                    $total = 0;
                                    $items = $get('items') ?? [];

                                    foreach ($items as $item) {
                                        $total += floatval($item['total_amount'] ?? 0);
                                    }

                                    $deliveryCharge = floatval($get('delivery_charge') ?? 0);
                                    $discount = floatval($get('discount') ?? 0);

                                    $total += $deliveryCharge;
                                    $total -= $discount;
                                    $total = max(0, $total);
                                    
                                    return Number::currency($total, strtoupper($get('currency') ?? 'bdt'));
                                }),

                            Hidden::make('grand_total')
                                ->dehydrated()
                                ->mutateDehydratedStateUsing(function ($state, Get $get) {
                                    $items = $get('items') ?? [];
                                    $total = array_sum(array_column($items, 'total_amount'));
                                    $deliveryCharge = floatval($get('delivery_charge') ?? 0);
                                    $discount = floatval($get('discount') ?? 0);
                                    return max(0, $total + $deliveryCharge - $discount);
                            }),


                    ]),
                ])->columnSpanFull(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Customer Name')
                    ->getStateUsing(function ($record) {
                        // যদি logged-in user থাকে তাহলে user.name দেখাও, না হলে address থেকে first + last name
                        return $record->user->name ?? ($record->address->first_name . ' ' . $record->address->last_name);
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('BDT'),

                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('shipping_method')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                        default => $state,
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tracking_code') 
                    ->label('Tracking Code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                ActionsActionGroup::make([
                    ActionsViewAction::make(),
                    ActionsEditAction::make(),
                    ActionsDeleteAction::make(),
                    Action::make('View Invoice')
                        ->url(fn (Order $record) => route('admin.orders.invoice.show', $record))
                        ->icon('heroicon-o-document-text')
                        ->openUrlInNewTab(),

                    Action::make('Download Invoice')
                        ->url(fn (Order $record) => route('admin.orders.invoice.download', $record))
                        ->icon('heroicon-o-arrow-down-tray'),

                    Action::make('Send to Steadfast')
                        ->color('success')
                        ->requiresConfirmation()
                        ->icon('heroicon-o-paper-airplane')
                        ->action(function (Order $record) {
                            $response = Http::withHeaders([
                                'api-key'    => config('steadfast-courier.api_key'),
                                'secret-key' => config('steadfast-courier.secret_key'),
                                'Content-Type' => 'application/json',
                            ])->post(config('steadfast-courier.base_url') . '/create_order', [
                                'invoice'            => 'INV-' . $record->id,
                                'recipient_name'     => $record->address?->full_name ?? $record->user?->name ?? 'Customer',
                                'recipient_phone'    => $record->address?->phone ?? 'N/A',
                                'recipient_address'  => $record->address?->street_address ?? 'N/A',
                                'cod_amount'         => (string) ($record->grand_total ?? 0),
                                'note'               => $record->notes ?? 'Order placed by ' . ($record->user?->name ?? 'Guest'),
                                'item_description'   => $record->items->pluck('product.name')->join(', '),
                                'delivery_type'      => 0,
                                'webhook_url'        => route('webhooks.steadfast'),
                                'weight' => (float) ($record->total_weight ?? 1),

                            ]);

                            $data = $response->json();

                            // Debug log for development - remove/comment in production
                            // \Log::info('Steadfast response:', $data);
                            // dd($response->status(), $data); // Optional

                            if ($response->successful() && isset($data['consignment']['tracking_code'])) {
                                $record->update([
                                    'tracking_code' => $data['consignment']['tracking_code'],
                                    'courier_status' => 'sent_to_steadfast',
                                ]);

                                Notification::make()
                                    ->title('Order sent to Steadfast successfully!')
                                    ->success()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title('Failed to send order. Please check API response.')
                                    ->danger()
                                    ->body(json_encode($data ?? ['error' => 'Empty response']))
                                    ->send();
                            }
                        }),

                ])

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
            AddressRelationManager::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
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
