<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'game') }}</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/admin/custom.css'])

    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased h-full" x-data="{ slideOverOpen: $persist(false) }" x-cloak @keyup.slash="slideOverOpen=!slideOverOpen">


    <nav
        class="fixed top-0 z-50 w-full border-b border-gray-200 {{ match (env('BGCOLOR', 'midnight')) {
            'metal' => 'bg-metal',
            'tahiti' => 'bg-tahiti',
            'c-yenllow1' => 'bg-c-yenllow1',
            'c-yenllow2' => 'bg-c-yenllow2',
            'c-yenllow3' => 'bg-c-yenllow3',
            'c-green1' => 'bg-c-green1',
            'c-green2' => 'bg-c-green2',
            'c-green3' => 'bg-c-green3',
            'c-blue1' => 'bg-c-blue1',
            'c-blue2' => 'bg-c-blue2',
            'c-blue3' => 'bg-c-blue3',
            'c-pink1' => 'bg-c-pink1',
            'c-pink2' => 'bg-c-pink2',
            'c-pink3' => 'bg-c-pink3',
            'c-gray1' => 'bg-c-gray1',
            'c-gray2' => 'bg-c-gray2',
            'c-gray3' => 'bg-c-gray3',
            default => 'bg-midnight',
        } }}">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <a href="#" class="flex ml-1 sm:ml-10">
                        <img class="mx-auto h-10 w-auto" src="{{ asset('/storage/images/logo.png') }}" alt="">
                    </a>

                    <div class="flex ml-1 sm:ml-10 ">
                        <button @click="slideOverOpen=!slideOverOpen"
                            class="inline-flex items-center justify-center h-9 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <span class="mx-3 xl:block lg:hidden md:hidden sm:hidden xs:hidden">เมนู</span>
                            <span type="button"
                                class="xl:block lg:hidden md:hidden sm:hidden xs:hidden rounded bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600 shadow-sm">
                                หรือกดปุ่ม /
                            </span>
                        </button>
                    </div>

                    <div class="flex justify-start ml-8">
                        <button id="audio_pendinglist_button" type="button" onclick="toggle_audio_pendingList()"
                            class="bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-volume-high"></i> ยอดห้อย
                        </button>

                        <button id="audio_withdraw_button" type="button" onclick="toggle_audio_withdraw()"
                            class="bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600 ml-2">
                            <i class="fa-solid fa-volume-high"></i> ถอน
                        </button>
                    </div>

                </div>

                <div class="flex items-center">
                    <livewire:admin.socket.user-online />

                    <div class="flex justify-start ml-8">
                        <livewire:admin.wallet.wallet />
                    </div>
                    <div class="flex items-center ml-3">
                        <div>
                            @php
                                $uuid = \Illuminate\Support\Str::uuid();
                            @endphp

                            @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['emergency_lock']))
                                <livewire:admin.emergency-lock.show :wire:key="'emergencyLock-'.$uuid" />
                            @endif
                        </div>
                        <div>
                            <div class="relative inline-block text-left" x-data="{
                                dropdownOpen: false
                            }">
                                <div @click="dropdownOpen=true" class="cursor-pointer ">
                                    {{-- <i class="fa-regular fa-user"></i> {{ auth()->guard('admins')->user()->username
                                }} --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-down inline" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                                    class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('admin.profile') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300/60 rounded-lg  "
                                            role="menuitem" tabindex="-1" id="menu-item-0">โปรไฟล์</a>

                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300/60 rounded-lg "
                                            role="menuitem" tabindex="-1" id="menu-item-1">ออกจากระบบ</a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <div :class="slideOverOpen ? 'xl:pr-2' :
        'px-10 xl:ml-0 md:ml-0 xs:ml-64 xl:overflow-visible lg:overflow-visible md:overflow-visible xs:overflow-hidden'"
        x-cloak>
        <div @keydown.window.escape="slideOverOpen=false" x-cloak class="relative" x-cloak>

            <div class="fixed inset-y-0 left-0 flex max-w-full pr-10">
                <div x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="-translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="-translate-x-0" x-transition:leave-end="-translate-x-full"
                    :class="slideOverOpen ? 'max-w-24 sm:block xs:hidden' : 'max-w-64'">
                    <aside id="default-sidebar" x-cloak
                        :class="slideOverOpen ?
                            'bg-white h-screen transform ease-in-out duration-300 translate-x-0 to:translate-x-5 w-24 xl:pt-20 lg:pt-20 lg:shadow-none md:shadow-none sm:pt-32 shadow-2xl md:pt-24 xs:pt-32 border-r border-gray-200' :
                            ' transform ease-in-out duration-300 -translate-x-0 to:-translate-x-5 fixed top-0 left-0 sm:w-64 w-80 h-full lg:pt-20 pt-28 transition-transform  bg-white border-r border-gray-200 sm:translate-x-0'"
                        aria-label="Sidebar">
                        <div class="h-full w-full px-3 pb-4 overflow-y-auto bg-white">
                            <ul class="space-y-2 font-medium">

                                {{-- โปรไฟล์มุมขวาบน --}}
                                <li class="rounded-lg sm:hidden sm:py-4">
                                    <div class="grid grid-cols-2 gap-x-3">
                                        <a href="{{ route('admin.profile') }}"
                                            class="inline-flex items-center gap-x-1.5 rounded-md bg-sky-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 col-span-1"
                                            role="menuitem" tabindex="-1" id="menu-item-0">
                                            <i class="fa-solid fa-user"></i>
                                            โปรไฟล์</a>

                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            type="button"
                                            class="inline-flex items-center gap-x-1.5 rounded-md bg-negative-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            ออกจากระบบ
                                            <form id="logout-form" action="{{ route('admin.logout') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>
                                </li>

                                {{-- หน้าแรก --}}
                                <li class="rounded-lg  {{ request()->routeIs('admin.home') ? 'bg-slate-400' : '' }}">
                                    <a href="{{ route('admin.home') }} "
                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                        <i class="fa-solid fa-home"></i>
                                        <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3">HOME</span>
                                    </a>
                                </li>

                                {{-- แดชบอร์ด --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['dashboards']))
                                    <li
                                        class="rounded-lg  {{ request()->routeIs('admin.dashboard') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.dashboard') }} "
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-gauge-high"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                class="ml-3">Dashboard</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- ยอดห้อย --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['extra_deposit']))
                                    <li
                                        class="rounded-lg text-right relative {{ request()->routeIs('admin.extradeposit') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.extradeposit') }} "
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-exchange"></i>
                                            <span class="ml-3" :class="slideOverOpen ? 'hidden' : 'block'"> รายการฝาก
                                                (บช.) </span>
                                        </a>
                                        {{-- แจ้งเตือน --}}
                                        <livewire:admin.socket.deposit-alert />

                                    </li>
                                @endif
                                {{-- สมาชิก --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['deposit_decimal']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.decimaldeposit.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''" aria-controls=""
                                                aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-piggy-bank"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">ฝากทศนิยม</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['deposit_decimal']))
                                                    <li
                                                        class="rounded-lg text-right relative {{ request()->routeIs('admin.decimaldeposit.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.decimaldeposit.show') }} "
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa-solid fa-exchange"></i>
                                                            <span class="ml-3"
                                                                :class="slideOverOpen ? 'hidden' : 'block'">
                                                                รายการฝากทศนิยม</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['deposit_decimal']))
                                                    <li
                                                        class="rounded-lg text-right relative {{ request()->routeIs('admin.decimaldeposit.transection') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.decimaldeposit.transection') }} "
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa-solid fa-exchange"></i>
                                                            <span class="ml-3"
                                                                :class="slideOverOpen ? 'hidden' : 'block'">
                                                                ข้อมูลดิบบัญชีฝากทศนิยม</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif


                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['deposit_gateway']))
                                    <li
                                        class="rounded-lg text-right relative {{ request()->routeIs('admin.depositgateway') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.depositgateway') }} "
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-exchange"></i>
                                            <span class="ml-3" :class="slideOverOpen ? 'hidden' : 'block'">
                                                ตรวจสอบรายการ QRCODE </span>
                                        </a>
                                        {{-- แจ้งเตือน --}}
                                    </li>
                                @endif

                                {{-- รายการถอน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['withdraw_info']))
                                    <li
                                        class="rounded-lg text-right  relative {{ request()->routeIs('admin.withdraw') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.withdraw') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-exchange"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3">
                                                รายการถอน </span>
                                        </a>
                                        {{-- แจ้งเตือน --}}
                                        <livewire:admin.socket.withdraw-alert />
                                    <li>
                                @endif

                                {{-- สมาชิก --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.member.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-user"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">สมาชิก</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- ค้นหาสมาชิก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_search']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.search') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.search') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ค้นหา</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_search']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.checkip') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.checkip') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตรวจ ip</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- ค้นหาสมาชิก อีกแบบ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_search']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.detail') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.detail') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตรวงสอบข้อมูลผู้เล่น</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- สมัครสมาชิก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_register']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.register') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.register') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">สมัครสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- กลุ่มสมาชิก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_group']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.group') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.group') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">กลุ่มสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- สมาชิกออนไลน์ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_online']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.online') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.online') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ลบสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- กู้คืน สมาชิก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_online']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.restore') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.restore') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">กู้สมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- สมาชิกทำรายการฝาก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_deposit']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.depositsent') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.depositsent') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> ฝากสมาชิก
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- เพิ่มแนะนำเพื่อน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_add_affiliate']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.add-affiliate') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.add-affiliate') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> เพิ่มแนะนำเพื่อน
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานการได้คะแนนต่อยูสเซอร์ --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_report_point'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.member.report-point-to-user') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.member.report-point-to-user') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-user"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap"> คะแนนสมาชิก </span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}
                                                {{-- รายงานลูกค้าที่ใช้งาน --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_active'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.member.report-active') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.member.report-active') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-user"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap"> เข้าใช้งานสมาชิก
                                                        </span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}
                                                {{-- ประวัติเดิมพัน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['member_bet_detail']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.member.bet-detail') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.member.bet-detail') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> ประวัติเดิมพัน
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- พนักงาน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['admin_info']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.admin.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-user"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">พนักงาน</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- รายชื่อพนักงาน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['admin_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.admin.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.admin.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายชื่อ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รอบทำงาน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['admin_round']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.round.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.round.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รอบทำงาน</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- ตั้งค่าสิทธิเริ่มต้น --}}
                                                @if (auth('admins')->user()->position == 'owner')
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.admin.tem-permission') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.admin.tem-permission') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-user"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าสิทธิเริ่มต้น</span>
                                                        </a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>

                                    </li>
                                @endif

                                {{-- ธนาคาร --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['statement_info']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.bank.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-university"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">ธนาคาร</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- รายการเดินบัญชี --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['statement_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.statements.*') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.statements.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายการเดินบัญชี</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- จัดการธนาคาร --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['bankweb_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">จัดการธนาคาร</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- ตั้งค่าการมองเห็น --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['bankweb_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.setting') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.setting') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าการมองเห็น</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- ธนาคารต่อครั้ง --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['bankweb_setting_transaction'])) --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['withdraw_setauto']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.bankweb-transaction') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.bankweb-transaction') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าจำนวนครั้ง</span>
                                                        </a>
                                                    </li>
                                                @endif --}}

                                                {{-- ตั้งค่าการถอนอัตโนมัติ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['withdraw_setauto']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.auto') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.auto') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าถอนอัตโนมัติ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['bankweb_transection']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.transection.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.transection.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ข้อมูลดิบ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- TrueWallet --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['check_truemoney_balance']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.bank.truewallet.*') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.bank.truewallet.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">True
                                                                Wallet</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- TrueWallet --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['add_line_truemoney_account']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.banks.line-truewallet') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.banks.line-truewallet') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-university"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ติดตั้งไลน์</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- บังคับถอน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['withdraw_force']))
                                    <li
                                        class="rounded-lg  {{ request()->routeIs('admin.forcewithdraw') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.forcewithdraw') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-exchange"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3">
                                                บังคับถอน </span>
                                        </a>
                                    <li>
                                @endif

                                {{-- ธนาคารลูกค้าที่ไม่ผ่าน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['user_bank']))
                                    <li
                                        class="rounded-lg text-right  relative {{ request()->routeIs('admin.user-bank') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.user-bank') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-university"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3">
                                                ธนาคารลูกค้า </span>
                                        </a>
                                        {{-- แจ้งเตือน --}}
                                        <livewire:admin.socket.user-bank-alert />
                                    </li>
                                @endif

                                {{-- บัญชีดำ --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['blacklist']))
                                    <li
                                        class="rounded-lg text-right  relative {{ request()->routeIs('admin.blacklists') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.blacklists') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-university"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3"> บัญชีดำ
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['blacklist']))
                                    <li
                                        class="rounded-lg text-right  relative {{ request()->routeIs('admin.ip-blacklist') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.ip-blacklist') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-university"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'" class="ml-3"> รายชื่อแบนIP
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                {{-- จัดการโปรโมชั่น --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['promotion_info']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.promotion.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-ทก' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-file"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">โปรโมชั่น</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- จัดการโปรโมชั่น --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['promotion_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.promotion.show') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.promotion.show') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">จัดการโปรโมชั่น</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รับโปรโมชั่น manual --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['promotion_manual_info']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.promotion.manual') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.promotion.manual') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รับโปรโมชั่น</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานโปรโมชัน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_promotion']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.promotion.showreport') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.promotion.showreport') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานโปรโมชัน</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- รายงาน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', [
                                        'report_deposit',
                                        'report_depositwithdraw',
                                        'report_winlose',
                                        'report_exchange',
                                        'report_point',
                                        'report_affiliate',
                                        'report_refund',
                                        'report_winlose',
                                        'report_payment',
                                        'report_depositwithdrawStm',
                                        'report_depositwithdrawFirst',
                                    ]))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.report.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-file"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">รายงาน</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- รายงานฝาก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_deposit']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showList') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showList') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝาก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานตามบุคคล --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_depositwithdraw']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.depositWithdraw') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.depositWithdraw') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ฝากถอนตามสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานตามบุคคล --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_depositwithdraw']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.depositWithdrawallByuser') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.depositWithdrawallByuser') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รวมตามสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานตามบุคคล --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_depositwithdrawStm']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.DepositWithdraw') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.DepositWithdraw') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝาก-ถอน</span>
                                                        </a>
                                                    </li>
                                                @endif


                                                {{-- รายงานฝากแรก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_depositwithdrawFirst']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.firstDeposit') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.firstDeposit') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝากยอดแรก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานเทิร์นโอเวอร์จาก REF-dp --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_winlose']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showturnover') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showturnover') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานเทิร์นโอเวอร์</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานแลกเครดิต --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_exchange']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showExchange') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showExchange') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแลกเครดิต</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานพ้อยต์ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_point']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showPoint') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showPoint') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานพอยท์</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานแนะนำเพื่อน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_affiliate']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.affuser') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.affuser') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแนะนำเพื่อน</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_affiliate']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.notreceivedaffuser') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.notreceivedaffuser') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานยอดแนะนำเพื่อนไม่ล่าสุด</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานคืนยอดเสีย --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_refund']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showRefun') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showRefun') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานคืนยอดเสีย</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานคืนยอดเสีย --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_refund']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.showNotReceivedRefun') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.showNotReceivedRefun') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานไม่รับคืนยอดเสีย</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานแพ้/ชนะ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_winlose']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.report-win-lose-by-member') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.report-win-lose-by-member') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแพ้/ชนะ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานยอดชำระ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_payment']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.payment') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.payment') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานยอดชำระ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานประวัติเครดิต --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_deposit']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report.historylogscredit') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report.historylogscredit') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานประวัติเครดิต</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานกลุ่มลูกค้า --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report.groupuser') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report.groupuser') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">รายงานกลุ่มลูกค้า</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- รายงานประจำวัน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', [
                                        'report_daily',
                                        'report_daily_first_deposit',
                                        'report_daily_exchange',
                                        'report_daily_turnover',
                                        'report_daily_depositwithdraw',
                                        'report_daily_deposit_hand',
                                        'report_daily_credit_hand',
                                        'report_daily_affiliate',
                                        'report_daily_spin',
                                    ]))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.report-daily.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-file"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">รายงานประจำวัน</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                {{-- รายงานฝากยอดแรก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_first_deposit']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.firstDeposit') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.firstDeposit') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝากยอดแรก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานแลกรางวัล --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_exchange']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.exchange') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.exchange') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแลกรางวัล</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานเทิร์นโอเวอร์ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_turnover']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.turnover') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.turnover') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานเทิร์นโอเวอร์</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานฝากถอน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_depositwithdraw']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.deposit-withdraw') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.deposit-withdraw') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝาก-ถอน</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานฝากแทน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_deposit_hand']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.reportdeposithand') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.reportdeposithand') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝากแทน</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานเครดิตปรับมือ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_credit_hand']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.detailreportcredithand') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.detailreportcredithand') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานเครดิตปรับมือ</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานแนะนำเพื่อน --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_affiliate']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.aff') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.aff') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแนะนำเพื่อน</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานวงล้อ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_spin']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.spin') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.spin') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานวงล้อ</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานวงล้อ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_daily_refun']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-daily.refun') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-daily.refun') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">คืนยอดเสีย</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- รายงานเซลล์ --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_member']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.report-sale.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-file"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">รายงานเซลล์</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">
                                                {{-- รายงานรวม --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_all']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.sales-manager') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.sales-manager') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">เซลส์</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานสมาชิก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_member_detail']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.showMember') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.showMember') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานสมาชิก</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- รายงานแพ้ชนะ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_member_winlose']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.winlose') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.winlose') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานแพ้ชนะ</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานฝากยอดแรก --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_frist_dps']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.first-deposit') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.first-deposit') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานฝากยอดแรก</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานฝากถอนลูกค้าทั้งหหมด --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_depositwithdraw']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.report-deposit-withdraw') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.report-deposit-withdraw') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ฝากถอนลูกค้า</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- รายงานสมาชิกภายใต้เซลส์ --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_member_in_sales']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.memberinsale') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.memberinsale') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">สมาชิกภายใต้เซลส์</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_sale_member_credit']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-sale.credit') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-sale.credit') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">รายงานเครคดิต</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- รายงานการตลาด --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_marketing']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.report-marketing.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-file"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">รายงานการตลาด</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">
                                                {{-- ยอดรวม --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report-marketing.total') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report-marketing.total') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">สรุปกำไรเอเย่น</span>
                                                    </a>
                                                </li>
                                                {{-- ฝากต่อชั่วโมง --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report-marketing.tohour') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report-marketing.tohour') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ฝากต่อชั่วโมง</span>
                                                    </a>
                                                </li>
                                                {{-- ฝากต่อจำนวนเงิน --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report-marketing.tomoney') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report-marketing.tomoney') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ฝากต่อยอดเงิน</span>
                                                    </a>
                                                </li>
                                                {{-- ลูกค้าฝากสูงสุด --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report-marketing.topusers') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report-marketing.topusers') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">สมาชิกฝากสูงสุด</span>
                                                    </a>
                                                </li>

                                                {{-- สมาชิกยอดสูงสุด --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_marketing']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-marketing.winlose-top-users') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-marketing.winlose-top-users') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">ลูกค้าแพ้ชนะสูงสุด</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                {{-- ค้นหารายการฝากลูกค้า --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.report-marketing.finddeposit') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.report-marketing.finddeposit') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-file"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ฝากสมาชิก</span>
                                                    </a>
                                                </li>

                                                {{-- การจัดอับดับ ranking --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['report_marketing']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.report-marketing.ranking') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.report-marketing.ranking') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-file"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">Ranking</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- ลิงก์แนะนำเพื่อน --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['linkaff']))
                                    <li
                                        class="rounded-lg  {{ request()->routeIs('admin.affiliate') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.affiliate') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-link"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                class="flex-1 ml-3 whitespace-nowrap">ลิงก์แนะนำเพื่อน</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- ตั้งค่า --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting']))
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.setting-web.*') || request()->routeIs('admin.linenotify.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-cogs"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">ตั้งค่า</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="ulSetting">

                                                {{-- ตั้งค่าระบบ --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_web'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.settingweb') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.settingweb') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-cog"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าระบบ</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าการเช็คอิน --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setiing_checkin'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.checkin') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.checkin') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-calendar"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าการเช็คอิน</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าการสปิน --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setiing_spin'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.spin') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.spin') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-bullseye"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าการสปิน</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าแลกเครดิต --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_exchange'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.exchange') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.exchange') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-exchange"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าแลกเครดิต</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าแลกเครดิตสูตร --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_exchange'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.credit-sood') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.credit-sood') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-exchange"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าแลกเครดิตสูตร</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าคืนยอดเสีย --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_refund'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.refund') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.refund') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-exchange"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าคืนยอดเสีย</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- ตั้งค่าแนะนำเพื่อน --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_affiliate'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.affiliate') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.affiliate') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-users"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าแนะนำเพื่อน</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- linenotify --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['noti_line_info'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.linenotify.show') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.linenotify.show') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-brands fa-line"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Line Notify</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- telenotify --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['noti_line_info'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.telenotify.show') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.telenotify.show') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-brands fa-telegram"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">TELEGRAM
                                                            Notify</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- onlywenotify --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['noti_line_info'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.onlywenotify.show') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.onlywenotify.show') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">

                                                        <svg width="18" height="18" viewBox="0 0 200 200"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none">
                                                            <rect width="200" height="200" rx="20"
                                                                fill="#000" />
                                                            <text x="50%" y="50%" dominant-baseline="middle"
                                                                text-anchor="middle" font-family="Arial, sans-serif"
                                                                font-size="50" font-weight="bold" fill="#FFF">
                                                                OnlyWe
                                                            </text>
                                                        </svg>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ONLYWE Notify</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- บทความ --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_blog'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.blog') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.blog') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa fa-commenting"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าบทความ</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                {{-- login --}}
                                                {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_ratelimitlogin'])) --}}
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.ratelimitlogin') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.ratelimitlogin') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-lock"></i>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าการล็อคอิน</span>
                                                    </a>
                                                </li>
                                                {{-- @endif --}}

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.decimaldeposit') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.decimaldeposit') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-piggy-bank"></i>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าฝากทศนิยม</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.limitdeposit') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.limitdeposit') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-piggy-bank"></i>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าฝากขั้นต่ำ</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.getwinloseapi') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.getwinloseapi') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-piggy-bank"></i>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">ตั้งค่าแพ้ชนะ</span>
                                                    </a>
                                                </li>
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_ranking']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.setting-web.ranking') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.setting-web.ranking') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-star fa-code-pull-request"></i>

                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">Ranking</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.setting-web.token-api') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.setting-web.token-api') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-piggy-bank"></i>

                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Token-API</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- ตั้งค่าเกม --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_games']))
                                    {{-- ตั้งค่าเกม --}}
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.games.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa fa-cogs"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">ตั้งค่าเกม</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="ulSetting">
                                                {{-- จัดกลุ่มเกม --}}
                                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_games']))
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.games.group-products') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.games.group-products') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-gamepad"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> จัดกลุ่มเกม
                                                            </span>
                                                        </a>
                                                    </li>
                                                    {{-- @endif --}}
                                                    {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_game'])) --}}
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.games.sort-venders') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.games.sort-venders') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-exchange"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap">จัดลำดับค่ายเกม</span>
                                                        </a>
                                                    </li>
                                                    {{-- @endif --}}
                                                    {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_game'])) --}}
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.games.sort-games') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.games.sort-games') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-exchange"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> จัดลำดับเกม
                                                            </span>
                                                        </a>
                                                    </li>
                                                    {{-- @endif --}}
                                                    {{-- @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['setting_game'])) --}}
                                                    <li
                                                        class="rounded-lg  {{ request()->routeIs('admin.games.venders') ? 'bg-slate-400' : '' }}">
                                                        <a href="{{ route('admin.games.venders') }}"
                                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                            <i class="fa fa-cog"></i>
                                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                                class="flex-1 ml-3 whitespace-nowrap"> ดึงข้อมูลเกม
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- ประกาศ --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['announce_info']))
                                    <li
                                        class="rounded-lg  {{ request()->routeIs('admin.announcement.show') ? 'bg-slate-400' : '' }}">
                                        <a href="{{ route('admin.announcement.show') }}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                            :class="slideOverOpen ? 'justify-center text-md' : ''">
                                            <i class="fa-solid fa-bullhorn"></i>
                                            <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                class="flex-1 ml-3 whitespace-nowrap">จัดการประกาศ</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- การกระทำ --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['log']))
                                    {{-- log --}}
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.log.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa-solid fa-folder-tree"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">Activity
                                                    Logs</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log.showLogUser') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log.showLogUser') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">User</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log.showLogEvent') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log.showLogEvent') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Event</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log.showLogAdmin') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log.showLogAdmin') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Admin</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log.showLogAdminToAdmin') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log.showLogAdminToAdmin') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">AdminToAdmin</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log.showLogAdminToUser') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log.showLogAdminToUser') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">AdminToUser</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                @endif

                                {{-- การกระทำสำรอง --}}
                                @if (Gate::forUser(auth('admins')->user())->allows('has-permission-admin', ['log_backup']))
                                    {{-- log backup --}}
                                    <li class="rounded-lg">
                                        <div x-data="{ dropdownOpen: {{ request()->routeIs('admin.log-backup.*') ? 'true' : 'false' }} }">
                                            <a @click="dropdownOpen=!dropdownOpen" type="button"
                                                class="flex items-center pt-2 pb-2 pl-2  text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                :class="slideOverOpen ? 'justify-center text-md' : ''"
                                                aria-controls="" aria-expanded="false">
                                                <div class="flex items-center"><i class="fa-solid fa-folder-tree"></i>
                                                </div>
                                                <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                    class="flex-1 ml-3 text-left  whitespace-nowrap">Activity Logs
                                                    Backup</span>
                                                <i class="fa"
                                                    :class="[dropdownOpen ? 'fa-angle-up' : 'fa-angle-down']"></i>

                                            </a>
                                            <ul x-show="dropdownOpen" class="mt-1 px-3" id="">

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogUserBackup') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogUserBackup') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">User</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogEvent') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogEvent') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Event</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogAdminBackup') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogAdminBackup') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Admin</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogAdminToAdminBackup') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogAdminToAdminBackup') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">AdminToAdmin</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogAdminToUserBackup') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogAdminToUserBackup') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">AdminToUser</span>
                                                    </a>
                                                </li>

                                                <li
                                                    class="rounded-lg  {{ request()->routeIs('admin.log-backup.showLogStatement') ? 'bg-slate-400' : '' }}">
                                                    <a href="{{ route('admin.log-backup.showLogStatement') }}"
                                                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                                                        :class="slideOverOpen ? 'justify-center text-md' : ''">
                                                        <i class="fa-solid fa-folder-open"></i>
                                                        <span :class="slideOverOpen ? 'hidden' : 'block'"
                                                            class="flex-1 ml-3 whitespace-nowrap">Statement</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                @endif

                            </ul>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="rounded-lg xl:mt-16 md:mt-16 xs:mt-10"
            :class="slideOverOpen ? 'pt-4 xl:ml-28 lg:ml-24 md:ml-24 sm:ml-36 xs:ml-0 ease-in-out duration-300' :
                'pt-4 ml-64 ease-in-out duration-300 xs:duration-0'">
            @if (isset($header))
                <header class="">
                    <div class="max-w-full mx-auto pt-6 pb-3 px-3 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main class="h-screen" :class="slideOverOpen ? 'bg-gray-100 xl:px-6 xs:px-4' : ''">
                <div class="pb-6">
                    @include('sweetalert::alert')
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts


    <script>
        document.addEventListener('livewire:load', function() {

            Livewire.on('emergencyFail', function() {
                Swal.fire('ผิดพลาด', 'ไม่สามารถทำรายการ Emergency Lock, กรุณาลองใหม่อีกครั้ง', 'error')
            });
            Livewire.on('emergencyDeleteToken', function() {
                Swal.fire('สำเร็จ', 'ดำเนินการปิดระบบเรียบร้อย', 'success')
            });
        });

        function getLocalStorage(name) {
            return localStorage.getItem(name);
        }

        const set_localStorage_state_pendinglist_audio = async (value) => {
            window.localStorage.setItem('state_pendinglist_audio', value);
        }

        const set_localStorage_state_withdraw_audio = async (value) => {
            window.localStorage.setItem('state_withdraw_audio', value);
        }

        const toggle_audio_pendingList = async () => {
            let getState_audio = getLocalStorage('state_pendinglist_audio');
            if (getState_audio == null) {
                set_localStorage_state_pendinglist_audio('false');
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            }
            if (getState_audio == 'true') {
                set_localStorage_state_pendinglist_audio('false');
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            } else if (getState_audio == 'false') {
                set_localStorage_state_pendinglist_audio("true");
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            }
        }

        const toggle_audio_withdraw = async () => {
            let getState_audio = getLocalStorage('state_withdraw_audio');
            if (getState_audio == null) {
                set_localStorage_state_withdraw_audio('false');
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ถอน</span>';
            }
            if (getState_audio == 'true') {
                set_localStorage_state_withdraw_audio('false');
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ถอน</span>';
            } else if (getState_audio == 'false') {
                set_localStorage_state_withdraw_audio("true");
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ถอน</span>';
            }
        }

        const init_audio = async () => {
            let getStatePendingListAudio = getLocalStorage('state_pendinglist_audio');
            let getStateWithdrawAudio = getLocalStorage('state_withdraw_audio');

            if (getStatePendingListAudio == null) {
                set_localStorage_state_pendinglist_audio('false');
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            }
            if (getStatePendingListAudio == 'true') {
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            } else if (getStatePendingListAudio == 'false') {
                document.getElementById('audio_pendinglist_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600'
                );
                document.getElementById('audio_pendinglist_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ยอดห้อย</span>';
            }

            //ถอน
            if (getStateWithdrawAudio == null) {
                set_localStorage_state_withdraw_audio('false');
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ถอน</span>';
            }
            if (getStateWithdrawAudio == 'true') {
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-green-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-green-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-xmark"></i> <span class="hidden sm:inline-block">ถอน</span>';
            } else if (getStateWithdrawAudio == 'false') {
                document.getElementById('audio_withdraw_button').setAttribute('class',
                    'bg-red-500 h-9 px-7 text-sm text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-red-600 ml-2'
                );
                document.getElementById('audio_withdraw_button').innerHTML =
                    '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline-block">ถอน</span>';
            }

        }

        init_audio();

        var countDownDate = new Date("2024-05-03 12:20:25").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (document.getElementById("days")) {
                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("days").innerHTML = "XX";
                    document.getElementById("hours").innerHTML = "XX";
                    document.getElementById("minutes").innerHTML = "XX";
                    document.getElementById("seconds").innerHTML = "XX";
                }
            }

        }, 1000);
    </script>

</body>

</html>
