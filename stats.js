
!function ($) {
    "use strict";

    var Dashboard = function () {};

        //creates Bar chart
        Dashboard.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                gridLineColor: 'rgba(255,255,255,0.1)',
                gridTextColor: '#98a6ad',
                barSizeRatio: 0.2,
                resize: true,
                hideHover: 'auto',
                barColors: lineColors
            });
        },

        //creates area chart
        Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
            Morris.Area({
                element: element,
                pointSize: 0,
                lineWidth: 0,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                resize: true,
                gridLineColor: '#eee',
                hideHover: 'auto',
                lineColors: lineColors,
                fillOpacity: .6,
                behaveLikeLine: true
            });
        },

        //creates Donut chart
        Dashboard.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true,
                colors: colors,
            });
        },

        Dashboard.prototype.init = function () {

            // creating bar chart
            // var $barData = [
            //     {y: '2006', a: 100, b: 90},
            //     {y: '2007', a: 75, b: 65},
            //     {y: '2008', a: 50, b: 40},
            //     {y: '2009', a: 75, b: 65},
            //     {y: '2010', a: 50, b: 40},
            //     {y: '2011', a: 75, b: 65},
            //     {y: '2012', a: 100, b: 90},
            //     {y: '2013', a: 90, b: 75},
            //     {y: '2014', a: 75, b: 65},
            //     {y: '2015', a: 50, b: 40},
            //     {y: '2016', a: 75, b: 65},
            //     {y: '2017', a: 100, b: 90},
            //     {y: '2018', a: 90, b: 75}
            // ];
            // this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#2f8ee0','#4bbbce']);
            var $barData = evolution_mnt;
            this.createBarChart('morris-bar-example', $barData, 'annee', ['mnt_total', 'nbr_sub'], ['Montant', 'Nombre sub'], ['#2f8ee0', '#4bbbce']);

            //creating area chart
            var $areaData = evolution_ent;
            this.createAreaChart('morris-area-example', 0, 0, $areaData, 'Annee', ['NbRecrutement', 'pourcentage_invst'], ['Recrutement', 'Inv Vert'], ['#2f8ee0', '#4bbbce']);

            var $donutData = stat_actions_financer;
            this.createDonutChart('morris-donut-example', $donutData, ['#2f8ee0', '#4bbbce']);
        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);