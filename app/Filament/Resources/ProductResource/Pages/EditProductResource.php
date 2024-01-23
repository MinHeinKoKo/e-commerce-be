<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\ProductResource;
use App\Mail\OrderControlMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditProductResource extends EditRecord
{
    protected static string $resource = ProductResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Titile')
                    ->description('Plase enter product tile here.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                Section::make('Product Related Information')
                    ->description('Please fill product related information')
                    ->schema([
                        Select::make('category_id')
                            ->relationship('category','title')
                            ->preload()
                            ->searchable()
                            ->native(false)
                            ->required(),
                        Select::make('color_id')
                            ->relationship('color','colorName')
                            ->preload()
                            ->searchable()
                            ->native()
                            ->required(),
                        Select::make('size_id')
                            ->relationship('size','sizeName')
                            ->preload()
                            ->searchable()
                            ->native()
                            ->required(),
                    ])->columns(3),
                Section::make('Product price and quantity')
                    ->description('Please fill product price and quantity in here.')
                    ->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                        TextInput::make('quantity')
                            ->required()
                            ->numeric(),
                    ])->columns(2),
                Section::make('Product information')
                    ->description('Please enter product detail information in here.')
                    ->schema([
                        Textarea::make('excerpt')
                            ->placeholder('Enter short description.')
                            ->required()
                            ->maxLength(100)
                            ->columnSpanFull(),
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Publish')
            ->description("Choose your product is published or not.")
            ->schema([
                Select::make('is_published')
                ->options([
                    0 => "Unpublished",
                    1 => "Published"
                ]),
                Select::make('is_visible')
                    ->options([
                        0 => "InVisible",
                        1 => "Visible"
                    ]),
            ])->columns(2),
                FileUpload::make('image.url')
                    ->label("Image for the product")
                    ->imageEditor()
                    ->columnSpanFull()
                    ->hiddenLabel(),
            ]);
    }

//    protected function mutateFormDataBeforeSave(array $data): array
//    {
//        $image = $data['url'];
////        unset($data["url"]);
//    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        dd($record);
        dd($data);
//        dd($data['url']);
        return $record;
//        $order = $record->update($data);
//
//        $userId = $data['user_id'];
//
//        $user = User::find($userId);
//
//        $updatedOrder = Order::find($record->id);
//
//        Mail::to($user->email)->send(new OrderControlMail($user, $updatedOrder));
//
//        return $updatedOrder;
    }
}
