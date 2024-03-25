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
        .content {
            font-size: 12px !important;
        }

        .list-lower-latin {
            list-style-type: lower-latin;
        }

        .page {
            page-break-before: always;
        }
    </style>
</head>

<body>

    @foreach ($reports as $report)
        @if ($report['is_surpass'])
            {{-- Start Surpass --}}
            <div class="page{{ $report['category_id'] == 1 ? '-0' : null }}">

                <div class="section-title text-center mt-5">
                    <h5>{{ $report['category_name'] }}</h5>
                </div>

                {{-- Content Exploration --}}
                <div class="surpass content mt-5 ms-5">
                    {!! $report['surpass'] !!}
                </div>
            </div>

            {{-- end surpass --}}
        @else
            <div class="page{{ $report['category_id'] == 1 ? '-0' : null }}">

                <div class="section-title{{ $report['category_id'] == 1 ? '-0' : null }} text-center mt-5">
                    <h5>{{ $report['category_name'] }}</h5>
                </div>

                {{-- start Improvement --}}
                <div class="improvement section-title ms-5 mt-5">
                    <h5>Improvement</h5>
                </div>

                <div class="content mt-3 ms-5">
                    <p>
                        {{-- Hi {{ $user->full_name }} --}}
                        Hi Name
                    </p>

                    {!! $report['heading_improvement'] !!}

                    @if (isset($report['improvement_reports']) && count($report['improvement_reports']) > 0)
                        @foreach ($report['improvement_reports'] as $improvement_report)
                            @if ($improvement_report['is_improvement'])
                                {!! $improvement_report['improvement'] !!}
                            @endif

                            @if (isset($improvement_report['sub_improvement_reports']) && count($improvement_report['sub_improvement_reports']) > 0)
                                @foreach ($improvement_report['sub_improvement_reports'] as $sub_improvement_report)
                                    @if ($sub_improvement_report['is_improvement'])
                                        {!! $sub_improvement_report['improvement'] !!}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>


            {{-- end exploration --}}
        @endif
    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
