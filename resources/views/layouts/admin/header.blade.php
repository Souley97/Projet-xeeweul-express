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