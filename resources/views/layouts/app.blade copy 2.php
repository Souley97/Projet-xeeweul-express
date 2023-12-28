<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <title>XEEWEUL-EXPRESS</title>
    {{-- <link rel="stylesheet" rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewireStyles

</head>

<body>

    <div class="containera">

        <!-- Sidebar Section -->
        <aside class="">
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>Xeeweul<span class="danger">Exp</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile.show') }}">
                            <span class="material-icons-sharp">
                                dashboard
                            </span>
                            <h3 class="text-menu">Profil</h3>
                        </a>
                        @if (Auth::user()->is_admin==1)
                            <a href="{{ Route('users.index')}}">
                            <span class="material-icons-sharp">
                                person_outline
                            </span>
                            <h3 class="text-menu">Users</h3>
                        </a>
                        @else
                        <a href="{{ route('users.show', Auth::user()->id)}}">
                            <span class="material-icons-sharp">
                                person_outline
                            </span>
                            <h3 class="text-menu">Users</h3>
                        </a>
                        @endif
                        

                        <a href="{{ route('surveys.index') }}">
                            <span class="material-icons-sharp">
                                receipt_long
                            </span>
                            <div class="text-menu">Quiz</div>
                        </a>
                        @if (Auth::user()->is_admin == 1)
                            <a href="{{ Route('dashboard')}}" class="active">
                                <span class="material-icons-sharp">
                                    insights
                                </span>
                                <div class="text-menu">Dashboard</div>
                            </a>
                            <a href="{{ Route('questions.index')}}">
                                <span class="material-icons-sharp">
                                    mail_outline
                                </span>
                                <div class="text-menu">Questionns</div>
                                <span class="message-count">{{$question->count()}}</span>
                            </a>
                            <a href="{{ Route('withdrawals.index')}}">
                                <span class="material-icons-sharp">
                                    inventory
                                </span>
                                <div class="text-menu">Liste Demandes</div>
                                <span class="message-count">{{$demande->count()}}</span>
                            </a>
                            <a href="#">
                                <span class="material-icons-sharp">
                                    report_gmailerrorred
                                </span>
                                <div class="text-menu">Reports</div>
                            </a>
                            <a href="#">
                                <span class="material-icons-sharp">
                                    settings
                                </span>
                                <div class="text-menu">Settings</div>
                            </a>
                            <a href="#">
                                <span class="material-icons-sharp">
                                    add
                                </span>
                                <div class="text-menu">New Login</div>
                            </a>
                        @endif
                    @endauth

                @endif

                <a href="#">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <button wire:click="logoutUser">
                            <h3>Logout</h3>
                        </button>
                    </form>
                </a>
                {{-- <a href="{route('logout')}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
                @auth
                       
                <form action="{{ route('logout') }}" method="post">
                        @method('delete')
                    @csrf
                    <a href="#">

                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <button>Logout </button>
                  
                </a>
                
                </form>
                @endauth --}}
            </div>
        </aside>
        <main>
            <h1>Analytics</h1>
            <div class="analyse">
                @if (Auth::user()->is_admin==1)
                        
                  
                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Les utilsateurs</h3>
                                <h1>{{Auth::user()->count()}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+81%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h3>Total solde</h3>
                                <h1>25000</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+81%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endif
                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Nombre parrainer</h3>
                                <h1>{{ Auth::user()->points}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>-48%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="searches">
                        <div class="status">
                            <div class="info">
                                <h3>points</h3>
                                <h1>{{Auth::user()->points}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+21%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{ $slot }}
        </main>
        <!-- Right Section -->
        <div class="right-section">

            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="profile-photo">
                        <a href="{{ route('profile.show') }}"> <img src="/images/bg/xe/jul.jpeg"></a>
                    </div>
                    <div class="info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="{{ route('profile.show') }}" class="text-muted">Profil</a>
                    </div>

                </div>


            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    {{-- <img src="/images/bg/xe/jul.jpeg"> --}}
                    {{-- <h2>AsmrProg</h2>
            <p>Fullstack Web Developer</p> --}}
                    {{-- <div>
                <div>
                    <button wire:click="generateReferralCode">Générer un code de parrainage</button>
                    @if ($generatedCode)
                        <p>Votre code de parrainage : {{ $generatedCode }}</p>
                    @endif
                </div>
                
            
            </div>
         --}}
                    {{-- <div>
                <p>Votre code de parrainage : {{ generateReferralCode() }}</p>
            </div> --}}

                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Renumera</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            money
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>{{ Auth::user()->payment }}</h3>
                            <small class="text_muted">
                                {{ Auth::user()->phone }}
                            </small>
                        </div>
                        <a href="{{ Route('payment.edit')}}"><span class="material-icons-sharp">
                            more_vert
                        </span></a>
                    </div>
                </div>
                <a href="{{ Route('withdrawals.indexUser')}}"><div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Transaction</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>
            </a>
                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            money
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>{{ Auth::user()->payment }}</h3>
                            <small class="text_muted">
                                {{ Auth::user()->phone }}
                            </small>
                        </div>
                        <a href="{{ Route('payment.edit')}}"><span class="material-icons-sharp">
                            more_vert
                        </span></a>
                    </div>
                </div>
                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            money
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>{{ Auth::user()->payment }}</h3>
                            <small class="text_muted">
                                {{ Auth::user()->phone }}
                            </small>
                        </div>
                        <a href="{{ Route('payment.edit')}}"><span class="material-icons-sharp">
                            more_vert
                        </span></a>
                    </div>
                </div>

                

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


        <!-- Page Content -->


        @stack('modals')
    </div>

    
    </div>
    </div>

    <script src="/js/index.js"></script>
    @livewireScripts
</body>

</html>
