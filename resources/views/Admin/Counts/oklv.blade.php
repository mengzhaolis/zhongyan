@include('Admin.common._meta')
<html style="height: 100%">
   <head>
       <meta charset="utf-8">
   </head>
   <body style="height: 100%; margin: 0">
       <div class="text-c"> 
		<span class="select-box" style="margin-left:3px;width:200px;">
        <select class="select" id="sel_Sub" name="id">
            <option value="0">选择销售人员</option>
            
        </select>
    </span>
		
	</div>
       <div id="container" style="height: 100%"></div>
       <script type="text/javascript" src="/echarts.min.js"></script>
       
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title: {
        text: '中研世纪销售情况',
        // subtext: '纯属虚构'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['总数','成交','成交率']
    },
    toolbox: {
        show: true,
        feature: {
            magicType: {show: true, type: ['stack', 'tiled']},
            saveAsImage: {show: true}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五']
    },
    yAxis: {
        type: 'value',

    },
    series: [{
        name: '成交率',
        type: 'line',
        smooth: true,
        data: [10, 12, 21, 20, 20]
    },
    {
        name: '成交',
        type: 'line',
        smooth: true,
        data: [12, 12, 14, 15, 30]
    },
    {
        name: '总数',
        type: 'line',
        smooth: true,
        data: [10, 11, 11, 23, 12]
    }]
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>