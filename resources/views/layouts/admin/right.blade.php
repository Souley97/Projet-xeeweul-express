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