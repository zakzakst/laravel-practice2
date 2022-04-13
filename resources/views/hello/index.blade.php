<!doctype html>
<html lang="ja">
<head>
  <title>Index</title>
  <link href="/css/app.css" rel="stylesheet">
</head>
<body>
  <h1>Hello/Index</h1>
  <p>{{ $msg }}</p>
  @foreach($data as $item)
    <tr>
      <th>{{ $item->id }}</th>
      <td>{{ $item->name_and_age }}</td>
    </tr>
  @endforeach
</body>
</html>
