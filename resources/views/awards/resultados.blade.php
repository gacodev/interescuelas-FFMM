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
                <div class="row">
                    <canvas id="forces" class="col-12"></canvas>
                    <canvas id="genders" class="col-12"></canvas>
                </div>

                <h4 class="text-center mt-2 mb-1"><strong>INSTITUCIONES</strong> </h4>
                <div class="row">
                    <div class="d-flex justify-content-center col-12 col-xl-3 col-sm-6"><canvas id="EJC"></canvas></div>
                    <div class="d-flex justify-content-center col-12 col-xl-3 col-sm-6"><canvas id="ARC"></canvas></div>
                    <div class="d-flex justify-content-center col-12 col-xl-3 col-sm-6"><canvas id="FAC"></canvas></div>
                    <div class="d-flex justify-content-center col-12 col-xl-3 col-sm-6"><canvas id="PONAL"></canvas></div>
                </div>


                <script>
                    function setLineChart(data, idElement, key, title) {
                        goldData = data.map(element => ({
                            x: element[key],
                            y: element.gold
                        }))

                        silverData = data.map(element => ({
                            x: element[key],
                            y: element.silver
                        }))

                        bronzeData = data.map(element => ({
                            x: element[key],
                            y: element.bronze
                        }))


                        const ctx = document.getElementById(idElement).getContext('2d');
                        const forces = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                datasets: [{
                                        label: 'Oro',
                                        data: goldData,
                                        backgroundColor: [
                                            'rgba(255,215,0, 1)',
                                        ],
                                    }, {
                                        label: 'Plata',
                                        data: silverData,
                                        backgroundColor: [
                                            'rgba(190,190,190, 1)',
                                        ]
                                    },
                                    {
                                        label: 'Bronce',
                                        data: bronzeData,
                                        backgroundColor: [
                                            'rgba(205,127,50, 1)',
                                        ],
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: title
                                    }
                                }
                            }
                        });
                    }

                    function setPieChart(data, idElement, title) {
                        let chartBackground = ['rgba(255,215,0, 1)', 'rgba(190,190,190, 1)','rgba(205,127,50, 1)'];
                        let chartData = [data.gold, data.silver, data.bronze];
                        let chartLabels = ["ORO", "PLATA", "BRONCE"]

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

                        let lineCharts = [{
                                idElement: 'forces',
                                title: 'FUERZAS',
                                data: "forces",
                                key: "force",
                            },
                            {
                                idElement: 'genders',
                                title: 'GENEROS',
                                data: "genders",
                                key: "sexo",
                            }
                        ]

                        lineCharts.map((element) => {
                            setLineChart(data[element.data], element.idElement, element.key, element.title);
                        })


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
                            setPieChart(data.forces.find(element2 => element2.force == element.data), element.idElement,
                                element
                                .title)
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
