@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>सेयर-होल्डरहरूको संख्या</h5>
                    <p><b>{{ $shares_count }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>कुल सेयर रकम</h5>
                    <p><b>Rs {{ $shares_amount }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>खातावालाहरूको संख्या</h5>
                    <p><b>{{ $savings_count }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>कुल बचत रकम</h5>
                    <p><b>Rs {{ $total_savings_amount }}</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>बचत रकम (नियमित)</h5>
                    <p><b>Rs {{ $normal_saving_money }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>बचत रकम (खुत्रुके)</h5>
                    <p><b>Rs {{ $khutrukke_saving_money }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>बचत रकम (ऐच्छिक)</h5>
                    <p><b>Rs {{ $self_saving_money }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>ऋणलिनेहरुको संख्या</h5>
                    <p><b>{{ $loan_count }}</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>कुल ऋण रकम</h5>
                    <p><b>Rs {{ $total_loan_amount }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>साधारण ऋण रकम</h5>
                    <p><b>Rs {{ $ordinary_loan_amount }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>ऋण रकम (धितो)</h5>
                    <p><b>Rs {{ $mortgage_loan_amount }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary p-2">
                <div class="info">
                    <h5>ऋण रकम (ओभरड्राफ्ट)</h5>
                    <p><b>Rs {{ $od_loan_amount }}</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Share Chart -->
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">साप्ताहिक सेयर रकम चार्ट</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="share-chart" width="475" height="267"
                            style="width: 475px; height: 267px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Saving Chart -->
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">साप्ताहिक बचत रकम चार्ट</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="saving-chart" width="475" height="267"
                            style="width: 475px; height: 267px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Saving Chart -->
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">साप्ताहिक ऋण रकम चार्ट</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="loan-chart" width="475" height="267"
                            style="width: 475px; height: 267px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->

@endsection

@section('page-scripts')
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
@stop

@section('custom-scripts')

    <script type="text/javascript">

        jQuery(function ($) {

            let startDate = moment().subtract(6, 'days'),
            endDate = moment();

            $.ajax({
                url: "{!! route('graph.savings') !!}",
                type: "GET",
                data: {
                    start_date: moment(startDate).format("MM/DD/YYYY"),
                    end_date: moment(endDate).format("MM/DD/YYYY")
                },
                success: function (response) {
                    console.log(response);

                    let shareData = {
                        labels: response.dates,
                        datasets: [
                            {
                                label: "साप्ताहिक सेयर रकम चार्ट",
                                fillColor: "rgba(151,187,205,0.2)",
                                strokeColor: "rgba(151,187,205,1)",
                                pointColor: "rgba(151,187,205,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(151,187,205,1)",
                                data: response.share_amount
                            }
                        ]
                    };
                    let share_chart = $("#share-chart").get(0).getContext("2d");
                    new Chart(share_chart).Line(shareData);

                    let savingData = {
                        labels: response.dates,
                        datasets: [
                            {
                                label: "साप्ताहिक बचत रकम चार्ट",
                                fillColor: "rgba(151,187,205,0.2)",
                                strokeColor: "rgba(151,187,205,1)",
                                pointColor: "rgba(151,187,205,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(151,187,205,1)",
                                data: response.saving_amount
                            }
                        ]
                    };
                    let savings_chart = $("#saving-chart").get(0).getContext("2d");
                    new Chart(savings_chart).Line(savingData);

                    let loanData = {
                        labels: response.dates,
                        datasets: [
                            {
                                label: "साप्ताहिक ऋण रकम चार्ट",
                                fillColor: "rgba(151,187,205,0.2)",
                                strokeColor: "rgba(151,187,205,1)",
                                pointColor: "rgba(151,187,205,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(151,187,205,1)",
                                data: response.loan_amount
                            }
                        ]
                    };
                    let loans_chart = $("#loan-chart").get(0).getContext("2d");
                    new Chart(loans_chart).Line(loanData);
                }
            });
        });

    </script>

@stop
