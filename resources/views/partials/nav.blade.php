<style>
    .darkblue{
        background-color: #1d6184;
        z-index: 8;
    }
    .blue{
        background-color: #a3cfe5;
        z-index: 7;
    }
    .yellow{
        background-color: #f0bf73;
        z-index: 6;
    }
    .pink{
        background-color: #dd5366;
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
        height: 3px;
        width: 40px;
        background-color: #dd5366;
        border-radius: 3px;
    }
    .hamburger-container div:nth-child(2){
        margin: 10px 0;
    }
    .close div{
        background-color: #f0bf73;
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
</style>
<nav>
    <a id="hamburger" class="hamburger-container" onclick="toggleNav()">
        <div></div>
        <div></div>
        <div></div>
    </a>
    <ul id="nav-container">
        <a class="nav-block darkblue" href="">
            <li>
                <img class="nav-icon" src="/images/icons/menu/product.png" alt="lists"><p>Lijstjes</p>
            </li>
        </a>
        <a class="nav-block blue" href="/recipe">
            <li>
                <img class="nav-icon" src="/images/icons/menu/recept.png" alt="lists"><p>Recepten</p>
            </li>
        </a>
        <a class="nav-block yellow" href="/scan">
            <li>
                <img class="nav-icon" src="/images/icons/menu/scan.png" alt="lists"><p>Scan</p>
            </li>
        </a>
        <a class="nav-block pink" href="/profile">
            <li>
                <img class="nav-icon" src="/images/icons/menu/profile.png" alt="lists"><p>Profile</p>
            </li>
        </a>
    </ul>
</nav>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
    function toggleNav(){
        $("#nav-container").toggle();
        $("#hamburger").toggleClass("close");
    }
</script>