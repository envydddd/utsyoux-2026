<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PortfolioSkillResource\Pages;
use App\Models\PortfolioSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioSkillResource extends Resource
{
    protected static ?string $model = PortfolioSkill::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Portfolio CMS';

    public static function form(Form $form): Form
    {
        return $form->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('name')->required()->maxLength(255),
                    Forms\Components\TextInput::make('subtitle')->maxLength(255),
                    Forms\Components\TextInput::make('icon')->label('Icon / Emoji')->maxLength(20)->helperText('Contoh: ⚛️, 🎨, 🧑‍💻'),
                    Forms\Components\ColorPicker::make('color'),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                    Forms\Components\Toggle::make('is_active')->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\TextColumn::make('icon')->label('Icon'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subtitle')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort_order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()])
            ->emptyStateActions([Tables\Actions\CreateAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolioSkills::route('/'),
            'create' => Pages\CreatePortfolioSkill::route('/create'),
            'edit' => Pages\EditPortfolioSkill::route('/{record}/edit'),
        ];
    }
}
