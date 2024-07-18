<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Tempcollage;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPhotoAndVideo;
use Exception;
use ZipArchive;

class PhotoblastController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){

        return redirect()->route('redeem.index');

    }

    public function camera(){
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                // ambil code bersangkutan
                $code = Code::where('code', session('code'))->first();
                return view('camera', [
                    'email' => $code->transaction->email,
                    'limit' => 10,
                    'photoname' => [],
                    'request' => "photo",
                ]);
            }
        }
        return redirect()->route('redeem.index');
    }

    // public function processpayment(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'amount' => 'required'
    //     ]);

    //     if($validator->failed()){
    //         return response()->json(data: $validator->errors(), status: 400);
    //     }
    //     $transaction = Transaction::create([
    //         'invoice_number' => 'adfdaf',
    //         'amount' => $request->amount,
    //         'status' => 'CREATED'
    //     ]);

    //     $resp = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'Content-Type' => 'application/json',
    //     ])->withBasicAuth(env('MIDTRANS_SERVER_KEY'),'')
    //       ->post('https://api.sandbox.midtrans.com/v2/charge', [
    //         'payment_type' => 'qris',
    //         'transaction_details' => [
    //             'order_id' => 'alig'.$transaction->id,
    //             'gross_amount' => $transaction->amount
    //         ]
    //     ]);
    //     if($resp->status() == 201 || $resp->status() == 200) {
    //         $order_id = $resp->json('order_id');
    //         $status_code = $resp->json('status_code');
    //         $gross_amount = $resp->json('gross_amount');

    //         $actions = $resp->json('actions')[0];
    //         if(empty($actions)) {
    //             return response()->json(['message' => $resp['status_message']], 500);
    //         }

    //         return view('image', [
    //             'qrcode'=>$actions['url'],
    //             'order_id' => $order_id,
    //             'status_code' => $status_code,
    //             'gross_amount' => $gross_amount,
    //         ]);
    //     }
    //     return response()->json(['message' => $resp->body()], 500);
    // }

    // public function verifyPayment(Request $request){
    //     $orderId = $request->order_id;
    //     $id = preg_replace('/[a-zA-Z]+/', '', $orderId);

    //     $resp = Http::withHeaders([
    //         'Accept' => 'application/json',
    //     ])->withBasicAuth(env('MIDTRANS_SERVER_KEY'),'')
    //       ->get("https://api.sandbox.midtrans.com/v2/$orderId/status");
    //     $status = $resp->json('transaction_status');

    //     $transaction = Transaction::find($id);
    //     $transaction->status = $status;
    //     $transaction->save();

    //     if($transaction->status == 'settlement'){
    //         return redirect()->route('camera');
    //     } else{
    //         return redirect()->route('home');
    //     }
    // }

    public function saveVideo(Request $request){
        if ($request->hasFile('video')) {
            $videoName = $request->file('video')->getClientOriginalName();
            $videoPath = $request->file('video')->storeAs($request->email.'/video', $videoName, 'public');
            return response()->json(['message' => 'Video berhasil diunggah'], 200);
        } else {
            return response()->json(['message' => 'Tidak ada video yang dikirimkan'], 400);
        }

        return response()->json([
            'error' => 'gagal'
        ], 419);
    }

    public function savePhoto(Request $request){
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                try {
                    $fileData = base64_decode($request->data);
                    $fileName = 'public/'.$code->transaction->email.'/photo/'.$request->name_photo;
                    Storage::disk('local')->put($fileName, $fileData);
                    return response()->json(['message' => "berhasil"]);
                } catch(Exception $e) {
                    return response()->json(['error' => $e], 404);
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function listRepeatPhoto(){
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                // ambil code yang terdeteksi yang akan digunakan untuk mengambil path foto yang bersangkutan
                $code = Code::where('code', session('code'))->first();
                $directory = 'public/'.$code->transaction->email.'/photo';

                if(Storage::exists($directory)) {
                    //ambil semua file dari folder bersangkutan
                    $files = Storage::files($directory);
                    return view('list', [
                        'h1' => 'Pilih 1 atau lebih foto yang ingin diulang!',
                        'photos' => $files,
                        'notes' => 'Klik foto yang ingin diulang, lalu klik tombol "Retake" atau next untuk melanjutkan'
                    ]);
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function listPrintPhoto(){
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                // ambil code yang terdeteksi untuk mengambil path foto
                $code = Code::where('code', session('code'))->first();
                $directory = 'public/'.$code->transaction->email.'/photo';
                if(Storage::exists($directory)) {
                    // ambil semua file dari folder bersangkutan
                    $files = Storage::files($directory);
                    return view('list', [
                        'h1' => 'Pilih 3 foto untuk dicetak',
                        'photos' => $files,
                        'notes' => ''
                    ]);
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function retakePhoto(Request $request) {
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                if($request->photos) {
                    // ambil nama file photo bersangkutan
                    $photos = [];
                    $code = Code::where('code', session('code'))->first();
                    foreach($request->photos as $photo){
                        array_push($photos, str_replace('public/'.$code->transaction->email.'/photo/', '', $photo));
                    }
                    // ambil path template collage yang akan digunakan
                    $temp = Tempcollage::where('id', session('temp_id'))->first();
                    return view('camera', [
                        'template_src' => $temp->src,
                        'template_width' => $temp->width,
                        'template_height' => $temp->height,
                        'template_x' => $temp->x,
                        'template_y' => $temp->y,
                        'email' => $code->transaction->email,
                        'limit' => count($request->photos),
                        'request'=> "retake",
                        'photoname' => $photos
                    ]);
                } else {
                    return redirect()->route('list-photo');
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function sendPhoto(Request $request) {
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                if($request->email) {
                    // ambil path foto dari suatu folder
                    $filePath = storage_path('app/public/'.$request->email.'/photo/');
                    $photoFiles = glob($filePath.'/*.png');

                    $tempdata = base64_decode($request->photo);
                    $collagePath = storage_path('app/public/'.$request->email.'/photo/collage/');
                    if(!file_exists($collagePath)) {
                        mkdir($collagePath, 0755, true);
                    }
                    $tempName = $collagePath.'collage.jpg';
                    file_put_contents($tempName, $tempdata);

                    array_push($photoFiles, $tempName);

                    // kirim pesan email
                    Mail::to($request->email)->send(new SendPhotoAndVideo($photoFiles));
                    return response()->json(['message' => $photoFiles], 201);
                } else {
                    return response()->json(['error' => 'Email tidak ada'], 500);
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function print(Request $request) {
        if(session()->has('code')){
            $code = Code::where('code', session('code'))->first();
            if($code && $code->status == 'ready') {
                if($request->photos){
                    // ambil template photo collage yang akan digunakan
                    $temp = Tempcollage::where('id', session('temp_id'))->first();
                    // ambil nama foto yang akan dicetak kedalam template
                    $photos = [];
                    $code = Code::where('code', session('code'))->first();
                    foreach($request->photos as $photo){
                        array_push($photos, asset(str_replace('public', 'storage', $photo)));
                    }

                    return view('print', [
                        'template_src' => $temp->src,
                        'template_width' => $temp->width,
                        'template_height' => $temp->height,
                        'template_x' => $temp->x,
                        'template_y' => $temp->y,
                        'template_margin' => $temp->margin,
                        'photos' => $photos,
                        'email' => $code->transaction->email
                    ]);
                } else {
                    return redirect()->route('print-photo');
                }
            }
        }
        return redirect()->route('redeem.index');
    }

    public function getVideo($code) {
        $email = Code::where('code', $code)->first()->transaction->email;
        return view('video', ['email' => $email]);
    }

}
