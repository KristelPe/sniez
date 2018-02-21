@extends('registration.master')

@section('content')

    <style>
        .allergies__container{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style-type: none;
        }

        .allergies__container li{
            width: 100px;
            padding:1em;
            margin: 1em;
            border: 1px solid lightgray;
        }

        .allergies__container li img{
            width: 100px;
        }
    </style>

    <div class="search">
        <form method="post" action="">
            <input type="text">
            <button>Zoek</button>
        </form>
    </div>

    <form method="post" action="{{URL::action('AllergyController@store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="allergies__container">
            @foreach($allergies as $allergy)
                <li>
                    <img src="{{$allergy->path}}" alt="{{$allergy->name}}">
                    <p>{{$allergy->name}}</p>
                    <input type="checkbox" value="{{$allergy->id}}" name="allergies[]">
                </li>
            @endforeach
        </ul>

        <button type="submit">Opslaan</button>
    </form>


@endsection