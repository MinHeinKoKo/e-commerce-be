<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Mail\OrderControlMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditOrderResource extends EditRecord
{
    protected static string $resource = OrderResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Information")
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
                            ->native(true)
                            ->searchable(['name'])
                            ->preload()
                            ->live()
                            ->required(),
                    ])->columns(2),
                Section::make('Order Information')
                    ->description('Enter Order product information in here.')
                    ->schema([
                        TextInput::make('quantity')
                            ->numeric()
                            ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        Select::make('process')
                            ->options([
                                'Pending','Denied','Approved'
                            ])
                            ->native(true)
                            ->searchable()
                            ->preload()
                            ->live(),
                    ])->columns(3)
            ]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $order = $record->update($data);

        $userId = $data['user_id'];

        $user = User::find($userId);

        $updatedOrder = Order::find($record->id);

        Mail::to($user->email)->send(new OrderControlMail($user, $updatedOrder));

        return $updatedOrder;
    }
}
