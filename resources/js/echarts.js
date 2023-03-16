import * as echarts from 'echarts';
import 'echarts-gl';

const myChart = echarts.init(document.getElementById('main'));


let preSetOption = {

    grid3D: {},
    xAxis3D: {type: 'value', max: 100},
    yAxis3D: {type: 'value', max: 100},
    zAxis3D: {type: 'value', max: 100},

    visualMap: {
        calculable: true,
        max: 100,
        dimension: 'x',
        // 维度的名字默认就是表头的属性名
        inRange: {
            color: [
                "#313695",
                "#4575b4",
                "#74add1",
                "#abd9e9",
                "#e0f3f8",
                "#ffffbf",
                "#fee090",
                "#fdae61",
                "#f46d43",
                "#d73027",
                "#a50026"]
        }
    },

    series: [
        {
            type: 'scatter3D',
            symbolSize: 6,
            encode: {
                x: 'X',
                y: 'Y',
                z: 'Z',
            },
        },
    ],
    dataset: {
        source: getRandomLine(300)
    }

}
myChart.setOption(preSetOption);

// duel with data uploaded asynchronously
function buildEcharts(dataPath) {
    $.get(dataPath).done(function (data) {

        let afterOption = {
            dataset: {
                source: getRandomLine(300)
            }
        }

        myChart.setOption(afterOption)
        myChart.hideLoading();
    })
}


function getRandomLine(n) {
    let res = [];
    for (var i = 0; i < n; i++) {
        res.push([
            Math.floor((Math.random() * 100) + 1),
            Math.floor((Math.random() * 100) + 1),
            Math.floor((Math.random() * 100) + 1)
        ])
    }
    return res

}
