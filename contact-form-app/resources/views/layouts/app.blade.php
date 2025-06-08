<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>おだちんWEB</title>
</head>

<body>
  <header>
    <nav>
      <a href="{{ route('home') }}">ホーム</a> |
      <a href="{{ route('greeting') }}">ごあいさつ</a> |
      <a href="{{ route('about') }}">会社概要</a> |
      <a href="{{ route('works') }}">制作事例</a> |
      <a href="{{ route('contact') }}">お問い合わせ</a> |
      <a href="{{ route('create') }}">予約追加</a> |
      <a href="{{ route('reservations.index') }}">予約一覧</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>&copy; 2025 おだちんWEB</p>
  </footer>
</body>

</html>