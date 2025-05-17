<template>
  <div class="dashboard">
    <div class="grid-container">
      <!-- Absenteeism Rate -->
      <div class="card">
        <h2>Taux d'absentéisme</h2>
        <div class="circle-progress">
          <svg width="150" height="150" viewBox="0 0 150 150">
            <circle
              cx="75"
              cy="75"
              r="60"
              fill="none"
              stroke="#f0f0f0"
              stroke-width="12"
            />
            <circle
              cx="75"
              cy="75"
              r="60"
              fill="none"
              stroke="#3b82f6"
              stroke-width="12"
              stroke-dasharray="377"
              :stroke-dashoffset="377 - (377 * absenteeismRate.value) / 100"
              stroke-linecap="round"
              transform="rotate(-90 75 75)"
            />
          </svg>
          <div class="circle-text">
            <span class="percentage">{{ absenteeismRate.display }}</span>
          </div>
        </div>
      </div>

      <!-- Today's Absences - Enhanced with more assistance -->
      <div class="card">
        <h2>Absences du jour</h2>
        <div class="big-number-container">
          <div class="big-number">{{ todayAbsences.current }}</div>
          <div class="absence-context">
            <div class="absence-trend" :class="todayAbsences.trend">
              <svg v-if="todayAbsences.trend === 'increasing'" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 19V5M5 12l7-7 7 7" />
              </svg>
              <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M5 12l7 7 7-7" />
              </svg>
              <span>{{ todayAbsences.change }}</span>
            </div>
            <div class="absence-comparison">vs. hier</div>
          </div>
        </div>
        <div class="absence-details">
          <div class="absence-stat">
            <div class="absence-label">Moyenne hebdo</div>
            <div class="absence-value">{{ todayAbsences.weeklyAvg }}</div>
          </div>
          <div class="absence-stat">
            <div class="absence-label">Taux journalier</div>
            <div class="absence-value">{{ todayAbsences.dailyRate }}</div>
          </div>
        </div>
        <div class="absence-recommendation" v-if="todayAbsences.recommendation">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" />
            <path d="M12 8v4M12 16h.01" />
          </svg>
          <span>{{ todayAbsences.recommendation }}</span>
        </div>
      </div>

      <!-- Weekly Total -->
      <div class="card">
        <h2>Total hebdomadaire</h2>
        <div class="big-number">{{ weeklyTotal }}</div>
        <div class="mini-chart">
          <svg width="150" height="40" viewBox="0 0 150 40">
            <polyline
              fill="none"
              stroke="#3b82f6"
              stroke-width="2"
              :points="weeklyChartPoints"
            />
            <path
              :d="weeklyChartArea"
              fill="rgba(59, 130, 246, 0.1)"
            />
          </svg>
        </div>
      </div>

      <!-- Active Trainers -->
      <div class="card wide">
        <h2>Formateurs actifs</h2>
        <div class="table">
          <div class="table-header">
            <div class="name-column">Nom</div>
            <div class="value-column">Assisences</div>
          </div>
          <div class="table-row" v-for="trainer in activeTrainers" :key="trainer.id">
            <div class="name-column">{{ trainer.name }}</div>
            <div class="value-column">{{ trainer.sessions }}</div>
          </div>
        </div>
      </div>

      <!-- Absent Students -->
      <div class="card wide">
        <h2>Élèves absents</h2>
        <div class="table">
          <div class="table-header">
            <div class="name-column">Nom</div>
            <div class="value-column">Fréquvence</div>
          </div>
          <div class="table-row" v-for="student in absentStudents" :key="student.id">
            <div class="name-column">{{ student.name }}</div>
            <div class="value-column">{{ student.frequency }}</div>
          </div>
        </div>
      </div>

      <!-- Absence Evolution -->
      <div class="card extra-wide">
        <h2>Évolution des absences</h2>
        <div class="chart-container">
          <svg width="100%" height="200" viewBox="0 0 700 200">
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
              :points="absenceEvolutionPoints"
            />
            
            <!-- Data points -->
            <circle
              v-for="(point, index) in absenceEvolution"
              :key="index"
              :cx="50 + index * 100"
              :cy="200 - point.value * 20"
              r="5"
              fill="#3b82f6"
            />
          </svg>
        </div>
      </div>

      <!-- Untreated Sessions -->
      <div class="card">
        <div class="warning-container">
          <div class="warning-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="10" fill="#FEE2E2" />
              <path d="M12 8v4m0 4h.01" stroke="#EF4444" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div>
            <h2>Séances non traitées</h2>
            <p>{{ untreatedSessions.count }} séances où aucune absence n'a été saisie</p>
          </div>
        </div>
      </div>

      <!-- Export Button -->
      <div class="card">
        <button class="export-button" @click="exportData">
          Exporter les données
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

// State for dashboard data
const absenteeismRate = ref({ value: 3.5, display: '3,5 %' });
const todayAbsences = ref({ current: 5, total: 5, change: '+1', trend: 'increasing' });
const weeklyTotal = ref(23);
const weeklyData = ref([18, 20, 19, 21, 23]);
const activeTrainers = ref([]);
const absentStudents = ref([]);
const absenceEvolution = ref([]);
const untreatedSessions = ref({ count: 3 });
const isLoading = ref(true);
const hasError = ref(false);

// Computed properties for charts
const weeklyChartPoints = computed(() => {
  const data = weeklyData.value;
  const max = Math.max(...data);
  return data.map((value, index) => 
    `${index * (150 / (data.length - 1))},${40 - (value / max) * 35}`
  ).join(' ');
});

const weeklyChartArea = computed(() => {
  const data = weeklyData.value;
  const max = Math.max(...data);
  let points = data.map((value, index) => 
    `${index * (150 / (data.length - 1))},${40 - (value / max) * 35}`
  );
  
  // Add points to close the path
  const lastX = (data.length - 1) * (150 / (data.length - 1));
  return `M0,${40 - (data[0] / max) * 35} ${points.join(' ')} L${lastX},40 L0,40 Z`;
});

const absenceEvolutionPoints = computed(() => {
  return absenceEvolution.value.map((point, index) => 
    `${50 + index * 100},${200 - point.value * 20}`
  ).join(' ');
});

// Fetch data from API with fallback to mock data
const useApiData = ref(true);

async function fetchData() {
  isLoading.value = true;
  hasError.value = false;

  try {
    if (useApiData.value) {
      const response = await fetch('/api/attendance-data');
      if (!response.ok) {
        throw new Error('Failed to fetch data from API');
      }
      const data = await response.json();
      updateDashboardData(data);
    } else {
      useMockData();
    }
  } catch (error) {
    console.error('Error fetching data:', error);
    hasError.value = true;
    useMockData();
  } finally {
    isLoading.value = false;
  }
}

// Update dashboard with data (either from API or mock)
function updateDashboardData(data) {
  absenteeismRate.value = data.absenteeismRate || { value: 3.5, display: '3,5 %' };
  todayAbsences.value = data.todayAbsences || { 
    current: 5, 
    total: 5, 
    change: '+1', 
    trend: 'increasing',
    weeklyAvg: '4.2',
    dailyRate: '3.8%',
    recommendation: 'Le taux d\'absence est supérieur à la moyenne. Vérifiez les absences récurrentes.'
  };
  weeklyTotal.value = data.weeklyTotal || 23;
  weeklyData.value = data.weeklyData || [18, 20, 19, 21, 23];
  activeTrainers.value = data.activeTrainers || [];
  absentStudents.value = data.absentStudents || [];
  absenceEvolution.value = data.absenceEvolution || [];
  untreatedSessions.value = data.untreatedSessions || { count: 3 };
}

