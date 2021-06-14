@extends('Admin.main')

@section('title')
    Nouveau Utilisateur
@endsection
@section('path')
    Nouveau Utilisateur
@endsection
@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de pass</label>
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            <div class="col-md-3"></div>

            </div>
            <!-- /.card -->
@endsection