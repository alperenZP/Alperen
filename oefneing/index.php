<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.4/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>


    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a>Link</a></li>
                <li>
                    <details>
                        <summary>
                            Parent
                        </summary>
                        <ul class="p-2 bg-base-100">
                            <li><a>Link 1</a></li>
                            <li><a>Link 2</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <button class="btn text-white bg-black">Button</button>
    <button class="btn">Button</button>

    <div class="carousel w-full">
        <div id="item1" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" class="w-full" />
        </div>
        <div id="item2" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
        </div>
        <div id="item3" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
        </div>
        <div id="item4" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
        </div>
    </div>
    <div class="flex justify-center w-full py-2 gap-2">
        <a href="#item1" class="btn btn-xs">1</a>
        <a href="#item2" class="btn btn-xs">2</a>
        <a href="#item3" class="btn btn-xs">3</a>
        <a href="#item4" class="btn btn-xs">4</a>
    </div>
    <progress class="progress progress-primary w-56" value="0" max="100"></progress>
    <progress class="progress progress-primary w-56" value="10" max="100"></progress>
    <progress class="progress progress-primary w-56" value="40" max="100"></progress>
    <progress class="progress progress-primary w-56" value="70" max="100"></progress>
    <progress class="progress progress-primary w-56" value="100" max="100"></progress>

    <div class="toast toast-top toast-start">
        <div class="alert alert-info">
            <span>New mail arrived.</span>
        </div>
        <div class="alert alert-success">
            <span>Message sent successfully.</span>
        </div>
    </div>
</body>

</html>