<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function deposit()
    {
        return view('pages.transactions.deposit');
    }
    public function withdraw()
    {
        return view('pages.transactions.withdraw');
    }
    public function history()
    {
        $histories = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(7);
        return view('pages.transactions.history', compact('histories'));
    }

    public function postTransaction(Request $request, $type) {
        request()->validate(
            ['nominal' => $type == 'out' ? 'required|numeric|max:' . Auth::user()->balance : 'required|numeric']
        );

        Transaction::create([
            'user_id' => Auth::user()->id,
            'type' => $type,
            'nominal' => $request->nominal,
            'note' => $request->note
        ]);
        if ($type == 'in') {
            $updatedBalance = Auth::user()->balance + $request->nominal;
        }
        if ($type == 'out') {
            $updatedBalance = Auth::user()->balance - $request->nominal;
        }
        Auth::user()->update([
            'balance' => $updatedBalance
        ]);

        return to_route('home');
    }
}
