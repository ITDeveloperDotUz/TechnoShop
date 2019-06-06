@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><h4>Булим маълумотлари</h4></div>
                <div class="col">
                    <form class="float-right" method="post" action="{{ route('categories.destroy', [$category->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                    </form>

                    <a class="btn btn-info float-right" href="{{ route('categories.edit', [$category->id]) }}"><i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Булим номланиши</td>
                    <td id="name">{{ $category->name }}</td>
                </tr>
                <tr>
                    <td>Булим параметрлари</td>
                    <td id="details">{{ $category->description }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection