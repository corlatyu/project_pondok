<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DispensasiController;
use App\Http\Controllers\SantriCardController;
use App\Http\Controllers\DokumentasiController;



Route::get('/optimize', function(){
	Artisan::call('optimize:clear');
	return response()->json(['message' => 'success clear view']);
});

Route::get('/storage-links', function(){
	Artisan::call('storage:link');
});

Route::get('/storage-link', function(){
    $targetFolder = base_path('storage/app/public/');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    $link = symlink($targetFolder, $linkFolder);
	if(!$link){
		return response()->json(['message' => 'success symlink']);
	}
	
	return response()->json(['message' => 'u was symlink']);
});
// Grup middleware 'web' untuk semua route
Route::middleware(['web'])->group(function () {
    // Route halaman utama
    Route::get('/', [BerandaController::class, 'index'])->name('home');

    // Grup middleware 'guest' untuk route yang hanya bisa diakses oleh pengunjung yang belum login
    Route::middleware(['guest'])->group(function () {
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
        Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
        Route::get('/generate-pdf', [BerandaController::class, 'generatePDF'])->name('profilepondok');


    });

    // Grup middleware 'auth' untuk route yang memerlukan autentikasi
    Route::middleware(['auth'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('logout', [AuthController::class, 'logoutGet'])->name('logout.get');

        // Grup middleware 'cek_login:admin' untuk route khusus admin
        Route::middleware(['cek_login:admin'])->group(function () {
            Route::resource('admin', AdminController::class);
            // Route umum untuk Schedule, Dokumentasi, Santri, Guru, Event, Barcode, SantriCard
            Route::resource('schedules', ScheduleController::class);
            Route::resource('dokumentasi', DokumentasiController::class);
            Route::get('export_excel', [SantriController::class, 'export_excel'])->name('santri.export.excel');
            Route::get('export_csv', [SantriController::class, 'export_csv'])->name('santri.export.csv');
            Route::resource('guru', GuruController::class);
            Route::get('/generate-qrcode', [BarcodeController::class, 'generateQRCode']);
            Route::resource('events', EventController::class);
            Route::get('/cards', [SantriCardController::class, 'index'])->name('santri.card.index');
            Route::resource('/santri', SantriController::class);
            Route::get('/santri/profile/{id?}', [SantriController::class, 'profile'])->name('santri.profile');
            Route::post('/santri/profile', [SantriController::class, 'searchProfile'])->name('santri.profile.search');
            Route::get('/santri/card/{id}', [SantriCardController::class, 'printCard'])->name('santri.print.card');
            Route::get('/santri/{id}/download-pdf', [SantriCardController::class, 'downloadPdf'])->name('santri.download.pdf');
            Route::post('santri/import/csv', [SantriController::class, 'import_csv'])->name('santri.import.csv');
            Route::resource('dispensasi', DispensasiController::class)->except(['show']);
            Route::get('dispensasi/{id}/print', [DispensasiController::class, 'print'])->name('dispensasi.print');
            Route::get('dispensasi/terlambat', [DispensasiController::class, 'terlambat'])->name('dispensasi.terlambat');
            Route::post('/dispensasi/{id}/kembali', [DispensasiController::class, 'kembali'])->name('dispensasi.kembali');
            Route::get('dispensasi/export', [DispensasiController::class, 'export'])->name('dispensasi.export');
            Route::get('/dispensasi/{id}/download-pdf', [DispensasiController::class, 'downloadPdf'])->name('dispensasi.download.pdf');


        });

        // Grup middleware 'cek_login:user' untuk route khusus user biasa
        Route::middleware(['cek_login:user'])->group(function () {
            Route::resource('user', UserController::class);
        });
    });

    // Grup middleware 'redirect_if_authenticated' untuk mencegah user yang sudah login mengakses halaman register
    Route::middleware(['redirect_if_authenticated'])->group(function () {
        Route::get('register', [AuthController::class, 'register'])->name('register');
    });
});

