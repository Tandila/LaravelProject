@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a class="btn btn-primary" href="{{route('blog.admin.categories.create')}}">Add in</a>
            </nav>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>category</th>
                        <th>parent</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginator as $item)
                        @php /** @var \App\Models\BlogCategory $item */ @endphp
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                    {{ $item->title }}
                                </a>
                            </td>
                            <td @if(in_array($item->parrent_id, [0, 1])) style="color: #c6c8ca" @endif>
                                {{ $item->parent_id }}{{-- $item->parentCategory->title --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
        <br>
    <div class="row justify-content-center">
        <div class="coll-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $paginator->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
    @endsection