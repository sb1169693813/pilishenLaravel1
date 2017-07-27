var ctxBar = document.getElementById("barChart");
var databar = {
     labels: $("#bar-data").data('projectname'),
     datasets: [
       {
         data: $("#bar-data").data('projects'),
         backgroundColor: 'rgba(255, 99, 132, 0.2)',
         borderColor:'rgba(255,99,132,1)',
         borderWidth: 1,
     }
   ]
};
var myBarChart = new Chart(ctxBar, {
  type: 'bar',
  data:databar,
  options: {
    resonsive: true,
    title:{
      display: true,
      text: '所有任务的完成比例（总数: '+$("#bar-data").data('total')+'）'
    },
    legend:{
      display:false
    }
  }
});
