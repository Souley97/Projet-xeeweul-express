<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <title>XEEWEUL-EXPRESS</title>
</head>

<body>

    <div class="containera">
        <!-- Sidebar Section -->
        <aside>
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
                 <a href="{{ route('profile.show')}}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <div class="text-menu">Profil</div>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <div class="text-menu">Users</div>
                </a>
     
               <a href="{{ route('quiz')}}">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <div class="text-menu">Quiz</div>
                </a>
                @if (Auth::user()->is_admin==1)

                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3 class="text-menu">Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3 class="text-menu">Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3 class="text-menu">Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3 class="text-menu">Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3 class="text-menu">Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3 class="text-menu">New Login</h3>
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
                    <button wire:click="logoutUser"><div class="text-menu">Logout</div></button>
                </form></a>
                {{-- <a href="{route('logout')}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <div>Logout</div>
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
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Analytics</h1>
            <!-- Analyses -->
            <div class="analyse">
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
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>Mes Parraines</h2>
                <div class="user-list">
                    <div class="user">
                        <img src="images/profile-2.jpg">
                        <h2>Jack</h2>
                        <p>54 Min Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/profile-3.jpg">
                        <h2>Amir</h2>
                        <p>3 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/profile-4.jpg">
                        <h2>Ember</h2>
                        <p>6 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/plus.png">
                        <h2>More</h2>
                        <p>New User</p>
                    </div>

                 
                    
                    {{-- <form action="{{ route('referral.generate') }}" method="post">
                    <button wire:click="generateReferralCode">Générer un nouveau code</button>
                    </form> --}}
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Show All</a>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

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
                       <a href="{{ route('profile.show')}}"> <img src="/images/bg/xe/jul.jpeg"></a>
                    </div>
                    <div class="info">
                        <p>{{ Auth::user()->name}}</p>
                        <a href="{{route('profile.show')}}" class="text-muted">Profil</a>
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
                            <h3>{{Auth::user()->payement}}</h3>
                            <small class="text_muted">
                              {{ Auth::user()->phone}}
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
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


    </div>

    <script src="/js/index.js"></script>
</body>

</html>