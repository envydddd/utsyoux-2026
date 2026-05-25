<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectAkhirResource\Pages;
use App\Models\ProjectAkhir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ProjectAkhirResource extends Resource
{
    protected static ?string $model = ProjectAkhir::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio CMS';

    protected static ?string $navigationLabel = 'Proyek Portfolio';

    protected static ?string $modelLabel = 'Proyek';

    protected static ?string $pluralModelLabel = 'Proyek Portfolio';

    protected static ?int $navigationSort = 4;


    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    public static function canCreate(): bool
    {
        return auth()->check();
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->check();
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->check();
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Konten Proyek')
                ->description('Data di sini langsung tampil di section Proyek pada halaman portfolio jika status Publish aktif.')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Proyek')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                    Forms\Components\TagsInput::make('tags')
                        ->label('Tech Stack / Tags')
                        ->placeholder('Laravel')
                        ->separator(',')
                        ->helperText('Tekan Enter setelah menulis satu tag. Contoh: Laravel, Filament, MySQL.')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('url')
                        ->label('Link Detail / Demo')
                        ->url()
                        ->placeholder('https://example.com')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Tampilan Card')
                ->schema([
                    Forms\Components\TextInput::make('icon')
                        ->label('Emoji/Icon Fallback')
                        ->placeholder('🚀')
                        ->maxLength(20)
                        ->helperText('Dipakai kalau tidak upload gambar.'),
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar Proyek')
                        ->image()
                        ->disk('public')
                        ->directory('projects')
                        ->visibility('public')
                        ->imageEditor()
                        ->maxSize(2048),
                    Forms\Components\TextInput::make('background_gradient')
                        ->label('Background Gradient')
                        ->placeholder('linear-gradient(135deg,#1a1a2e,#16213e)')
                        ->helperText('Dipakai di area gambar kalau image kosong.')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Pengaturan')
                ->schema([
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0)
                        ->helperText('Angka kecil tampil lebih dulu.'),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Featured / Card Besar')
                        ->default(false),
                    Forms\Components\Toggle::make('is_published')
                        ->label('Publish ke Frontend')
                        ->default(true),
                ])
                ->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tags')
                    ->label('Tags')
                    ->formatStateUsing(fn ($state): string => is_array($state) ? implode(', ', $state) : (string) $state)
                    ->badge(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_published')->label('Status Publish'),
                TernaryFilter::make('is_featured')->label('Featured'),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada proyek')
            ->emptyStateDescription('Klik tombol Create untuk menambahkan proyek pertama ke portfolio.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectAkhirs::route('/'),
            'create' => Pages\CreateProjectAkhir::route('/create'),
            'edit' => Pages\EditProjectAkhir::route('/{record}/edit'),
        ];
    }
}
