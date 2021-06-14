@extends('Admin.main')

@section('title')
    Nouveau Produit
@endsection
@section('path')
    Nouveau Produit
@endsection
@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Produit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('produits.store') }}" id="quickForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="produit">Nom de produit</label>
                    <input type="text" name="nom" class="form-control" id="produit" >
                  </div>
                  <div class="form-group">
                        <label>Categorie</label>
                        <select id="categorie" name="categorie_id" class="form-control">
                          @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                          @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Restaurant</label>
                    <select id="categorie" name="restaurant_id" class="form-control">
                      @foreach ($restaurants as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                      @endforeach
                    </select>
              </div>
                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prix">Prix</label>
                        <div class="input-group">
                            <input type="text" name="prix" class="form-control" id="prix">
                            <div class="input-group-append">
                                <span class="input-group-text">DH</span>
                            </div>
                        </div>
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </form>
            </div>
            </div>
            <div class="col-md-3"></div>

            </div>
            <!-- /.card -->

@endsection