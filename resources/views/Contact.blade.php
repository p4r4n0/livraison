@extends('layout')

@section('content')
    <h1>Contactez-Nous</h1>

    <table border="1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Categorie</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>  
        </thead>
        @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->categorie}}</td>
            <td>{{$product->image}}</td>
            <td><a href="#"  class="btn btn-success">Edit</a></td>
            <td><a href="#" class="btn btn-danger">Delete</a></td> 
        </tr>
        @endforeach
        </tbody>
      </table>
@endsection