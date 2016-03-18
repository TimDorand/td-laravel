@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->admin == 1)
        <div class="container">
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class'=>'form-group']) !!}

            <p><b>Nom </b>{!! Form::text('name', null ,['class'=>'form-control'])!!}</p>
            <p><b>Email </b>{!! Form::text('email', null ,['class'=>'form-control'])!!}</p>
            {{--<p><b>Mot de passe </b>{!! Form::text('password', null ,['class'=>'form-control'])!!}</p>--}}
            <p><b>Création le </b>{!! Form::text('created_at', null ,['class'=>'form-control'])!!}</p>
            <p><b>Mis à jour le </b>{!! Form::text('updated_at', null ,['class'=>'form-control'])!!}</p>



            {!! Form::submit('Envoyer', ['class' => 'btn btn-block']) !!}

            {!! Form::close() !!}
        </div>
    @else
        @if(Auth::check() && Auth::user()->id == $user->id)

            <div class="container">
                {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class'=>'form-group']) !!}

                <p><b>Nom </b>{!! Form::text('name', null ,['class'=>'form-control'])!!}</p>
                <p><b>Email </b>{!! Form::text('email', null ,['class'=>'form-control'])!!}</p>
                <p><b>Création le </b>{!! Form::text('created_at', null ,['class'=>'form-control'])!!}</p>
                <p><b>Mis à jour le </b>{!! Form::text('updated_at', null ,['class'=>'form-control'])!!}</p>
                <p><b>Nouveau mot de passe </b>{!! Form::password('password', null ,['class'=>'form-control'])!!}</p>



                {!! Form::submit('Envoyer', ['class' => 'btn btn-block']) !!}

                {!! Form::close() !!}
                <br/>
                <br/>
                <br/>


            </div>
            {{--<a href="{{route('user.password')}}">Change password</a>--}}

        @else
            @include('partials.posts.401')
        @endif
    @endif





@endsection