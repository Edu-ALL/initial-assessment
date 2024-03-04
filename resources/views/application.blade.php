<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('favicon.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduALL Assessment</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('loader.css') }}" />
    @vite(['resources/js/main.js'])
</head>

<body>
    <div id="app">
        <div id="loading-bg">
            <div class="loading-logo">
                <!-- SVG Logo -->
                <div class="d-flex justify-center mb-10 mt-5">
                    <img src="{{ asset('favicon.png') }}" alt="EduALL Assessment" width="100px">
                </div>
            </div>
            <div class="loading">
                <div class="effect-1 effects"></div>
                <div class="effect-2 effects"></div>
                <div class="effect-3 effects"></div>
            </div>
        </div>
    </div>

    <script>
        const loaderColor = localStorage.getItem('sneat-initial-loader-bg') || '#FFFFFF'
        const primaryColor = localStorage.getItem('sneat-initial-loader-color') || '#696CFF'

        if (loaderColor)
            document.documentElement.style.setProperty('--initial-loader-bg', loaderColor)

        if (primaryColor)
            document.documentElement.style.setProperty('--initial-loader-color', primaryColor)
    </script>
</body>

</html>
