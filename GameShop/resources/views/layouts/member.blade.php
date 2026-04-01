<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'game') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/storage/css/style-web.css')}}" />  
    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH1VFNB7M0"></script> 
    <script> 
    window.dataLayer = window.dataLayer || []; 
    function gtag(){dataLayer.push(arguments);} 
    gtag('js', new Date()); 
    
    gtag('config', 'G-BH1VFNB7M0'); 
    </script>
</head>
@php
    $style = [
        'logo' => 'images/logo.png',
        'link' => [
            'default' => 'inline-flex border-transparent text-amber-400 hover:border-yellow-500 hover:text-amber-400 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
            'active' => 'inline-flex border-yellow-500 text-amber-400 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
        ],
        'colorIcon' => '#facc15',
        'text' => '',
    ];
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";
    function classNames(...$classes)
    {
        return implode(' ', array_filter($classes));
    }

    $products_cluster = \App\Models\ProductsCluster::where('status', 'active')->orderBy('sort','asc')->get();
    $productsToCluster = \App\Models\ProductsToCluster::orderBy('id','asc')->get();
    $products = \App\Models\Products::orderBy('id','asc')->get();

@endphp

<body class="xs:bg-bg-moblie bg-100% bg-fixed bg-no-repeat lg:bg-bg-web ">

    <header>
        <div class="header-section">
            <div class="wrap-header">
                <div class="header-left  ">
                    <svg width="101%" height="100%" viewBox="0 0 1575 96" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-left">
                        <g filter="url(#filter0_ii_1292_3225)">
                            <path
                                d="M347.767 96H-4V-4H1574.5L1538.5 64.4482C1535.73 69.7071 1530.28 73 1524.34 73H406.416C399.269 73 392.253 74.9148 386.097 78.5454L364.022 91.5637C359.098 94.4681 353.484 96 347.767 96Z"
                                fill="url(#paint0_linear_1292_3225)"
                            ></path>
                        </g>
                        <path
                            d="M347.767 94.5H-2.5V-2.5H1572.02L1537.17 63.7499C1534.66 68.5158 1529.72 71.5 1524.34 71.5H406.416C399.001 71.5 391.722 73.4866 385.335 77.2533L363.26 90.2717C358.566 93.0399 353.216 94.5 347.767 94.5Z"
                            stroke="url(#paint1_linear_1292_3225)"
                            stroke-width="3"
                        ></path>
                        <defs>
                           
                            <linearGradient id="paint0_linear_1292_3225" x1="785.25" y1="-4" x2="785.25" y2="96" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1292_3225" x1="3.90056" y1="50.3632" x2="1625.5" y2="50.3632" gradientUnits="userSpaceOnUse">
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
                    <svg width="106%" height="100%" viewBox="0 0 363 95" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-left-mb">
                        <g filter="url(#filter0_i_1481_15236)">
                            <path
                                d="M87.4187 94.5H-4V-5H362.5L330.177 62.4384C328.847 65.2144 326.041 66.9807 322.963 66.9807H126.581C122.071 66.9807 117.771 68.8839 114.738 72.222L99.2615 89.2586C96.229 92.5967 91.9286 94.5 87.4187 94.5Z"
                                fill="url(#paint0_linear_1481_15236)"
                            ></path>
                        </g>
                        <path
                            d="M87.4187 94H-3.5V-4.5H361.706L329.726 62.2223C328.479 64.8248 325.849 66.4807 322.963 66.4807H126.581C121.93 66.4807 117.496 68.4434 114.368 71.8858L98.8915 88.9224C95.9537 92.1562 91.7877 94 87.4187 94Z"
                            stroke="url(#paint1_linear_1481_15236)"
                        ></path>
                        <defs>
                            <filter id="filter0_i_1481_15236" x="-4" y="-7" width="366.5" height="101.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                                <feOffset dy="-3"></feOffset>
                                <feGaussianBlur stdDeviation="1"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"></feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1481_15236"></feBlend>
                            </filter>
                            <linearGradient id="paint0_linear_1481_15236" x1="179.25" y1="-5" x2="179.25" y2="94.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1481_15236" x1="3.5567" y1="49.3631" x2="285.815" y2="49.3631" gradientUnits="userSpaceOnUse">
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
                                    <img  class="w-full"  src="{{asset('/storage/images/logo.png')}}" alt="logo สล็อตเว็บตรงแตกง่าย"  />
                                </a>
                            </div>
                            <div class="box-economy ">
                                
                                <div class="inner-economy ">
                                    <div class="p-1 xs:hidden md:block">
                                        <div class="box-amount-header" >
                                            <a href="{{ route('member.pocket.home',['lang'=>App::currentLocale()]) }}" class="">{{__('member/menu.pocket')}}</a>
                                        </div>
                                    </div>
                                    <div class="p-1 xs:hidden md:block">
                                        <div class="box-amount-header" >
                                            <a href="{{ route('member.recently',['lang'=>App::currentLocale()]) }}" class="">{{__('member/menu.last_play')}}</a>
                                        </div>
                                    </div>
                                    <div class="p-1 xs:hidden md:block">
                                        <div class="box-amount-header"> 
                                            <a href="{{ route('member.promotion',['lang'=>App::currentLocale()]) }}" class="">{{__('member/menu.promotions')}}</a> 
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
                                                <a @click="dropdownOpen=true" class="inline-flex px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 md:ml-4"
                                                   href="#">
                                                    <svg class="animate-spin-slow" width="1.1em" height="1.1em" viewBox="0 0 24 24"><path fill="currentColor" d="m5.825 21l1.625-7.025L2 9.25l7.2-.625L12 2l2.8 6.625l7.2.625l-5.45 4.725L18.175 21L12 17.275z"/></svg>
                                                    <span class="ml-2 -mt-1">{{__('member/menu.menu')}}</span>
                                                    <svg class="-mt-1 ml-1" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="currentColor" d="m12 16l-6-6h12z"/></svg>
                                                </a>
                                                <div x-show="dropdownOpen"
                                                     @click.away="dropdownOpen=false"
                                                     x-transition:enter="ease-out duration-200"
                                                     x-transition:enter-start="-translate-y-2"
                                                     x-transition:enter-end="translate-y-0"
                                                     class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2"
                                                     x-cloak>
                                                    <div class="p-1 mt-1 text-sm bg-white border-2 rounded-xl shadow-md border-neutral-900 text-neutral-700">
                                                        <a @click="menuBarOpen=false" class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                           href="{{ route('member.pocket.home',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z"/></svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.pocket')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false" class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                           href="{{ route('member.recently',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                              </svg>
                                                              
                                                            <span class="ml-2 -mt-1">{{__('member/menu.last_play')}}</span>
                                                        </a>
                                                        <a @click="menuBarOpen=false" class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                           href="{{ route('member.promotion',['lang'=>App::currentLocale()]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="M255.03 33.813a229.242 229.242 0 0 0-5.5.03c-6.73.14-13.462.605-20.155 1.344c.333.166.544.32.47.438L204.78 75.063l73.907 49.437l-.125.188l70.625.28L371 79.282L342.844 52a225.62 225.62 0 0 0-49.47-14.78c-12.65-2.24-25.497-3.36-38.343-3.407zM190.907 88.25l-73.656 36.78l-13.813 98.407l51.344 33.657l94.345-43.438l14.875-76.5l-73.094-48.906zm196.344.344l-21.25 44.5l36.75 72.72l62.063 38.905l11.312-21.282c.225.143.45.403.656.75c-.77-4.954-1.71-9.893-2.81-14.782c-6.446-28.59-18.59-55.962-35.5-79.97c-9.07-12.872-19.526-24.778-31.095-35.5l-20.125-5.342zm-302.656 23c-6.906 8.045-13.257 16.56-18.938 25.5c-15.676 24.664-26.44 52.494-31.437 81.312A223.087 223.087 0 0 0 31 261l20.25 5.094l33.03-40.5L98.75 122.53l-14.156-10.936zm312.719 112.844l-55.813 44.75l-3.47 101.093l39.626 21.126l77.188-49.594l4.406-78.75l-.094.157l-61.844-38.783zm-140.844 6.406l-94.033 43.312l-1.218 76.625l89.155 57.376l68.938-36.437l3.437-101.75l-66.28-39.126zm-224.22 49.75c.91 8.436 2.29 16.816 4.156 25.094c6.445 28.59 18.62 55.96 35.532 79.968c3.873 5.5 8.02 10.805 12.374 15.938l-9.374-48.156l.124-.032l-27.03-68.844zm117.188 84.844l-51.532 8.156l10.125 52.094a225.067 225.067 0 0 0 27.314 20.437a226.31 226.31 0 0 0 46.687 22.594l62.626-13.69l-4.344-31.124l-90.875-58.47zm302.437.5l-64.22 41.25l-42 47.375l4.408 6.156c12.027-5.545 23.57-12.144 34.406-19.72c23.97-16.76 44.604-38.304 60.28-62.97c2.51-3.947 4.87-7.99 7.125-12.092zm-122.78 97.656l-79.94 9.625l-25.968 5.655c26.993 4 54.717 3.044 81.313-2.813c9.412-2.072 18.684-4.79 27.75-8.062l-3.156-4.406z"/></svg>
                                                            <span class="ml-2 -mt-1">{{__('member/menu.promotions')}}</span>
                                                        </a>
                                                      
                                                         
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

                                                                        <a @click="menuBarOpen=false" class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                        href="{{url('/game?lang='.App::currentLocale(),['product'=> $products_item->code ])}}">
                                                                        {!!$products_cluster_item->icon_text!!}
                                                                        <span class="ml-2 -mt-1">
                                                                                @if(['lang'=>App::currentLocale()] == "TH") {{ $products_cluster_item->name_th }} @else {{ $products_cluster_item->name_th }}  @endif
                                                                            </span>
                                                                        </a>
                                                                        
                                                                        @else 
                                                                        @endif
                                                                        @endforeach 
                                                                        @else 
                                                                        @endif
                                                                        @endforeach
                                                                    @else  
  
                                                                <div x-data="{ dropdownOpen: false }" class="relative pl-5">
                                                                    
                                                                    <a @click="dropdownOpen=true" class="inline-flex  py-2 text-base font-light bg-transparent rounded-lg md:mt-0"
                                                                       href="#">
                                                                       {!!$products_cluster_item->icon_text!!}
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
                                                                        <div class="p-1 mt-1 text-sm bg-white border-2 rounded-xl shadow-md border-neutral-900 text-neutral-700">
                    
                                                                            @foreach ($productsToCluster as $productsToCluster_item)
                                    
                                                                            @if($products_cluster_item->id == $productsToCluster_item->cluster_id) 
                                            
                                                                            @foreach ($products as $products_item)
                                            
                                                                                @if($products_item->id == $productsToCluster_item->products_id) 
                                                                                <a @click="menuBarOpen=false" href="{{url('/game?lang='.App::currentLocale(),['product'=> $products_item->code ])}}"
                                                                                    class="pl-5 relative inline-flex w-full hover:bg-neutral-100 px-1 py-2 text-base font-light bg-transparent rounded-lg md:mt-0 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                                                                                >
                                                                                    <span class="ml-2 -mt-1">
                                                                                        @if(App::currentLocale() == "th") {{ $products_item->name_th }} @else {{ $products_item->name_en }}  @endif
                                                                                    </span>
                                                                                </a>
                                                                                @else 
                                                                            
                                                                                @endif
                                                            
                                                                                @endforeach  
                                                                            @else 
                                                                            
                                                                            @endif
                                            
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                                @endif
                                                        @endforeach
                                                         
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
                    <svg width="100%" height="100%" viewBox="0 0 359 73" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-right">
                        <path d="M2.6305 62.0931L34.4271 -1.5H383.501V71.5H8.44428C3.6123 71.5 0.469567 66.415 2.6305 62.0931Z" fill="url(#paint0_linear_1292_3236)" stroke="url(#paint1_linear_1292_3236)" stroke-width="3"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1292_3236" x1="190.25" y1="-3" x2="190.25" y2="73" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1292_3236" x1="-62.0078" y1="76.2236" x2="393.223" y2="76.2236" gradientUnits="userSpaceOnUse">
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
                    <svg width="108%" height="100%" viewBox="0 0 93 67" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="bg-header-right-mb">
                        <path d="M1.69166 61.4891L32.315 -2.5H96.5V66.5H4.84876C2.2733 66.5 0.579881 63.8122 1.69166 61.4891Z" fill="url(#paint0_linear_1496_16253)" stroke="url(#paint1_linear_1496_16253)"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1496_16253" x1="47.75" y1="-3" x2="47.75" y2="67" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--theme-color-1, #9ce0f8)"></stop>
                                <stop offset="1" stop-color="var(--theme-color-2, #fff)"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1496_16253" x1="0.530928" y1="35.2454" x2="76.3902" y2="35.2454" gradientUnits="userSpaceOnUse">
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
                        <div class="inner-wrap-item-header-right">
                            <a href="{{ route('member.logout',['lang'=>App::currentLocale()]) }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="box-hamburger">
                                <img loading="lazy" src="{{asset('/storage/images/wallet/logout.png')}}" alt="" /><span class="text-d pr-10">{{__('member/menu.logout')}}</span>
                            </a>
                            <form id="logout-form" action="{{ route('member.logout',['lang'=>App::currentLocale()]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </header>
 


    <main >
        <!-- เนื้อหา -->
        {{ $slot }}
    </main>
    <!-- Page Content -->



    <x-footer/>
    <x-MobileMenu/>

    @livewire('livewire-ui-modal')
    @livewireScripts

</body>

</html>
