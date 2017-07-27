var ctxPie = $("#pieChart");
data = {
  datasets: [{
  // These labels appear in the legend and in the tooltips when hovering different arcs
    data: [$("#pie-data").data('todo'), $('#pie-data').data('done')],
    backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)'
    ]
  }],

  labels: [
   '未完成',
   '已完成'
  ]
};
var myPieChart = new Chart(ctxPie,{
  type: 'pie',
  data: data,
  options: {
    resonsive: true,
    title:{
      display: true,
      text: '所有任务的完成比例（总数:'+$("#pie-data").data('total')+'）'
    },
    legend:{
      display:false
    }
  }
});
