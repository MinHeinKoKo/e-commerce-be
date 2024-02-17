<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Mail\OrderControlMail;
use App\Models\Order;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
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
