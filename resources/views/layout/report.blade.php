<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @page {
            margin-top: 125px !important;
            /* create space for header */
            margin-bottom: 100px !important;
            /* create space for footer */
        }

        header,
        footer {
            position: fixed;
            left: 0px;
            right: 0px;
        }

        header {
            height: auto;
            margin-top: -125px;
            /* top: 0; */
        }

        footer {
            /* height: auto; */
            margin-bottom: -100px !important;
            bottom: 0;
        }

        .content {
            font-size: 12px !important;
        }

        .list-lower-latin {
            list-style-type: lower-latin;
        }

        .list-lower-roman {
            list-style-type: lower-roman;
        }

        /* .category {
            page-break-after: always;
        }

        .category:first-of-type {
            page-break-before: avoid;
        }

        .category:last-of-type {
            page-break-after: avoid;

        } */

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        table tr td,
        th {
            padding: 4px;
            line-height: 1.5;
        }

        .table-detail th {
            border: 2px solid #252525;
        }

        .table-detail td,
        th {
            border: 2px solid #252525;
        }
    </style>
</head>

<body style="padding: 0; margin:0;">

    <header>
        <img src="{{ public_path('img/pdf/edu-all-header.webp') }}" width="auto" height="50px"
            style="margin-left: 50px; margin-top: 50px;">

        {{-- <img src="{{ public_path('img/pdf/edu-all-watermark.webp') }}" width="85%"
        style="position:absolute; left:8%; top:32.5%; z-index:-999;"> --}}
        <img src="{{ public_path('img/pdf/edu-all-watermark.webp') }}" width="85%"
            style="position:absolute; left:8%; top:50%; z-index:-999;">
    </header>

    <footer>
        <img src="{{ public_path('img/pdf/edu-all-footer.webp') }}" width="100%">
    </footer>

    <main>
        <div class="" style="padding:0 30px;">
            @yield('body')


        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
