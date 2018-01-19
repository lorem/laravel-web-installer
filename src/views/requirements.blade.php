@extends('installer::layouts.master')

@section('step', 2)

@section('content')
    <div class="kit">
        <div class="kit-heading">
            <h4>Requirements</h4>
        </div>

        <div class="kit-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eos explicabo ipsa ipsam magnam
                quisquam?
                Asperiores consequatur dolores eum ipsa, maiores modi, optio pariatur sint sunt temporibus totam ullam,
                voluptatem.</p>

            @foreach($requirements['requirements'] as $type => $requirement)
                <ul class="list-group">
                    <li class="list-group-item {{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">

                        <strong>{{ ucfirst($type) }}</strong>

                        @if($type == 'php')
                            <strong>
                                <small>
                                    (version {{ $phpSupportInfo['minimum'] }} required)
                                </small>

                                <strong>
                                    (current {{ $phpSupportInfo['current'] }})
                                </strong>
                            </strong>
                        @endif

                        <span class="float-right"><i
                                    class="fas fa-{{ $phpSupportInfo['supported'] ? 'check-circle' : 'exclamation-triangle' }} fa-xs"
                                    aria-hidden="true"></i></span>
                    </li>

                    @foreach($requirements['requirements'][$type] as $extension => $enabled)
                        <li class="list-group-item {{ $enabled ? 'success' : 'error' }}">
                            {{ $extension }}

                            <span class="float-right"><i
                                        class="fas fa-{{ $enabled ? 'check-circle' : 'exclamation-triangle' }} fa-xs"
                                        aria-hidden="true"></i></span>
                        </li>
                    @endforeach
                </ul>
            @endforeach

            <div class="kit-footer">
                <div class="text-right">
                    @if (!isset($requirements['errors']) && $phpSupportInfo['supported'])
                        <a href="{{ route('installer.permissions') }}" class="btn btn-primary">Next step</a>
                    @else
                        <a href="#" class="btn btn-primary disabled" disabled>Next step</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection