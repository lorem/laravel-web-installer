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

            @include('installer::shared.errors')

            <ul class="nav nav-pills mb-3" id="tab-list" role="tablist">
                @foreach($envFields as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link text-capitalize {{ $loop->first ? 'active' : '' }}" data-toggle="tab"
                           role="tab"
                           href="#tab-{{ str_slug($key) }}">{{ $key }}</a>
                    </li>
                @endforeach
            </ul>

            <form method="post" action="{{ route('installer.environment.store') }}">
                <div class="tab-content" id="tab-content">

                    @foreach($envFields as $key => $value)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ str_slug($key) }}"
                             role="tabpanel">

                            <h6 class="text-capitalize">{{ $key }}</h6>

                            <hr>

                            @foreach($value as $field => $value)

                                <div class="form-group">
                                    @if(array_key_exists('options', $value))
                                        <label for="{{ $field }}">{{ title_case(str_replace('_', ' ', $field)) }}</label>
                                        <select class="form-control" id="{{ $field }}" name="{{ strtolower($field) }}">
                                            @foreach($value['options'] as $option)
                                                <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label for="{{ $field }}">{{ title_case(str_replace('_', ' ', $field)) }}</label>
                                        <input type="text" class="form-control" name="{{ strtolower($field) }}"
                                               id="{{ $field }}"
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

                <div class="kit-footer">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Next step</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection