import * as echarts from 'echarts';
import 'echarts-gl';

var myChart = echarts.init(document.getElementById('main'));

const colorMap = {
    'Control': '#FFD700',
    'NLE': '#4DBBD5FF',
    'NSCLC': '#00A087FF',
    'SCLC': '#BC3C2999',
    'treated': '#EE4C9799'
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
$.get('storage/data/result.json').done(function (data) {
    console.log(data.geneinfo);
    myChart.setOption({
        title: {
            text: "The lung cancer aggressive index (LCAI) is: " + data.lcai,
            subtext: 'GEO_genes: ' + data.geneinfo[0].GEO_genes
                + ', merged_genes: ' + data.geneinfo[0].merged_genes
                + ', proportion: ' + data.geneinfo[0].proportion
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
                if (seriesIndex.group === 'control' || seriesIndex.group === 'treated') {
                    return 7
                } else return 5
            },
        }
    });
});
