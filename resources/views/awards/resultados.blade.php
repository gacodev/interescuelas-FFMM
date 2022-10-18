@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"
        integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <div required class="container">
        <div required class="row justify-content-center">
            <div class="col-12 justify-content-center">
                <h1 class="text-center">Resultados</h1>
                <style>
                    canvas {
                        margin-bottom: 4rem;
                        max-width: 70vw;
                        max-height: 400px;
                    }

                    .container__pie {
                        display: flex;
                        gap: .5rem;
                        justify-content: flex-around;
                        min-width: 100%;
                        width: 100%;
                    }

                    .container__pie canvas {
                        max-width: 15vw;
                    }
                </style>
                <canvas id="forces" class="col-12"></canvas>

                <div class="container__pie d-flex flex-wrap col-12 justify-content-center">
                    <canvas id="EJC" class="col-lg-3 col-sm-6 col-xs-12"></canvas>
                    <canvas id="ARC" class="col-lg-3 col-sm-6 col-xs-12"></canvas>
                    <canvas id="FAC" class="col-lg-3 col-sm-6 col-xs-12"></canvas>
                    <canvas id="PONAL" class="col-lg-3 col-sm-6 col-xs-12"></canvas>
                </div>


                <script>
                    function setForcesChart(data) {

                        let gold = data.forces.filter(element => element.award == "oro");
                        goldData = gold.map(element => ({
                            x: element.force,
                            y: element.total
                        }))

                        let silver = data.forces.filter(element => element.award == "plata");
                        silverData = silver.map(element => ({
                            x: element.force,
                            y: element.total
                        }))

                        let bronze = data.forces.filter(element => element.award == "bronce");
                        bronzeData = bronze.map(element => ({
                            x: element.force,
                            y: element.total
                        }))

                        const ctx = document.getElementById('forces').getContext('2d');
                        const forces = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                datasets: [{
                                        label: 'Oro',
                                        data: goldData,
                                        backgroundColor: [
                                            'rgba(255, 206, 86, 1)',
                                        ],
                                    }, {
                                        label: 'Plata',
                                        data: silverData,
                                        backgroundColor: [
                                            'rgba(54, 162, 235, 1)',
                                        ]
                                    },
                                    {
                                        label: 'Bronce',
                                        data: bronzeData,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 1)',
                                        ],
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    function setForceChart(data, idElement, title) {
                        console.log(data)

                        let chartBackground = [];

                        let inputData = data;
                        let chartData = inputData.map(element => {
                            if (element.award == "oro") chartBackground.push('rgba(255, 206, 86, 1)')
                            if (element.award == "plata") chartBackground.push('rgba(54, 162, 235, 1)')
                            if (element.award == "bronce") chartBackground.push('rgba(255, 99, 132, 1)')
                            return element.total
                        })

                        let chartLabels = inputData.map(element =>
                            (element.award.toUpperCase())
                        )



                        const ctx = document.getElementById(idElement).getContext('2d');
                        const forces = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: chartLabels,
                                datasets: [{
                                    data: chartData,
                                    backgroundColor: chartBackground,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: title
                                    }
                                }
                            },
                        });
                    }

                    function setChart(data) {
                        console.log(data)
                        setForcesChart(data)

                        let pieCharts = [{
                                idElement: 'EJC',
                                title: 'Ejercito Nacional',
                                data: "EJC"
                            },
                            {
                                idElement: 'ARC',
                                title: 'Armada Nacional',
                                data: "ARC"
                            },
                            {
                                idElement: 'FAC',
                                title: 'Fuerza Aerea Colombiana',
                                data: "FAC"
                            },
                            {
                                idElement: 'PONAL',
                                title: 'Policia Nacional',
                                data: "PONAL"
                            },
                        ]

                        pieCharts.map((element) => {
                            setForceChart(data[element.data], element.idElement, element.title)
                        })


                    }

                    function getData() {
                        axios.get(`/resultados_data/`)
                            .then(res => {
                                setChart(res.data);
                            })
                    }

                    function getChart() {
                        getData();
                    }

                    window.onload = getChart;
                </script>
            </div>
        </div>
    </div>
@endsection
