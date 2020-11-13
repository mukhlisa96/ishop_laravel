@extends('layouts.master')
@section('title', 'productname')
@section('content')

    <h1>{{$product->name}}</h1>
    <h2>{{$product->category->name}}</h2>
    <p>Цена: <b>{{$product->price}}</b></p>
    <img src="{{Storage::url($product->image)}}">
    <p>{{$product->description}}</p>

		@if($product->isAvailable())
			<form action="{{route('basket-add', $product) }}" method="POST">
				<button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
				@csrf
			</form>
		@else

		<span>  ne dostupen</span>
			<br>
			<span> soobshit mne kogda tovor poyavitsa v nalichi</span>
			<br>
<div class="warning">
	@if (@errors->get('email'))
		{!! $errors->get('email')[0]!!}
	@endif
</div>

		<form action="{{route('subscription', $product) }}" method="POST">
		<input type="text" name="email">
			<button type="submit" class="btn btn-success">Добавить в корзину</button>
			@csrf
		</form>
		 
		@endif
		

@endsection