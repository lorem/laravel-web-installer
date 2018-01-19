@extends('installer::layouts.master')

@section('step', 1)

@section('content')
    <div class="kit">
        <div class="kit-heading">
            <h4>Draft Installer</h4>
        </div>

        <div class="kit-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eos explicabo ipsa ipsam magnam
                quisquam?
                Asperiores consequatur dolores eum ipsa, maiores modi, optio pariatur sint sunt temporibus totam ullam,
                voluptatem.</p>

            <div class="kit-footer">
                <div class="text-right">
                    <a href="{{ route('installer.requirements') }}" class="btn btn-primary">Next step</a>
                </div>
            </div>
        </div>
    </div>
@endsection