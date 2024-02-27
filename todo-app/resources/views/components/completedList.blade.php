<form id="completedList" action="/toggleTodo" method="POST"
    class="grid grid-cols-[min-content_max-content_min-content] gap-x-2 op-50" hx-boost="true" hx-target="#todoList"
    hx-trigger="change" hx-push-url="false" hx-swap-oob="true">
    @csrf
    <input type="hidden" name="from" value="completed">
    @foreach ($todoList as $todo)
        @if ($todo['status'] == 1)
            <input type="checkbox" name="{{ $todo['id'] }}" checked>
            <label for="{{ $todo['id'] }}">{{ $todo['todo'] }}</label><br>
        @endif
    @endforeach
</form>
