@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-striped bg-light">
                <thead>
                <tr>
                    <td>Булим номланиши</td>
                    <td>Булим маълумотлари</td>

                    <td>
                        <a class="btn btn-success float-right" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i></a>
                    </td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>{{ $category->description }}</td>

                    <td><a class="btn btn-info float-right" href="{{ route('categories.edit', [$category->id]) }}"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <form class="pull-right" method="post" action="{{ route('categories.destroy', [$category->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection