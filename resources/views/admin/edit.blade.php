@extends('layouts.app')

@section('content')
    <div class="container">
        {{--Formulaire pour éditer un projet bap--}}

    {!! Form::model($bap, ['route' => ['bap.update', $bap->id], 'method' => 'PUT', 'class'=>'form-group']) !!}


    <div class="form-group">
        <label>Nom du projet</label>
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'placeholder' => 'Nom du projet'
        ]) !!}
    </div>

    <div class="form-group">
        <label>Type du projet</label>
        {!! Form::select('type', array(
        'site_internet' => 'Site Internet',
        '3d' =>'3D',
        '2d' =>'2D',
        'multimedia' =>'Installation Mutltimédia',
        'jeu_video' =>'Jeu Vidéo',
        'dvd' =>'DVD',
        'print' =>'Print',
        'cd-rom' =>'CD-ROM',
        'evenement' =>'Evenement',
        'appel_doffre' =>'Appel d\'offre',
        'business_plan' =>'Business Plan'
        ))
!!}
    </div>

    <div class="form-group">
        <label>Descriptif du projet</label>
        {!! Form::text('descriptif', null, [
            'class' => 'form-control',
            'placeholder' => 'Descriptif'
        ]) !!}
    </div>

    <div class="form-group">
        <label>Context du projet</label>
        {!! Form::text('context', null, [
            'class' => 'form-control',
            'placeholder' => 'Context'
        ]) !!}
    </div>
        <div class="form-group">
            <label>Objectif du projet</label>
            {!! Form::text('objectif', null, [
                'class' => 'form-control',
                'placeholder' => 'Objectif'
            ]) !!}
        </div>

        <div class="form-group">
            <label>Contrainte du projet</label>
            {!! Form::text('contrainte', null, [
                'class' => 'form-control',
                'placeholder' => 'Contrainte'
            ]) !!}
        </div>


        {{--IF pour valider un projet--}}


    <div class="form-group">
        <label>Projet validé</label>
        @if($bap->validate == 0)
       {!! Form::checkbox('validate', '1') !!}
        @else($bap->validate == 1)
       {!! Form::checkbox('validate', 'smallInteger', true) !!}
        @endif

    </div>

    {!! Form::submit('Envoyer', ['class' => 'btn btn-block']) !!}

    {!! Form::close() !!}
    </div>

@endsection