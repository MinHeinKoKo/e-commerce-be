<?php

namespace App\Filament\Resources\ReceiptResource\Pages;

use App\Filament\Resources\ReceiptResource;
use App\Models\Receipt;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;

class EditReceiptsPage extends EditRecord
{
    protected static string $resource = ReceiptResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make("Receipt Information")
            ->schema([
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
                TextInput::make('total')
                    ->required()
                    ->numeric(),
                Select::make('process')
                    ->options([
                        'Pending','Denied','Approved','Cancel'
                    ])
                    ->native(true)
                    ->searchable()
                    ->preload()
                    ->live(),
            ])
        ]);
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        $userId = $data['user_id'];

        $user = User::find($userId);

        $updatedReceipt = Receipt::find($record->id);

        Notification::make()
            ->title("Receipt is updated")
            ->icon('heroicon-o-users')
            ->iconColor("success")
            ->sendToDatabase(auth()->user())
            ->send();

        return $updatedReceipt;
    }
}
