@extends('Admin.main')

@section('link')
<link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
@endsection
@section('title')
    Orders
@endsection
@section('path')
    Orders
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table des Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Client</th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Commandes</th>
                  <th>Frais de livraison</th>
                  <th>Total a payer</th>
                  <th>Statut</th>
                  <th>Date</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $item)
                  <tr>
                    <form style="display:inline-block;" action="{{ route('commandes.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                    <td>{{$item->id}}</td>
                    
                    @foreach ($clients as $row)
                     @if ($item->client_id==$row->id)
                      <td>{{$row->nom}}</td>
                      <td>{{$row->phone}}</td>                           
                     @endif
                    @endforeach
                    <td>
                      {{ $item->adresse }}
                    </td>
                    <td>
                      <a target="_BLANK" href="{{ route('orders.show',$item->id) }}" class="btn p-1"><i class="fas fa-eye" style="color:purple" title="Afficher"></i><a>
                    </td>
                    <td>
                        {{$item->frais_livraison}}                                       
                    </td>
                    <td>
                        {{$item->total_a_payer}}                                       
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
                    {{$item->created_at}}
                    </td>
                    <td>
                      <button class="btn p-1" type="submit" ><i class="fas fa-edit" style="color:green" title="Editer"></i></button>
                    </form>
                      <form style="display:inline-block;" action="{{ route('orders.destroy',$item->id) }}" method="POST">
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