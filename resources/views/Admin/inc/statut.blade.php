@extends('Admin.main')

@section('title')
    Nouveau Statut
@endsection
@section('path')
    Nouveau Statut
@endsection
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Statut</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('statuts.store') }}" id="quickForm" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="statut">Nom de Statut</label>
                    <input type="text" name="statut" class="form-control" id="statut">
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