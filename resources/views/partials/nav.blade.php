<style>
    .darkblue{
        background-color: #0E6184;
        z-index: 8;
    }
    .blue{
        background-color: #A0D1E6;
        z-index: 7;
    }
    .yellow{
        background-color: #E55266;
        z-index: 6;
    }
    .pink{
        background-color: #F4BF73;
        z-index: 5;
    }

    .nav-block{
        width: 100vw;
        height: 25vh;
    }
    
    #nav-container{
        height: 100vh;
        display: flex;
        flex-direction: column;
        list-style-type: none;
        margin: -8px;
        padding: 0;
        position: absolute;
        z-index: 4;
        display: none;
    }
    .nav-block{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-decoration: none;
        color: white;
        font-size: 1.15em;
        font-family: Roboto, sans-serif;
    }
    .nav-block:not(:first-of-type){
        box-shadow: inset 0px 4px 10px rgba(34, 34, 34, 0.25);
    }
    .nav-block li{
        width: 150px;
        padding: 1em;
        margin: auto;
        display: flex;
        flex-direction: row;
    }
    .nav-icon{
        height: 50px;
        width: auto;
        margin-right: 20px;
    }
    .nav-block p{
        margin-top: 15px;
    }
    .hamburger-container{
        position: fixed;
        z-index: 5;
        margin: 1.75em 1.5em;
        height: 35px;
    }
    .hamburger-container div{
        height: 4px;
        width: 40px;
        background-color: white;
        box-shadow: 0px 0px 8px #e3e3e3;
        border-radius: 3px;
    }
    .hamburger-container div:nth-child(2){
        margin: 6px 0;
    }
    .close div{
        background-color: white;
        box-shadow: none;
    }
    .close div:first-of-type{
        margin-top: 1em;
        transform: rotate(45deg);
    }
    .close div:nth-child(2){
        display: none;
    }
    .close div:last-of-type{
        margin-top: -3.5px;
        transform: rotate(-45deg);
    }
    
    .nav-desktop{
        display: none;   
    }
    
    @media screen and (min-width: 768px){
        .nav-mobile{
            display: none;   
        }
        
        .nav-desktop{
            position: fixed;
            display: block;
            top:0;
            background-color: white;
            height: 4em;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        
        .logo{
            display: inline-block;
            background-image: url(/images/sniez_strawberry.png);
            background-repeat: no-repeat;
            background-size: 75px;
            text-indent: -9999px;
            height: 50px;
            width: 75px;
            margin-top: 0.7em;
            margin-left: 50px;
            align-self: center;
        }
        
        .nav-desktop ul{
            list-style: none;  
            float: right;
            margin-right: 50px;
            margin-top: 1.3em;
        }
        
        .nav-desktop li{
            float: left;   
        }
        
        .nav-desktop a{
            text-decoration: none;
            color: black;
            padding-left: 1em;
            padding-right: 1em;
            width: 20%;
        }
        
        .nav-desktop a:hover{
            color: #A0D1E6;
        }

        .nav-desktop a:active{
            color: #A0D1E6;
        }
    }
</style>

<div class="nav-mobile">
    <nav>
        <a id="hamburger" class="hamburger-container" onclick="toggleNav()">
            <div></div>
            <div></div>
            <div></div>
        </a>
        <ul id="nav-container">
            <a class="nav-block darkblue" href="">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/product-blue.svg" alt="lists"><p>Lijstjes</p>
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
            <a class="nav-block yellow" href="/profile">
                <li>
                    <img class="nav-icon" src="/images/icons/menu/profile.svg" alt="lists"><p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>
</div>

<div class="nav-desktop">
    <nav>
        <a class="logo" href="/profile">Logo</a>
        <ul>
            <li><a href="#">Producten</a></li>
            <li><a href="/recipes">Recepten</a></li>
            <li><a href="/scan">Scan</a></li>
        </ul>
    </nav>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
    function toggleNav(){
        $("#nav-container").toggle();
        $("#hamburger").toggleClass("close");
    }
</script>