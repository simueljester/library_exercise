@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('user.book-assignment.store')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong> Book Assignment Form </strong>
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_fullname"> User Full Name </label>
                                <input type="text" class="form-control" id="user_fullname" value="{{Auth::user()->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_email"> User Email </label>
                                <input type="text" class="form-control" id="user_email" value="{{Auth::user()->email}}" disabled>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-group">
                        <label for="book_id"> Select Book </label>
                        <select name="book_id" id="book_id" class="form-control">
                            <option value="">Select a book</option>
                            @forelse ($books as $books)
                                <option value="{{$books->id}}"> {{$books->name}} </option>
                            @empty
                                <option value=""> No books, run seeder </option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <a href="{{ route('user.home') }}" class="btn btn-outline-primary btn-sm"> Return to Home </a>
                        <button class="btn btn-primary btn-sm btn-block"> Barrow Book </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


</div>
@endsection
