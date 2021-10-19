<nav id="sidebar">
    <div class="sidebar-header">
        <img class = "img-fluid" src="{{ asset('images/LogoDesign2.png') }}" alt="Logo">
        <h3 class="d-inline">Control Panel</h3>
    </div>

    <ul class="list-unstyled components">
        <small class="welcome-text">WELCOME</small>
        <p class="pt-0">Almir Pehlivanovic</p>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class ="dropdown-toggle d-flex align-items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </span>
                Home 
            </a>
            <ul class="collapse list-unstyled" id = "homeSubmenu">
                <li>
                    <a href="#"><span class="icon-circle"></span> home1</a>
                </li>
                <li>
                    <a href="#"><span class="icon-circle"></span> home2</a>
                </li>
                <li>
                    <a href="#"><span class="icon-circle"></span> home3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </span> 
                Services
            </a>
        </li>
        <li>
            <a href="#">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </span> 
                Contact Us
            </a>
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