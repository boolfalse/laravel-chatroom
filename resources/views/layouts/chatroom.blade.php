<!DOCTYPE html>
<html lang="en">
<head>
    @include('chatroom.head')
</head>
<body>
<main>
    <div class="layout">
        @include('chatroom.navigation')
        @include('chatroom.sidebar')
        @include('chatroom.exampleModalCenter')
        @include('chatroom.startnewchat')

        @yield('chat_dialog')

    </div> <!-- Layout -->
</main>

@include('chatroom.scripts')
</body>
</html>