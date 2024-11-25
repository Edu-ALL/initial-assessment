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
            margin-top: 115px !important;
            /* create space for header */
            margin-bottom: 80px !important;
            /* create space for footer */
        }

        @import url('https://fonts.cdnfonts.com/css/ambit');

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Ambit', sans-serif !important;
        }

        h2 {
            font-family: 'Ambit', sans-serif !important;
            font-size: 24px !important;
            font-weight: bold;
        }

        h6 {
            font-family: 'Ambit', sans-serif !important;
            font-size: 16px !important;
            font-weight: bold;
        }

        .category h5 {
            font-family: 'Ambit', sans-serif !important;
            font-weight: bold;
            font-size: 14px;
        }


        p {
            font-family: 'Ambit', sans-serif !important;
            font-size: 12px;
            margin-bottom: 8px;
        }

        ul li {
            font-size: 12px !important;
        }

        header,
        footer {
            position: fixed;
            left: 0px;
            right: 0px;
        }

        header {
            height: auto;
            margin-top: -115px;
            /* top: 0; */
        }

        footer {
            /* height: auto; */
            left: -50px !important;
            margin-bottom: -80px !important;
            bottom: 0;
        }

        .content {
            margin-top: -25px !important;
            margin-bottom: -32px !important;
            font-size: 12px !important;
        }

        .content>h1 {
            font-family: 'Ambit', sans-serif !important;
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 30px;
        }

        .list-lower-latin {
            list-style-type: lower-latin;
        }

        .list-upper-latin {
            list-style-type: upper-latin;
        }

        .list-lower-roman {
            list-style-type: lower-roman;
        }

        .quest-list,
        .quest-title {
            font-size: 1.1em;
            /* font-weight: bold; */
            margin-bottom: 8px;
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        table tr td,
        th {
            padding: 3px !important;
            line-height: 1.5;
            font-size: 12px !important;
        }

        table>thead {
            /* background-color: #0000FF; */
            color: white;
        }

        .table-detail th {
            border: 1px solid #7272ff;
        }

        .table-detail td,
        th {
            border: 1px solid #7272ff;
            font-size: 10px !important;
        }

        button {
            background-color: #0000FF;
            margin: 0px;
        }

        .btn-last {
            border-radius: 0px 10px 10px 0px;
        }


        .fw-bold {
            font-weight: bold;
        }

        .bckg-color-table {
            background-color: #0000FF;
            text-align: center;
            color: white;
        }

        .bckg-color-table-ylw {
            background-color: #FFFF00;
            text-align: center;
            color: black;
        }

        .progress-chart {
            width: 100%;
            background-color: #000;
            border: 3px solid #1414FF;
        }

        .progress-chart-bar {
            /* Ubah nilai lebar sesuai dengan progress yang diinginkan */
            height: 20px;
            color: #fff;
            font-weight: bold;
            background-color: #1414FF;
            border: 1px solid #1414FF;
            clip-path: polygon(0 0, 100% 0%, 95% 100%, 0% 100%) !important;
            -webkit-clip-path: polygon(0 0, 100% 0%, 95% 100%, 0% 100%) !important;
            /* Warna hijau untuk progress yang sudah selesai */
        }
    </style>
</head>

<body style="padding: 0; margin:0;">

    <header>
        <img src="{{ public_path('img/pdf/edu-all-header.webp') }}" width="auto" height="40px"
            style="margin-left: 0px; margin-top: 50px;">
        <h2 style="position:absolute; right:0%; top:8%; z-index:-999;">
            PERSONALIZED ASSESSMENT REPORT
        </h2>

        {{-- <img src="{{ public_path('img/pdf/edu-all-watermark.webp') }}" width="85%"
        style="position:absolute; left:8%; top:32.5%; z-index:-999;"> --}}
        <img src="{{ public_path('img/pdf/edu-all-watermark.webp') }}" width="85%"
            style="position:absolute; left:8%; top:40%; z-index:-999; opacity:.4;">
    </header>

    <footer>
        <img src="{{ public_path('img/pdf/edu-all-footer.png') }}" height="auto" width="110%">
    </footer>

    <main>
        <div class="" style="padding:0px;">
            @yield('body')


        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
