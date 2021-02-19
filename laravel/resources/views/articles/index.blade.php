@extends('layouts.app')
    
 @section('content')
    <post-index-component 
    :user-name='@json(Auth::user())'
    :current-post='@json($articles)'
    >
    </post-index-component>
 @endsection
 