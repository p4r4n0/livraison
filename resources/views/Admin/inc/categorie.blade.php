@extends('Admin.main')

@section('title')
    Nouveau Categorie
@endsection
@section('path')
    Nouveau Categorie
@endsection
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Categorie</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('categories.store') }}" id="quickForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="categorie">Nom de categorie</label>
                    <input type="text" name="nom" class="form-control" id="categorie">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
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