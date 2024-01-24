<?php

namespace App\Filament\Resources\ColorResource\Pages;

use App\Filament\Resources\ColorResource;
use App\Models\User;
use App\Notifications\ColorNotification;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateColor extends CreateRecord
{
    protected static string $resource = ColorResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        $admin = User::where("role","admin")->get();
        \Illuminate\Support\Facades\Notification::send($admin , new ColorNotification(auth()->user()));
        return Notification::make()
            ->title("New Color is created")
            ->body("Someone is created a new color")
            ->icon('heroicon-o-users')
            ->iconColor("success")
            ->sendToDatabase(auth()->user())
            ->send();
    }

}
