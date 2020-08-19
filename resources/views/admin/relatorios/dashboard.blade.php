<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


@extends('admin.layout.includes.main')
@section('title','Painel Admin | Relatório de venda')

@yield('APJ | Páginal')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                    <h1>Relatório vendas</h1>
                    @foreach ($VendaPorDia as $item)
                        {{$item->Data}}
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <div class="card">

                    <div class="card-body">
                      <div class="d-flex">

                        <p class="ml-auto d-flex flex-column text-right">
                          <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                          </span>
                          <span class="text-muted">Since last week</span>
                        </p>
                      </div>
                      <!-- /.d-flex -->

                      <div class="position-relative mb-4">
                        <div id="chart_div"></div>
                      </div>

                    </div>
                  </div>
                </div>
            </div>
        </section>
      </div>




@endsection

<script>
   google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data = new google.visualization.DataTable();
        data.addColumn('date', 'Time of Day');
        data.addColumn('number', 'Valor da venda');

        data.addRows([

            @php

           foreach($VendaPorDia as $Dia){

               echo '[new Date("'.$Dia->Data.'"), '.$Dia->Total.'],';

                }
             @endphp


        ]);


        var options = {
          title: 'Vendas dos ultimos 10 dias',

          hAxis: {
            format: 'd/MM/yyyy',
            gridlines: {count: 15}
          },
          vAxis: {
            gridlines: {color: 'none'},
            minValue: 0
          }
        };


      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
