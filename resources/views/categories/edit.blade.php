@extends('layouts.app')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <tbody>
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        <tr>
                            <form method="post" action="{{ route('categories.update', $category->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="title" value={{ $category->title }} />
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection