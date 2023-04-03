<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function registerOrder(Request $request)
    {
        $request->validate(
            [
                'orderTitle' => 'required|min:4',
                'orderCategory' => ['required', 'not_in:default'],
                'orderDescription' => ['max:255']
            ],
            [
                'orderTitle.required' => 'É necessário um título.',
                'orderTitle.min' => 'É necessário pelo menos 4 letras.',
                'orderCategory.required' => 'É necessário selecionar a categoria do pedido.',
                'orderCategory.not_in' => 'Selecione uma categoria válida.',
                'orderDescription.max' => 'A quantitade máxima de caracteres é 255'
            ]
        );

        $orderTitle = $request->input('orderTitle');
        $orderCategory = $request->input('orderCategory');
        $orderDescription = $request->input('orderDescription');

        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'title' => $orderTitle,
            'category' => $orderCategory,
            'description' => $orderDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $order_id = DB::table('orders')->insertGetId($data);

        $order_ids = $user->order_ids ? explode(',', $user->order_ids) : [];
        $order_ids[] = $order_id;

        DB::table('users')->where('id', $user->id)->update([
            'order_ids' => implode(',', $order_ids)
        ]);

        return redirect(route('home'));
    }
}
