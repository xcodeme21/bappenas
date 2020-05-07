<!DOCTYPE html>
<html dir="ltr" lang="en">

@include("backend.include.head")

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        @include("backend.include.sidebar")
        
        <div class="page-wrapper">
        
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Dashboard</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="page-content container-fluid">
                @include('flash::message')
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total User</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="icon-people text-info"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">{{ @$totaluser }}</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Surat Masuk</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fa fa-file-pdf text-primary"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">{{ @$jmlkendaraan }}</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Surat Keluar</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fa fa-file-pdf text-danger"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">{{ @$jmlgedung }}</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Surat Keputusan</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fa fa-file-pdf text-success"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">{{ @$jmlgedung }}</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







               




                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Rekapitulasi Tahun <span class="text-danger">{{ date('Y') }}</span></h5>
                                <hr>
                                <div class="table-responsive">
                                    <div id="basic-line" style="height:400px;width:100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            @include("backend.include.footer")
        </div>
    </div>
    <div class="chat-windows"></div>
    
    @include("backend.include.script")
    <script src="{{ asset ('public/assets/libs/echarts/dist/echarts-en.min.js') }}"></script>

    <script>
        $(function () {
            "use strict";
            
            //E Charts
            var myChart = echarts.init(document.getElementById('basic-line'));

                // specify chart configuration item and data
                var option = {
                        // Setup grid
                        grid: {
                            left: '1%',
                            right: '2%',
                            bottom: '3%',
                            containLabel: true
                        },

                        // Add Tooltip
                        tooltip : {
                            trigger: 'axis'
                        },

                        // Add Legend
                        legend: {
                            data:['Surat Masuk','Surat Keluar','Surat Keputusan']
                        },

                        // Add custom colors
                        color: ['#707cd2', '#ff5050', '#2cd07e'],

                        // Enable drag recalculate
                        calculable : true,

                        // Horizontal Axiz
                        xAxis : [
                            {
                                type : 'category',
                                boundaryGap : false,
                                data : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                            }
                        ],

                        // Vertical Axis
                        yAxis : [
                            {
                                type : 'value',
                                axisLabel : {
                                    formatter: '{value}'
                                }
                            }
                        ],

                        // Add Series
                        series : [
                            {
                                name:'Surat Masuk',
                                type:'line',
                                data:[1,2,3,4,5,6,7,8,9,10,11,12],
                                markPoint : {
                                    data : [
                                        {type : 'max', name: 'Max'},
                                        {type : 'min', name: 'Min'}
                                    ]
                                },
                                markLine : {
                                    data : [
                                        {type : 'average', name: 'Average'}
                                    ]
                                },
                                lineStyle: {
                                    normal: {
                                        width: 3,
                                        shadowColor: 'rgba(0,0,0,0.1)',
                                        shadowBlur: 10,
                                        shadowOffsetY: 10
                                    }
                                },
                            },
                            {
                                name:'Surat Keluar',
                                type:'line',
                                data:[12,11,10,9,8,7,6,5,4,3,2,1],
                                markPoint : {
                                    data : [
                                        {type : 'max', name: 'Max'},
                                        {type : 'min', name: 'Min'}
                                    ]
                                },
                                markLine : {
                                    data : [
                                        {type : 'average', name : 'Average'}
                                    ]
                                },
                                lineStyle: {
                                    normal: {
                                        width: 3,
                                        shadowColor: 'rgba(0,0,0,0.1)',
                                        shadowBlur: 10,
                                        shadowOffsetY: 10
                                    }
                                },
                            },
                            {
                                name:'Surat Keputusan',
                                type:'line',
                                data:[5,6,5,6,8,7,2,8,9,12,2,7],
                                markPoint : {
                                    data : [
                                        {type : 'max', name: 'Max'},
                                        {type : 'min', name: 'Min'}
                                    ]
                                },
                                markLine : {
                                    data : [
                                        {type : 'average', name : 'Average'}
                                    ]
                                },
                                lineStyle: {
                                    normal: {
                                        width: 3,
                                        shadowColor: 'rgba(0,0,0,0.1)',
                                        shadowBlur: 10,
                                        shadowOffsetY: 10
                                    }
                                },
                            }
                        ]
                    };
                // use configuration item and data specified to show chart
                myChart.setOption(option);

        });
    </script>

    </body>
</html>