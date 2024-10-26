<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PhotoblastController::class, 'index'])->name('home');
Route::get('/camera', [App\Http\Controllers\PhotoblastController::class, 'camera'])->name('camera');
// Route::post('/payment', [App\Http\Controllers\PhotoblastController::class, 'processpayment'])->name('payment');
// Route::post('/verify', [App\Http\Controllers\PhotoblastController::class, 'verifyPayment'])->name('verify');
Route::post('/save-video', [App\Http\Controllers\PhotoblastController::class, 'saveVideo'])->name('save-video');
Route::post('/save-photo', [App\Http\Controllers\PhotoblastController::class, 'savePhoto'])->name('save-photo');
Route::post('/send-mail', [App\Http\Controllers\PhotoblastController::class, 'sendPhoto'])->name('send-mail');
Route::resource('redeem', App\Http\Controllers\CodeController::class);
Route::resource('tempcollage', \App\Http\Controllers\TempcollageController::class);
Route::get('/listphoto', [App\Http\Controllers\PhotoblastController::class, 'listRepeatPhoto'])->name('list-photo');
Route::get('/printphoto', [App\Http\Controllers\PhotoblastController::class, 'listPrintPhoto'])->name('print-photo');
Route::post('/retakephoto', [App\Http\Controllers\PhotoblastController::class, 'retakePhoto'])->name('retake-photo');
Route::post('/print', [App\Http\Controllers\PhotoblastController::class, 'print'])->name('print');
Route::get('/finish', function () {

  if(session()->has('code')){
    $code = App\Models\Code::where('code', session('code'))->first();
    if($code && $code->status == 'ready') {
      $code->status = 'used';
      $code->save();
    }
  }
  // bersihkan semua session
  session()->flush();
  return view('thanks', [
    'title' => 'Thanks',
  ]);
});
Route::get('/video/{code}', [App\Http\Controllers\PhotoblastController::class, 'getVideo'])->name('video');
