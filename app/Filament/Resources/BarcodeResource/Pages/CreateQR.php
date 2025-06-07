<?php

namespace App\Filament\Resources\BarcodeResource\Pages;

use App\Filament\Resources\BarcodeResource;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Pages\Page;
use App\Models\Barcode; //ensure to import the Barcode model
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreateQR extends Page
{
    protected static string $resource = BarcodeResource::class;
    protected static string $view = 'filament.resources.barcode-resource.pages.create-qr';

    public $table_number;

    public function mount(): void
    {
        $this->form->fill();
        $this->table_number = strtoupper(chr(rand(65, 90)) . rand(1000, 9999));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('table_number')
                    ->required()
                    ->default(fn() => $this->table_number)
                    ->disabled(),
            ]);   
    }

    public function save(): void
    {
        // myfood.com/B012
        // myfood.com dapat dari $host = $_SERVER['HTTP_HOST']
        // B012  dapat dari $this->table_number
        $host = $_SERVER['HTTP_HOST'] . '/' . $this->table_number;

        // Generate QRCodde and save to storage
        $svgContent = QrCode::size(200)->generate($host);

        // Define the file path for the QR code image
        $svgFilePath = 'qrcodes/' . $this->table_number . '.svg'; 

        // Save the SVG content to the file
        Storage::disk('public')->put($svgFilePath, $svgContent);            

        // Save the barcode to the database
        Barcode::create([
            'table_number' => $this->table_number,
            'users_id' => Auth::user()->id,
            'images' => $svgFilePath,
            'qr_value' => $host, // URL for save SVG file path
        ]);

        // Show success notification
        Notification::make()
            ->title('QR Code Created')
            ->success()
            ->icon('heroicon-o-check-circle')
            ->body('QR Code for table number ' . $this->table_number . ' has been created successfully.')
            ->send();

        // Redirect to the index page of the resource
        $this->redirect(url('admin/barcodes'));
    }
    
}