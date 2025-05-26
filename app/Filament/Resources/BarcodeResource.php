<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarcodeResource\Pages;
use App\Filament\Resources\BarcodeResource\RelationManagers;
use App\Models\Barcode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarcodeResource extends Resource
{
    protected static ?string $model = Barcode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('table_number')
                    ->required()
                    #agara saat create barcode ada 4 digit huruf && angka
                    ->default(fn()=> strtoupper(chr(rand(65, 90)) . rand(1000, 9999))),
                Forms\Components\Select::make('users_id')
                    ->required()
                    ->relationship('users', 'name'),
                Forms\Components\FileUpload::make('images')
                    ->image()
                    ->required()
                    ->columnSpanFUll(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('table_number')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('images')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('qr_value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                ->label('Download QR Code')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function ($record) {
                    $filepath = storage_path('app/public/' . $record->images);
                    if (file_exists($filepath)) {
                        return response()->download($filepath);
                    } 
                      
                    session()->flash('error', 'QR code image not found.');
                }),
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
            'index' => Pages\ListBarcodes::route('/'),
            'create' => Pages\CreateQR::route('/create'),
            'edit' => Pages\EditBarcode::route('/{record}/edit'),
        ];
    }
}
