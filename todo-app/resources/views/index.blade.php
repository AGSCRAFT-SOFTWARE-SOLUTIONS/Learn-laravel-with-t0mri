<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo app with laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/@unocss/runtime"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.min.css">
    <script src="https://unpkg.com/htmx.org@1.9.9"
        integrity="sha384-QFjmbokDn2DjBjq+fM+8LUIVrAgqcNW2s0PjAxHETgRn9l4fvX31ZxDxvwQnyMOX" crossorigin="anonymous">
    </script>
</head>
<body class="grid place-content-center min-h-100vh gap-2">
    <h1 class="font-bold text-2rem">Todo</h1>
    <form action="/createTodo" method="POST" class="flex gap-2" hx-boost="true" hx-target="#todoList" hx-push-url="false">
        @csrf
        <input type="text" name="todo" class="bg-gray-200 rd-md px-2" required>
        <button class="bg-green-100 hover:bg-green-200 active:bg-green-300 p-2 py-1 rd-md">+</button>
    </form>
    <details open id="todo">
        <summary class="op-50 font-bold">Todo</summary>
        @include('components/todoList')
    </details>
    <details id="completed">
        <summary class="op-50 font-bold">Completed</summary>
        @include('components/completedList')
    </details>
</body>
</html>
