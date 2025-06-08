<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
// public function store(Request $request) {
//     $reservation = new Reservation();
//     $reservation->name = $request->name;
//     $reservation->email = $request->email;
//     $reservation->date = $request->date;
//     $reservation->time = $request->time;
//     $reservation->save();

//     return redirect()->back()->with('success', '予約が登録されました！');
// }
public function store(Request $request)
{
    // バリデーションルールの追加
    /*
    $validated = $request->validate([
        // 'name' => 'required|max:255',
        'email' => 'required|email',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required',
    ]);
    */

    $validated = $request->validate([
    'name' => 'required|max:255',
    'email' => 'required|email',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required',
], [
    'name.required' => 'お名前は必ず入力してください。',
    'name.max' => 'お名前は255文字以内で入力してください。',
    'email.required' => 'メールアドレスは必ず入力してください。',
    'email.email' => 'メール形式が違います',
]);


    // バリデーション通過後、保存
    $reservation = new Reservation();
    $reservation->fill($validated);
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', '予約が登録されました！');
}




public function index()
{
    $reservations = Reservation::all(); // すべての予約を取得
    return view('reservation.index', ['reservations' => $reservations]);
}

// ReservationController.php

public function edit($id)
{
    $reservation = Reservation::findOrFail($id);
    return view('reservation.edit', compact('reservation'));
}

public function update(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->update($request->all());

    return redirect()->route('reservations.index')->with('success', '予約が更新されました');
}

public function destroy($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return redirect()->route('reservations.index')->with('success', '予約が削除されました');
}


}
?>