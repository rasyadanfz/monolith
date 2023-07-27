<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseHistory;
use Illuminate\Pagination\LengthAwarePaginator;

class PurchaseHistoryController extends Controller
{
    public function show($id){
        $purchaseHistory = PurchaseHistory::where('user_id', $id);
        $histories = $purchaseHistory->get();

        $page = request()->input('page', 1);
        $itemsPerPage = 10;
        $offset = ($page - 1) * $itemsPerPage;
        $paginatedData = $histories->slice($offset, $itemsPerPage);
        $paginatedHistories = new LengthAwarePaginator(
            $paginatedData,
            $histories->count(),
            $itemsPerPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('history.show', compact('paginatedHistories'));
    }
}
