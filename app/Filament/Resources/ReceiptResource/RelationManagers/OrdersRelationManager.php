<?php

namespace App\Filament\Resources\ReceiptResource\RelationManagers;

use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('price')
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('User Name'),
                TextColumn::make('product.name')
                    ->sortable()->searchable(),
                TextColumn::make('quantity')
                    ->sortable(),
                TextColumn::make('price')->label("Price"),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
