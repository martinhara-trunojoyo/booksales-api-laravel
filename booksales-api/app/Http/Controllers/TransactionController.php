<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::with('user','book')->get();

        if ($transaction->isEmpty()){
            return response()->json(
                [
                    "succes" => true,
                    "message" => "Resource data not found"
                ]
                );
        }

        return response()->json([
            "succes" =>true,
            "message" => "Get all resource",
            "data" => $transaction
        ]);
    }

    public function store(Request $request){
        // 1. Validator & cek valid
        $validator = validator::make($request ->all(),[
            'book_id' => 'required|exists:books,id',
            'quantity'=> 'required|integer|min:1',
        ]);

        if ($validator->fails()){
            return response()->json([
                'succes'=> false,
                'message' => 'validation error',
                'data' => $validator ->errors()
            ],422);
        }
        // 2. Generate orderNumber -> unique | ORD-0003
        $uniqueCode = "ORD-". strtoupper(uniqid());
        // 3. Ambil user yang sedang login & cek login (apakah ada data user?)
        $user =auth('api')->user();
        if (!$user){
            return response()->json([
                'succes' =>false,
                'message' =>'unauthorized !'
            ],401);
        }
        // 4. Mencari data dari buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity){
            return response()->json([
                'succes' =>false,
                'message' =>'Stok barang tidak cukup'
            ],400);
        }

        // 6. hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;
        // 7. kurangi stok buku (update)
        $book->stock-= $request->quantity;
        $book->save();

        // simpan data transaksi
        $transactions = Transaction::create([
            'order_number'=> $uniqueCode,
            'customer_id' => $user ->id,
            'book_id' =>$request->book_id,
            'total_amount' => $totalAmount,

        ]);
         
        return response()->json([
            'success' => true,
            'message' =>'Transaction created succcesfully !',
            'data' => $transactions 
        ],201);

    }

    public function show($id){
        $transaction = transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'transaction not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'transaction found',
            'data' => $transaction,
        ], 200);
    }

    public function destroy($id){
        $transaction = transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'transaction not found',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'transaction deleted successfully',
        ], 200);
    }  

   public function update($id, Request $request)
{
    $transaction = Transaction::find($id);
    if (!$transaction) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found',
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors(),
        ], 422);
    }

    try {
        // Ambil buku lama & hitung quantity sebelumnya
        $oldBook = Book::find($transaction->book_id);
        $oldQuantity = $transaction->total_amount / $oldBook->price;

        // Kembalikan stok buku lama, apapun kondisinya
        $oldBook->stock += $oldQuantity;
        $oldBook->save();

        // Ambil buku baru
        $newBook = Book::find($request->book_id);
        $newQuantity = $request->quantity;

        // Cek apakah stok cukup
        if ($newBook->stock < $newQuantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock for the requested book',
            ], 400);
        }

        // Kurangi stok buku baru
        $newBook->stock -= $newQuantity;
        $newBook->save();

        // Hitung total amount baru
        $totalAmount = $newBook->price * $newQuantity;

        // Update transaksi
        $transaction->update([
            'book_id' => $newBook->id,
            'total_amount' => $totalAmount,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage(),
        ], 500);
    }
}


}