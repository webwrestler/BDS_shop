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
						@if(empty($categories[0]))
							<form action="{{ route('categories.create') }}" method="get">
								@csrf
								<button class="btn btn-success" type="submit">Create</button>
							</form>
						@else
							<thead>
							<tr class="cart_menu">
								<td class="image">Categories</td>
								<td class="description">Title</td>
								<td></td>
							</tr>
							</thead>
							<tbody>
							@foreach($categories as $category)
								<tr>
									<td class="cart_product">
										<img src="{{ asset('images/category/category.jpeg') }}" alt="">
									</td>
									<td class="cart_description">
										<h4>{{$category->title}}</h4>
									</td>
									<td class="cart_delete">
										<form action="{{ route('categories.destroy', $category->id)}}" method="post">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger" type="submit">Delete</button>
										</form>
										<form action="{{ route('categories.create') }}" method="get">
											@csrf
											<button class="btn btn-success" type="submit">Create</button>
										</form>
										<form action="{{ route('categories.edit', $category->id) }}" method="get">
											@csrf
											<button class="btn btn-secondary" type="submit">Edit</button>
										</form>
									</td>
								</tr>
							@endforeach
							</tbody>
						@endif
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection