@extends('layouts.full')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Garlic</h1>
            <h2>Garlic for Easy and Simple life benefits</h2>
        </div>
    </div>
@endsection

@section('content')

     <div class="row">
        <div class="col mh-100">

            @include('partials/_events_table', ['events' => $events])

        </div>
    </div> 

@endsection
