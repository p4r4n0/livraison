<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Restaurant;
use App\Statut;
use App\Order;
use App\Commande;
use App\Client;

class OrderController extends Controller
{
    //
    public function list() {
        $orders = Order::all();
        $statuts = Statut::all();
        $clients = Client::all();
        return view('Admin.inc.orders',['orders'=>$orders,'statuts'=>$statuts,'clients'=>$clients]);
    }
    public function show($id) {
        $order = Order::findOrFail($id);
        $client = Client::find($order->client_id);
        $commandes = Commande::where('order_id','=',$order->id)->get();
        $restaurants = Restaurant::all();
        $produits = Produit::all();
        $statuts = Statut::all();

        return view('Admin.inc.order',['order'=>$order,'produits'=>$produits,'commandes'=>$commandes,'restaurants'=>$restaurants,'statuts'=>$statuts,'client'=>$client]);
    }
    public function index(){

    }

    public function ajouterOrder() {
 
        $order = json_decode(request()->order,true);
        $commandes = json_decode(request()->commandes,true);


        $data= array('client_id'=>$order['client_id']);
        $data+= array('adresse'=>$order['adresse']);
        $data+= array('frais_livraison'=>$order['frais_livraison']);
        $data+= array('total_a_payer'=>$order['total_a_payer']);
        $data+= array('statut_id'=>$order['statut_id']);

        $ord = Order::create($data);
        foreach($commandes as $name=>$nz) {
            $dt = array('client_id'=>$ord->client_id);
            $dt += array('order_id'=>$ord->id);
            $dt += array('produit_id'=>$nz['produit_id']);
            $dt += array('quantité'=>$nz['quantite']);
            $commande = Commande::create($dt);
        }
        
    }

    public function destroy($id) {
        $order = Order::findOrFail($id);
        $order->delete();
  
        return back()->with('success','La order a été supprimer avec succés.');
    }

    public function getOrders($id) {

        $orders = Order::where('client_id',"=",$id)->get();

        return response()->json($orders);
    }
}
