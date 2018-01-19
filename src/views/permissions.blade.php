@extends('installer::layouts.master')

@section('step', 3)

@section('content')
    <div class="kit">
        <div class="kit-heading">
            <h4>Permissions</h4>
        </div>

        <div class="kit-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eos explicabo ipsa ipsam magnam
                quisquam?
                Asperiores consequatur dolores eum ipsa, maiores modi, optio pariatur sint sunt temporibus totam ullam,
                voluptatem.</p>

            <ul class="list-group">
                @foreach($permissionResults as $result)
                    @if($result['error'])
                        <li class="list-group-item text-danger">
                            {{ $result['folder'] }} ({{ $result['permission'] }} Required) <span class="float-right"><i
                                        class="fas fa-times-circle fa-xs" aria-hidden="true"></i></span>
                            <i class="fa fa-fw fa-times-circle-o row-icon" aria-hidden="true"></i>
                        </li>
                    @else
                        <li class="list-group-item text-success">
                            {{ $result['folder'] }} <span class="float-right"><i class="fas fa-check-circle fa-xs"
                                                                                 aria-hidden="true"></i></span>
                            <i class="fa fa-fw fa-check-circle-o row-icon" aria-hidden="true"></i>
                        </li>
                    @endif
                @endforeach
            </ul>

            <div class="kit-footer">
                <div class="text-right">
                    @if (count($permissionResults->where('error', true)) == 0)
                        <a href="{{ route('installer.environment') }}" class="btn btn-primary">Next step</a>
                    @else
                        <a href="#" class="btn btn-primary disabled" disabled>Next step</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection