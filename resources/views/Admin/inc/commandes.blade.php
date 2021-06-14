@extends('Admin.main')

@section('link')
<link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
@endsection
@section('title')
    Commandes
@endsection
@section('path')
    Commandes
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table des Commandes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>UserID</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Produit</th>
                  <th>Restaurant</th>
                  <th>Qté</th>
                  <th>Total</th>
                  <th>Statut</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($commandes as $item)
                  <tr>
                    <form style="display:inline-block;" action="{{ route('commandes.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                    <td>{{$item->id}}</td>
                    <td>{{$item->firebase_id}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->telephone}}</td>
                    <td>{{$item->adresse}}</td>
                    <td>
                      @foreach ($produits as $row)
                      @if ($row->id == $item->produit_id)
                        {{$row->nom}}                                       
                      @endif
                    @endforeach
                    </td>
                    <td>
                      @foreach ($restaurants as $row)
                      @if ($row->id == $item->restaurant_id)
                        {{$row->nom}}                                       
                      @endif
                    @endforeach
                    </td>

                    <td>{{$item->quantité}}</td>
                    <td>
                      {{$item->prix*$item->quantité}} DH
                    </td>                 
                    <td>
                      <div class="form-group">
                        <select id="categorie" name="statut_id" class="form-control">
                          @foreach ($statuts as $row)
                            @if ($row->id == $item->statut_id)
                              <option selected value="{{$row->id}}">{{$row->statut}}</option>                                       
                            @else
                              <option value="{{$row->id}}">{{$row->statut}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </td>
                    <td>
                      <button class="btn p-1" type="submit" ><i class="fas fa-edit" style="color:green" title="Editer"></i></button>
                    </form>
                      <form style="display:inline-block;" action="{{ route('commandes.destroy',$item->id) }}" method="POST">
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