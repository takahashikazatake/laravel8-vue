@extends('layouts.app')
    
 @section('content')
    <post-index-component :user-name='@json(Auth::user())'></post-index-component>
 @endsection
 