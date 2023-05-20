
    
(async function() {
  const data =_data
  console.log(data);

  new Chart(
    document.getElementById('acquisitions'),
    {
      type: 'bar',
      data: {
        labels: data.map(row => row.months),
        datasets: [
          {
            label: 'Biểu đồ theo tháng',
            data: data.map(row => row.sum),
          }
        ]
      }
    }
  );
})();
