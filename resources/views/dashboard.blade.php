@extends('layouts.app', ['pageSlug' => 'dashboard'])

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accesibility.js"></script>


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-body">
                    <div class="p-2" id="chartEstado"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-body">
                    <div class="p-2" id="chartSelectivo"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-body">
                    <div class="p-2" id="chartPaises"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var estado = <?php echo json_encode($estados); ?>;
        var category = <?php echo json_encode($categories); ?>;
        var selectivo = <?php echo json_encode($selectivos_text); ?>;
        var count_selectivo = <?php echo json_encode($count_selectivos); ?>;
        var count_empresas = <?php echo json_encode($count_empresas); ?>;
        var empresas = <?php echo json_encode($empresas); ?>;
      
        Highcharts.chart('chartEstado', {
          chart: {
              backgroundColor: '#27293d',
              type: 'column',
              style: {
                  color: '#FFFFFF',
              }
          },
          title: {
              text: 'Cantidad de medios de transporte segun Estado',
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          subtitle: {
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          xAxis: {
              categories: category,
              title: {
                  text: null
              },
              gridLineWidth: 1    ,
              lineWidth: 1,
              labels: {
                  style: {
                      color: '#FFFFFF',
                  }
              }
          },
          yAxis: {
                min: 0,
              allowDecimals:false,
              title: {
                  text: '',
                  align: 'high',
              },
              labels: {
                  overflow: 'justify',
                  style: {
                      color: '#FFFFFF',
                  }
              },
              gridLineWidth: 0
          },
          plotOptions: {
              column: {
                  borderRadius: '50%',
                  dataLabels: {
                      enabled: true
                  },
                  groupPadding: 0.1
              }
          },
          legend: {
              enabled: false,
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
              x: -40,
              y: 80,
              floating: true,
              borderWidth: 1,
              backgroundColor:
                  Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
              shadow: true
          },
          credits: {
              enabled: false
          },
          series: [{
              name: 'Conteo',
              data: estado
          }]
      });

      Highcharts.chart('chartSelectivo', {
          chart: {
              backgroundColor: '#27293d',
              type: 'bar',
              style: {
                  color: '#FFFFFF',
              }
          },
          title: {
              text: 'Selectivo',
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          subtitle: {
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          xAxis: {
              categories: selectivo,
              title: {
                  text: null
              },
              gridLineWidth: 1    ,
              lineWidth: 1,
              labels: {
                  style: {
                      color: '#FFFFFF',
                  }
              }
          },
          yAxis: {
              allowDecimals:false,
              title: {
                  text: '',
                  align: 'high',
                  style: {
                      color: '#FFFFFF',
                  },
              },
              labels: {
                  overflow: 'justify',
                  style: {
                      color: '#FFFFFF',
                  }
              },
              gridLineWidth: 0
          },
          plotOptions: {
              bar: {
                  borderRadius: '50%',
                  dataLabels: {
                      enabled: true
                  },
                  groupPadding: 0.1
              }
          },
          legend: {
              enabled: false,
          },
          credits: {
              enabled: false
          },
          series: [{
              name: 'Conteo',
              data: count_selectivo
          }]
      });

      Highcharts.chart('chartPaises', {
          chart: {
              backgroundColor: '#27293d',
              type: 'line',
              style: {
                  color: '#FFFFFF',
              }
          },
          title: {
              text: 'Empresas',
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          subtitle: {
              align: 'left',
              style: {
                  color: '#FFFFFF',
              }
          },
          xAxis: {
              categories: empresas,
              title: {
                  text: null
              },
              gridLineWidth: 1    ,
              lineWidth: 1,
              labels: {
                  style: {
                      color: '#FFFFFF',
                  }
              }
          },
          yAxis: {
              allowDecimals:false,
              title: {
                  text: '',
                  align: 'high',
                  style: {
                      color: '#FFFFFF',
                  }
              },
              labels: {
                  overflow: 'justify',
                  style: {
                      color: '#FFFFFF',
                  }
              },
              gridLineWidth: 0
          },
          plotOptions: {
              bar: {
                  borderRadius: '50%',
                  dataLabels: {
                      enabled: true
                  },
                  groupPadding: 0.1
              }
          },
          legend: {
              enabled: false,
          },
          credits: {
              enabled: false
          },
          series: [{
              name: 'Conteo',
              data: count_empresas
          }]
      });
      </script>
@endsection

