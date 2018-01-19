@extends('installer::layouts.master')

@section('step', 4)

@section('content')
    <div class="kit">
        <div class="kit-heading">
            <h4>Environment</h4>
        </div>

        <div class="kit-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eos explicabo ipsa ipsam magnam
                quisquam?
                Asperiores consequatur dolores eum ipsa, maiores modi, optio pariatur sint sunt temporibus totam ullam,
                voluptatem.</p>


            <ul class="nav nav-pills mb-3" id="tab-list" role="tablist">
                @foreach($envFields as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link text-capitalize {{ $loop->first ? 'active' : '' }}" data-toggle="tab" role="tab"
                           href="#tab-{{ str_slug($key) }}">{{ $key }}</a>
                    </li>
                @endforeach
            </ul>


            <form method="post" action="{{ route('installer.environment.store') }}">
                {{ csrf_field() }}

                <div class="tab-content" id="tab-content">

                    @foreach($envFields as $key => $value)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ str_slug($key) }}"
                             role="tabpanel">

                            <h6 class="text-capitalize">{{ $key }}</h6>

                            <hr>

                            @foreach($value as $field => $value)

                                <div class="form-group">
                                    @if(array_key_exists('options', $value))
                                        <select class="form-control" id="exampleSelect1">
                                            @foreach($value['options'] as $option)
                                                <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label for="{{ $field }}">{{ title_case(str_replace('_', ' ', $field)) }}</label>
                                        <input type="text" class="form-control" name="{{ $field }}" id="{{ $field }}"
                                               placeholder="{{ $field }}" value="{{ $value['default'] ?? '' }}">
                                    @endif
                                    @if(array_key_exists('helper-text', $value))
                                        <small class="form-text text-muted">{{ $value['helper-text'] }}</small>
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    @endforeach

                </div>

            </form>


            <div class="kit-footer">
                <div class="text-right">
                    {{--@if (!isset($requirements['errors']) && $phpSupportInfo['supported'])--}}
                    <a href="{{ route('installer.finish') }}" class="btn btn-primary">Next step</a>
                    {{--@else--}}
                    {{--<a href="#" class="btn btn-primary disabled" disabled>Next step</a>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>
@endsection