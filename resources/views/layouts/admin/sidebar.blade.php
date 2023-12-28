
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
                    <h3>Profil</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
     
               <a href="{{ route('quiz')}}">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Quiz</h3>
                </a>
                @if (Auth::user()->is_admin==1)

                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
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
                    <button wire:click="logoutUser"><h3>Logout</h3></button>
                </form></a>
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