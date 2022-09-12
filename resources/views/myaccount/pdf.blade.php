@extends('layouts.pdf')
@section('title', $viewData["title"])
@section('content')
<div id="app" class="col-11">
    <div class="row my-3">
        <div class="col-10">
            <h1>Abarrotes Store</h1>
            <p>Medellin Antioquia</p>
            <p>El centro medellin</p>
            <p>local 312</p>
        </div>
        <div class="col-2">
            <img src="{{ asset('/storage/logo.png') }}" />
        </div>
    </div>

    <hr />

    <div class="row fact-info mt-3">
        <div class="col-3">
            <h5>Facturar a</h5>
            <p>
                {{ Auth::user()->getName() }} - {{ Auth::user()->getDocument() }}
            </p>
        </div>
        <div class="col-3">
            <h5>Enviar a</h5>
            <p>
                {{ Auth::user()->getCity() }}
                {{ Auth::user()->getAddress() }}
                {{ Auth::user()->getName() }}
            </p>
        </div>
        <div class="col-3">
            <h5>N° de factura</h5>
            <h5>Fecha</h5>
        </div>
        <div class="col-3">
            <h5>{{ $viewData["order"]->getId() }}</h5>
            <p>{{ $viewData["order"]->getCreatedAt() }}</p>
        </div>
    </div>

    <hr />

    <div class="row my-5">
        <table class="table table-borderless factura">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Descripcion</th>
                    <th>Precio Unitario</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["order"]->getItems() as $item)
                <tr>
                    <td>{{ $item->getQuantity() }}</td>
                    <td>{{ $item->getProduct()->getName() }}</td>
                    <td>${{ $item->getPrice() }}</td>
                    <td>${{ $item->getPrice() }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total Factura</th>
                    <th>COP${{ $viewData["order"]->getTotal() }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="cond row">
        <div class="col-12 mt-3">
            <h4>Condiciones y formas de pago</h4>
            <p>El pago se debe realizar en un plazo de 15 dias.</p>
            <p>
                Banco Banreserva
                <br />
                IBAN: DO XX 0075 XXXX XX XX XXXX XXXX
                <br />
                Código SWIFT: BPDODOSXXXX
            </p>
        </div>
    </div>
</div>
@endsection