<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        a {
            font-weight: 300;
            font-size: 1.2rem;
            text-decoration: none;
        }

        /* BACKGROUND */
        .bookshelf-bg {
            --color-0: #fff;
            --color-1: #111;
            --color-2: #222;
            --color-3: #333;
            --color-4: #2e2e2e;
            --color-5: #d2b48c;
            --color-6: #b22222;
            --color-7: #871a1a;
            --color-8: #ff6347;
            --color-9: #ff3814;

            width: 100%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background-color: var(--color-1);

            background-image:
                linear-gradient(to top,
                    var(--color-2) 5%,
                    var(--color-1) 6%,
                    var(--color-1) 7%,
                    transparent 7%
                ),

                linear-gradient(to bottom,
                    var(--color-1) 30%,
                    transparent 80%
                ),

                linear-gradient(to right,
                    var(--color-2),
                    var(--color-4) 5%,
                    transparent 5%
                );

            background-size: 300px 150px;
            background-position: center bottom;
        }

        .bookshelf-bg::before {
            content: "";

            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            background-size: 300px 150px;
            background-position: center bottom;

            clip-path: circle(150px at center center);

            animation: flashlight 20s ease infinite;
        }

        .bookshelf-bg::after {
            content: "";

            width: 25px;
            height: 10px;

            position: absolute;
            left: calc(50% + 59px);
            bottom: 100px;

            background-repeat: no-repeat;

            background-image:
                radial-gradient(circle, #fff 50%, transparent 50%),
                radial-gradient(circle, #fff 50%, transparent 50%);

            background-size: 10px 10px;

            background-position:
                left center,
                right center;

            animation: eyes 20s infinite;
        }

        @keyframes flashlight {
            0% {
                clip-path: circle(150px at -25% 10%);
            }

            50% {
                clip-path: circle(150px at 60% 86%);
            }

            100% {
                clip-path: circle(150px at 150% 50%);
            }
        }

        @keyframes eyes {
            0%, 38% {
                opacity: 0;
            }

            39%, 41% {
                opacity: 1;
            }

            42%, 100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="bookshelf-bg">

    <div class="min-h-screen w-full flex items-center justify-center">

        <div class="text-center p-8 bg-black/70 rounded-2xl shadow-2xl backdrop-blur-md border border-gray-700">

            <h1 class="text-white mb-6">
                Home Page Admin Jurusan SMK
            </h1>

            <a
                href="{{ route('filament.admin.auth.login') }}"
                class="inline-block py-3 px-6 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition duration-300"
            >
                Ke Login Admin
            </a>

        </div>

    </div>

</body>
</html>