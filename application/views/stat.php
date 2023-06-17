<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mx-auto">
            <div class="card-body">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <style>
                    canvas {
                        width: 300px;
                        height: 300px;
                       
                    }
                </style>
                <style>
                    canvas {
                        width: 300px;
                        height: 300px;
                     
                    }
                </style>
                <div class="row justify-content-center">
                    <div class="mb-3 col-md-6" >
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="mb-3 col-md-6">
                    <canvas id="barChart"></canvas>
                    </div>
                </div>
                <?php
                    // Assuming $data['el'] contains the array with class names and number of students
                    $classNames = array_keys($el);
                    $numberOfStudents = array_values($el);
                ?><br>
          
                <canvas id="teachersChart"></canvas>
                <script>
                    var data = <?php echo json_encode($resultats); ?>;
                    var ctx = document.getElementById('pieChart').getContext('2d');
                    var pieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: [ 'Nombre de filles', 'Nombre de garçons'],
                            datasets: [{
                                data: [
                                    
                                    data.nombreElevesFilles,
                                    data.nombreElevesGarcons
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)', 
                                    'rgba(54, 162, 235, 0.7)', 
                              
                                ]
                            }]
                        },
                        options: {
                            responsive: false
                        }
                    });
                </script>
                <script>
                    var classNames = <?php echo json_encode($classNames); ?>;
                    var numberOfStudents = <?php echo json_encode($numberOfStudents); ?>;

                    var data = {
                        labels: classNames,
                        datasets: [{
                            label: 'Nombre des élève par classe',
                            data: numberOfStudents,
                            backgroundColor: 'rgba(165, 166, 255, 0.7)' // Bar color
                        }]
                    };

                    var ctx = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }
                        }
                    });
                </script>
                <script>
                    var data = <?php echo json_encode($res); ?>;
                    var classNames = Object.keys(data);
                    var numberOfMaleTeachers = Object.values(data).map(obj => obj.hommes);
                    var numberOfFemaleTeachers = Object.values(data).map(obj => obj.femmes);

                    var ctx = document.getElementById('teachersChart').getContext('2d');
                    var teachersChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: classNames,
                            datasets: [
                            
                                {
                                    label: 'Enseignant homme',
                                    data: numberOfMaleTeachers,
                                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                                },
                                {
                                    label: 'Enseignat femme',
                                    data: numberOfFemaleTeachers,
                                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>

