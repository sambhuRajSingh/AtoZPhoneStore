@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            @if(isset($phones))

            <div class="pull-right">
                @if($phones->hasMorePages())
                    <small>Displaying {{ $phones->count() * $phones->currentPage()}} of {{ $phones->total() }}</small>
                @endif
            </div>
                        
            <table class="table no-border table-striped">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Name</th>
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
                                href="{{ route('listByPhoneName', ['phoneName' => $phone->name]) }}"
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