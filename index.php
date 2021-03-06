<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Pantau Penyebaran Covid-19 By Ghossan</title>
  </head>
  <body>

    <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container text-center">
            <h1 class="display-4">Corona Virus Disease 2019</h1>
             <p class="lead">
                <h2>
                    Pantau Penyebaran Covid-19 By <a href="https://ghossanammarsantos.github.io/theportfolio_ghossan/" class="text-decoration-none"><b class="text-warning"><u><i>Ghossan</i></u></b></a> 
                    <br> SECARA REAL-TIME
                    <br> Mari Bersama Jaga Kesehatan
                    <br> #dirumahaja #dirumahselah #janmada       
                </h2>
             </p>
        </div>
    </div>

    <style type="text/css">
        .box{
            padding: 30px 40px;
            border-radius: 5px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-danger box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Positif</h5>
                            <h2 id="data-kasus">0</h2>
                            <h5>Orang</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/sad.svg" style="width: 100px " alt="">
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-info box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Meninggal</h5>
                            <h2 id="data-mati">0</h2>
                            <h5>Orang</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/cry.svg" style="width: 100px " alt="">
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-success box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Sembuh</h5>
                            <h2 id="data-sembuh">0</h2>
                            <h5>Orang</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/happy.svg" style="width: 100px " alt="">
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="bg-primary box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>SUMATERA BARAT</h2>
                            <h5 id="data-sumbar">Positif : 0 Orang</h5> 
                            <h5 id="data-sumbar2">Meninggal : 0 Orang</h5> 
                            <h5 id="data-sumbar3">Sembuh : 0 Orang</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="img/sumbar.png" style="width: 200px " alt="">
                        </div>
                    </div> 
                </div>
            </div>


            <div class="col-md-12 mt-3">
                <div class="bg-primary box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>INDONESIA</h2>
                            <h3 id="data-id">Positif : 0 Orang <br> Meninggal : 0 Orang <br> Sembuh : 0 Orang</h3>
                        </div>
                        <div class="col-md-4">
                            <img src="img/indonesia.svg" style="width: 200px " alt="">
                        </div>
                    </div> 
                </div>
            </div>

        </div>
        <!-- akhir row -->

        <div class="card mt-3">
            <div class="card-header">
            <b>Data Kasus Covid-19 Di Indonesia Berdasarkan Provinsi Seluruh Indonesia</b>
            </div>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>No.</th>
                        <th>Nama Provinsi</th>
                        <th>Positif</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                    </thead>
                    <tbody id="table-data">

                    </tbody>
        </table>    
            </div>
        </div>

        

    </div>
<!-- akhir container -->
        <footer class="bg-dark text-center text-white mt-3 bt-2 pb-2">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Info Developer --> <a href="https://ghossanammarsantos.github.io/theportfolio_ghossan/" class="text-decoration-none text-danger">Ghossan Ammar Santos</a>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </body>
</html>

<script>
    $(document).ready(function(){
        
        //panggil fungsi menampilkan semua data global
        semuaData();
        dataNegara();
        dataProvinsi();
        dataTable();

        //untuk refresh otomatis
        setInterval(function(){
            semuaData();
            dataNegara();
            dataProvinsi();
            dataTable();
        }, 3000);
        
        function semuaData(){
            $.ajax({
                url : 'https://coronavirus-19-api.herokuapp.com/all',
                success : function(data){
                    try{
                        var json = data;
                        var kasus = data.cases; 
                        var meninggal = data.deaths;
                        var sembuh = data.recovered;

                        $('#data-kasus').html(kasus);
                        $('#data-mati').html(meninggal);
                        $('#data-sembuh').html(sembuh);

                    }catch{
                        alert('Error Gaes');
                    }
                }
            });
        }

        function dataProvinsi(){
            $.ajax({
        dataType: "json",
        url: "https://api.kawalcorona.com/indonesia/provinsi/",
        success: function (data) {
          try {
            var newArrayData = [];
            for (let i = 0; i < data.length; i++) {
              const item = data[i];
              console.log(item);
              newArrayData.push({ ...item.attributes });
            }
            console.log(newArrayData);

            var dataSumbar = newArrayData.find(item => item.FID === 3)
            console.log(dataSumbar);
            
            document.getElementById('data-sumbar').innerHTML = dataSumbar.Provinsi
            document.getElementById('data-sumbar').innerHTML = "Positif : " + dataSumbar.Kasus_Posi
            document.getElementById('data-sumbar2').innerHTML = "Meninggal : " + dataSumbar.Kasus_Meni
            document.getElementById('data-sumbar3').innerHTML = "Sembuh : " + dataSumbar.Kasus_Semb

          } catch (err) {
            console.log(err);
          }
        },
      });
        }


        function dataNegara(){
            $.ajax({
                url : 'https://coronavirus-19-api.herokuapp.com/countries',
                success : function(data2){
                    try{
                      
                        var json = data2;
                        var html = [];

                        if(json.length > 0){
                            var i;
                            for(i = 0; 0 < json.length; i++){
                                var dataNegara = json[i];
                                var namaNegara = dataNegara.country;

                                if(namaNegara === 'Indonesia'){
                                    var kasus = dataNegara.cases;
                                    var mati = dataNegara.deaths;
                                    var sembuh = dataNegara.recovered;
                                    $('#data-id').html('Positif : '+kasus+' orang <br> Meninggal : '+mati+' orang <br> Sembuh : '+sembuh+' orang')

                                }
                            }
                        }
                        
                        }catch{
                        
                        }
                }
            });
        
    }
        

      function dataTable(){
        $.ajax({
                url : 'curl.php',
                type : 'GET',

                success : function(data){
                    try{
                       
                        $('#table-data').html(data);

                    }catch{
                        alert('Error Gaes');
                    }
                }
            });
      }      

    });
</script>