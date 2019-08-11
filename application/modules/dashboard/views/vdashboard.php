<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.js" type="text/javascript"></script>
<div class="container">
    <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon bg-aqua"><i class="fa fa-inbox"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Verifikasi Tahap Pertama</span>
              <span class="info-box-number"><?=$admin1;?></span>
            </div>

          </div>
        </div>    

        <div class="clearfix visible-sm-block"></div> 

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-white">
            <span class="info-box-icon bg-aqua"><i class="fa fa-map-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Verifikasi Tahap Kedua</span>
              <span class="info-box-number"><?=$admin2;?></span>
            </div>
          </div>        
        </div>

        <div class="clearfix visible-sm-block"></div> 

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-navy">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Penjadwalan</span>
              <span class="info-box-number"><?=$schedule;?></span>
            </div>
          </div>        
        </div>        

        <div class="clearfix visible-sm-block"></div> 

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-purple">
            <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bentuk Team Dokter</span>
              <span class="info-box-number"><?=$team;?></span>
            </div>
          </div>        
        </div>                

        <div class="clearfix visible-sm-block"></div> 

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-maroon">
            <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Verifikasi Kabid</span>
              <span class="info-box-number"><?=$verify_kabid;?></span>
            </div>
          </div>        
        </div>
        
        <div class="clearfix visible-sm-block"></div> 

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Penerbitan SK</span>
              <span class="info-box-number"><?=$sk;?></span>
            </div>
          </div>        
        </div>        

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box">
          <canvas id="myChart" width="400" height="250"></canvas>
          </div>        
        </div>
        <!-- <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon bg-aqua"><i class="fa fa-inbox"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Permohonan Masuk</span>
              <span class="info-box-number">90</span>
            </div>

            <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
            </div>            
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>         -->


    </div>
</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
        datasets: [{
            label: '# Dummy',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>