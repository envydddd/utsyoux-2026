<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PortfolioProfileResource\Pages;
use App\Models\PortfolioProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioProfileResource extends Resource
{
    protected static ?string $model = PortfolioProfile::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Portfolio CMS';
    protected static ?string $modelLabel = 'Konten Utama';
    protected static ?string $pluralModelLabel = 'Konten Utama';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Website & Hero')->columns(2)->schema([
                Forms\Components\TextInput::make('site_title')->required(),
                Forms\Components\TextInput::make('nav_brand')->required(),
                Forms\Components\TextInput::make('language_label')->default('ID'),
                Forms\Components\TextInput::make('hero_eyebrow'),
                Forms\Components\TextInput::make('first_name')->required(),
                Forms\Components\TextInput::make('last_name'),
                Forms\Components\TextInput::make('role_prefix'),
                Forms\Components\TextInput::make('role_title'),
                Forms\Components\Textarea::make('hero_description')->columnSpan('full'),
                Forms\Components\TextInput::make('primary_button_label'),
                Forms\Components\TextInput::make('primary_button_url'),
                Forms\Components\TextInput::make('secondary_button_label'),
                Forms\Components\TextInput::make('secondary_button_url'),
            ]),
            Forms\Components\Section::make('Kartu Hero')->columns(2)->schema([
                Forms\Components\TextInput::make('hero_card_icon'),
                Forms\Components\TextInput::make('hero_card_name'),
                Forms\Components\TextInput::make('hero_card_role'),
                Forms\Components\TextInput::make('hero_avatar_initials'),
                Forms\Components\TextInput::make('hero_handle'),
                Forms\Components\TextInput::make('hero_status'),
                Forms\Components\TextInput::make('hero_contact_label'),
            ]),
            Forms\Components\Section::make('Tentang')->columns(2)->schema([
                Forms\Components\TextInput::make('about_photo'),
                Forms\Components\TextInput::make('about_title'),
                Forms\Components\TextInput::make('about_title_highlight'),
                Forms\Components\TextInput::make('about_quote')->columnSpan('full'),
                Forms\Components\Textarea::make('about_paragraph_1')->columnSpan('full'),
                Forms\Components\Textarea::make('about_paragraph_2')->columnSpan('full'),
                Forms\Components\TextInput::make('stat_1_number'), Forms\Components\TextInput::make('stat_1_label'),
                Forms\Components\TextInput::make('stat_2_number'), Forms\Components\TextInput::make('stat_2_label'),
                Forms\Components\TextInput::make('stat_3_number'), Forms\Components\TextInput::make('stat_3_label'),
                Forms\Components\TextInput::make('cv_label'), Forms\Components\TextInput::make('cv_url'),
            ]),
            Forms\Components\Section::make('Judul Section')->columns(2)->schema([
                Forms\Components\TextInput::make('skills_eyebrow'),
                Forms\Components\TextInput::make('skills_title'),
                Forms\Components\TextInput::make('projects_title'),
                Forms\Components\Textarea::make('projects_subtitle'),
                Forms\Components\TextInput::make('contact_eyebrow'),
                Forms\Components\TextInput::make('contact_title'),
                Forms\Components\Textarea::make('contact_subtitle')->columnSpan('full'),
            ]),
            Forms\Components\Section::make('Kontak & Footer')->columns(2)->schema([
                Forms\Components\TextInput::make('system_status'),
                Forms\Components\TextInput::make('email_label'),
                Forms\Components\TextInput::make('email_value'),
                Forms\Components\TextInput::make('whatsapp_label'),
                Forms\Components\TextInput::make('whatsapp_value'),
                Forms\Components\TextInput::make('form_title'),
                Forms\Components\TextInput::make('footer_text')->columnSpan('full'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_title')->searchable(),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('role_title')->limit(40),
                Tables\Columns\TextColumn::make('updated_at')->since(),
            ])
            ->actions([Tables\Actions\EditAction::make()]);
    }

    public static function canCreate(): bool
    {
        return PortfolioProfile::query()->count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolioProfiles::route('/'),
            'create' => Pages\CreatePortfolioProfile::route('/create'),
            'edit' => Pages\EditPortfolioProfile::route('/{record}/edit'),
        ];
    }
}
