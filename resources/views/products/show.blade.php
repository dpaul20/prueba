@extends('layouts.app')

@section('title', 'Producto ampliado')

@section('body-clase', 'profile-page')

@section('content')
	<div class="header header-filter" style="background-image: url('../assets/img/examples/city.jpg');"></div>
	<div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{ $producto->featured_image_url }}" alt="{{ $producto->name }}" class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">{{ $producto->name }}</h3>
							<h6>{{ $producto->category->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $producto->long_descripction }}</p>
                </div>
                <div class="text-center">
                	<button class="btn btn-primary btn-round"  data-toggle="modal" data-target="#modalAddToCart">
						<i class="material-icons">add_shopping_cart</i> Agregar a carrito
					</button>
                </div>

				
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-tabs">
		                    <div class="nav-align-center">

			                    <div class="tab-content gallery">
			                    	<div class="tab-pane active" id="studio">
			                            <div class="row">
			                            	
			                            	<div class="col-md-6"> 
			                            		@foreach ($imagesLeft as $imagen)              		
													<img src="{{ $imagen->image }}" class="img-rounded" />
												@endforeach
											</div>
											
											
			                            	<div class="col-md-6"> 
			                            		@foreach ($imagesRight as $imagen)              		
													<img src="{{ $imagen->image }}" class="img-rounded" />
												@endforeach
											</div>
											
			                            </div>
			                        </div>			                   

			                    </div>
							</div>
						</div>
						<!-- End Profile Tabs -->
					</div>
                </div>

            </div>
        </div>
	</div>
	@include('includes.footer')
@endsection
@if (session('notificacion'))
    <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
    </div>
@endif
<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Añadir producto al carrito</h4>
		    </div>
		    <form method="POST" action="{{ url('/cart') }}">
		    	@csrf
		    	<div class="modal-body">
			        <div class="col-sm-4">
						<div class="form-group label-floating">
							<label class="control-label">Cantidad</label>
							<input type="hidden" name="product_id" value="{{ $producto->id }}">
							<input type="number" name="quantity" min="1" step="1" value="1" class="form-control" required>
						</div>
					</div>
		      	</div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cacelar</button>
			        <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
		      	</div>
		    </form>	
    	</div>
  	</div>
</div>