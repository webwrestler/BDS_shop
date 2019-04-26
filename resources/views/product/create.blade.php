@extends('layouts.app')
@section('content')
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Create new category</h3>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="total_area">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <ul>
                            <form method="post" action="{{ route('product.store') }}">
                                <div class="form-group">
                                    @csrf
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name"/>
                                    <label for="price">Price:</label>
                                    <input type="text" class="form-control" name="price"/>
                                    <label for="categories">Categories:</label><br>
                                    @foreach($categories as $category)
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"/>
                                        <label for="name">{{ $category->title }}</label>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection