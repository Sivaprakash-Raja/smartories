


<head>
    <!-- Google Chart link -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


      <style>
        #area-chart,
        #line-chart,
        #bar-chart,
        #stacked,
        #pie-chart{
            min-height: 250px;
        }

.fontBold{
  font-weight: bold;
}
/* donut chart */
.donut-chart
{
    position: relative;
    width:50%;
    
}
.charts{
    display:flex;
    flex-wrap: wrap;
}

#donutchart
{
    width: 100%;
    height: 20rem;
}

#pichart{
    width:100%;
    height:20rem;
}

.centerLabel
{
    position: absolute;
    left: 3rem;
    top: 3.7rem;
    width: 256px;
    line-height: 256px;
    text-align: center;
    justify-content:center;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1rem;
    color: maroon;
}
#piechartwork{
    width:100%;
    height:20rem
}

.graphCardMain{
          padding: 10px;
        }
        .OuterCard{
          margin-top: 10px;
          margin-right: 3rem;
          margin-left: 3rem;
        }
        .selectOpt{
          width: 10rem;
        }
        .titleBar{
          height: 3rem;
          display: inline-flex;
          align-items: center;
        }
        .valueGraph{
          font-size: 1.5rem;
          font-weight: bold;
          color: #004b9b;
        }
        .valueMarLeft{
          margin-left: 5px;
        }
        .divMarLeft{
          margin-left: 1rem;
        }


      </style>
</head>

