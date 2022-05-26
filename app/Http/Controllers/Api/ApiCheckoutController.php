<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCheckoutController extends Controller
{
    public function checkoutBook(Request $request)
    {

        try {
            //nama, email, password
            $validasi = Validator::make($request->all(), [
                'user_address' => 'required',
            ]);

            if ($validasi->fails()) {
                $val = $validasi->errors()->all();
                return $this->errorMessage($val[0]);
            } else {
                Transaction::insert([
                    'user_id' => $request->user_id,
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'user_phone' => $request->user_phone,
                    'user_address' => $request->user_address,
                    'book_image' => $request->book_image,
                    'book_name' => $request->book_name,
                    'book_author' => $request->book_author,
                    'book_code' => $request->book_code,
                    'book_page' => $request->book_page,
                    'book_language' => $request->book_language,
                    'selling_price' => $request->selling_price,
                    'discount_price' => $request->discount_price,        
                    'deleted' => 0,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 1,
                    'message' => 'Successfully Checkout the Book!',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 0,
                'message' => $e->getMessage(),
                'user' => []
            ], 500);
        }

    }
}
