<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

//use Filament\Forms\Components\TextInput;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = "Orders";

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("Information")
                ->description('Enter User and Product in here.')
                ->schema([
                    Select::make('product_id')
                        ->options(fn (Get $get) => Product::query()
                            ->where('quantity', '>',5)
                            ->where('is_published','=', 1)
                            ->pluck('name','id'))
                        ->label('Product')
                        ->native(true)
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Select::make('user_id')
                        ->options(fn (Get $get) => User::query()
                            ->whereNotNull('address')
                            ->whereNotNull('email_verified_at')
                            ->whereNotNull('phone')
                            ->where("is_visible" , true)
                            ->where("is_active" , true)
                            ->pluck('name','id'))
                        ->label('User')
                        ->native(false)
                        ->searchable(['name'])
                        ->preload()
                        ->live()
                        ->required(),
                ])->columns(2),
                Forms\Components\Section::make('Order Information')
                ->description('Enter Order product information in here.')
                ->schema([
                    Forms\Components\TextInput::make('quantity')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('User Name'),
                TextColumn::make('product.name')
                ->sortable()->searchable(),
                TextColumn::make('quantity')
                ->sortable(),
                TextColumn::make('price')->label("Price"),
                IconColumn::make('process')
                    ->options([
                        'heroicon-o-forward' => 'Pending',
                        'heroicon-o-x-circle' => 'Denied',
                        'heroicon-o-check-circle' => 'Approved',
                        'heroicon-o-check' => 'Cancel',
                    ])
                    ->colors([
                        'secondary' => 'Pending',
                        'warning' => 'Denied',
                        'success' => 'Approved',
                        'info' => 'Cancel'
                    ]),
                    TextColumn::make('created_at')
                        ->label('Created At')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
//            'edit' => Pages\EditOrder::route('/{record}/edit'),
        'edit' => Pages\EditOrderResource::route('{record}/edit'),
        ];
    }
}
