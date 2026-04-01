@php
    $style = [
        'colorIcon' => '#facc15',
        'text' => '',
    ];
@endphp
{{-- login --}}

 


<div class="">
    @if (Auth::user())
     
<div class="wrap-footer-float" id="footer-main">
    <div class="box-footer-float">
        <div class="inner-box-footer-float">
            <div class="wrap-menu-foot-float">
                <div class="item-menu-foot-float">
                    <a href="{{ route('member.pocket.home',['lang'=>App::currentLocale()]) }}">
                        <img loading="eager" src="{{ asset('storage/images/homehome.png') }}" alt="" />
                        <p>{{__('member/auth.home')}}</p>
                    </a>
                </div>
                <div class="item-menu-foot-float">
                    <a href="{{ route('member.deposit',['lang'=>App::currentLocale()]) }}">
                        <img loading="eager" src="{{ asset('storage/images/deposithome.png') }}" alt="" />
                        <p>{{__('member/home.deposit')}}</p>
                    </a>
                </div>
                <div class="item-menu-foot-float">
                    <a href="{{ url('/game?lang='.App::currentLocale(), ['product' => 'Casino']) }}">
                        <img loading="eager" src="{{ asset('storage/images/icon_home/game.png') }}" alt="" />
                        <p>{{__('member/menu.play_game')}}</p>
                    </a>
                </div>
                <div class="item-menu-foot-float">
                    <a href="{{ url('withdraw?lang='.App::currentLocale()) }}">
                        <img loading="eager" src="{{ asset('storage/images/withdrawhome.png') }}" alt="" />
                        <p>{{__('member/home.withdraw')}}</p>
                    </a>
                </div>
                <div class="item-menu-foot-float">
                    @php $line = DB::select('select token from settings where name = ?', ['line']);
                        @endphp
                        <a  href="{{$line[0]->token}}">
                        <img loading="eager" src="{{ asset('storage/images/wallet/qrline.png') }}" alt="" />
                        <p>{{__('member/home.context')}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 430 73" fill="none">
        <mask id="path-1-inside-1_4889_12797" fill="white">
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M162.4 22.4282C155.644 10.8063 144.938 0 131.495 0H-2C-4.20914 0 -6 1.79086 -6 4V74C-6 74.5523 -5.55227 75 -4.99999 75H435C435.552 75 436 74.5523 436 74V4C436 1.79086 434.209 0 432 0H294.169C280.726 0 270.019 10.8063 263.264 22.4282C253.351 39.4815 234.481 51 212.832 51C191.183 51 172.313 39.4815 162.4 22.4282Z"
            ></path>
        </mask>
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M162.4 22.4282C155.644 10.8063 144.938 0 131.495 0H-2C-4.20914 0 -6 1.79086 -6 4V74C-6 74.5523 -5.55227 75 -4.99999 75H435C435.552 75 436 74.5523 436 74V4C436 1.79086 434.209 0 432 0H294.169C280.726 0 270.019 10.8063 263.264 22.4282C253.351 39.4815 234.481 51 212.832 51C191.183 51 172.313 39.4815 162.4 22.4282Z"
            fill="url(#paint0_linear_4889_12797)"
        ></path>
        <path
            d="M263.264 22.4282L261.535 21.4232L263.264 22.4282ZM162.4 22.4282L160.671 23.4333L162.4 22.4282ZM-2 2H131.495V-2H-2V2ZM-4 4C-4 2.89543 -3.10457 2 -2 2V-2C-5.31371 -2 -8 0.686293 -8 4H-4ZM-4 74V4H-8V74H-4ZM-4.99999 73C-4.44774 73 -4 73.4477 -4 74H-8C-8 75.6569 -6.65681 77 -4.99999 77V73ZM435 73H-4.99999V77H435V73ZM434 74C434 73.4477 434.448 73 435 73V77C436.657 77 438 75.6569 438 74H434ZM434 4V74H438V4H434ZM432 2C433.105 2 434 2.89543 434 4H438C438 0.686291 435.314 -2 432 -2V2ZM294.169 2H432V-2H294.169V2ZM261.535 21.4232C251.976 37.8666 233.761 49 212.832 49V53C235.2 53 254.726 41.0963 264.993 23.4333L261.535 21.4232ZM212.832 49C191.903 49 173.687 37.8666 164.129 21.4232L160.671 23.4333C170.938 41.0963 190.463 53 212.832 53V49ZM294.169 -2C279.61 -2 268.383 9.64072 261.535 21.4232L264.993 23.4333C271.655 11.972 281.842 2 294.169 2V-2ZM131.495 2C143.821 2 154.009 11.972 160.671 23.4333L164.129 21.4232C157.28 9.64072 146.054 -2 131.495 -2V2Z"
            fill="url(#paint1_linear_4889_12797)"
            mask="url(#path-1-inside-1_4889_12797)"
        ></path>
        <defs>
            <linearGradient id="paint0_linear_4889_12797" x1="215" y1="0" x2="215" y2="75" gradientUnits="userSpaceOnUse">
                <stop stop-color="var(--theme-color-1, #fff)"></stop>
                <stop offset="1" stop-color="var(--theme-color-2, #a5e5fb)"></stop>
            </linearGradient>
            <linearGradient id="paint1_linear_4889_12797" x1="-6" y1="0" x2="432.508" y2="91.7004" gradientUnits="userSpaceOnUse">
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
</div>

    @else

    <div class="wrap-footer-float" id="footer-main">
        <div class="box-footer-float">
            <div class="inner-box-footer-float">
                <div class="wrap-menu-foot-float">
                    <div class="item-menu-foot-float">
                        <a href="{{ route('member.pocket.home',['lang'=>App::currentLocale()]) }}">
                            <img loading="eager" src="{{ asset('storage/images/homehome.png') }}" alt="" />
                            <p>{{__('member/auth.home')}}</p>
                        </a>
                    </div>
                    <div class="item-menu-foot-float">
                        <a href="{{ route('promotions',['lang'=>App::currentLocale()]) }}">
                            <img loading="eager" src="{{ asset('storage/images/wallet/promotion.my.png') }}" alt="" />
                            <p>{{__('member/menu.promotions')}}</p>
                        </a>
                    </div>
                    <div class="item-menu-foot-float">
                        <a href="{{ route('member.register',['lang'=>App::currentLocale()]) }}"  >
                            <img loading="eager" src="{{ asset('storage/images/gamehome.png') }}" alt="" />
                            <p>{{__('member/auth.login')}}</p>
                        </a> 
                    </div>
                    <div class="item-menu-foot-float">
                        <a href="{{ route('member.register',['lang'=>App::currentLocale()]) }}">
                            <img loading="eager" src="{{ asset('storage/images/wallet/affiliate1.png') }}" alt="" />
                            <p>{{__('member/menu.regis')}}</p>
                        </a>
                    </div>
                    <div class="item-menu-foot-float">
                        @php $line = DB::select('select token from settings where name = ?', ['line']);
                            @endphp
                            <a  href="{{$line[0]->token}}">
                            <img loading="eager" src="{{ asset('storage/images/wallet/qrline.png') }}" alt="" />
                            <p>{{__('member/home.context')}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 430 73" fill="none">
            <mask id="path-1-inside-1_4889_12797" fill="white">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M162.4 22.4282C155.644 10.8063 144.938 0 131.495 0H-2C-4.20914 0 -6 1.79086 -6 4V74C-6 74.5523 -5.55227 75 -4.99999 75H435C435.552 75 436 74.5523 436 74V4C436 1.79086 434.209 0 432 0H294.169C280.726 0 270.019 10.8063 263.264 22.4282C253.351 39.4815 234.481 51 212.832 51C191.183 51 172.313 39.4815 162.4 22.4282Z"
                ></path>
            </mask>
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M162.4 22.4282C155.644 10.8063 144.938 0 131.495 0H-2C-4.20914 0 -6 1.79086 -6 4V74C-6 74.5523 -5.55227 75 -4.99999 75H435C435.552 75 436 74.5523 436 74V4C436 1.79086 434.209 0 432 0H294.169C280.726 0 270.019 10.8063 263.264 22.4282C253.351 39.4815 234.481 51 212.832 51C191.183 51 172.313 39.4815 162.4 22.4282Z"
                fill="url(#paint0_linear_4889_12797)"
            ></path>
            <path
                d="M263.264 22.4282L261.535 21.4232L263.264 22.4282ZM162.4 22.4282L160.671 23.4333L162.4 22.4282ZM-2 2H131.495V-2H-2V2ZM-4 4C-4 2.89543 -3.10457 2 -2 2V-2C-5.31371 -2 -8 0.686293 -8 4H-4ZM-4 74V4H-8V74H-4ZM-4.99999 73C-4.44774 73 -4 73.4477 -4 74H-8C-8 75.6569 -6.65681 77 -4.99999 77V73ZM435 73H-4.99999V77H435V73ZM434 74C434 73.4477 434.448 73 435 73V77C436.657 77 438 75.6569 438 74H434ZM434 4V74H438V4H434ZM432 2C433.105 2 434 2.89543 434 4H438C438 0.686291 435.314 -2 432 -2V2ZM294.169 2H432V-2H294.169V2ZM261.535 21.4232C251.976 37.8666 233.761 49 212.832 49V53C235.2 53 254.726 41.0963 264.993 23.4333L261.535 21.4232ZM212.832 49C191.903 49 173.687 37.8666 164.129 21.4232L160.671 23.4333C170.938 41.0963 190.463 53 212.832 53V49ZM294.169 -2C279.61 -2 268.383 9.64072 261.535 21.4232L264.993 23.4333C271.655 11.972 281.842 2 294.169 2V-2ZM131.495 2C143.821 2 154.009 11.972 160.671 23.4333L164.129 21.4232C157.28 9.64072 146.054 -2 131.495 -2V2Z"
                fill="url(#paint1_linear_4889_12797)"
                mask="url(#path-1-inside-1_4889_12797)"
            ></path>
            <defs>
                <linearGradient id="paint0_linear_4889_12797" x1="215" y1="0" x2="215" y2="75" gradientUnits="userSpaceOnUse">
                    <stop stop-color="var(--theme-color-1, #fff)"></stop>
                    <stop offset="1" stop-color="var(--theme-color-2, #a5e5fb)"></stop>
                </linearGradient>
                <linearGradient id="paint1_linear_4889_12797" x1="-6" y1="0" x2="432.508" y2="91.7004" gradientUnits="userSpaceOnUse">
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
    </div>
 



    @endif


</div>
