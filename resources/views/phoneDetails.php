@extends('layout.site')

@section('content')
	<div class="row">
        <div class="col-xs-12">
        	@if(isset($phones))
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
	        				{{ $phone->make }}
	        			</td>
	        			<td>
	        				{{ $phone->model }}
	        			</td>
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
	        @else
                <div class="alert alert-danger">
                    <strong>No phone</strong> are available to be searched!
                </div>
            @endif
        </div>
    </div>
@endsection