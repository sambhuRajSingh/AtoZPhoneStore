@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            @if(isset($phones))

            <p class="lead">
                Inventory By Phone Make and Model:
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
                        <th>
                            {{ sort_phones_by('make', 'Make') }}
                        </th>
                        <th>
                            {{ sort_phones_by('model', 'Model') }}
                        </th>
                        <th>{{ sort_phones_by('name', 'Name') }}</th>
                        <th>Found</th>                                          
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
                            <a 
                                href="{{ route('phoneTarrif', ['phoneName' => $phone->name]) }}"
                                title="View all the tarrifs for this phone make and model" 
                            >
                                {{ $phone->name }}
                            </a>
                            
                        </td>
                        <td>
                            {{ $phone->total }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $phones->appends([
                    'make' => $make,
                    'model' => $model,
                    'name' => $name
                ])->render() !!}
            </div>
            @else
                <div class="alert alert-danger">
                    <strong>No phone</strong> are available to be searched!
                </div>
            @endif
        </div>
    </div>    
@endsection