<div style="margin-left: 4.5rem;">
    <div id="check"></div>
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Opportunity Insights</p>
              <div class="d-flex">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <input type="date" name="" class="form-control">
                            <!-- <select class="form-select" name="" id="RejectShiftDate" style="width: 10rem;">
                            </select> -->
                            <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <!-- <select class="form-select" name="" id="RejectShiftDate" style="width: 10rem;">
                            </select> -->
                            <input type="date" name="" class="form-control">
                            <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
                        </div>
                    </div>
              </div>
          </div>
        </nav>      
        <div class="OuterCard graphCardMain" style="margin-top:5rem;">
          <div class="card bodercss" style="width: 80%">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">P & L IMPROVEMENT OPPORTUNITY</p>
              </div>
            </nav> 
            <div class="charts">
                <!-- <div id="donut-chart">
                    <div id="donutchart" style=""></div>
                    <div class="centerLabel">Total</div>
                </div> -->
                <div id="chart"></div>

                <div class="piechart">
                    <canvas id="oilChart" width="500" height="200"></canvas>
                </div>
          </div>
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">MACHINE WISE P & L IMPROVEMENT OPPORTUNITY</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div> -->
                  </div>
              </div>
            </nav> 
              <div class="divMarLeft">
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="PLTotal"></span></p>
              </div>
              <canvas id="machineWiseInsights" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">OPPORTUNITY TREND</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div> -->
                  </div>
              </div>
            </nav> 
              <div class="divMarLeft">
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="GTotalTrend"></span></p>
              </div>
              <canvas id="OpportunityTrendInsights" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">OPPORTUNITY DRILL DOWN</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div> -->
                  </div>
              </div>
            </nav> 
              <div class="divMarLeft">
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft">3,15,123</span></p>
              </div>
              <canvas id="OpportunityDrillDownInsights" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">PART WISE P & L ANALYSIS</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div> -->
                  </div>
              </div>
            </nav> 
              <div class="divMarLeft">
                <p class="paddingm headTitle">PROFIT / LOSS</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft">3,15,123</span></p>
              </div>
              <canvas id="PartWiseInsights" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    $.ajax({
      url: "<?php echo base_url('Home/getGraph'); ?>",
      type: "POST",
      dataType: "json",
      success:function(res){
        var data = [];
        var Operation = [];
        data.push(res.PLImprovement.Business);
        data.push(res.PLImprovement.Operation);
        Operation.push(res.PLImprovement.Planned);
        Operation.push(res.PLImprovement.Unplanned);
        Operation.push(res.PLImprovement.Performance);
        Operation.push(res.PLImprovement.Quality);
        var options = {
        series: data,
        chart: {
          type: "donut",
        },
        dataLabels: {
          enabled: true,
        //   formatter: function (val, opts) {
        //     return opts.w.config.series[opts.seriesIndex] + " : " + val;
        //   },
        }, 
        plotOptions: {
          pie: {
            startAngle: 0,
            expandOnClick: true,
            offsetX: 0,
            offsetY: 0,
            customScale: 1,
            dataLabels: {
              offset: 0,
              minAngleToShowLabel: 10,
            },
            donut: {
              size: "63%",
              background: "transparent",
              labels: {
                show: true,
                name: {
                  show: true,
                  fontSize: "22px",
                  fontFamily: "Helvetica, Arial, sans-serif",
                  fontWeight: 100,
                  color: undefined,
                  offsetY: -10,
                //   formatter: function (val) {
                //     return val;
                //   },
                },
                value: {
                  show: true,
                  fontSize: "16px",
                  fontFamily: "Helvetica, Arial, sans-serif",
                  fontWeight: 100,
                  color: undefined,
                  offsetY: 16,
                  formatter: function (val) {
                    return val;
                  },
                },
                total: {
                  show: true,
                  showAlways: true,
                  label: "Total",
                  fontSize: "22px",
                  fontFamily: "Helvetica, Arial, sans-serif",
                  fontWeight: 100,
                  color: "#373d3f",
                //   formatter: function (w) {
                //     return w.globals.seriesTotals.reduce((a, b) => {
                //       return a + b;
                //     }, 0);
                //   },
                },
              },
            },
          },
        },
        legend: {
          show: false,
        },
        // responsive: [{
        //     enabled: false,
        //   breakpoint: 980,
        //   options: {
        //     chart: {
        //       width: 500
        //     },
        //     legend: {
        //      show: false
        //     }
        //   }
        // }]
        states: {
          hover: {
            filter: {
              type: "none",
            },
          },
        },
      };
  
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();


      //Pie Chart
      var oilCanvas = document.getElementById("oilChart");
      //Chart.defaults.global.defaultFontFamily = "Lato";
      //Chart.defaults.global.defaultFontSize = 18;
      var oilData = {
          labels: [
              "Planned Downtime",
              "Unplanned Downtime",
              "Performance",
              "Quality",
          ],
          datasets: [
              {
                  data: Operation,
                  backgroundColor: [
                      "#004b9b",
                      "#005dc8",
                      "#057eff",
                      "#cde6ff"
                  ]
              }]
      };
      var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
      });


      var MName = [];
      res.Machine_OEE.forEach(function(item){
        res.Machine_Details.forEach(function(mach){
          if (item.Machine_ID == mach.Machine_Id) {
            MName.push(mach.Machine_Name);
          }

        });               
      });
      //alert(MName);

      //alert(res.PartWise);

      $('#PLTotal').html(res.MachinePL[7]);
      var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
      var x=0;
      var index = 0;
      var PLName = res.MachinePL[res.MachinePL.length - 2];
      var machineTotal = res.MachinePL[res.MachinePL.length - 3];
      var l = res.MachinePL.length - 4;
      for (var i = 0; i <= l; i++) {
        arr = res.MachinePL[i];
        if (x==0) {
          machines = [
            {
              label:"Total" ,
              type: "line",
              backgroundColor: color[x], 
              borderWidth: 1, 
              showLine : false,
              fill: true,
              yAxisID: "axis-time", 
              data:machineTotal,
              pointRadius: 7,
            }           
          ];
        }
        x=x+1;
        machines.push({
          label: PLName[index],
          type: "bar",
          backgroundColor: color[x],
          borderColor: color[x],
          borderWidth: 1,
          fill: true,
          yAxisID: "axis-bar",
          data: arr
        });
        index = index+1;
      }
      var ctx = document.getElementById("machineWiseInsights").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: MName,
          datasets: machines,
      },
      options: {
          tooltips: {
                    enabled:true,
                    mode:"single",
                    backgroundColor: 'white',
                    //drawBorder
                    //borderRadius:10,
                    XAlign: 'center',
                    //fontColor:'red',
                    titleFontColor: '#595959',
                    titleFontSize:14,
                    //titleFontWeight:'bold',
                    bodyFontColor: '#595959',
                    bodyFontSize:13,
                    //bodyFontWeight:'bold',
                    labelFontColor: 'red',
                    footerFontColor: '#bfbfbf',
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    titleSpacing:3,
                    displayColors:false,
                    style: {
                      fontSize: '20px',
                      //fontFamily: undefined
                      //width:'200px'
                    },
                    callbacks:{
                      title:function(tooltipItems,data){
                        return "Machine Name";
                      },
                      afterTitle:function(tooltipItems,data){
                        return "Quality";
                      },
                      label: function(tooltipsitems,data){
                        //var maw= yValues[tooltipsitems.index];
                        return '';
                      },
                      beforeFooter:function(tooltipsitems,data){
                        return '\t\t Opportunity Cost :';
                      },
                      footer:function(tooltipsitems,data){
                        return '\t\t Duration :';
                      }, 
                    },
                  },
          legend: {
            display:false,
          },
          scales: {
            xAxes: [{
              stacked: true,
              gridLines: {
                display: false,
              },
            }],
            yAxes: [{
              stacked: true,
              id: 'axis-bar',
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                display: false
              }
            }, {
              stacked: true,
              id: 'axis-time',
              display: false,
            }]
          },
          
        },
      });





      var production_Cost= [];
      var material_Cost=[];
      var profitLoss = [];
      res.PartWise.forEach(function(item){
        material_Cost.push(item.Material_Cost);
        production_Cost.push(item.Production_Cost);
        profitLoss.push(item.Profit_Loss);
      });
      var partWiseLable = [];
      for (var i =0 ; i < res.PartNI.length; i++) {
        partWiseLable.push(res.PartNI[i].Part_Name);
      }

      var ctx = document.getElementById("PartWiseInsights").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: partWiseLable,
          datasets: [{
            label: "Production Cost",
            type: "bar",
            backgroundColor: "#004b9b",
            borderColor: "#004b9b", 
            borderWidth: 1,
            fill: true,
            yAxisID: "axis-bar",
            data: production_Cost
          },{
            label: "Profit/Loss",
            type: "bar",
            backgroundColor: "#005dc8",
            borderColor: "#005dc8",
            borderWidth: 1,
            fill: true,
            yAxisID: "axis-bar",
            data: profitLoss
          },{
              label:'Material Cost',
              type:'bar',
              backgroundColor:'#cde5ff',
              borderColor:'#cde5ff',
              borderWidth:1,
              fill:true,
              yAxisID:"axis-bar",
              data:material_Cost
          }],
      },
      options: {
          tooltips: {
            displayColors: true,
          },
          scales: {
            xAxes: [{
              stacked: true,
              gridLines: {
                display: false,
              },
            }],
            yAxes: [{
              stacked: true,
              id: 'axis-bar',
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                display: false
              }
            }, {
              stacked: true,
              id: 'axis-time',
              display: false,
            }]
          },
          
        },
      });


      var reasonPer = [];
      var reasonPerLabel = res.ReasonPerformanceLabel;
      res.ReasonPerformance.forEach(function(item){
        reasonPer.push(item.Performance);
      });
      var ctx = document.getElementById("OpportunityDrillDownInsights").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: reasonPerLabel,
          datasets: [{
              label:'Performance',
              type:'bar',
              backgroundColor:'#004b9b',
              borderColor:'#004b9b',
              borderWidth:1,
              fill:true,
              yAxisID:"axis-bar",
              data:reasonPer
          }],
      },
      options: {
          tooltips: {
                    enabled:true,
                    mode:"single",
                    backgroundColor: 'white',
                    //drawBorder
                    //borderRadius:10,
                    XAlign: 'center',
                    //fontColor:'red',
                    titleFontColor: '#595959',
                    titleFontSize:14,
                    //titleFontWeight:'bold',
                    bodyFontColor: '#595959',
                    bodyFontSize:13,
                    //bodyFontWeight:'bold',
                    labelFontColor: 'red',
                    footerFontColor: '#bfbfbf',
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    titleSpacing:3,
                    displayColors:false,
                    style: {
                      fontSize: '20px',
                      //fontFamily: undefined
                      //width:'200px'
                    },
                    callbacks:{
                      title:function(tooltipItems,data){
                        return "Reason Name";
                      },
                      afterTitle:function(tooltipItems,data){
                        return "Performance";
                      },
                      label: function(tooltipsitems,data){
                        //var maw= yValues[tooltipsitems.index];
                        return '';
                      },
                      beforeFooter:function(tooltipsitems,data){
                        return '\t\t Opportunity Cost :';
                      },
                      footer:function(tooltipsitems,data){
                        return '\t\t Duration :';
                      }, 
                    },
                  },
          scales: {
            xAxes: [{
              stacked: true,
              gridLines: {
                display: false,
              },
            }],
            yAxes: [{
              stacked: true,
              id: 'axis-bar',
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                display: false
              }
            }, {
              stacked: true,
              id: 'axis-time',
              display: false,
            }]
          },
          
        },
      });



      },
      error:function(res){
          alert("Sorry!Try Agian!!");
      }
    });


$.ajax({
  url: "<?php echo base_url('Home/OppTrendDay'); ?>",
  type: "POST",
  dataType: "json",
  success:function(res){

    var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
    var LName = ["Business","Planned","Unplanned","Performance","Quality"];
    var x=0;
    var index = 0;
    var total = res[res.length-1];
    var GTotal=0;
    total.forEach(function(t){
      GTotal = GTotal+t;
    });
    $("#GTotalTrend").html(GTotal);
    var l = res.length - 1;
    var mainLable = [];
    var t=0;
    for (var n=0; n<(res[0].length);n++){
      t=t+1;
      mainLable.push(t);
    }
      for (var i = 0; i < l; i++) {
        arr = res[i];
        if (x==0) {
          machines = [
            {
              label:"Total" ,
              type: "line",
              backgroundColor: color[x], 
              borderWidth: 1, 
              showLine : false,
              fill: true,
              yAxisID: "axis-time", 
              data:total,
              pointRadius: 7,
            }           
          ];
        }
        x=x+1;
        machines.push({
          label: LName[index],
          type: "bar",
          backgroundColor: color[x],
          borderColor: color[x],
          borderWidth: 1,
          fill: true,
          yAxisID: "axis-bar",
          data: arr
        });
        index = index+1;
      }

    var ctx = document.getElementById("OpportunityTrendInsights").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: mainLable,
        datasets: machines,
    },
    options: {
        tooltips: {
          displayColors: true,
        },
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              display: false,
            },
          }],
          yAxes: [{
            stacked: true,
            id: 'axis-bar',
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              display: false
            }
          }, {
            stacked: true,
            id: 'axis-time',
            display: false,
          }]
        },
        
      },
    });

  },
  error:function(res){
      alert("Sorry!Try Agian!!");
  }
});





</script>


<script type="text/javascript">
	


	$(document).ready(function(){
		$.ajax({
            url: "<?php echo base_url('Home/getGoalsFinancialData'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
            	$('#ViewOverallTEEP').css('width',''+res[0].Overall_TEEP_Target+'%');
            	$('#ViewOverallOOE').css('width',''+res[0].Overall_OOE_Target+'%');
            	$('#ViewOverallOEE').css('width',''+res[0].Overall_OEE_Target+'%');
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
	});
</script>
