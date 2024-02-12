@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong> Library Assignment </strong>
                </div>
                <div class="card-body">
                    <h3>
                        <i class="fa-solid fa-landmark"></i> {{Auth::user()->library->name}}
                    </h3>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <strong> My borrowed history </strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th> Book </th>
                            <th> Borrowed Date </th>
                            <th> Returned Date </th>
                            <th> Total duration </th>
                            <th> Action </th>
                        </thead>
                        <tbody>
                            @forelse ($assignedToCurrentAuthenticated as $assigned)
                                <tr>
                                    <td> {{$assigned->book->name}} </td>
                                    <td> {{$assigned->created_at->format('M-d-y h:i A')}} </td>
                                    <td> {{$assigned->returned_at ? $assigned->returned_at->format('M-d-y h:i A') : '--'}} </td>
                                    <td> {{$assigned->returned_at ? $assigned->formatted_borrowed_time : '--'}} </td>
                                    <td>
                                        <form action="{{route('user.book-assignment.update',$assigned->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-success"> Mark as returned </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"> No record </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <ul>

                    </ul>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="{{route('user.book-assignment.create')}}" class="btn btn-sm btn-primary"> Request to borrow </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <strong> Books </strong>
                </div>
                <div class="card-body">
                    Displays here all books in {{Auth::user()->library->name}}
                    <hr>
                    <form action="">
                        <a href="{{route('user.home')}}" class="btn btn-primary btn-sm"> All </a>
                        <button class="btn btn-success btn-sm" name="available" value="true"> Available </button>
                        <button class="btn btn-danger btn-sm" name="available" value="false"> Unavailable </button>
                    </form>

                    <table class="table">
                        <thead>
                            <th> Book </th>
                            <th> Availability </th>
                        </thead>

                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>
                                        <i class="fa-solid fa-book"></i>
                                        <strong>

                                            {{$book->name}}

                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            @if($book->availability)
                                                <span class="text-success">Yes</span>
                                            @else
                                                <span class="text-danger">Unavailable</span>
                                            @endif
                                        </strong>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="2">
                                        There are no books at the moment. Run seeder
                                     </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
