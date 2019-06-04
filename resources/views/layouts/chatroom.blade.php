<!DOCTYPE html>
<html lang="en">
<head>
    @include('chatroom.head')
</head>
<body>
<main id="app">
    <div class="layout">
        @include('chatroom.navigation')
        @include('chatroom.sidebar')
        @include('chatroom.exampleModalCenter')
        @include('chatroom.startnewchat')

        @yield('chat_dialog')

    </div> <!-- Layout -->
</main>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>