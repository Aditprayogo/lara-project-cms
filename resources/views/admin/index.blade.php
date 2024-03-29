@extends('layouts.admin')

@section('content')


    
  
<div class="row">

    
    
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Data Chart bar
            </div>
            <div class="panel-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data chart bar
            </div>
            <div class="panel-body">
                <canvas id="myPieChart"> </canvas>
            </div>
        </div>
        
    </div>
    
</div>
   

   
   
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Posts', 'Categories', 'Comments', 'Replies'],
                datasets: [{
                    label: 'Data of CMS',
                    data: [ {{$postsCount}}, {{$categoriesCount}}, {{$commentsCount}}, {{$repliesCount}}],
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

        var ctx2 = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Posts', 'Categories', 'Comments', 'Replies'],
                datasets: [{
                    label: 'Data of CMS',
                    data: [ {{$postsCount}}, {{$categoriesCount}}, {{$commentsCount}}, {{$repliesCount}}],
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
    
@endsection

@section('footer')
    <br>
@endsection