<x-app-layout>
    <style>
        .slide-container {
            max-width : 1120px;
            width     : 100%;
            padding   : 40px 0;
        }

        .slide-content {
            margin        : 0 40px;
            overflow      : hidden;
            border-radius : 25px;
        }

        .card {
            border-radius    : 25px;
            background-color : #FFF;
        }

        .image-content,
        .card-content {
            display        : flex;
            flex-direction : column;
            align-items    : center;
            padding        : 10px 14px;
        }

        .image-content {
            position : relative;
            row-gap  : 5px;
            padding  : 25px 0;
        }

        .overlay {
            position         : absolute;
            left             : 0;
            top              : 0;
            height           : 100%;
            width            : 100%;
            background-color : #16a34a;
            border-radius    : 25px 25px 0 25px;
        }

        .overlay::before,
        .overlay::after {
            content          : '';
            position         : absolute;
            right            : 0;
            bottom           : -40px;
            height           : 40px;
            width            : 40px;
            background-color : #16a34a;
        }

        .overlay::after {
            border-radius    : 0 25px 0 0;
            background-color : #FFF;
        }

        .card-image {
            position      : relative;
            height        : 150px;
            width         : 150px;
            border-radius : 50%;
            background    : #FFF;
            padding       : 3px;
        }

        .card-image .card-img {
            height        : 100%;
            width         : 100%;
            object-fit    : cover;
            border-radius : 50%;
            border        : 4px solid #FFF;
        }

        .name {
            font-size   : 18px;
            font-weight : 500;
            color       : #333;
        }

        .description {
            font-size  : 14px;
            color      : #707070;
            text-align : center;
        }

        .button {
            border           : none;
            font-size        : 16px;
            color            : #FFF;
            padding          : 8px 16px;
            background-color : #16a34a;
            border-radius    : 6px;
            margin           : 14px;
            cursor           : pointer;
            transition       : all 0.3s ease;
        }

        .button:hover {
            background : #166534;
        }

        .swiper-navBtn {
            color      : #166534;
            transition : color 0.3s ease;
        }

        .swiper-navBtn:hover {
            color : #166534;
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
            font-size : 35px;
            color     : #16a34a;
        }

        .swiper-button-next {
            right : 0;
        }

        .swiper-button-prev {
            left : 0;
        }

        .swiper-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet, .swiper-pagination-horizontal.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet {
            background-color : #16a34a;
        }

        @media screen and (max-width : 768px) {
            .slide-content {
                margin : 0 10px;
            }

            .swiper-navBtn {
                display : none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <div class="justify-between">
        <div class="relative bg-gradient-to-r from-green-600 to-green-700 to bg-green-500 h-32 py-4 px-4 border-b-4 w-full text-white flex items-center">
            <h2 class="font-semibold text-xl text-white leading-tight ml-4">
                {{ __('Teams') }}
            </h2>
            @if (Auth::check())
                <div class="flex items-center ml-auto mr-4">
                    <a href="{{ route('team.create') }}">
                        <x-primary-button class="">Team toevoegen</x-primary-button>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="slide-container swiper mt-4">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @foreach($teams as $team)
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image flex justify-center items-center">
                                <img src="{{ asset('/storage/'. $team->logo) }}" alt="" class="card-img text">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">{{ $team->name }}
                            </h2>
                            <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                            <a href="{{ route('team.show', $team) }}">
                                <button class="button">View More</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>

    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
    <script>

        var swiper = new Swiper('.slide-content', {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        })

    </script>
</x-app-layout>
