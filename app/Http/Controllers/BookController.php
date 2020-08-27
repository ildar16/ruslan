<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Auth;
use View;

class BookController extends Controller
{

    public function book(Request $request)
    {
        $seatId = $request->id;
        $userId = Auth::user()->id;

        $book = Book::where(['seat_id' => $seatId])->get();

        if ($book->isEmpty()) {
            Book::create([
                'hall_id' => 1,
                'user_id' => $userId,
                'seat_id' => $seatId,
            ]);
        } else {
            if ($book->where('user_id', $userId)->isEmpty()) {
                $userName = User::findOrFail($book[0]->user_id)->name;
                return response()->json(['name' => $userName]);
            } else {
                Book::where(['seat_id' => $seatId, 'user_id' => $userId])->delete();
            }
            
        }

        $books = Book::all();

        $mapped = $books->mapWithKeys(function ($item) {
            return [$item['seat_id'] => $item];
        });

        $layout = 'ajax';

        return View::make('home', compact('mapped', 'layout'));
    }

}
