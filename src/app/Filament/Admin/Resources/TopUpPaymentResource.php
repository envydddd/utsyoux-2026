<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TopUpPaymentResource\Pages;
use App\Models\TopUpPayment;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TopUpPaymentResource extends Resource
{
    protected static ?string $model = TopUpPayment::class;

    protected static ?string $navigationIcon = 'heroicon-m-credit-card';

    protected static ?string $navigationGroup = 'Project Akhir';

    protected static ?string $recordTitleAttribute = 'order_id';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('order_id')->disabled(),
            Forms\Components\TextInput::make('player_id')->disabled(),
            Forms\Components\TextInput::make('transaction_id')->disabled(),
            Forms\Components\TextInput::make('amount')->disabled(),
            Forms\Components\TextInput::make('currency')->disabled(),
            Forms\Components\TextInput::make('status')->disabled(),
            Forms\Components\TextInput::make('payment_method')->disabled(),
            Forms\Components\Textarea::make('metadata')->disabled()->columnSpan('full'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('order_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('player_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('transaction_id')->sortable(),
                Tables\Columns\TextColumn::make('amount')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable()->badge(),
                Tables\Columns\TextColumn::make('payment_method')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->date()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopUpPayments::route('/'),
            'view' => Pages\ViewTopUpPayment::route('/{record}'),
        ];
    }
}
