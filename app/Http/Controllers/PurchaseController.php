<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    public function show($id){
        try {
            $response = app('retryHttpClient')->request('GET', 'barang/' . $id);
            $data = json_decode($response->getBody(), true);
            $item = $data['data'];

            // Company Name Fetch
            $companyResponse = app('retryHttpClient')->request('GET', 'perusahaan/' . $item['perusahaan_id']);
            $companyData = json_decode($response->getBody(), true);
            $companyName = $companyData['data']['nama'];
            return view('purchase.show', compact('item', 'companyName'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function handlePurchase(Request $request){
        $_reqBody = $request->all();
        $purchaseCount = $_reqBody['purchaseNum'];
        $item_id = $_reqBody['item_id'];

        // Item Details
        $response = app('retryHttpClient')->request('GET', 'barang/' . $item_id);
        $data = json_decode($response->getBody(), true);
        $item = $data['data'];

        $user = Auth::user();
        $userId = $user->id;
        $updatedStok = $item['stok'] - $purchaseCount;
        // Change Item Stock Through API
        $update = app('retryHttpClient')->putRequestWithToken('barang/' . $item_id, env('MONOLITH_SECRET'), [
            'nama' => $item['nama'], 
            'harga' => $item['harga'], 
            'stok' => $updatedStok, 
            'perusahaan_id' => $item['perusahaan_id'], 
            'kode' => $item['kode']]);

        // Add History to User
        $historyData = [
            'user_id' => $userId,
            'item_id' => $item_id,
            'item_name' => $item['nama'],
            'quantity' => $purchaseCount,
            'total_price' => $purchaseCount * $item['harga'],
            'purchase_time' => now()->toDateTime()
        ];

        $purchaseHistory = new PurchaseHistory($historyData);
        $purchaseHistory->user()->associate($user);
        $purchaseHistory->save();

        return redirect('/catalogs');
    }
}
