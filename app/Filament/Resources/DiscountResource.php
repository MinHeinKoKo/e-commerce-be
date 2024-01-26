<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Discount;
use App\Rules\ValidateCouponDate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\TextColumn;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = "Orders";

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Discount Information')
                ->description("Enter discount detail information")
                ->schema([
                    Select::make('discount_type')
                    ->label('Discount Type')
                    ->options([
                        'percentage' => "Percentage",
                        'fixed_amount' => "Fixed"
                    ])->native(false)
                        ->live()
                    ->required(),
                    TextInput::make('amount')
                        ->default('15')
                        ->numeric()
                        ->required()
                ])->columns(2),
                Section::make('Discount Description')
                    ->description('Enter Disoount description in here.')
                    ->schema([
                        MarkdownEditor::make('description')
                            ->default('15% off')
                        ->columnSpanFull()
                        ->required()
                    ]),
                Section::make('Discount Valid Date')
                ->description("Enter discount date")
                ->schema([
                    DatePicker::make('start_at')
                        ->afterOrEqual('tomorrow')
                        ->label('Discount Start Date')
                        ->rules([new ValidateCouponDate()])
                        ->required(),
                    DatePicker::make('expires_at')
                        ->label('Discount Expire date')
                        ->after('start_at')
                        ->rules([new ValidateCouponDate()])
                        ->required()
                ])->columns(2),
                Section::make('Discount Usage')
                    ->description("Enter discount date")
                    ->schema([
                        TextInput::make('max_uses')
                            ->label('Discount Max Uses')
                            ->default(120)
                            ->numeric()
                            ->required(),
                        TextInput::make('uses')
                            ->label('Discount Uses')
                            ->numeric(),
                        Select::make('status')
                        ->options([
                            0 => 'Inactive',
                            1 => 'Active'
                        ])->default(0)
                            ->native(false),
                        Select::make('is_visible')
                        ->options([
                            0 => "Invisible",
                            1 => "Visible"
                        ])
                            ->default(1)
                            ->native(false)
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('code')
                ->label("Coupon")
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('discount_type')->label('Discount Type'),
                TextColumn::make('amount')->label('Discount Amount'),
                TextColumn::make('start_at')->date(),
                TextColumn::make('expires_at')->date(),
                TextColumn::make('max_uses')->label("Max Uses"),
                TextColumn::make('uses')->label("Uses"),
                IconColumn::make('status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Active'),
                IconColumn::make('is_visible')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Visible'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'view' => Pages\ViewDiscount::route('/{record}'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
