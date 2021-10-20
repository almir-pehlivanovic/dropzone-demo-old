<nav id="sidebar">
    <div class="sidebar-header">
        <img class = "img-fluid" src="{{ asset('images/LogoDesign2.png') }}" alt="Logo">
        <h3 class="d-inline">Control Panel</h3>
    </div>

    <ul class="list-unstyled components">
        <small class="welcome-text">WELCOME</small>
        <p class="pt-0">Almir Pehlivanovic</p>
        <li>
            <a href="{{ route('dropzone.index') }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </span>
                Home 
            </a>
        </li>
        <li>
            <a href="{{ route('dropzone.index') }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </span>
                Content
            </a>
        </li>
        <li>
            <a href="{{ route('dropzone.create') }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span> 
                Add Content
            </a>
        </li>
        <li>
            <a href="#dropdownMenu" data-toggle="collapse" aria-expanded="false" class ="dropdown-toggle d-flex align-items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                </span>    
                Dropdown
            </a>
            <ul class="collapse list-unstyled" id = "dropdownMenu">
                <li>
                    <a href="#"><span class="icon-circle"></span> dropdown item</a>
                </li>
                <li>
                    <a href="#"><span class="icon-circle"></span> dropdown item</a>
                </li>
                <li>
                    <a href="#"><span class="icon-circle"></span> dropdown item</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="#" class="download" >
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </span>    
                Sign out
            </a>
        </li>
    </ul>
</nav>