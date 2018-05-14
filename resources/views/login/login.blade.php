

<style>

body {

    background-image: url("images/backgrounds/bg_login.jpg");
    background-size: cover;
    background-position: center;

    height: 80vh;
    max-height: 90vh;

    font-family: 'Roboto Slab', sans-serif;
    
}

.login {


    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-top: 300px;
    padding: 200px 0px;
    z-index: 20;

    width: 80%;
    margin-left: 10%;

    background-color: white;

}

#login-logo {

    background-color: #88caab;
    padding: 7.5em 4.2em;
    border-radius: 100%;
    width: 15em;

    align-self: center;
}

#login-logo img{

    width: 15em;
}

#login-btn {

    background-color: #A0D1E6;
    width: 30em;
    align-self: center;

    margin-top: 100px;
}

#login-btn:hover {

    background-color: #88caab;
    color: white;
}

#login-btn a {

    font-family: 'Lato', sans-serif;
    font-weight: 100;
    font-size: 2em;
    text-decoration: none;
    color: white;
    text-align: center;
}

#login-btn span {

    color: #61A0BB;
}

#login-text {

    display: none;
}

@media screen and (min-width: 1024px) {

    body {

        background-position: bottom;
    }

    #login-text {

        display: flex;
        width: 70%;
        margin-left: 15%;
        flex-direction: column;
        justify-content: center;
        margin-top: 50px;
    }

    #login-text img {

        width: 100px;
    }

    #login-text p {

        font-weight: 400;
        font-size: 1.2em;
        letter-spacing: 0.5px;
        line-height: 1.8em;
        font-style: italic;
        color: darkgrey;
        text-align: center;


    }

    #login-text h1 {

        font-weight: 400;
        font-size: 1.2em;
        font-style: italic;
        color: darkgrey;
        text-align: center;
        margin-top: -5px;
    }

    .login {


        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: -20px;
        padding: 50px 0px;
        z-index: 20;

        width: 40%;
        height: 90vh;
        margin-left: 60%;

        background-color: white;

    }

    #login-logo {

        background-color: #88caab;
        padding: 4em 2.2em;
        border-radius: 100%;
        width: 7em;

        align-self: center;
    }

    #login-logo img{

        width: 7em;
    }

    #login-btn {

        background-color: #A0D1E6;
        width: 20em;
        align-self: center;

        margin-top: 50px;
    }

    #login-btn:hover {

        background-color: #88caab;
        color: white;
    }

    #login-btn a {

        font-family: 'Lato', sans-serif;
        font-weight: 100;
        font-size: 1em;
        text-decoration: none;
        color: white;
        text-align: center;
    }

    #login-btn span {

        color: #61A0BB;
    }



}




</style>

    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    <div class="layover">

    </div>

    <div class="login">


        <div id="login-logo">

            <img src="/images/logo/logo_ei.png" alt="logo Sniez">

        </div>



        <div id="login-btn">
            <a href="/login/facebook"><p>Login met <span>Facebook</span></p></a>
        </div>

        <div id="login-text">

            <p>" Laat je allergiëen niet in de weg staan om heerlijk te koken. "</p>
            <h1>- <img src="images/libelle-lekker.png"></h1>

        </div>



    </div>


