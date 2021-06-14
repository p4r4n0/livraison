@extends('Admin.main')

@section('title')
    Nouveau Restaurant
@endsection
@section('path')
    Nouveau Restaurant
@endsection
@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Restaurant</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('restaurants.store') }}" id="quickForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="produit">Nom du restaurant</label>
                    <input type="text" name="nom" class="form-control" id="produit" >
                  </div>
                  <div class="form-group">
                    <label for="image">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prix">Frais de livraison</label>
                        <div class="input-group">
                            <input type="text" name="fraislivraison" class="form-control" id="prix">
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