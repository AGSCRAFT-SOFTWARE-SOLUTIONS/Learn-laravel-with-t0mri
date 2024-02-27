<!doctype html>
<html lang="en">
    <head>
        <title>Donate t0mri</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@unocss/runtime"></script>
        <style>
@font-face {
    font-family: "font";
    src: url("/3270NerdFontMono-Regular.ttf");
}

* {
    font-family: "font" !important;
    border: none;
}
        </style>
    </head>
    <body class="grid place-items-center min-h-100vh">
        <form class="grid place-content-center gap-2rem" method="POST" action="{{ route('pay') }}">
            @csrf
            <h1 class="text-4rem font-black">Donate t0mri</h1>
            <input type="number" class="bg-gray-200 p-4 rd-xl" name="amount" required/>
            <button class="p-4 rd-xl">Donate</button>
        </form>
    </body>
</html>
