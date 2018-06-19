<!-- CSS -->

<link rel="stylesheet" type="text/css" href="{{ asset('/css/partials/nav.css') }}" />

<!-- NAVIGATION -->

<div class="nav-mobile">
    <nav>
        <a id="hamburger" class="hamburger-container" onclick="toggleNav()">
            <div></div>
            <div></div>
            <div></div>
        </a>
        <ul id="nav-container">
            <a class="nav-block yellow" href="/home">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/profile.svg" alt="lists"><p>Profiel</p>
                </li>
            </a>
            <a class="nav-block darkblue" href="/products">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/product-blue.svg" alt="lists"><p>Producten</p>
                </li>
            </a>
            <a class="nav-block blue" href="/recipes">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/recept.svg" alt="lists"><p>Recepten</p>
                </li>
            </a>
            <a class="nav-block pink" href="/scan">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/scan.svg" alt="lists"><p>Scan</p>
                </li>
            </a>

            <a class="nav-block yellow" href="/logout">
                <li>
                    <img class="nav-icon" style="height: 40px;" src="/images/icons/menu/exit.svg" alt="lists"><p>Logout</p>
                </li>
            </a>

        </ul>
    </nav>
</div>

<div class="nav-desktop">
    <nav>
        <a class="logo" href="/home">Logo</a>
        <ul>
            <li><a href="/home" style="color: #88caab">Profiel</a></li>
            <li><a href="/products">Producten</a></li>
            <li><a href="/recipes">Recepten</a></li>
            <li><a href="/scan">Scan</a></li>
            <li><a href="/logout" style="color: grey; opacity: 0.5;">Logout</a></li>
        </ul>
    </nav>
</div>


<!-- JS -->

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>

    function toggleNav(){
        $("#nav-container").toggle();
        $("#hamburger").toggleClass("close");

    }
</script>