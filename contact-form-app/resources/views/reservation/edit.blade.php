<form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
  @csrf
  @method('PUT')

  名前：<input type="text" name="name" value="{{ $reservation->name }}"><br>
  メール：<input type="email" name="email" value="{{ $reservation->email }}"><br>
  日付：<input type="date" name="date" value="{{ $reservation->date }}"><br>
  時間：<input type="time" name="time" value="{{ $reservation->time }}"><br>

  <button type="submit">更新する</button>
</form>