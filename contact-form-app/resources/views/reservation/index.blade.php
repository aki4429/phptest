@extends('layouts.app')
@section('content')
<a href="{{ route('create') }}">予約追加ページへ</a>

<h1>予約一覧</h1>

@foreach ($reservations as $reservation)
<p>名前：{{ $reservation->name }}</p>
<p>メール：{{ $reservation->email }}</p>
<p>日付：{{ $reservation->date }}</p>
<p>時間：{{ $reservation->time }}</p>
<a href="{{ route('reservations.edit', $reservation->id) }}">編集</a>
<form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
  @csrf
  @method('DELETE')
  <button type="submit">削除</button>
</form>

<hr>
@endforeach

@endsection