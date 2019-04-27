@extends('layouts.app')
@section('content')
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Update product</h3>
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
                            <form method="post" action="{{ route('products.update', $product->id) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">

                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name"  value={{ $product->name }} />

                                    <label for="price">Price:</label>
                                    <input type="text" class="form-control" name="price" value={{ $product->price }} />

                                    <label for="quantity">Quantity:</label>
                                    <input type="text" class="form-control" name="quantity" value={{ $product->quantity }} />

                                    <label for="categories">Categories:</label><br>
                                    @foreach($categories as $category)
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                             @if ($product->categories()->where('id', $category->id)->count())
                                                checked="checked"
                                             @endif
                                        />
                                        <label for="name">{{ $category->title }}</label>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
