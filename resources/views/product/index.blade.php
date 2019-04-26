@extends('layouts.app')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Categories</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Categories(y)</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('product.show', $product->id)}}"><img src="{{ asset('images/category/category.jpeg') }}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4>{{$product->name}}</h4>
                            </td>
                            <td class="cart_description">
                                <h4>{{$product->price}}</h4>
                            </td>
                            {{--@foreach($product->categories() as $category)--}}
                                <td class="cart_description">
                                    <h4>{{$product->categories()->pluck('title')->implode(', ')}}</h4>
                                </td>
                            {{--@endforeach--}}
                            <td class="cart_delete">
                                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                <form action="{{ route('product.create') }}" method="get">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Create</button>
                                </form>
                                <form action="{{ route('product.edit', $product->id) }}" method="get">
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection