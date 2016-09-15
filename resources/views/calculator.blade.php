@extends('frontend.layoutother')

@section('content')

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loan Amortization Calculator
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

			<div class="col-md-6">
<h4> Per month, you repay  : <strong > <span style="float:right" id="permonth"> 0 </span> </strong> </h4>
<h4> Down Payment :<strong> <span style="float:right" id="downpament_a"> 0 </span> </strong> </h4>
<h4> Total Amount :<strong> <span style="float:right" id="loanamount_total"> 0 </span> </strong> </h4>
<h4> Total Interest :<strong> <span style="float:right" id="total_interest"> 0 </span> </strong> </h4>
<h4> Total you'll repay :<strong> <span style="float:right" id="total_amount"> 0 </span> </strong> </h4>

<div id="container" style=""></div>
</div>

           
            <div class="col-md-6">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
 
 <div class="form-group mamount"> 
<label for="loanamount" class="col-md-12 control-label">Loan Amount</label>
<div class="col-md-12">
<div class="input-group"> 
<input type="number" value="250000" name="loanamount" id="loanamount" class="form-control">
 <span class="input-group-addon">$</span>
 </div>
 </div>
 </div>
 
 <div class="form-group mamount"> 
<label for="loanamount" class="col-md-12 control-label">Down Payment</label>
<div class="col-md-12">
<div class="input-group"> 
<input type="number" value="20" name="downpayment" id="downpayment" class="form-control">
 <span class="input-group-addon">%</span>
 </div>
 </div>
 </div>
 
<div class="form-group mamount"> 
<label for="loanamount" class="col-md-12 control-label">Interest</label>
<div class="col-md-12">
<div class="input-group"> 
<input type="number" value="5" name="loanintrest" id="loanintrest" class="form-control">
 <span class="input-group-addon">%</span>
 </div>
 </div>
 </div>
 
 <div class="form-group mamount"> 
<label for="loanamount" class="col-md-12 control-label">Period</label>
<div class="col-md-12">
<div class="input-group"> 
<input type="number" value="5" name="period" id="period" class="form-control">
 <span class="input-group-addon">Year</span>
 </div>
 </div>
 </div>


  
</div>


        </div>
<script> 

	function change() { 
		var loanamount_total = $("#loanamount").val();
		var loanintrest = $("#loanintrest").val();
		var period = $("#period").val();
		var downpayment_percent = $("#downpayment").val();
		var downpayment = (Number(downpayment_percent) * Number(loanamount_total)) / 100;
		
		var loanamount = Number(loanamount_total) - Number(downpayment);
		var intrest = Number(loanamount) * Number(loanintrest) * Number(period)/ 100;
		var total_amount = Number(loanamount) + Number(intrest);
		var permonth = Number(total_amount) / (Number(period) * 12);
		
		var total_intrest_percent = (Number(intrest) * 100) / Number(total_amount);
		var total_amount_precent = (Number(loanamount) * 100) / Number(total_amount);
		
		$("#permonth").text("$" + permonth.toFixed(2));
		$("#downpament_a").text("$" + downpayment.toFixed(2));
		$("#loanamount_total").text("$" + Number(loanamount_total).toFixed(2));
		$("#total_interest").text("$" + intrest.toFixed(2));
		$("#total_amount").text("$" + total_amount.toFixed(2));
		
		$('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Loan Amortization Calculator'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Interest',
                y: total_intrest_percent
            }, {
                name: 'Amount',
                y: total_amount_precent,
                sliced: true,
                selected: true
            }]
        }]
    });
	}

	

$("body").on("change" , "#downpayment , #loanintrest , #loanamount , #period" , function() {
	change();	
});

$(function () {
    change();
});

</script>

			
        <!-- /.row -->

       

@endsection
