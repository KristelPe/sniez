

<style>

        body {

            background-image: url("images/backgrounds/bg_login.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: repeat;

            height: 80vh;
            max-height: 90vh;

            font-family: 'Roboto Slab', sans-serif;

        }

        .login {


            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 100px;
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

        #login-form {

            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        #login-form form {

            display: flex;
            flex-direction: column;
        }

        #login-form form h3 {

            font-size: 1.8em;
            font-weight: 400;
            text-align: center;
            color: darkgrey;

        }

        #login-form form input {

            margin-top: 80px;
            width: 500px;
            font-size: 2em;
            font-weight: 400;
            color: #88caab;
            border: none;
            border-bottom: 1px solid #88caab;
            padding-bottom: 16px;
        }

        #login-form form #login-form-name input {

            width:220px;
            margin-right: 50px;
        }
        #login-form form input::-webkit-input-placeholder {

            opacity: 0.5;
        }

        #login-form button {

            width: 250px;
            align-self: center;
            font-size: 2em;
            color: #88caab;
            background-color: white;
            border-color: #88caab;
            padding: 16px 0;
            margin-top: 80px;

        }

        #login-form button:hover {

            color: white;
            background-color: #88caab;

        }

        #login-form a {

            font-size: 2em;
            margin-top: 40px;
        }

        #login-text {

            display: none;
        }

        @media screen and (min-width: 1100px) {

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

            #login-form {

                margin-top: 24px;
            }


            #login-form form h3 {

                font-size: 1em;

            }

            #login-form form input {

                margin-top: 24px;
                margin-bottom: 24px;
                width: 320px;
                font-size: 1em;
            }

            #login-form form #login-form-name input {

                width:150px;
                margin-right: 24px;
            }

            #login-form button {

                width: 19em;
                font-size: 1em;
                margin-top: 16px;
            }

            #login-form a {

                font-size: 1em;
                margin-top: 20px;
            }



        }




    </style>

    @if(Session::has('message'))
        <p class="{{ Session::get('class') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="layover">

    </div>

    <div class="login">


        <div id="login-logo">

            <img src="/images/logo/logo_ei.png" alt="logo Sniez">

        </div>

        <div id="login-form">

            <form action="" method="POST">

                {{ csrf_field() }}
                <div id="login-form-name">
                    <input name="firstname" placeholder="Voornaam" type="text">
                    <input name="lastname" type="text" placeholder="Naam">
                </div>

                <input name="email" placeholder="Je e-mailadres" type="text">
                <input name="password" type="text" placeholder="Je wachtwoord">
                <button type="submit">Go</button>
                <a style="text-align: center; color: #88caab;" href="/registrate">Ik heb al een account</a>
            </form>

        </div>

        <!--<div id="login-text">

            <p>" Laat je allergiëen niet in de weg staan om heerlijk te koken. "</p>
            <h1>- <img src="images/libelle-lekker.png"></h1>

        </div>-->



    </div>

