@extends('layouts.corpo')

@section('title', 'Home')

@section('contents')
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid" style="margin-bottom: 50%">
            <div class="row">
                {{ config('app.name') }}
                <br><br><br>
                @include('sections.message')
            </div>
        </div>
    </section>
@endsection