// Use mock data when API fails
function useMockData() {
  const mockData = {
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
  
  updateDashboardData(mockData);
}

// Export data function
function exportData() {
  // In a real application, this would generate a CSV or Excel file
  alert('Exportation des données en cours...');
  
  // Example of how you might implement this
  const data = {
    absenteeismRate: absenteeismRate.value,
    todayAbsences: todayAbsences.value,
    weeklyTotal: weeklyTotal.value,
    activeTrainers: activeTrainers.value,
    absentStudents: absentStudents.value,
    absenceEvolution: absenceEvolution.value
  };
  
  console.log('Data to export:', data);
  // Here you would convert to CSV and trigger download
}

// Fetch data on component mount
onMounted(() => {
  fetchData();
});
</script>

<style>
.dashboard {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  background-color: #f5f5f7;
  padding: 20px;
  min-height: 100vh;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.card {
  background-color: white;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  display: flex;
  flex-direction: column;
}

.wide {
  grid-column: span 1;
}

.extra-wide {
  grid-column: span 2;
}

h2 {
  font-size: 18px;
  font-weight: 600;
  margin-top: 0;
  margin-bottom: 16px;
  color: #111827;
}

.circle-progress {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
}

.circle-text {
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.percentage {
  font-size: 24px;
  font-weight: 700;
}

.big-number-container {
  display: flex;
  justify-content: space-between;
  margin-top: auto;
}

.big-number {
  font-size: 48px;
  font-weight: 700;
  margin-top: auto;
  color: #111827;
}

.change {
  font-size: 14px;
  color: #10b981;
  margin-top: 8px;
  text-align: right;
}

.mini-chart {
  margin-top: auto;
  height: 40px;
}

.table {
  width: 100%;
}

.table-header {
  display: flex;
  justify-content: space-between;
  font-size: 14px;
  color: #6b7280;
  margin-bottom: 12px;
  font-weight: 500;
}

.table-row {
  display: flex;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px solid #f3f4f6;
}

.name-column {
  flex: 1;
}

.value-column {
  width: 80px;
  text-align: right;
  font-weight: 500;
}

.chart-container {
  height: 200px;
  margin-top: auto;
}

.chart-text {
  font-size: 12px;
  fill: #9ca3af;
}

.warning-container {
  display: flex;
  align-items: flex-start;
  gap: 12px;
}

.warning-icon {
  flex-shrink: 0;
}

.export-button {
  background-color: #3b82f6;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 16px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  width: 100%;
  margin-top: auto;
  transition: background-color 0.2s;
}

.export-button:hover {
  background-color: #2563eb;
}

@media (max-width: 1024px) {
  .grid-container {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .extra-wide {
    grid-column: span 2;
  }
}

@media (max-width: 640px) {
  .grid-container {
    grid-template-columns: 1fr;
  }
  
  .wide, .extra-wide {
    grid-column: span 1;
  }
}

.absence-context {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-end;
}

.absence-trend {
  display: flex;
  align-items: center;
  gap: 4px;
  font-weight: 500;
  font-size: 16px;
}

.absence-trend.increasing {
  color: #ef4444;
}

.absence-trend.decreasing, .absence-trend.stable {
  color: #10b981;
}

.absence-comparison {
  font-size: 12px;
  color: #6b7280;
}

.absence-details {
  display: flex;
  justify-content: space-between;
  margin-top: 16px;
  padding-top: 16px;
  border-top: 1px solid #f3f4f6;
}

.absence-stat {
  display: flex;
  flex-direction: column;
}

.absence-label {
  font-size: 12px;
  color: #6b7280;
}

.absence-value {
  font-weight: 500;
  font-size: 14px;
  margin-top: 4px;
}

.absence-recommendation {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 16px;
  padding: 12px;
  background-color: #f9fafb;
  border-radius: 8px;
  font-size: 13px;
  color: #4b5563;
}

.absence-recommendation svg {
  color: #3b82f6;
  flex-shrink: 0;
}
</style>