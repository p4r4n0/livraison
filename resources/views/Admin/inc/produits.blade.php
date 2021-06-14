@extends('Admin.main')

@section('link')
<link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
@endsection
@section('title')
    Produits
@endsection
@section('path')
    Produits
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table des Produits</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Categorie</th>
                  <th>Restaurant</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Prix</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($produits as $item)
                  <tr>
                    <form style="display:inline-block;" action="{{ route('produits.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                    <td>{{$item->id}}</td>
                    <td>
                      <input type="text" name="nom" class="form-control" value="{{$item->nom}}" >
                    </td>
                    <td>
                      <div class="form-group">
                        <select id="categorie" name="categorie_id" class="form-control">
                          @foreach ($categories as $row)
                            @if ($row->id == $item->categorie_id)
                              <option selected value="{{$row->id}}">{{$row->nom}}</option>                                       
                            @else
                              <option value="{{$row->id}}">{{$row->nom}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <select id="restaurant" name="restaurant_id" class="form-control">
                          @foreach ($restaurants as $row)
                            @if ($row->id == $item->restaurant_id)
                              <option selected value="{{$row->id}}">{{$row->nom}}</option>                                       
                            @else
                              <option value="{{$row->id}}">{{$row->nom}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </td>
                    <td>
                      <textarea class="form-control" name="description" rows="3">{{$item->description}}</textarea>
                    </td>                 
                    <td>
                      <div class="form-group">
                         <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                                        <img width="200px" src="{{$item->image}}"/></td>

                    <td>
                      <div class="input-group">
                        <input type="text" name="prix" class="form-control" value="{{$item->prix}}" id="prix">
                        <div class="input-group-append">
                            <span class="input-group-text">DH</span>
                        </div>
                      </div>
                    </td>                 
                    <td>
                      <button class="btn p-1" type="submit" ><i class="fas fa-edit" style="color:green" title="Editer"></i></button>
                    </form>
                      <form style="display:inline-block;" action="{{ route('produits.destroy',$item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn p-1" type="submit" ><i class="fas fa-trash" style="color:red" title="Supprimer"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
@endsection

@section('js')
<script src="/js/jquery.dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection