@extends('layout.site')

@section('content')
	<div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <a href="{{ URL::previous() }}" title="Go Back to Previous Page">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>

                Go Back
            </a>

            <hr>

        	@if(isset($phones))
            <p>
                Following tarrifs are available for <strong>{{ $phones[0]->make }} {{ $phones[0]->model }}</strong>:
            </p>
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
	        				<small>{{ $phone->tar_name }}</small>
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