<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.3/css/bulma.css">

    <style>
        .flex { flex: 1; }
        .is-muted { color: #999; }
    </style>
</head>
<body>
    <div class="section">
        <div class="container">
            <ul class="panel">
                <li class="panel-heading">
                    <h1>The Laracasts Snippet</h1>
                </li>

                @foreach ($feed as $podcast)
                    <li class="panel-block">
                        <div class="is-flex">
                            <span class="flex">
                                #{{ $podcast->number }} &mdash;
                                <a href="{{ $podcast->sharing_url }}">{{ $podcast->title }}</a>
                            </span>

                            <span class="is-muted">{{ gmdate("i:s", $podcast->duration) }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>