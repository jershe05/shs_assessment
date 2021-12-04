import Chart from 'chart.js/auto';
import { forEach } from 'lodash';
const bar = (elementId, labels, percentage, colors, type, label) => {

const trybar = document.getElementById(elementId);
  const data = {
    labels:  [label],
    datasets: [
      {
        label: labels['candidate'],
        data: percentage['candidate'],
        backgroundColor: colors[0],
        borderColor: colors[0],
        borderWidth: 1
      },
      {
        label: labels['others'],
        data: percentage['others'],
        backgroundColor: colors[1],
        borderColor: colors[1],
        borderWidth: 1
      }
    ]
  };

  const config = {
    type: type,
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  return new Chart(trybar, config);
}

const pie = (label, percent) => {
  const ctx = document.getElementById('pie');
console.log(percent);
const labels = label;
const data = {
  labels: labels,
  datasets: [{
    label: 'Strand Hot Suggestion',
    data: percent,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(27, 155, 146, 0.2)',
      'rgba(50, 12, 154, 0.2)',
      'rgba(54, 154, 12, 0.2)',
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgba(27, 155, 146)',
      'rgba(50, 12, 154 )',
      'rgba(54, 154, 12)',
    ],
    borderWidth: 1
  }]
};

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  return new Chart(ctx, config);
};

const axios = require('axios');

// Make a request for a user with a given ID
axios.get('strand-result')
  .then(function (response) {
    // handle success
        // pie();
        let label = [];
        let percent = [];
        response.data.forEach(function(item, key) {
            label[key] = item.strand;
            percent[key] = item.percentage;
        });
        pie(label, percent);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });

document.addEventListener('DOMContentLoaded', () => {
    window.livewire.on('test', data => {
        console.log('test');
    });

  window.livewire.on('bar', data => {
        bar(data.elementId, data.labels, data.percentage, data.colors, data.type, data.label);
  });

  window.livewire.on('pie', data => {
        pie(data.elementId, data.labels, data.percentage, data.colors, data.type, data.label);
  });

});

