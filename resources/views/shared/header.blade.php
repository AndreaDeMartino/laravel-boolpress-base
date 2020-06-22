<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

        <header>
            <nav class="navbar">
                <h2 class="navbar-brand">Boolpress-Base</h2>

                <ul class="navbar-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('posts') }}">Posts</a></li>
                </ul>
            </nav>
        </header>