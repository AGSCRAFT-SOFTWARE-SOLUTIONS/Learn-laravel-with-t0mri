<!DOCTYPE html>
<html lang="en">

<head>
    <title>chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div>
        <div>
            <form>
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button>send</button>
            </form>
        </div>
        <div class="messages">
        </div>

    </div>
</body>


<script>
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'ap2'
    });
    const channel = pusher.subscribe('public');

    channel.bind('chat', function(data) {
        $.post("/receive", {
                _token: '{{ csrf_token() }}',
                message: data.message,
            })
            .done(function(res) {
                console.log(res)
                $(".messages").last().after(res);
                $(document).scrollTop($(document).height());
            });
    });

    $("form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "/send",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: $("form #message").val(),
            }
        }).done(function(res) {
            $(".messages").last().after(res);
            $("form #message").val('');
            $(document).scrollTop($(document).height());
        });
    });
</script>

</html>

