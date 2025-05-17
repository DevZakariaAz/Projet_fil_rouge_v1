document.addEventListener('DOMContentLoaded', function() {
  // Initialize the dashboard
  fetchData();

  // Add event listener for export button
  document.getElementById('export-button').addEventListener('click', exportData);
});

// Fetch data from API with fallback to mock data
async function fetchData() {
  try {
    const response = await fetch('/api/attendance-data');
    if (!response.ok) {
      throw new Error('Failed to fetch data from API');
    }
    const data = await response.json();
    updateDashboardData(data);
  } catch (error) {
    console.error('Error fetching data:', error);
    updateDashboardData(null); // Pass null to indicate API failure
  }
}

// Update dashboard with data (either from API or mock)
function updateDashboardData(data) {
  const dataSource = data || getMockData(); // Use mock data if API data is null

  // Update absenteeism rate
  updateAbsenteeismRate(dataSource.absenteeismRate || { value: 3.5, display: '3,5 %' });
  
  // Update today's absences
  updateTodayAbsences(dataSource.todayAbsences || { 
    current: 5, 
    total: 5, 
    change: '+1', 
    trend: 'increasing',
    weeklyAvg: '4.2',
    dailyRate: '3.8%',
    recommendation: 'Le taux d\'absence est supérieur à la moyenne. Vérifiez les absences récurrentes.'
  });
  
  // Update weekly total
  updateWeeklyTotal(dataSource.weeklyTotal || 23, dataSource.weeklyData || [18, 20, 19, 21, 23]);
  
  // Update active trainers
  updateActiveTrainers(dataSource.activeTrainers || [
    { id: 1, name: 'Pierre Durand', sessions: 8 },
    { id: 2, name: 'Sophie Martin', sessions: 6 },
    { id: 3, name: 'Antoine Lefevre', sessions: 5 },
    { id: 4, name: 'Julie Bernard', sessions: 4 }
  ]);
  
  // Update absent students
  updateAbsentStudents(dataSource.absentStudents || [
    { id: 1, name: 'Lucas Fournier', frequency: 6 },
    { id: 2, name: 'Emma Dubois', frequency: 5 },
    { id: 3, name: 'Léa Lefevre', frequency: 4 },
    { id: 4, name: 'Hugo Morel', frequency: 3 }
  ]);
  
  // Update absence evolution
  updateAbsenceEvolution(dataSource.absenceEvolution || [
    { day: 5, value: 5.5 },
    { day: 10, value: 7 },
    { day: 15, value: 5.7 },
    { day: 20, value: 7 },
    { day: 25, value: 8.7 },
    { day: 30, value: 7.5 }
  ]);
  
  // Update untreated sessions
  updateUntreatedSessions(dataSource.untreatedSessions || { count: 3 });
}

// Use mock data when API fails
function getMockData() {
  return {
    absenteeismRate: { value: 3.5, display: '3,5 %' },
    todayAbsences: { 
      current: 5, 
      total: 5, 
      change: '+1', 
      trend: 'increasing',
      weeklyAvg: '4.2',
      dailyRate: '3.8%',
      recommendation: 'Le taux d\'absence est supérieur à la moyenne. Vérifiez les absences récurrentes.'
    },
    weeklyTotal: 23,
    weeklyData: [18, 20, 19, 21, 23],
    activeTrainers: [
      { id: 1, name: 'Pierre Durand', sessions: 8 },
      { id: 2, name: 'Sophie Martin', sessions: 6 },
      { id: 3, name: 'Antoine Lefevre', sessions: 5 },
      { id: 4, name: 'Julie Bernard', sessions: 4 }
    ],
    absentStudents: [
      { id: 1, name: 'Lucas Fournier', frequency: 6 },
      { id: 2, name: 'Emma Dubois', frequency: 5 },
      { id: 3, name: 'Léa Lefevre', frequency: 4 },
      { id: 4, name: 'Hugo Morel', frequency: 3 }
    ],
    absenceEvolution: [
      { day: 5, value: 5.5 },
      { day: 10, value: 7 },
      { day: 15, value: 5.7 },
      { day: 20, value: 7 },
      { day: 25, value: 8.7 },
      { day: 30, value: 7.5 }
    ],
    untreatedSessions: { count: 3 }
  };
}

// Update absenteeism rate
function updateAbsenteeismRate(data) {
  const progressCircle = document.getElementById('progress-circle');
  const percentageText = document.getElementById('percentage');
  
  // Update the circle progress
  const circumference = 2 * Math.PI * 60; // 2πr where r=60
  const offset = circumference - (circumference * data.value) / 100;
  progressCircle.setAttribute('stroke-dasharray', circumference);
  progressCircle.setAttribute('stroke-dashoffset', offset);
  
  // Update the percentage text
  percentageText.textContent = data.display;
}

// Update today's absences
function updateTodayAbsences(data) {
  document.getElementById('today-absences').textContent = data.current;
  document.getElementById('absence-change').textContent = data.change;
  document.getElementById('weekly-avg').textContent = data.weeklyAvg;
  document.getElementById('daily-rate').textContent = data.dailyRate;
  
  const trendElement = document.getElementById('absence-trend');
  
  // Update trend icon and class
  if (data.trend === 'increasing') {
    trendElement.className = 'absence-trend increasing';
    trendElement.innerHTML = `
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 19V5M5 12l7-7 7 7" />
      </svg>
      <span>${data.change}</span>
    `;
  } else {
    trendElement.className = 'absence-trend decreasing';
    trendElement.innerHTML = `
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 5v14M5 12l7 7 7-7" />
      </svg>
      <span>${data.change}</span>
    `;
  }
  
  // Update recommendation
  const recommendationElement = document.getElementById('absence-recommendation');
  if (data.recommendation) {
    recommendationElement.style.display = 'flex';
    recommendationElement.querySelector('span').textContent = data.recommendation;
  } else {
    recommendationElement.style.display = 'none';
  }
}

// Update weekly total
function updateWeeklyTotal(total, weeklyData) {
  document.getElementById('weekly-total').textContent = total;
  
  // Update the mini chart
  const chartSvg = document.getElementById('weekly-chart');
  const max = Math.max(...weeklyData);
  
  // Generate points for the polyline
  const points = weeklyData.map((value, index) => {
    const x = index * (150 / (weeklyData.length - 1));
    const y = 40 - (value / max) * 35;
    return `${x},${y}`;
  }).join(' ');
  
  // Generate path for the area
  const lastX = (weeklyData.length - 1) * (150 / (weeklyData.length - 1));
  const areaPath = `M0,${40 - (weeklyData[0] / max) * 35} ${points} L${lastX},40 L0,40 Z`;
  
  // Update the SVG elements
  chartSvg.innerHTML = `
    <polyline
      fill="none"
      stroke="#3b82f6"
      stroke-width="2"
      points="${points}"
    />
    <path
      d="${areaPath}"
      fill="rgba(59, 130, 246, 0.1)"
    />
  `;
}

// Update active trainers
function updateActiveTrainers(trainers) {
  const container = document.getElementById('active-trainers-list');
  container.innerHTML = '';
  
  trainers.forEach(trainer => {
    const row = document.createElement('div');
    row.className = 'table-row';
    row.innerHTML = `
      <div class="name-column">${trainer.name}</div>
      <div class="value-column">${trainer.sessions}</div>
    `;
    container.appendChild(row);
  });
}

// Update absent students
function updateAbsentStudents(students) {
  const container = document.getElementById('absent-students-list');
  container.innerHTML = '';
  
  students.forEach(student => {
    const row = document.createElement('div');
    row.className = 'table-row';
    row.innerHTML = `
      <div class="name-column">${student.name}</div>
      <div class="value-column">${student.frequency}</div>
    `;
    container.appendChild(row);
  });
}

// Update absence evolution
function updateAbsenceEvolution(data) {
  const chartSvg = document.getElementById('evolution-chart');
  
  // Generate points for the polyline
  const points = data.map((point, index) => {
    return `${50 + index * 100},${200 - point.value * 20}`;
  }).join(' ');
  
  // Create the line and points
  let chartContent = `
    <!-- Y-axis labels -->
    <text x="10" y="20" class="chart-text">10</text>
    <text x="10" y="80" class="chart-text">8</text>
    <text x="10" y="140" class="chart-text">6</text>
    <text x="10" y="200" class="chart-text">0</text>
    
    <!-- X-axis labels -->
    <text x="50" y="220" class="chart-text">5</text>
    <text x="150" y="220" class="chart-text">10</text>
    <text x="250" y="220" class="chart-text">15</text>
    <text x="350" y="220" class="chart-text">20</text>
    <text x="450" y="220" class="chart-text">25</text>
    
    <!-- Chart line -->
    <polyline
      fill="none"
      stroke="#3b82f6"
      stroke-width="3"
      points="${points}"
    />
  `;
  
  // Add data points
  data.forEach((point, index) => {
    chartContent += `
      <circle
        cx="${50 + index * 100}"
        cy="${200 - point.value * 20}"
        r="5"
        fill="#3b82f6"
      />
    `;
  });
  
  chartSvg.innerHTML = chartContent;
}

// Update untreated sessions
function updateUntreatedSessions(data) {
  document.getElementById('untreated-count').textContent = data.count;
}

// Export data function
function exportData() {
  // In a real application, this would generate a CSV or Excel file
  alert('Exportation des données en cours...');
  
  // Example of how you might implement this
  const data = {
    absenteeismRate: { value: 3.5, display: '3,5 %' },
    todayAbsences: { 
      current: 5, 
      total: 5, 
      change: '+1', 
      trend: 'increasing',
      weeklyAvg: '4.2',
      dailyRate: '3.8%'
    },
    weeklyTotal: 23,
    activeTrainers: [
      { id: 1, name: 'Pierre Durand', sessions: 8 },
      { id: 2, name: 'Sophie Martin', sessions: 6 },
      { id: 3, name: 'Antoine Lefevre', sessions: 5 },
      { id: 4, name: 'Julie Bernard', sessions: 4 }
    ],
    absentStudents: [
      { id: 1, name: 'Lucas Fournier', frequency: 6 },
      { id: 2, name: 'Emma Dubois', frequency: 5 },
      { id: 3, name: 'Léa Lefevre', frequency: 4 },
      { id: 4, name: 'Hugo Morel', frequency: 3 }
    ],
    absenceEvolution: [
      { day: 5, value: 5.5 },
      { day: 10, value: 7 },
      { day: 15, value: 5.7 },
      { day: 20, value: 7 },
      { day: 25, value: 8.7 },
      { day: 30, value: 7.5 }
    ]
  };
  
  console.log('Data to export:', data);
  
  // Here's how you might create and download a CSV file
  // This is a simplified example - in a real app you'd want to use a library
  let csvContent = "data:text/csv;charset=utf-8,";
  
  // Add headers
  csvContent += "Category,Value\n";
  
  // Add data rows
  csvContent += `Taux d'absentéisme,${data.absenteeismRate.value}%\n`;
  csvContent += `Absences du jour,${data.todayAbsences.current}\n`;
  csvContent += `Total hebdomadaire,${data.weeklyTotal}\n`;
  
  // Encode and create download link
  const encodedUri = encodeURI(csvContent);
  const link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", "dashboard_export.csv");
  document.body.appendChild(link);
  
  // Simulate click to download
  // link.click(); // Commented out to prevent actual download in this example
  
  // Clean up
  document.body.removeChild(link);
}