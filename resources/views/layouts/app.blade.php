<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ __('panel.site_title') }}</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
        @stack('styles')
</head>

<body class="text-blueGray-700 bg-white  antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
        <div class="relative bg-pink-100 md:pt-32 pb-32 pt-12">
                <div class="px-0 md:px-0 mx-auto w-full">&nbsp;</div>
            </div>

            <div class="bg-white relative px-0 md:px-0 mx-auto w-full min-h-full -m-48">
                <div class="row" style="margin-bottom: 0rem !important;">
                    <div class="card bg-white" style="margin-bottom: 0rem !important;">
                        
                        {{-- If you use user icon and menu add margin mr-3 to search --}}
                        {{-- <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"> --}}
                    
                
                        {{-- User icon and menu --}}
                        
                        <ul class="flex-col md:flex-row list-none md:flex" >
                            <li>
                                <a class="text-blueGray-100 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                                    <div class="items-center flex">
                                        <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img alt="..." class="w-full align-middle border-none shadow-lg" src="https://cdn.prod.website-files.com/628b3c79136f616e4ba82ff6/6290013c6d0e9e7aee2b99b8_image%2014.jpg" /></span>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    
                    </div>
                    
                </div>

                @if(session('status'))
                    <x-alert message="{{ session('status') }}" variant="indigo" role="alert" />
                @endif

                @yield('content')

                <x-footer />
            </div>
            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
            <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
            @livewireScripts
                @yield('scripts')
                @stack('scripts')
                <script>
                    function closeAlert(event){
                let element = event.target;
                while(element.nodeName !== "BUTTON"){
                  element = element.parentNode;
                }
                element.parentNode.parentNode.removeChild(element.parentNode);
              }
                </script>
</body>

</html>