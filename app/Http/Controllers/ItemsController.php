<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ItemsController extends Controller
{
    // Fetch all items from API
    public function index(Request $request){
        try {
            $response = app('retryHttpClient')->request('GET', '/barang');
            $data = json_decode($response->getBody(), true);
            $items = collect($data['data']);
            if ($request->has('search')){
                $searchValue = $request->input('search');
                $items = $items->filter(function ($items) use ($searchValue) {
                    return stripos($items['nama'], $searchValue) !== false;
                });
            }

            $sortBy = $request->input('sort_by', 'nama');
            $items = $items->sortBy($sortBy);

            // Pagination
            $page = request()->input('page', 1);
            $itemsPerPage = 10;
            $offset = ($page - 1) * $itemsPerPage;
            $paginatedData = $items->slice($offset, $itemsPerPage);
            $paginatedItems = new LengthAwarePaginator(
                $paginatedData,
                $items->count(),
                $itemsPerPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            return view('catalogs.index', compact('paginatedItems', 'sortBy'));
        } catch (\Exception $e){
            dd($e);
        }
    }

    // Fetch a single item from API
    public function show($id){
        try {
            $response = app('retryHttpClient')->request('GET', 'barang/' . $id);
            $data = json_decode($response->getBody(), true);
            $item = $data['data'];

            // Company Name Fetch
            $companyResponse = app('retryHttpClient')->request('GET', 'perusahaan/' . $item['perusahaan_id']);
            $companyData = json_decode($response->getBody(), true);
            $companyName = $companyData['data']['nama'];
            return view('catalogs.show', compact('item', 'companyName'));
        } catch (\Exception $e){
            dd($e);
        }
    }
}
