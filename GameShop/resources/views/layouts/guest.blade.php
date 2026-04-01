<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEOMeta::generate() !!}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('/storage/css/style-web.css') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://accounts.google.com/gsi/client"></script>

    <!-- Styles -->
    @livewireStyles

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH1VFNB7M0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BH1VFNB7M0');
    </script>

</head>
@php
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";

    $venders = \App\Models\Venders::query()
        ->select(
            'providerName',
            'logoURL',
            'logoMobileURL',
            'logoTransparentURL',
            'image_horizontal',
            'image_banner',
            'image_vertical',
        )
        ->get(5);
    $urllogin = request()->segment(1);
    $products_cluster = \App\Models\ProductsCluster::where('status', 'active')->orderBy('sort','asc')->get();
    $productsToCluster = \App\Models\ProductsToCluster::orderBy('id','asc')->get();
    $products = \App\Models\Products::orderBy('id','asc')->get();
@endphp



<body class="font-sans antialiased xs:bg-bg-moblie lg:bg-bg-web bg-100% bg-fixed bg-no-repeat ">


    <header class="">
        <div class="header-section">
            <div class="wrap-header">
                <div class="header-left  ">
                    <svg width="101%" height="100%" viewBox="0 0 1575 96" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-left">
                        <g filter="url(#filter0_ii_1292_3225)">
                            <path
                                d="M347.767 96H-4V-4H1574.5L1538.5 64.4482C1535.73 69.7071 1530.28 73 1524.34 73H406.416C399.269 73 392.253 74.9148 386.097 78.5454L364.022 91.5637C359.098 94.4681 353.484 96 347.767 96Z"
                                fill="url(#paint0_linear_1292_3225)"></path>
                        </g>
                        <path
                            d="M347.767 94.5H-2.5V-2.5H1572.02L1537.17 63.7499C1534.66 68.5158 1529.72 71.5 1524.34 71.5H406.416C399.001 71.5 391.722 73.4866 385.335 77.2533L363.26 90.2717C358.566 93.0399 353.216 94.5 347.767 94.5Z"
                            stroke="url(#paint1_linear_1292_3225)" stroke-width="3"></path>
                        <defs>

                            <linearGradient id="paint0_linear_1292_3225" x1="785.25" y1="-4" x2="785.25"
                                y2="96" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1292_3225" x1="3.90056" y1="50.3632" x2="1625.5"
                                y2="50.3632" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.21875" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="0.322917" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.53125" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.802083" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg width="106%" height="100%" viewBox="0 0 363 95" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-left-mb">
                        <g filter="url(#filter0_i_1481_15236)">
                            <path
                                d="M87.4187 94.5H-4V-5H362.5L330.177 62.4384C328.847 65.2144 326.041 66.9807 322.963 66.9807H126.581C122.071 66.9807 117.771 68.8839 114.738 72.222L99.2615 89.2586C96.229 92.5967 91.9286 94.5 87.4187 94.5Z"
                                fill="url(#paint0_linear_1481_15236)"></path>
                        </g>
                        <path
                            d="M87.4187 94H-3.5V-4.5H361.706L329.726 62.2223C328.479 64.8248 325.849 66.4807 322.963 66.4807H126.581C121.93 66.4807 117.496 68.4434 114.368 71.8858L98.8915 88.9224C95.9537 92.1562 91.7877 94 87.4187 94Z"
                            stroke="url(#paint1_linear_1481_15236)"></path>
                        <defs>
                            <filter id="filter0_i_1481_15236" x="-4" y="-7" width="366.5" height="101.5"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape">
                                </feBlend>
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha">
                                </feColorMatrix>
                                <feOffset dy="-3"></feOffset>
                                <feGaussianBlur stdDeviation="1"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1">
                                </feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                                </feColorMatrix>
                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1481_15236">
                                </feBlend>
                            </filter>
                            <linearGradient id="paint0_linear_1481_15236" x1="179.25" y1="-5"
                                x2="179.25" y2="94.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1481_15236" x1="3.5567" y1="49.3631"
                                x2="285.815" y2="49.3631" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.21875" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="0.322917" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.53125" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.802083" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="wrap-item-header-left">
                        <div class="flex">
                            <div class="box-logo">
                                <a href="{{ route('member.login',['lang'=>App::currentLocale()]) }}">
                                    <img class="w-full" src="{{ asset('/storage/images/logo.png') }}"
                                        alt="logo สล็อตเว็บตรงแตกง่าย" />
                                </a>
                            </div>
                            <div class="box-economy ">
                                <div class="inner-economy ">
                                    <div class="p-1 xs:hidden md:block">
                                        <div class="box-amount-header">
                                            <a href="{{ route('member.login') }}" class="">{{__('member/auth.home')}}</a>
                                        </div>
                                    </div>
                                    <div class="p-1 xs:hidden md:block">
                                        <div class="box-amount-header">
                                            <a href="{{ route('promotions',['lang'=>App::currentLocale()]) }}" class="">{{__('member/menu.promotions')}}</a>
                                        </div>
                                    </div>
                                   

                                    @foreach ($products_cluster as $products_cluster_item)

                                    @php
                                    $productsa = \App\Models\ProductsToCluster::where('cluster_id', $products_cluster_item->id)->orderBy('id','asc')->get();
                                    $wordCount = $productsa->count();
                                    @endphp
            
                                    @if($wordCount == '1') 
             
                                           
                                            @foreach ($productsToCluster as $productsToCluster_item)
                                                        @if($products_cluster_item->id == $productsToCluster_item->cluster_id) 
                        
                                                        @foreach ($products as $products_item)
                                                            @if($products_item->id == $productsToCluster_item->products_id) 
            
                                                            <div class="p-1 xs:hidden md:block">
                                                                <div class="box-amount-header"> 
                                                                    <a href="{{url('/game?lang='.App::currentLocale(),['product'=> $products_item->code ])}}" class="">
                                                                        @if(App::currentLocale() == "th") {{ $products_cluster_item->name_th }} @else {{ $products_cluster_item->name_en }}  @endif    
                                                                    </a> 
                                                                </div>
                                                            </div>
            
            
                                                        @else 
                                                        @endif
                                                        @endforeach 
                                                        @else 
                                                        @endif
                                                        @endforeach
                                    @else  
            
                                    <div class="p-1 xs:hidden md:block ">
                                        <div class="box-amount-header"> 
                                            <div x-data="{ dropdownOpen: false }" class="relative">
                                                
                                                <a @click="dropdownOpen=true" class="inline-flex px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0"
                                                   href="#">
                                                    <span class="ml-2 -mt-1">
                                                        @if(App::currentLocale() == "th") {{ $products_cluster_item->name_th }} @else {{ $products_cluster_item->name_en }}  @endif
                                                    </span>
                                                    <svg class="-mt-1 ml-1" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="currentColor" d="m12 16l-6-6h12z"/></svg>
                                                </a>
                                                <div x-show="dropdownOpen"
                                                     @click.away="dropdownOpen=false"
                                                     x-transition:enter="ease-out duration-200"
                                                     x-transition:enter-start="-translate-y-2"
                                                     x-transition:enter-end="translate-y-0"
                                                     class="absolute top-0 z-50 w-36 mt-12 -translate-x-1/2 left-1/2"
                                                     x-cloak>
                                                    <div class=" mt-1 text-sm bg-white border-2 rounded-xl shadow-md border-neutral-900 text-neutral-700 p-2">
            
                                                        @foreach ($productsToCluster as $productsToCluster_item)
                
                                                        @if($products_cluster_item->id == $productsToCluster_item->cluster_id) 
                        
                                                        @foreach ($products as $products_item)
                                                        
                                                            @if($products_item->id == $productsToCluster_item->products_id)
                                                            <div class="p-1 xs:hidden md:block"> 
                                                                <a href="{{url('/game?lang='.App::currentLocale(),['product'=> $products_item->code ])}}" class="flex items-center hover:text-[#7e5618]">
                                                                   
                                                                    <span>
                                                                        @if(App::currentLocale() == "th") {{ $products_item->name_th }} @else {{ $products_item->name_en }}  @endif
                                                                    </span>
                                    
                                                                </a>
                                                            </div>  
                                                            @else 
                                                            @endif
                                                            @endforeach  
                                                        @else 
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    @endif
            
                                    @endforeach
                                    <livewire:member.set-locale />

                                    <div class="p-1 xs:block md:hidden">
                                        <div class="box-amount-header">
                                            <div x-data="{ dropdownOpen: false }" class="relative">
                                                <a @click="dropdownOpen=true"
                                                    class="inline-flex px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 md:ml-4"
                                                    href="#">
                                                    <svg class="animate-spin-slow" width="1.1em" height="1.1em"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z" />
                                                    </svg>
                                                    <span class="ml-2 -mt-1">{{__('member/menu.menu')}}</span>
                                                    <svg class="-mt-1 ml-1" width="1.3em" height="1.3em"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="m12 16l-6-6h12z" />
                                                    </svg>
                                                </a>
                                                <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                                                    x-transition:enter="ease-out duration-200"
                                                    x-transition:enter-start="-translate-y-2"
                                                    x-transition:enter-end="translate-y-0"
                                                    class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2"
                                                    x-cloak>
                                                    <div
                                                        class="p-1 mt-1 text-sm bg-white border-2 rounded-xl shadow-md border-neutral-900 text-neutral-700">
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('member.login',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/auth.home')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('promotions',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.promotions')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('casino',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 256 256">
                                                                <path fill="currentColor"
                                                                    d="M232 136a56 56 0 0 1-83.4 48.82l11.06 36.88A8 8 0 0 1 152 232h-48a8 8 0 0 1-7.66-10.3l11.06-36.88A56 56 0 0 1 24 136c0-32 17.65-62.84 51-89.27a234.14 234.14 0 0 1 49.89-30.11a7.93 7.93 0 0 1 6.16 0A234.14 234.14 0 0 1 181 46.73C214.35 73.16 232 104 232 136" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.casino')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('slot',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M22 14h-1c0-3.87-3.13-7-7-7h-1V5.73A2 2 0 1 0 10 4c0 .74.4 1.39 1 1.73V7h-1c-3.87 0-7 3.13-7 7H2c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h1v1a2 2 0 0 0 2 2h14c1.11 0 2-.89 2-2v-1h1c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1M7.5 18A2.5 2.5 0 0 1 5 15.5c0-.82.4-1.54 1-2l3.83 2.88C9.5 17.32 8.57 18 7.5 18m9 0c-1.07 0-2-.68-2.33-1.62L18 13.5c.6.46 1 1.18 1 2a2.5 2.5 0 0 1-2.5 2.5" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.slot')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('lotto',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M22 14h-1c0-3.87-3.13-7-7-7h-1V5.73A2 2 0 1 0 10 4c0 .74.4 1.39 1 1.73V7h-1c-3.87 0-7 3.13-7 7H2c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h1v1a2 2 0 0 0 2 2h14c1.11 0 2-.89 2-2v-1h1c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1M7.5 18A2.5 2.5 0 0 1 5 15.5c0-.82.4-1.54 1-2l3.83 2.88C9.5 17.32 8.57 18 7.5 18m9 0c-1.07 0-2-.68-2.33-1.62L18 13.5c.6.46 1 1.18 1 2a2.5 2.5 0 0 1-2.5 2.5" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.lotto')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false"
                                                            class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                            href="{{ route('member.register',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M3.4 18L2 16.6l7.4-7.45l4 4L18.6 8H16V6h6v6h-2V9.4L13.4 16l-4-4z" />
                                                            </svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.slot')}}</span>
                                                        </a>
                                                        <div x-data="{ dropdownOpen: false }" class="relative pl-5">
                                                            <a @click="dropdownOpen=true"
                                                                class="inline-flex px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 md:ml-4"
                                                                href="#">
                                                                <svg class="animate-spin-slow" width="1.1em"
                                                                    height="1.1em" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z" />
                                                                </svg>
                                                                <span class="ml-2 -mt-1">อื่นๆ</span>
                                                                <svg class="-mt-1 ml-1" width="1.3em" height="1.3em"
                                                                    viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="m12 16l-6-6h12z" />
                                                                </svg>
                                                            </a>
                                                            <div x-show="dropdownOpen"
                                                                @click.away="dropdownOpen=false"
                                                                x-transition:enter="ease-out duration-200"
                                                                x-transition:enter-start="-translate-y-2"
                                                                x-transition:enter-end="translate-y-0"
                                                                class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2"
                                                                x-cloak>
                                                                <div
                                                                    class="p-1 mt-1 text-sm bg-white border-2 rounded-xl shadow-md border-neutral-900 text-neutral-700">
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('sbo',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 512 512">
                                                                            <path fill="currentColor"
                                                                                d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z" />
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.sbobet')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('saba',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 512 512">
                                                                            <path fill="currentColor"
                                                                                d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z" />
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.sababet')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('card',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 256 256">
                                                                            <path fill="currentColor"
                                                                                d="M232 136a56 56 0 0 1-83.4 48.82l11.06 36.88A8 8 0 0 1 152 232h-48a8 8 0 0 1-7.66-10.3l11.06-36.88A56 56 0 0 1 24 136c0-32 17.65-62.84 51-89.27a234.14 234.14 0 0 1 49.89-30.11a7.93 7.93 0 0 1 6.16 0A234.14 234.14 0 0 1 181 46.73C214.35 73.16 232 104 232 136" />
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.card')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('keno',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M22 14h-1c0-3.87-3.13-7-7-7h-1V5.73A2 2 0 1 0 10 4c0 .74.4 1.39 1 1.73V7h-1c-3.87 0-7 3.13-7 7H2c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h1v1a2 2 0 0 0 2 2h14c1.11 0 2-.89 2-2v-1h1c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1M7.5 18A2.5 2.5 0 0 1 5 15.5c0-.82.4-1.54 1-2l3.83 2.88C9.5 17.32 8.57 18 7.5 18m9 0c-1.07 0-2-.68-2.33-1.62L18 13.5c.6.46 1 1.18 1 2a2.5 2.5 0 0 1-2.5 2.5" />
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.keno')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('trade',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M3.4 18L2 16.6l7.4-7.45l4 4L18.6 8H16V6h6v6h-2V9.4L13.4 16l-4-4z" />
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.trade')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('poker',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 48 48">
                                                                            <g fill="none" stroke="currentColor"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4">
                                                                                <path d="M42 4H12v40h30z" />
                                                                                <path stroke-linecap="round"
                                                                                    d="M4 11.79L12 10v34z"
                                                                                    clip-rule="evenodd" />
                                                                                <path d="m27 18l-5 6l5 6l5-6z" />
                                                                                <path stroke-linecap="round"
                                                                                    d="M18 10v4m18 20v4" />
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.poker')}}</span>
                                                                    </a>
                                                                    <a @click="menuBarOpen=false"
                                                                        class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{ route('cock',['lang'=>App::currentLocale()]) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            viewBox="0 0 512 512">
                                                                            <path fill="currentColor"
                                                                                d="M365.852 31.858c-10.152 2.474-24.915 7.073-37.437 13.602c-9.2 4.797-17.277 10.575-21.928 16.19c-4.65 5.618-6.05 9.96-4.416 15.587l3.556 12.254l-12.736-.76c-3.048-.183-4.944-.117-7.364-.262c-2.42-.146-5.405-.706-8.27-1.87c-3.86-1.568-9.082-4.65-16.085-8.91a149.23 149.23 0 0 0-.407 16.006c.38 12.915 2.02 27.945 4.82 41.17c1.328 6.27 3.007 12.134 4.805 17.13c2.992-4.705 6.264-9.202 9.84-13.368c17.022-19.818 40.47-41.586 69.867-43.697c14.423-1.037 29.333 5.324 42.554 12.41c3.997-7.635 10.257-13.963 16.617-19.67c6.403-5.748 13.146-11.018 18.95-15.97c-9.552-6.72-16.81-10.074-23.02-10.855c-7.936-.998-16.028 1.45-28.835 8.828l-15.21 8.762l4.7-46.577zm-12.796 80.995a16.57 16.57 0 0 0-1.672.03c-20.817 1.494-41.72 19.098-57.5 37.47c-13.842 16.117-23.36 41.13-28.65 61.556c6.866 1.127 14.21 2.21 21.564 2.43c10.95.33 20.46-1.593 25.334-5.83l7.04-6.114l5.862 7.25c4.956 6.128 10.802 14.087 14.32 23.476c1.78 4.75 2.88 10.128 2.698 15.607c12.487-2.64 23.93-7.162 28.884-12.86l5.256-6.043l6.614 4.52c10.006 6.838 19.827 14.582 26.634 25.236c1.033-3.752 1.935-7.666 2.416-11.75c1.503-12.738-.18-25.93-6.636-35.494c-10.232-11.257-22.116-22.055-24.93-37.03c-1.066-5.675.69-10.02 2.78-14.29c2.092-4.27 4.972-8.467 8.35-12.593c3.803-4.644 8.228-9.1 12.948-13.05c-4.015-2.658-8.39-5.55-13.877-8.665c-12.77-7.256-28.594-13.592-37.434-13.86zM48.52 128.626c-6.353-.037-9.976.466-9.976 1.576c2.82 12.857 7.998 26.53 15.432 39.48c26.005-3.718 53.01-5.705 80.652-5.488c26.75 8.66 54.68 16.02 80.83 25.338c-25.477-4.52-50.737-6.842-75.512-7.3a489.987 489.987 0 0 0-11.82-.073c-28.5.16-56.26 2.772-82.938 7.17c4.785 32.48 20.097 79.06 50.397 120.476c32.95 45.036 82.958 84.022 156.976 94.457c58.185 8.202 107.473-4.926 132.47-31.346c12.5-13.21 19.395-29.548 19.23-49.768c-.157-18.958-6.877-41.526-22.327-67.106c-1.133-.884-2.3-1.766-3.52-2.654c-13.164 10.368-31.666 13.752-47.895 15.322l-18.392 1.78l9.94-15.58c2.974-4.66 2.76-9.265.433-15.474c-1.486-3.962-4.016-8.048-6.75-11.992c-9.13 4.418-19.634 5.185-29.495 4.887c-12.977-.392-25.546-2.913-33.66-4.262l-9.268-1.538l1.936-9.193c2.894-13.746 7.735-30.663 15.19-46.902c-46.584-23.24-175.11-41.595-211.933-41.812zm303.762.088c8.852 0 16.186 7.384 16.186 16.213c0 8.83-7.334 16.213-16.186 16.213c-8.85 0-16.187-7.384-16.187-16.213c0-8.83 7.336-16.213 16.187-16.213m73.906 13.47l-1.707.936c-5.958 3.275-13.704 10.08-19.133 16.71c-2.715 3.316-4.887 6.612-6.11 9.108c-.885 1.807-1.032 3.154-1.13 3.35c1.295 5.8 10.486 16.914 20.966 28.522l.387.427l.326.473a54.88 54.88 0 0 1 4.754 8.342c11.47.563 23.966-.753 38.652-3.727l-41.35-30.937s37.437.748 51.126-1.635c4.696-.818-25.494-22.228-46.78-31.57zM160.52 231.076l17.516 4.15c-1.628 6.866-6.334 11.36-11.355 15.008c-5.02 3.65-10.874 6.607-17 9.354c-5.37 2.408-10.923 4.598-16.195 6.698c17.247 7.16 39.738 12.514 57.944 7.756l8.135-2.127l2.672 7.975c2.102 6.27.8 12.92-1.97 18.097c-2.766 5.176-6.815 9.438-11.452 13.343c-4.408 3.713-9.428 7.075-14.636 10.11c1.512.4 2.75.78 4.413 1.185c16.154 3.923 39.21 7.99 62.21 9.678c22.997 1.688 46.086.824 61.544-4.053c7.728-2.44 13.347-5.8 16.605-9.553c3.26-3.753 4.8-7.815 4.16-14.64l17.922-1.678c1.02 10.888-2.2 20.873-8.49 28.12c-6.29 7.245-15.014 11.835-24.78 14.917c-19.536 6.163-44.068 6.615-68.28 4.837c-24.213-1.778-47.956-5.964-65.14-10.137c-8.59-2.087-15.446-4.112-20.384-6.105c-2.47-.997-4.277-1.582-6.817-3.805c-1.27-1.112-3.838-3.195-3.59-8.084c.122-2.444 1.414-4.847 2.696-6.168c1.28-1.32 2.438-1.895 3.368-2.295c9.76-4.196 20.562-10.17 27.602-16.098a41.493 41.493 0 0 0 3.95-3.828c-28.726 2.026-57.113-10.163-73.773-20.45l-13.646-8.425l14.302-7.258c9.833-4.99 23.145-9.453 34.26-14.44c5.56-2.492 10.508-5.107 13.787-7.49c3.277-2.38 4.37-4.38 4.42-4.597zM132.378 373.31c-9.94 10.178-24.66 20.105-40.18 28.05c-6.34-7.936-13.154-15.46-20.445-22.242L59.495 392.3c5.485 5.1 10.75 10.778 15.762 16.814c-5.725 2.31-11.364 4.275-16.715 5.793l4.914 17.315c6.655-1.89 13.604-4.25 20.605-7.035c-.004 16.89-1.79 35.74-6.532 48.816l16.92 6.14c3.645-10.05 5.755-21.453 6.826-32.9c4.775 8.44 9.016 16.875 12.606 24.934l16.443-7.326c-6.96-15.626-16.04-32.46-26.976-48.42c16.785-8.633 32.574-19.633 43.97-32.488a244.225 244.225 0 0 1-14.94-10.632zm301.435 35.127c-15.158.19-32.163 7.857-49.21 18.494a196.634 196.634 0 0 0-20.456 14.66c-6.71-5.158-13.73-10.692-20.86-16.23a1086.232 1086.232 0 0 0-7.88-6.062c-7.882 1.91-16.138 3.324-24.705 4.232c7.053 4.96 14.317 10.433 21.545 16.047c6.184 4.802 12.332 9.672 18.37 14.354c-4.958 5.056-9.45 10.33-13.243 15.735l14.734 10.34c3.507-4.998 7.984-10.123 13.076-15.117c5.09 3.68 10.056 7.083 14.82 9.965l9.317-15.4a143.322 143.322 0 0 1-4.667-2.96c19.407-2.33 39.054-.35 52.653 2.676l3.91-17.57c-10.58-2.356-23.95-4.223-38.416-4.275l-.19.002c13.615-7.218 26.607-11.223 33.21-10.857l1-17.97a44.232 44.232 0 0 0-3.007-.063z">
                                                                            </path>
                                                                        </svg>
                                                                        <span class="ml-2 -mt-1">{{__('member/menu.cock')}}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                           
                                                                
                                                                 
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-right">
                    <svg width="100%" height="100%" viewBox="0 0 359 73" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-right">
                        <path
                            d="M2.6305 62.0931L34.4271 -1.5H383.501V71.5H8.44428C3.6123 71.5 0.469567 66.415 2.6305 62.0931Z"
                            fill="url(#paint0_linear_1292_3236)" stroke="url(#paint1_linear_1292_3236)"
                            stroke-width="3"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1292_3236" x1="190.25" y1="-3"
                                x2="190.25" y2="73" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1292_3236" x1="-62.0078" y1="76.2236"
                                x2="393.223" y2="76.2236" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.21875" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="0.322917" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.53125" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.802083" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg width="108%" height="100%" viewBox="0 0 93 67" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-right-mb">
                        <path
                            d="M1.69166 61.4891L32.315 -2.5H96.5V66.5H4.84876C2.2733 66.5 0.579881 63.8122 1.69166 61.4891Z"
                            fill="url(#paint0_linear_1496_16253)" stroke="url(#paint1_linear_1496_16253)"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1496_16253" x1="47.75" y1="-3"
                                x2="47.75" y2="67" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1496_16253" x1="0.530928" y1="35.2454"
                                x2="76.3902" y2="35.2454" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.21875" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="0.322917" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.53125" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="0.802083" stop-color="white" stop-opacity="0.75"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0.15"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="wrap-item-header-right mt-2">
                        <div class="inner-wrap-item-header-right" x-data="{ open: false }">
                            <a x-on:click="open = ! open" type="submit" class="box-hamburger" style="width: 18%;">
                                <img src="{{ asset('/storage/images/icon_home/login.png') }}" alt="login" /> <span
                                    class="text-d pr-10">{{__('member/menu.login')}}</span>
                            </a>
                            <div x-show="open" x-cloak>
                                <livewire:member.auth.login />
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class=" ">

        @if ($urllogin === 'login' || $urllogin == null)



            <div class="md:p-5 xs:p-2">
                <div
                    class="md:p-5 xs:p-2 md:pl-10 md:pr-10 xs:pl-5 xs:pr-5  text-[#fff] relative bg-[#9ce0f8]/40  rounded-3xl shadow-2xl space-y-4 border border-sky-600">

                    <form action="{{ route('member.guest-login',['lang'=>App::currentLocale()]) }}" method="POST" class="grid  md:grid-cols-3 xs:grid-cols-1 gap-2 text-center " >
                        @csrf
                        <div>
                            <label for="email" class="flex text-lg font-medium leading-6 text-black ml-3.5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-6 h-6 mr-1.5">
                                    <path
                                        d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                {{__('member/auth.username')}}
                            </label>
                            <div class="mt-3">
                                <input wire:model="username" id="username" name="username" type="text"
                                    placeholder=" {{__('member/auth.username')}}"
                                    required
                                    class="block w-full rounded-3xl border-0 py-2.5 pl-8 text-black shadow-sm ring-1 ring-sky-300 placeholder:text-lg placeholder:text-gray-500 focus:ring-1 focus:ring-inset focus:ring-sky-500  ">
                                    @if (session('error'))
                                        <span class="ring-red-500 text-red-500 text-sm">{{ session('error') }}</span>
                                    @endif
                                
                            </div>
                        </div>
                        <div>
                            <label for="password" class="flex text-lg font-medium leading-6 text-black ml-3.5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-6 h-6 mr-1.5">
                                    <path fill-rule="evenodd"
                                        d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{__('member/auth.password')}}
                            </label>

                            <div x-data="{ showpass: true }">
                                <div class="mt-3">
                                    <input wire:model="password" id="password" name="password"
                                        :type="showpass ? 'password' : 'text'" placeholder=" {{__('member/auth.password')}}"
                                        autocomplete="current-password"
                                        required
                                        class="block w-full rounded-3xl border-0 py-2.5 pl-8 text-black shadow-sm ring-1 ring-sky-300 placeholder:text-lg placeholder:text-gray-500 focus:ring-1 focus:ring-inset focus:ring-sky-500 ">
                                        @if (session('error'))
                                            <span class="ring-red-500 text-red-500 text-sm">{{ session('error') }}</span>
                                        @endif
                                </div>

                                <div class="flex items-center mt-3">
                                    <div class="flex items-center">
                                        <input id="remember-me" name="remember-me" type="checkbox"
                                            @click="showpass=!showpass"
                                            class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black">
                                        <label for="remember-me"
                                            class="ml-3 block text-lg leading-6 text-black">{{__('member/auth.showpassword')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="grid  xs:grid-cols-2 md:grid-cols-2 gap-2 text-center md:-mt-5">
                                <div>
                                    <label for="email" class="xs:hidden md:block">
                                        &nbsp;
                                    </label>
                                    <div class="mt-3 flex justify-center">
                                        <button type="submit">
                                            <p wire:loading wire:target="login">
                                                <svg class="inline-flex animate-spin -ml-1 mr-1 h-5 w-5 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor"
                                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                    </path>
                                                </svg>
                                                {{__('member/auth.load')}}...
                                            </p>
                                            <p wire:loading.remove wire:target="login">
                                                <img src="{{ asset('/storage/images/topgames/Login.png') }}"
                                                    style="width:100%">

                                            </p>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="xs:hidden  md:block">
                                        &nbsp;
                                    </label>
                                    <div class="mt-3 ">
                                        <a href="{{ route('member.register',['lang'=>App::currentLocale()]) }}">
                                            <p wire:loading.remove wire:target="login">
                                                <img src="{{ asset('/storage/images/topgames/Register.png') }}"
                                                    style="width:100%">
                                            </p>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>



                </div>
            </div>



            <div class="">
                <img class="mySlides" src="{{ asset('/storage/images/banner/banner-3.jpg') }}" style="width:100%">
                <img class="mySlides" src="{{ asset('/storage/images/banner/banner-1.jpg') }}" style="width:100%">
            </div>

            <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    myIndex++;
                    if (myIndex > x.length) {
                        myIndex = 1
                    }
                    x[myIndex - 1].style.display = "block";
                    setTimeout(carousel, 2000); // Change image every 2 seconds
                }
            </script>

            <div class="flex justify-center xs:pt-3 md:pt-6">
                <button type="button"
                    class=" bg-gradient-to-b from-cyan-500 from-30% to-cyan-600 to-70% flex  justify-center rounded-3xl px-8 py-2.5 font-medium leading-6 shadow-sm">
                    <span class=" text-white text-2xl  rounded-3xl ">🔥 เว็บสล็อตออนไลน์ 🔥</span>
                </button>
            </div>
            <div class="flex justify-center xs:pt-3 md:pt-6">
                <span class="xs:pr-4 xs:pl-4 md:pr-10 md:pl-10">
                    สุดยอดเว็บคาสิโนออนไลน์ ฝาก-ถอนอัตโนมัติ 1-5 วินาที คาสิโนครบครัน บาคาร่า สล๊อต เกมยิงปลา และเกมอื่น
                    ๆ อีกมากมาย ถ่ายทอดสดแบบ Live 24 ชั่วโมง จากค่ายเกมหลากหลายค่ายเกมทั้ง SA Gaming, Sexy Game,
                    Kingmaker, WM Casino, Jokergame, PG Slot พร้อมให้บริการและดูแลลูกค้าตลอด 24 ชั่วโมง
                    ด้วยทีมงานมืออาชีพกับประสบการณ์มากกว่า 10 ปี
                    มีระบบการทำงานที่เสถียรมากที่สุด รองรับการเล่น ผ่านบนมือถือทั้งระบบ iOS และ Android
                    ถ้านึกถึงคาสิโนออนไลน์ ต้องนึกถึง เท่านั้น
                </span>
            </div>
            <div class="flex justify-center xs:pt-3 md:pt-6">
                <button type="button"
                    class=" bg-gradient-to-b from-cyan-500 from-30% to-cyan-600 to-70% flex  justify-center rounded-3xl px-8 py-2.5 font-medium leading-6 shadow-sm">
                    <span class=" text-white text-2xl  rounded-3xl ">🔥 โปรโมชั่นสุดฮอต 🔥</span>
                </button>
            </div>
            <div class="section-content grid grid-cols-3 gap-4 xs:pt-3 md:pt-6 ">
                <div>
                    <img class="rounded-xl" src="{{ asset('/storage/images/wallet/pro1.jpg') }}" alt="" />
                </div>
                <div>
                    <img class="rounded-xl" src="{{ asset('/storage/images/wallet/pro2.jpg') }}" alt="" />
                </div>
                <div>
                    <img class="rounded-xl" src="{{ asset('/storage/images/wallet/pro3.jpg') }}" alt="" />
                </div>
            </div>

            <div class="section-content xs:pt-3 md:pt-6">
                <div class="block-game-category">
                    <div class="wrap-category-game" id="list-category">
                        <div class="item-category-game">
                            <a href="{{ route('slot',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy" src="{{ asset('/storage/images/wallet/icon_g_slot.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.slot')}}</span>
                                </div>
                            </a>
                            <svg data-v-3e39eb06="" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                viewBox="0 0 104 48" fill="none" preserveAspectRatio="none" class="bg-btn-game1">
                                <path data-v-3e39eb06=""
                                    d="M6.00001 1.00001L97.299 1.00013C100.278 1.00014 102.597 3.58918 102.269 6.55036L98.2828 42.5504C98.0023 45.0834 95.8617 47.0001 93.3132 47.0001H6C3.23858 47.0001 1 44.7616 1 42.0001V6.00001C1 3.23858 3.23858 1 6.00001 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9372)" stroke-width="2"
                                    class="inner-bg-btn"></path>
                                <defs data-v-3e39eb06="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-3e39eb06="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-3e39eb06="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9372" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-3e39eb06="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-3e39eb06=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <!----><!---->
                        </div>
                        <div class="item-category-game">
                            <a href="{{ route('casino',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy"
                                        src="{{ asset('/storage/images/wallet/icon_g_casino.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.casino')}}</span>
                                </div>
                            </a>
                            <svg data-v-bc5fb742="" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                viewBox="0 0 104 48" fill="none" preserveAspectRatio="none" class="bg-btn-game2">
                                <path data-v-bc5fb742=""
                                    d="M10.4165 1.00001L97.299 1.00013C100.278 1.00014 102.597 3.58918 102.269 6.55036L98.2828 42.5504C98.0023 45.0834 95.8617 47.0001 93.3132 47.0001H6.65886C3.69211 47.0001 1.37789 44.4318 1.68588 41.4811L5.4435 5.48094C5.70932 2.93431 7.85603 1 10.4165 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9376)" stroke-width="2"
                                    class="inner-bg-btn"></path>
                                <defs data-v-bc5fb742="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-bc5fb742="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9376" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-bc5fb742=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <!---->
                        </div>
                        <div class="item-category-game">
                            <a href="{{ route('casino',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy" src="{{ asset('/storage/images/wallet/icon_g_sport.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.slsbobetot')}}</span>
                                </div>
                            </a>
                            <!---->
                            <svg data-v-bc5fb742="" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                viewBox="0 0 104 48" fill="none" preserveAspectRatio="none" class="bg-btn-game2">
                                <path data-v-bc5fb742=""
                                    d="M10.4165 1.00001L97.299 1.00013C100.278 1.00014 102.597 3.58918 102.269 6.55036L98.2828 42.5504C98.0023 45.0834 95.8617 47.0001 93.3132 47.0001H6.65886C3.69211 47.0001 1.37789 44.4318 1.68588 41.4811L5.4435 5.48094C5.70932 2.93431 7.85603 1 10.4165 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9376)" stroke-width="2"
                                    class="inner-bg-btn"></path>
                                <defs data-v-bc5fb742="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-bc5fb742="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9376" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-bc5fb742=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <!---->
                        </div>
                        <div class="item-category-game">
                            <a href="{{ route('card',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy"
                                        src="{{ asset('/storage/images/wallet/icon_g_casino.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.crad')}}</span>
                                </div>
                            </a>
                            <!----><!---->
                            <svg data-v-21ee3235="" xmlns="http://www.w3.org/2000/svg" width="104" height="48"
                                viewBox="0 0 104 48" fill="none" preserveAspectRatio="none" class="bg-btn-game3">
                                <path data-v-21ee3235=""
                                    d="M10.4165 1.00001L98 1.00013C100.761 1.00014 103 3.23872 103 6.00013V42.0001C103 44.7616 100.761 47.0001 98 47.0001H6.65886C3.69211 47.0001 1.37789 44.4318 1.68588 41.4811L5.4435 5.48094C5.70932 2.93431 7.85603 1 10.4165 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9735)" stroke-width="2"
                                    class="inner-bg-btn"></path>
                                <defs data-v-21ee3235="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-21ee3235="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-21ee3235=""></stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-21ee3235=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-21ee3235="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-21ee3235=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-21ee3235=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9735" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-21ee3235="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-21ee3235=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-21ee3235=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-21ee3235=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-21ee3235=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-21ee3235=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-21ee3235=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-21ee3235=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="item-category-game">
                            <a href="{{ route('poker',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy" src="{{ asset('/storage/images/wallet/icon_g_hilo.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.poker')}}</span>
                                </div>
                            </a>
                            <svg data-v-3e39eb06="" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                viewBox="0 0 104 48" fill="none" preserveAspectRatio="none" class="bg-btn-game1">
                                <path data-v-3e39eb06=""
                                    d="M6.00001 1.00001L97.299 1.00013C100.278 1.00014 102.597 3.58918 102.269 6.55036L98.2828 42.5504C98.0023 45.0834 95.8617 47.0001 93.3132 47.0001H6C3.23858 47.0001 1 44.7616 1 42.0001V6.00001C1 3.23858 3.23858 1 6.00001 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9372)" stroke-width="2"
                                    class="inner-bg-btn"></path>
                                <defs data-v-3e39eb06="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-3e39eb06="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-3e39eb06="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9372" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-3e39eb06="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-3e39eb06=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-3e39eb06=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <!----><!---->
                        </div>
                        <div class="item-category-game">
                            <a href="{{ route('keno',['lang'=>App::currentLocale()]) }}">
                                <div class="flex justify-center items-center md:h-[90px] xs:h-[40px]">
                                    <img loading="lazy"
                                        src="{{ asset('/storage/images/wallet/icon_g_keno.webp') }}"
                                        alt="" />
                                    <span class="text-sky-700">{{__('member/menu.keno')}}</span>
                                </div>
                            </a>
                            <!---->
                            <svg data-v-bc5fb742="" xmlns="http://www.w3.org/2000/svg" width="100%"
                                height="100%" viewBox="0 0 104 48" fill="none" preserveAspectRatio="none"
                                class="bg-btn-game2">
                                <path data-v-bc5fb742=""
                                    d="M10.4165 1.00001L97.299 1.00013C100.278 1.00014 102.597 3.58918 102.269 6.55036L98.2828 42.5504C98.0023 45.0834 95.8617 47.0001 93.3132 47.0001H6.65886C3.69211 47.0001 1.37789 44.4318 1.68588 41.4811L5.4435 5.48094C5.70932 2.93431 7.85603 1 10.4165 1.00001Z"
                                    fill="url(#main-color)" stroke="url(#paint1_linear_5465_9376)"
                                    stroke-width="2" class="inner-bg-btn"></path>
                                <defs data-v-bc5fb742="">
                                    <linearGradient id="gradient-active" x1="52" y1="0"
                                        x2="52" y2="48.0001" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="var(--primary-color-1, #83e9ff)" data-v-bc5fb742="">
                                        </stop>
                                        <stop offset="1" stop-color="var(--primary-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="main-color" x1="52" y1="0" x2="52"
                                        y2="48.0001" gradientUnits="userSpaceOnUse" data-v-bc5fb742="">
                                        <stop stop-color="var(--theme-color-1, #83e9ff)" data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="var(--theme-color-2, #83e9ff)"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5465_9376" x1="0.695228" y1="45.8673"
                                        x2="142.012" y2="25.8645" gradientUnits="userSpaceOnUse"
                                        data-v-bc5fb742="">
                                        <stop stop-color="white" stop-opacity="0.15" data-v-bc5fb742=""></stop>
                                        <stop offset="0.21875" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.322917" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.53125" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="0.802083" stop-color="white" stop-opacity="0.75"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.15"
                                            data-v-bc5fb742=""></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <!---->
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-8 xs:grid-cols-3 gap-4 xs:pt-3 md:pt-6">
                    @foreach ($venders as $vender)
                        <div wire:click="opengame('{{ $vender->code }}')"
                            class="text-center relative hover:bg-[#fff0] group  rounded-3xl p-2 bg-bg-exchange bg-100%  bg-no-repeat group">
                            {{-- รูป/ข้อความ Hover --}}
                            <span
                                class="absolute text-4xl  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  hidden group-hover:block   ">
                                {{ $vender->gameName }}
                                {{-- NEW Game --}}
                                {{ $vender->new == 'active' ? 'NEW' : '' }}
                                {{-- END NEW Game --}}
                            </span>
                            <img src="{{ $vender->image_vertical }}""
                                class="mx-auto hover: flex-shrink-0 hover:opacity-30 rounded-2xl w-full">
                            {{-- HOT Game --}}
                            <span
                                class="relative flex h-12 w-12 -ml-12 -mt-7 {{ $vender->hot == 'active' ? '' : 'hidden' }}">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75">
                                </span>
                                <span
                                    class="relative inline-flex rounded-full h-12 w-12 bg-red-500 text-sm  items-center">
                                    <img src="{{ asset('/storage/images/icon_home/1041906.png') }}"
                                        class="h-12 w-12">
                                </span>
                            </span>
                            {{-- END HOT Game --}}
                        </div>
                    @endforeach
                </div>
            </div>



        @endif


        {{ $slot }}
    </main>


    <x-Footer />
    <x-MobileMenu />
    @livewireScripts
</body>

</html>
