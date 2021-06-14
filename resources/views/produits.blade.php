@extends('layout')

@section('content')
        <div class="row">
        @foreach($produits as $product)
              <div class="col-12 mt-2">
                <div class="card">
                  <div class="row">

                  <img class="card-img col-lg-4 " src="{{$product->image}}">
                  <div class="card-body col-lg-4">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product->categorie}}</h6>
                    <p class="card-text">
                        {{$product->description}}
                    </p>
                    <div class="options d-flex flex-fill col-lg-2">
                      <select class="custom-select ml-1">
                          <option selected>Quantity</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                      </select>
                    </div>
                    <div class="buy d-flex justify-content-between align-items-center col-lg-2">
                      <div class="price text-success"><h5 class="mt-4">{{$product->prix}}</h5></div>
                       <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                  </div>
                  </div>
                </div>
              </div> 


              <!--<div class="bigx margin-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card">
                  <img class="card-img" src="{{$product->image}}">
                  <div class="card-img-overlay d-flex justify-content-end">
                    <a href="#" class="card-link text-danger like">
                      <i class="fas fa-heart"></i>
                    </a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product->categorie}}</h6>
                    <p class="card-text">
                        {{$product->description}}
                    </p>
                    <div class="options d-flex flex-fill">
                       <select class="custom-select mr-1">
                          <option selected>Color</option>
                          <option value="1">Green</option>
                          <option value="2">Blue</option>
                          <option value="3">Red</option>
                      </select>
                      <select class="custom-select ml-1">
                          <option selected>Quantity</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                      </select>
                    </div>
                    <div class="buy d-flex justify-content-between align-items-center">
                      <div class="price text-success"><h5 class="mt-4">{{$product->prix}}</h5></div>
                       <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div> -->

        @endforeach  
            </div>
@endsection