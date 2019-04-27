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
                    @if(empty($products[0]))
                        <form action="{{ route('products.create') }}" method="get">
                            @csrf
                            <button class="btn btn-success" type="submit">Create</button>
                        </form>
                    @else
                            <thead>
                            <tr class="cart_menu">
                                <td>Products</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Categories</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="cart_product">
                                    <a><img src="{{ asset('images/product-details/product-mini.png') }}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4>
                                        <a href="{{route('products.show', $product->id)}}">{{$product->name}}</a>
                                    </h4>
                                </td>
                                <td class="cart_description">
                                    <h4>{{$product->price}}</h4>
                                </td>
                                <td class="cart_description">
                                    <h4>{{$product->quantity}}</h4>
                                </td>
                                <td class="cart_description">
                                    <h4>{{$product->categories()->pluck('title')->implode(', ')}}</h4>
                                </td>
                                <td class="cart_description">
                                    <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    <form action="{{ route('products.create') }}" method="get">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Create</button>
                                    </form>
                                    <form action="{{ route('products.edit', $product->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-secondary" type="submit">Edit</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection