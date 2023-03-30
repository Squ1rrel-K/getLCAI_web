import * as echarts from 'echarts';
import 'echarts-gl';

var myChart = echarts.init(document.getElementById('main'));

const colorMap = {
    'Control': '#FF8C00',
    'NLE': '#4DBBD5FF',
    'NSCLC': '#2E8B57',
    'SCLC': '#8B008B',
    'treated': '#FF0000'
};

let option = {
    grid3D: {},
    xAxis3D: {type: 'value'},
    yAxis3D: {type: 'value'},
    zAxis3D: {type: 'value'},

    series: [
        {
            type: 'scatter3D',
        },
    ],

}

myChart.setOption(option);

/**
 * callback strategy is used to find specific group index for each series, which is unrecommended.
 */

$.get(document.getElementById('echartsScript').getAttribute('data')).done(function (data) {
    console.log(sessionStorage.getItem("json"));
    console.log(document.getElementById('echartsScript'));
    myChart.setOption({
        title: {
            text: "The lung cancer aggressive index (LCAI) is: " + data.lcai,
            subtext: 'GEO_genes: ' + data.geneinfo[0].GEO_genes
                + '\nmerged_genes: ' + data.geneinfo[0].merged_genes
                + '\nproportion: ' + data.geneinfo[0].proportion
        },
        dataset: {
            dimensions: [
                'PC1',
                'PC2',
                'PC3'
            ],

            source: data.pheno,
        },

        series: {
            itemStyle: {
                color: function (seriesIndex) {
                    return (colorMap[seriesIndex.value.group]);
                },
            },

            symbolSize: function (seriesIndex) {
                if (seriesIndex.group === 'Control' || seriesIndex.group === 'treated') {
                    return 15
                } else return 6
            },
        }
    });
});
