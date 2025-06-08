@extends('layouts.app')


@section('content')
<a href="{{ route('reservations.index') }}">予約一覧ページへ</a>
<h1>予約フォーム</h1>
@if (session('success'))
<p>{{ session('success') }}</p>
@endif
<!-- @if ($errors->any())
<div style="color:red;">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif -->

<form action="/reservation" method="POST" novalidate>
  @csrf
  名前: <input type="text" name="name" value="{{old('name')}}"><br>
  @error('name')
  <div style="color:red;">{{ $message }}</div>
  @enderror
  メール: <input type="email" name="email" value="{{old('email')}}"><br>
  @error('email')
  <div style="color:red;">{{ $message }}</div>
  @enderror
  日付: <input type="date" name="date" value="{{old('date')}}"><br>
  @error('date')
  <div style="color:red;">{{ $message }}</div>
  @enderror
  時間: <input type="time" name="time" value="{{old('time')}}"><br>
  @error('time')
  <div style="color:red;">{{ $message }}</div>
  @enderror
  <button type="submit">送信</button>
</form>


@endsection