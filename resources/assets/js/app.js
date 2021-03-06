
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

console.log(1232131);

var $visitChart = $('#visitChart');

if ($visitChart.length) {
    $.ajax('/visit-data').done(function(data) {
        var chartContainer = document.getElementById("visitChart"),
            visitChart = new Chart(chartContainer, {
                type: 'bar',
                data: {
                    labels: data.visitDataKeys,
                    datasets: [{
                        label: '# of Visits',
                        data: data.visitDataValues
                    }]
                }
            });
    });
}
