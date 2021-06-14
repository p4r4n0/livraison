@extends('Admin.main')

@section('link')
<link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
@endsection
@section('title')
    Order
@endsection
@section('path')
    Order
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body ">
                        <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                        <div class="px-4 py-5">
                            Firebase ID : <h5 class="text-uppercase">{{$client->firebase_id}}</h5>
                            Nom : <h5 class="text-uppercase">{{$client->nom}}</h5>
                            Email : <h5 class="text-uppercase">{{$client->email}}</h5>
                            Phone : <h5 class="text-uppercase">{{$client->phone}}</h5>
                            Adresse : <h5 class="text-uppercase">{{$order->adresse}}</h5>
                            <div class="mb-3">
                                <hr class="new1">
                            </div>
                            @foreach ($commandes as $item)
                              <div class="d-flex justify-content-between"> <span class="font-weight-bold">
                                @foreach ($produits as $row)
                                    @if($item->produit_id==$row->id)
                                      {{ $row->nom }}(Qté: {{$item->quantité}})</span> <span class="text-muted">{{ $item->quantité*$row->prix }}</span> </div>
                                    @endif
                                @endforeach                                  
                            @endforeach
                            <div class="d-flex justify-content-between"> <small>Frais de livraison</small> <small>{{ $order->frais_livraison }} MAD</small> </div>
                            <div class="d-flex justify-content-between mt-3"> <span class="font-weight-bold">Total</span> <span class="font-weight-bold theme-color">{{$order->total_a_payer}} MAD</span> </div>
                            <div class="text-center mt-5"> <button class="btn btn-primary">Marquer comme livré</button> </div>
                        </div>
                    </div>
                </div>
            </div>
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