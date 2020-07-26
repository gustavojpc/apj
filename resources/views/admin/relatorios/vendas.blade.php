@extends('admin.layout.admin')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1],
        [{v: [9, 0, 0], f: '9 am'}, 2],
        [{v: [10, 0, 0], f:'10 am'}, 3],
        [{v: [11, 0, 0], f: '11 am'}, 4],
        [{v: [12, 0, 0], f: '12 pm'}, 5],
        [{v: [13, 0, 0], f: '1 pm'}, 6],
        [{v: [14, 0, 0], f: '2 pm'}, 7],
        [{v: [15, 0, 0], f: '3 pm'}, 8],
        [{v: [16, 0, 0], f: '4 pm'}, 9],
        [{v: [17, 0, 0], f: '5 pm'}, 10],
      ]);

      var options = {
        title: 'Motivation Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }




</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



    <div class="row relatorio-group">
        <div class="col-lg-12 text-center">
            <h2>Relatório de vendas</h2>
        </div>
    </div>
    <div class="row relatorio-group">
        <div class="col-lg-4 ">
            <div class="input-group">
                Data inicial:
                {!! Form::open() !!}
                {!! Form::text('date', '', ['class'=>'form-control','id' => 'datepickerfim' ]) !!}
                {!! Form::close() !!}

            </div>

        </div>
        <div class="col-lg-4">
            <div class="input-group">
                Data inicial:
                {!! Form::open() !!}
                {!! Form::text('date', '', ['class'=>'form-control','id' => 'datepickerfim' ]) !!}
                {!! Form::close() !!}

            </div>
            <button type="button" class="btn btn-primary">Buscar</button>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
    <div class="row relatorio-group">

        <div class="col-lg-4">
            Total de vendas do dia
        </div>
        <div class="col-lg-4">
            Total de vendas do dia
        </div>
    </div>

    <div class="row relatorio-group">
        <div class="col-lg-12">
            <div id="chart_div"></div>
        </div>
    </div>



@endsection
