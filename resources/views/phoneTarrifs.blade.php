@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">

            @if(URL::previous() != URL::current())
                <a href="{{ URL::previous() }}" title="Go Back to Previous Page">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Go Back
                </a>

                <hr>
            @endif


            @if(isset($phones))
                <p class="lead">

                    Following tarrifs are available for <strong>{{ $phones[0]->make }} {{ $phones[0]->model }}</strong>:
                </p>

                <div class="pull-right">
                    @if($phones->hasMorePages())
                        <small>
                            Displaying {{ $phones->count() * $phones->currentPage()}} of {{ $phones->total() }}
                        </small>

                        <br><br>
                    @endif
                </div>


                <table class="table no-border table-striped">
                    <thead>
                        <tr>
                            <th>Tarrif Name</th>
                            <th>Minutes</th>
                            <th>SMS</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($phones as $phone)
                        <tr>
                            <td>
                                {{ $phone->name }}
                                <br>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <small><em>{{ $phone->tar_name }}</em></small>
                            </td>
                            <td>
                                {{ $phone->tar_minutes }}
                            </td>
                            <td>
                                {{ $phone->tar_sms }}
                            </td>
                            <td>
                                {{ $phone->tar_data }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pull-right">
                    {{ $phones->links() }}
                </div>
            @else
                <div class="alert alert-danger">
                    <strong>No phone</strong> are available to be searched!
                </div>
            @endif
        </div>
    </div>
@endsection