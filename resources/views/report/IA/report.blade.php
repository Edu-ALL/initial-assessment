<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        .category {
            page-break-before: always;
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
            style="position:absolute; left:8%; top:25%; z-index:-999;opacity: 0.04;">
    </header>

    <footer>
        <img src="{{ public_path('img/pdf/edu-all-footer.webp') }}" width="100%">
    </footer>

    <main>
        <div class="" style="padding:0 30px;">
            <div class="content">
                <p>
                    Hi {{ $user->full_name }} Thank you for sharing your details with us.
                </p>
                <p>
                    We have made a special & personalized report to help you know what to do for your future educational
                    journey!
                </p>

                @include('report.IA.component.exploration')
                @include('report.IA.component.profile-building')
                @include('report.IA.component.academic')
                @include('report.IA.component.writing')

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
