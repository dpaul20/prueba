<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido</p>
	<p>Estos son los datos del cliente que realizo el pedido:</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{ $user->name }}
		</li>
		<li>
			<strong>Email:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{ $cart->order_date }}
		</li>
		<hr>
		<p>Detalles del pedido: </p>
		<ul>
			@foreach ($cart->details as $xCarrito)
				<li>
					{{ $xCarrito->product->name }} $ {{ $xCarrito->product->price }} x {{ $xCarrito->quantity }} ($ {{ $xCarrito->quantity * $xCarrito->product->price }})
				</li>
			@endforeach
		</ul>
		<p>
			<strong>Importe total a pagar: </strong> {{ $cart->total }}
		</p>
		<hr>
		<p>
			<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz clic aquí</a>
			Para ver más informacion sobre este pedido.
		</p>
	</ul>
</body>
</html>