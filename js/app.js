/*!
 *
 * Angle - Bootstrap Admin App + jQuery
 *
 * Version: 3.8.5
 * Author: @themicon_co
 * Website: http://themicon.co
 * License: https://wrapbootstrap.com/help/licenses
 *
 */
! function(e, t, o, a) {
    if (void 0 === o) throw new Error("This application's JavaScript requires jQuery");
    o.localStorage = Storages.localStorage, o(function() {
        var e = o("body");
        (new StateToggler).restoreState(e), o("#chk-fixed").prop("checked", e.hasClass("layout-fixed")), o("#chk-collapsed").prop("checked", e.hasClass("aside-collapsed")), o("#chk-collapsed-text").prop("checked", e.hasClass("aside-collapsed-text")), o("#chk-boxed").prop("checked", e.hasClass("layout-boxed")), o("#chk-float").prop("checked", e.hasClass("aside-float")), o("#chk-hover").prop("checked", e.hasClass("aside-hover")), o(".offsidebar.d-none").removeClass("d-none"), o.ajaxPrefilter(function(e, t, o) {
            e.async = !0
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        if (o.fn.knob) {
            var e = {
                width: "50%",
                displayInput: !0,
                fgColor: APP_COLORS.info
            };
            o("#knob-chart1").knob(e);
            var t = {
                width: "50%",
                displayInput: !0,
                fgColor: APP_COLORS.purple,
                readOnly: !0
            };
            o("#knob-chart2").knob(t);
            var a = {
                width: "50%",
                displayInput: !0,
                fgColor: APP_COLORS.info,
                bgColor: APP_COLORS.gray,
                angleOffset: -125,
                angleArc: 250
            };
            o("#knob-chart3").knob(a);
            var n = {
                width: "50%",
                displayInput: !0,
                fgColor: APP_COLORS.pink,
                displayPrevious: !0,
                thickness: .1,
                lineCap: "round"
            };
            o("#knob-chart4").knob(n)
        }
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    (0, window.jQuery)(function() {
        if ("undefined" != typeof Chart) {
            var e = function() {
                    return Math.round(100 * Math.random())
                },
                o = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: "rgba(114,102,186,0.2)",
                        borderColor: "rgba(114,102,186,1)",
                        pointBorderColor: "#fff",
                        data: [e(), e(), e(), e(), e(), e(), e()]
                    }, {
                        label: "My Second dataset",
                        backgroundColor: "rgba(35,183,229,0.2)",
                        borderColor: "rgba(35,183,229,1)",
                        pointBorderColor: "#fff",
                        data: [e(), e(), e(), e(), e(), e(), e()]
                    }]
                },
                a = t.getElementById("chartjs-linechart").getContext("2d"),
                n = (new Chart(a, {
                    data: o,
                    type: "line",
                    options: {
                        legend: {
                            display: !1
                        }
                    }
                }), {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        backgroundColor: "#23b7e5",
                        borderColor: "#23b7e5",
                        data: [e(), e(), e(), e(), e(), e(), e()]
                    }, {
                        backgroundColor: "#5d9cec",
                        borderColor: "#5d9cec",
                        data: [e(), e(), e(), e(), e(), e(), e()]
                    }]
                }),
                r = t.getElementById("chartjs-barchart").getContext("2d"),
                i = (new Chart(r, {
                    data: n,
                    type: "bar",
                    options: {
                        legend: {
                            display: !1
                        }
                    }
                }), t.getElementById("chartjs-doughnutchart").getContext("2d")),
                l = (new Chart(i, {
                    data: {
                        labels: ["Purple", "Yellow", "Blue"],
                        datasets: [{
                            data: [300, 50, 100],
                            backgroundColor: ["#7266ba", "#fad732", "#23b7e5"],
                            hoverBackgroundColor: ["#7266ba", "#fad732", "#23b7e5"]
                        }]
                    },
                    type: "doughnut",
                    options: {
                        legend: {
                            display: !1
                        }
                    }
                }), t.getElementById("chartjs-piechart").getContext("2d")),
                s = (new Chart(l, {
                    data: {
                        labels: ["Purple", "Yellow", "Blue"],
                        datasets: [{
                            data: [300, 50, 100],
                            backgroundColor: ["#7266ba", "#fad732", "#23b7e5"],
                            hoverBackgroundColor: ["#7266ba", "#fad732", "#23b7e5"]
                        }]
                    },
                    type: "pie",
                    options: {
                        legend: {
                            display: !1
                        }
                    }
                }), t.getElementById("chartjs-polarchart").getContext("2d")),
                c = (new Chart(s, {
                    data: {
                        datasets: [{
                            data: [11, 16, 7, 3],
                            backgroundColor: ["#f532e5", "#7266ba", "#f532e5", "#7266ba"],
                            label: "My dataset"
                        }],
                        labels: ["Label 1", "Label 2", "Label 3", "Label 4"]
                    },
                    type: "polarArea",
                    options: {
                        legend: {
                            display: !1
                        }
                    }
                }), t.getElementById("chartjs-radarchart").getContext("2d"));
            new Chart(c, {
                data: {
                    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: "rgba(114,102,186,0.2)",
                        borderColor: "rgba(114,102,186,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    }, {
                        label: "My Second dataset",
                        backgroundColor: "rgba(151,187,205,0.2)",
                        borderColor: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }]
                },
                type: "radar",
                options: {
                    legend: {
                        display: !1
                    }
                }
            })
        }
    })
}(window, document),
function(e, t, o, a) {
    (0, window.jQuery)(function() {
        if ("undefined" != typeof Chartist) {
            new Chartist.Bar("#ct-bar1", {
                labels: ["W1", "W2", "W3", "W4", "W5", "W6", "W7", "W8", "W9", "W10"],
                series: [
                    [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
                ]
            }, {
                high: 10,
                low: -10,
                height: 280,
                axisX: {
                    labelInterpolationFnc: function(e, t) {
                        return t % 2 == 0 ? e : null
                    }
                }
            }), new Chartist.Bar("#ct-bar2", {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                series: [
                    [5, 4, 3, 7, 5, 10, 3],
                    [3, 2, 9, 5, 4, 6, 4]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: !0,
                horizontalBars: !0,
                height: 280,
                axisY: {
                    offset: 70
                }
            }), new Chartist.Line("#ct-line1", {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                series: [
                    [12, 9, 7, 8, 5],
                    [2, 1, 3.5, 7, 3],
                    [1, 3, 4, 5, 6]
                ]
            }, {
                fullWidth: !0,
                height: 280,
                chartPadding: {
                    right: 40
                }
            }), new Chartist.Line("#ct-line3", {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                series: [
                    [1, 5, 2, 5, 4, 3],
                    [2, 3, 4, 8, 1, 2],
                    [5, 4, 3, 2, 1, .5]
                ]
            }, {
                low: 0,
                showArea: !0,
                showPoint: !1,
                fullWidth: !0,
                height: 300
            }).on("draw", function(e) {
                "line" !== e.type && "area" !== e.type || e.element.animate({
                    d: {
                        begin: 2e3 * e.index,
                        dur: 2e3,
                        from: e.path.clone().scale(1, 0).translate(0, e.chartRect.height()).stringify(),
                        to: e.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                })
            });
            var t = new Chartist.Line("#ct-line2", {
                    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                    series: [
                        [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
                        [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
                        [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
                        [3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
                    ]
                }, {
                    low: 0,
                    height: 300
                }),
                o = 0,
                a = 500;
            t.on("created", function() {
                o = 0
            }), t.on("draw", function(e) {
                if (o++, "line" === e.type) e.element.animate({
                    opacity: {
                        begin: 80 * o + 1e3,
                        dur: a,
                        from: 0,
                        to: 1
                    }
                });
                else if ("label" === e.type && "x" === e.axis) e.element.animate({
                    y: {
                        begin: 80 * o,
                        dur: a,
                        from: e.y + 100,
                        to: e.y,
                        easing: "easeOutQuart"
                    }
                });
                else if ("label" === e.type && "y" === e.axis) e.element.animate({
                    x: {
                        begin: 80 * o,
                        dur: a,
                        from: e.x - 100,
                        to: e.x,
                        easing: "easeOutQuart"
                    }
                });
                else if ("point" === e.type) e.element.animate({
                    x1: {
                        begin: 80 * o,
                        dur: a,
                        from: e.x - 10,
                        to: e.x,
                        easing: "easeOutQuart"
                    },
                    x2: {
                        begin: 80 * o,
                        dur: a,
                        from: e.x - 10,
                        to: e.x,
                        easing: "easeOutQuart"
                    },
                    opacity: {
                        begin: 80 * o,
                        dur: a,
                        from: 0,
                        to: 1,
                        easing: "easeOutQuart"
                    }
                });
                else if ("grid" === e.type) {
                    var t = {
                            begin: 80 * o,
                            dur: a,
                            from: e[e.axis.units.pos + "1"] - 30,
                            to: e[e.axis.units.pos + "1"],
                            easing: "easeOutQuart"
                        },
                        n = {
                            begin: 80 * o,
                            dur: a,
                            from: e[e.axis.units.pos + "2"] - 100,
                            to: e[e.axis.units.pos + "2"],
                            easing: "easeOutQuart"
                        },
                        r = {};
                    r[e.axis.units.pos + "1"] = t, r[e.axis.units.pos + "2"] = n, r.opacity = {
                        begin: 80 * o,
                        dur: a,
                        from: 0,
                        to: 1,
                        easing: "easeOutQuart"
                    }, e.element.animate(r)
                }
            }), t.on("created", function() {
                e.__exampleAnimateTimeout && (clearTimeout(e.__exampleAnimateTimeout), e.__exampleAnimateTimeout = null), e.__exampleAnimateTimeout = setTimeout(t.update.bind(t), 12e3)
            })
        }
    })
}(window, document),
function(e, t, o, a) {
    o(function() {
        if (o.fn.easyPieChart) {
            o("[data-easypiechart]").each(function() {
                var e = o(this),
                    t = e.data();
                e.easyPieChart(t || {})
            });
            var e = {
                animate: {
                    duration: 800,
                    enabled: !0
                },
                barColor: APP_COLORS.success,
                trackColor: !1,
                scaleColor: !1,
                lineWidth: 10,
                lineCap: "circle"
            };
            o("#easypie1").easyPieChart(e);
            var t = {
                animate: {
                    duration: 800,
                    enabled: !0
                },
                barColor: APP_COLORS.warning,
                trackColor: !1,
                scaleColor: !1,
                lineWidth: 4,
                lineCap: "circle"
            };
            o("#easypie2").easyPieChart(t);
            var a = {
                animate: {
                    duration: 800,
                    enabled: !0
                },
                barColor: APP_COLORS.danger,
                trackColor: !1,
                scaleColor: APP_COLORS.gray,
                lineWidth: 15,
                lineCap: "circle"
            };
            o("#easypie3").easyPieChart(a);
            var n = {
                animate: {
                    duration: 800,
                    enabled: !0
                },
                barColor: APP_COLORS.danger,
                trackColor: APP_COLORS.yellow,
                scaleColor: APP_COLORS["gray-dark"],
                lineWidth: 15,
                lineCap: "circle"
            };
            o("#easypie4").easyPieChart(n)
        }
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = {
                series: {
                    lines: {
                        show: !1
                    },
                    points: {
                        show: !0,
                        radius: 4
                    },
                    splines: {
                        show: !0,
                        tension: .4,
                        lineWidth: 1,
                        fill: .5
                    }
                },
                grid: {
                    borderColor: "#eee",
                    borderWidth: 1,
                    hoverable: !0,
                    backgroundColor: "#fcfcfc"
                },
                tooltip: !0,
                tooltipOpts: {
                    content: function(e, t, o) {
                        return t + " : " + o
                    }
                },
                xaxis: {
                    tickColor: "#fcfcfc",
                    mode: "categories"
                },
                yaxis: {
                    min: 0,
                    max: 150,
                    tickColor: "#eee",
                    tickFormatter: function(e) {
                        return e
                    }
                },
                shadowSize: 0
            },
            t = o(".chart-spline");
        t.length && o.plot(t, [{
            label: "Uniques",
            color: "#768294",
            data: [
                ["Mar", 70],
                ["Apr", 85],
                ["May", 59],
                ["Jun", 93],
                ["Jul", 66],
                ["Aug", 86],
                ["Sep", 60]
            ]
        }, {
            label: "Recurrent",
            color: "#1f92fe",
            data: [
                ["Mar", 21],
                ["Apr", 12],
                ["May", 27],
                ["Jun", 24],
                ["Jul", 16],
                ["Aug", 39],
                ["Sep", 15]
            ]
        }], e);
        var a = o(".chart-splinev2");
        a.length && o.plot(a, [{
            label: "Hours",
            color: "#23b7e5",
            data: [
                ["Jan", 70],
                ["Feb", 20],
                ["Mar", 70],
                ["Apr", 85],
                ["May", 59],
                ["Jun", 93],
                ["Jul", 66],
                ["Aug", 86],
                ["Sep", 60],
                ["Oct", 60],
                ["Nov", 12],
                ["Dec", 50]
            ]
        }, {
            label: "Commits",
            color: "#7266ba",
            data: [
                ["Jan", 20],
                ["Feb", 70],
                ["Mar", 30],
                ["Apr", 50],
                ["May", 85],
                ["Jun", 43],
                ["Jul", 96],
                ["Aug", 36],
                ["Sep", 80],
                ["Oct", 10],
                ["Nov", 72],
                ["Dec", 31]
            ]
        }], e);
        var n = o(".chart-splinev3");
        n.length && o.plot(n, [{
            label: "Home",
            color: "#1ba3cd",
            data: [
                ["1", 38],
                ["2", 40],
                ["3", 42],
                ["4", 48],
                ["5", 50],
                ["6", 70],
                ["7", 145],
                ["8", 70],
                ["9", 59],
                ["10", 48],
                ["11", 38],
                ["12", 29],
                ["13", 30],
                ["14", 22],
                ["15", 28]
            ]
        }, {
            label: "Overall",
            color: "#3a3f51",
            data: [
                ["1", 16],
                ["2", 18],
                ["3", 17],
                ["4", 16],
                ["5", 30],
                ["6", 110],
                ["7", 19],
                ["8", 18],
                ["9", 110],
                ["10", 19],
                ["11", 16],
                ["12", 10],
                ["13", 20],
                ["14", 10],
                ["15", 20]
            ]
        }], e)
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = o(".chart-area");
        e.length && o.plot(e, [{
            label: "Uniques",
            color: "#aad874",
            data: [
                ["Mar", 50],
                ["Apr", 84],
                ["May", 52],
                ["Jun", 88],
                ["Jul", 69],
                ["Aug", 92],
                ["Sep", 58]
            ]
        }, {
            label: "Recurrent",
            color: "#7dc7df",
            data: [
                ["Mar", 13],
                ["Apr", 44],
                ["May", 44],
                ["Jun", 27],
                ["Jul", 38],
                ["Aug", 11],
                ["Sep", 39]
            ]
        }], {
            series: {
                lines: {
                    show: !0,
                    fill: .8
                },
                points: {
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#eee",
                borderWidth: 1,
                hoverable: !0,
                backgroundColor: "#fcfcfc"
            },
            tooltip: !0,
            tooltipOpts: {
                content: function(e, t, o) {
                    return t + " : " + o
                }
            },
            xaxis: {
                tickColor: "#fcfcfc",
                mode: "categories"
            },
            yaxis: {
                min: 0,
                tickColor: "#eee",
                tickFormatter: function(e) {
                    return e + " visitors"
                }
            },
            shadowSize: 0
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = o(".chart-bar");
        e.length && o.plot(e, [{
            label: "Sales",
            color: "#9cd159",
            data: [
                ["Jan", 27],
                ["Feb", 82],
                ["Mar", 56],
                ["Apr", 14],
                ["May", 28],
                ["Jun", 77],
                ["Jul", 23],
                ["Aug", 49],
                ["Sep", 81],
                ["Oct", 20]
            ]
        }], {
            series: {
                bars: {
                    align: "center",
                    lineWidth: 0,
                    show: !0,
                    barWidth: .6,
                    fill: .9
                }
            },
            grid: {
                borderColor: "#eee",
                borderWidth: 1,
                hoverable: !0,
                backgroundColor: "#fcfcfc"
            },
            tooltip: !0,
            tooltipOpts: {
                content: function(e, t, o) {
                    return t + " : " + o
                }
            },
            xaxis: {
                tickColor: "#fcfcfc",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#eee"
            },
            shadowSize: 0
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = {
                series: {
                    stack: !0,
                    bars: {
                        align: "center",
                        lineWidth: 0,
                        show: !0,
                        barWidth: .6,
                        fill: .9
                    }
                },
                grid: {
                    borderColor: "#eee",
                    borderWidth: 1,
                    hoverable: !0,
                    backgroundColor: "#fcfcfc"
                },
                tooltip: !0,
                tooltipOpts: {
                    content: function(e, t, o) {
                        return t + " : " + o
                    }
                },
                xaxis: {
                    tickColor: "#fcfcfc",
                    mode: "categories"
                },
                yaxis: {
                    tickColor: "#eee"
                },
                shadowSize: 0
            },
            t = o(".chart-bar-stacked");
        t.length && o.plot(t, [{
            label: "Tweets",
            color: "#51bff2",
            data: [
                ["Jan", 56],
                ["Feb", 81],
                ["Mar", 97],
                ["Apr", 44],
                ["May", 24],
                ["Jun", 85],
                ["Jul", 94],
                ["Aug", 78],
                ["Sep", 52],
                ["Oct", 17],
                ["Nov", 90],
                ["Dec", 62]
            ]
        }, {
            label: "Likes",
            color: "#4a8ef1",
            data: [
                ["Jan", 69],
                ["Feb", 135],
                ["Mar", 14],
                ["Apr", 100],
                ["May", 100],
                ["Jun", 62],
                ["Jul", 115],
                ["Aug", 22],
                ["Sep", 104],
                ["Oct", 132],
                ["Nov", 72],
                ["Dec", 61]
            ]
        }, {
            label: "+1",
            color: "#f0693a",
            data: [
                ["Jan", 29],
                ["Feb", 36],
                ["Mar", 47],
                ["Apr", 21],
                ["May", 5],
                ["Jun", 49],
                ["Jul", 37],
                ["Aug", 44],
                ["Sep", 28],
                ["Oct", 9],
                ["Nov", 12],
                ["Dec", 35]
            ]
        }], e);
        var a = o(".chart-bar-stackedv2");
        a.length && o.plot(a, [{
            label: "Pending",
            color: "#9289ca",
            data: [
                ["Pj1", 86],
                ["Pj2", 136],
                ["Pj3", 97],
                ["Pj4", 110],
                ["Pj5", 62],
                ["Pj6", 85],
                ["Pj7", 115],
                ["Pj8", 78],
                ["Pj9", 104],
                ["Pj10", 82],
                ["Pj11", 97],
                ["Pj12", 110],
                ["Pj13", 62]
            ]
        }, {
            label: "Assigned",
            color: "#7266ba",
            data: [
                ["Pj1", 49],
                ["Pj2", 81],
                ["Pj3", 47],
                ["Pj4", 44],
                ["Pj5", 100],
                ["Pj6", 49],
                ["Pj7", 94],
                ["Pj8", 44],
                ["Pj9", 52],
                ["Pj10", 17],
                ["Pj11", 47],
                ["Pj12", 44],
                ["Pj13", 100]
            ]
        }, {
            label: "Completed",
            color: "#564aa3",
            data: [
                ["Pj1", 29],
                ["Pj2", 56],
                ["Pj3", 14],
                ["Pj4", 21],
                ["Pj5", 5],
                ["Pj6", 24],
                ["Pj7", 37],
                ["Pj8", 22],
                ["Pj9", 28],
                ["Pj10", 9],
                ["Pj11", 14],
                ["Pj12", 21],
                ["Pj13", 5]
            ]
        }], e)
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = o(".chart-donut");
        e.length && o.plot(e, [{
            color: "#39C558",
            data: 60,
            label: "Coffee"
        }, {
            color: "#00b4ff",
            data: 90,
            label: "CSS"
        }, {
            color: "#FFBE41",
            data: 50,
            label: "LESS"
        }, {
            color: "#ff3e43",
            data: 80,
            label: "Jade"
        }, {
            color: "#937fc7",
            data: 116,
            label: "AngularJS"
        }], {
            series: {
                pie: {
                    show: !0,
                    innerRadius: .5
                }
            }
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = o(".chart-line");
        e.length && o.plot(e, [{
            label: "Complete",
            color: "#5ab1ef",
            data: [
                ["Jan", 188],
                ["Feb", 183],
                ["Mar", 185],
                ["Apr", 199],
                ["May", 190],
                ["Jun", 194],
                ["Jul", 194],
                ["Aug", 184],
                ["Sep", 74]
            ]
        }, {
            label: "In Progress",
            color: "#f5994e",
            data: [
                ["Jan", 153],
                ["Feb", 116],
                ["Mar", 136],
                ["Apr", 119],
                ["May", 148],
                ["Jun", 133],
                ["Jul", 118],
                ["Aug", 161],
                ["Sep", 59]
            ]
        }, {
            label: "Cancelled",
            color: "#d87a80",
            data: [
                ["Jan", 111],
                ["Feb", 97],
                ["Mar", 93],
                ["Apr", 110],
                ["May", 102],
                ["Jun", 93],
                ["Jul", 92],
                ["Aug", 92],
                ["Sep", 44]
            ]
        }], {
            series: {
                lines: {
                    show: !0,
                    fill: .01
                },
                points: {
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#eee",
                borderWidth: 1,
                hoverable: !0,
                backgroundColor: "#fcfcfc"
            },
            tooltip: !0,
            tooltipOpts: {
                content: function(e, t, o) {
                    return t + " : " + o
                }
            },
            xaxis: {
                tickColor: "#eee",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#eee"
            },
            shadowSize: 0
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = {
                series: {
                    pie: {
                        show: !0,
                        innerRadius: 0,
                        label: {
                            show: !0,
                            radius: .8,
                            formatter: function(e, t) {
                                return '<div class="flot-pie-label">' + Math.round(t.percent) + "%</div>"
                            },
                            background: {
                                opacity: .8,
                                color: "#222"
                            }
                        }
                    }
                }
            },
            t = o(".chart-pie");
        t.length && o.plot(t, [{
            label: "jQuery",
            color: "#4acab4",
            data: 30
        }, {
            label: "CSS",
            color: "#ffea88",
            data: 40
        }, {
            label: "LESS",
            color: "#ff8153",
            data: 90
        }, {
            label: "SASS",
            color: "#878bb6",
            data: 75
        }, {
            label: "Jade",
            color: "#b2d767",
            data: 120
        }], e)
    })
}(window, document, window.jQuery), window, document, (0, window.jQuery)(function() {
    if ("undefined" != typeof Morris) {
        var e = [{
            y: "2006",
            a: 100,
            b: 90
        }, {
            y: "2007",
            a: 75,
            b: 65
        }, {
            y: "2008",
            a: 50,
            b: 40
        }, {
            y: "2009",
            a: 75,
            b: 65
        }, {
            y: "2010",
            a: 50,
            b: 40
        }, {
            y: "2011",
            a: 75,
            b: 65
        }, {
            y: "2012",
            a: 100,
            b: 90
        }];
        new Morris.Line({
            element: "morris-line",
            data: e,
            xkey: "y",
            ykeys: ["a", "b"],
            labels: ["Serie A", "Serie B"],
            lineColors: ["#31C0BE", "#7a92a3"],
            resize: !0
        }), new Morris.Donut({
            element: "morris-donut",
            data: [{
                label: "Download Sales",
                value: 12
            }, {
                label: "In-Store Sales",
                value: 30
            }, {
                label: "Mail-Order Sales",
                value: 20
            }],
            colors: ["#f05050", "#fad732", "#ff902b"],
            resize: !0
        }), new Morris.Bar({
            element: "morris-bar",
            data: e,
            xkey: "y",
            ykeys: ["a", "b"],
            labels: ["Series A", "Series B"],
            xLabelMargin: 2,
            barColors: ["#23b7e5", "#f05050"],
            resize: !0
        }), new Morris.Area({
            element: "morris-area",
            data: e,
            xkey: "y",
            ykeys: ["a", "b"],
            labels: ["Serie A", "Serie B"],
            lineColors: ["#7266ba", "#23b7e5"],
            resize: !0
        })
    }
}),
function(e, t, o, a) {
    (0, window.jQuery)(function() {
        if ("undefined" != typeof Rickshaw) {
            for (var e = [
                    [],
                    [],
                    []
                ], o = new Rickshaw.Fixtures.RandomData(150), a = 0; a < 150; a++) o.addData(e);
            var n = [{
                color: "#c05020",
                data: e[0],
                name: "New York"
            }, {
                color: "#30c020",
                data: e[1],
                name: "London"
            }, {
                color: "#6060c0",
                data: e[2],
                name: "Tokyo"
            }];
            new Rickshaw.Graph({
                element: t.querySelector("#rickshaw1"),
                series: n,
                renderer: "area"
            }).render(), new Rickshaw.Graph({
                element: t.querySelector("#rickshaw2"),
                renderer: "area",
                stroke: !0,
                series: [{
                    data: [{
                        x: 0,
                        y: 40
                    }, {
                        x: 1,
                        y: 49
                    }, {
                        x: 2,
                        y: 38
                    }, {
                        x: 3,
                        y: 30
                    }, {
                        x: 4,
                        y: 32
                    }],
                    color: "#f05050"
                }, {
                    data: [{
                        x: 0,
                        y: 40
                    }, {
                        x: 1,
                        y: 49
                    }, {
                        x: 2,
                        y: 38
                    }, {
                        x: 3,
                        y: 30
                    }, {
                        x: 4,
                        y: 32
                    }],
                    color: "#fad732"
                }]
            }).render(), new Rickshaw.Graph({
                element: t.querySelector("#rickshaw3"),
                renderer: "line",
                series: [{
                    data: [{
                        x: 0,
                        y: 40
                    }, {
                        x: 1,
                        y: 49
                    }, {
                        x: 2,
                        y: 38
                    }, {
                        x: 3,
                        y: 30
                    }, {
                        x: 4,
                        y: 32
                    }],
                    color: "#7266ba"
                }, {
                    data: [{
                        x: 0,
                        y: 20
                    }, {
                        x: 1,
                        y: 24
                    }, {
                        x: 2,
                        y: 19
                    }, {
                        x: 3,
                        y: 15
                    }, {
                        x: 4,
                        y: 16
                    }],
                    color: "#23b7e5"
                }]
            }).render(), new Rickshaw.Graph({
                element: t.querySelector("#rickshaw4"),
                renderer: "bar",
                series: [{
                    data: [{
                        x: 0,
                        y: 40
                    }, {
                        x: 1,
                        y: 49
                    }, {
                        x: 2,
                        y: 38
                    }, {
                        x: 3,
                        y: 30
                    }, {
                        x: 4,
                        y: 32
                    }],
                    color: "#fad732"
                }, {
                    data: [{
                        x: 0,
                        y: 20
                    }, {
                        x: 1,
                        y: 24
                    }, {
                        x: 2,
                        y: 19
                    }, {
                        x: 3,
                        y: 15
                    }, {
                        x: 4,
                        y: 16
                    }],
                    color: "#ff902b"
                }]
            }).render()
        }
    })
}(window, document),
function(e, t, o, a) {
    o(function() {
        o("[data-sparkline]").each(function() {
            var t = o(this),
                a = t.data(),
                n = a.values && a.values.split(",");
            a.type = a.type || "bar", a.disableHiddenCheck = !0, t.sparkline(n, a), a.resize && o(e).resize(function() {
                t.sparkline(n, a)
            })
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o('[data-toggle="popover"]').popover(), o('[data-toggle="tooltip"]').tooltip({
            container: "body"
        }), o(".dropdown input").on("click focus", function(e) {
            e.stopPropagation()
        })
    })
}(window, document, window.jQuery),
function(e, t, o) {
    "use strict";
    var a = "card.removed";
    e(o).on("click", '[data-tool="card-dismiss"]', function() {
        var t = e(this).closest(".card"),
            o = new e.Deferred;

        function n() {
            var o = t.parent();
            e.when(t.trigger(a, [t])).done(function() {
                t.remove(), o.trigger(a).filter(function() {
                    var t = e(this);
                    return t.is('[class*="col-"]:not(.sortable)') && 0 === t.children("*").length
                }).remove()
            })
        }
        t.trigger("card.remove", [t, o]), o.done(function() {
            t.animo({
                animation: "bounceOut"
            }, n)
        })
    })
}(jQuery, window, document),
function(e, t, o) {
    "use strict";
    var a = '[data-tool="card-collapse"]',
        n = "jq-cardState";

    function r(t, o) {
        var a = e.localStorage.get(n);
        a || (a = {}), a[t] = o, e.localStorage.set(n, a)
    }
    e(a).each(function() {
        var t = e(this),
            o = t.closest(".card"),
            a = o.find(".card-wrapper"),
            i = {
                toggle: !1
            },
            l = t.children("em"),
            s = o.attr("id");
        a.length || (a = o.children(".card-heading").nextAll().wrapAll("<div/>").parent().addClass("card-wrapper"), i = {}), a.collapse(i).on("hide.bs.collapse", function() {
            l.removeClass("fa-minus").addClass("fa-plus"), r(s, "hide"), a.prev(".card-heading").addClass("card-heading-collapsed")
        }).on("show.bs.collapse", function() {
            l.removeClass("fa-plus").addClass("fa-minus"), r(s, "show"), a.prev(".card-heading").removeClass("card-heading-collapsed")
        });
        var c = function(t) {
            var o = e.localStorage.get(n);
            if (o) return o[t] || !1
        }(s);
        c && (setTimeout(function() {
            a.collapse(c)
        }, 50), r(s, c))
    }), e(o).on("click", a, function() {
        e(this).closest(".card").find(".card-wrapper").collapse("toggle")
    })
}(jQuery, window, document),
function(e, t, o) {
    "use strict";
    var a = "whirl";

    function n() {
        this.removeClass(a)
    }
    e(o).on("click", '[data-tool="card-refresh"]', function() {
        var t = e(this),
            o = t.parents(".card").eq(0),
            r = t.data("spinner") || "standard";
        o.addClass(a + " " + r), o.removeSpinner = n, t.trigger("card.refresh", [o])
    })
}(jQuery, window, document),
function(e, t, o) {
    "use strict";
    e(o).on("click", "[data-reset-key]", function(o) {
        o.preventDefault();
        var a = e(this).data("resetKey");
        a ? (e.localStorage.remove(a), t.location.reload()) : e.error("No storage key specified for reset.")
    })
}(jQuery, window, document),
function(e, t, o, a) {
    e.APP_COLORS = {
        primary: "#5d9cec",
        success: "#27c24c",
        info: "#23b7e5",
        warning: "#ff902b",
        danger: "#f05050",
        inverse: "#131e26",
        green: "#37bc9b",
        pink: "#f532e5",
        purple: "#7266ba",
        dark: "#3a3f51",
        yellow: "#fad732",
        "gray-darker": "#232735",
        "gray-dark": "#3a3f51",
        gray: "#dde6e9",
        "gray-light": "#e4eaec",
        "gray-lighter": "#edf1f2"
    }, e.APP_MEDIAQUERY = {
        desktopLG: 1200,
        desktop: 992,
        tablet: 768,
        mobile: 480
    }
}(window, document, window.jQuery),
function(e, t, o, a) {
    "undefined" != typeof screenfull && o(function() {
        var a = o(t),
            n = o("[data-toggle-fullscreen]"),
            r = e.navigator.userAgent;

        function i(e) {
            screenfull.isFullscreen ? e.children("em").removeClass("fa-expand").addClass("fa-compress") : e.children("em").removeClass("fa-compress").addClass("fa-expand")
        }(r.indexOf("MSIE ") > 0 || r.match(/Trident.*rv\:11\./)) && n.addClass("hide"), n.is(":visible") && (n.on("click", function(e) {
            e.preventDefault(), screenfull.enabled ? (screenfull.toggle(), i(n)) : console.log("Fullscreen not enabled")
        }), screenfull.raw && screenfull.raw.fullscreenchange && a.on(screenfull.raw.fullscreenchange, function() {
            i(n)
        }))
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o("[data-load-css]").on("click", function(e) {
            var t = o(this);
            t.is("a") && e.preventDefault();
            var a = t.data("loadCss");
            a ? function(e) {
                var t = "autoloaded-stylesheet",
                    a = o("#" + t).attr("id", t + "-old");
                o("head").append(o("<link/>").attr({
                    id: t,
                    rel: "stylesheet",
                    href: e
                })), a.length && a.remove();
                return o("#" + t)
            }(a) || o.error("Error creating stylesheet link element.") : o.error("No stylesheet location defined.")
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    var n = "site",
        r = "jq-appLang";
    o(function() {
        if (o.fn.localize) {
            var e = o.localStorage.get(r) || "en",
                t = {
                    language: e,
                    pathPrefix: "vendor/i18n",
                    callback: function(t, a) {
                        o.localStorage.set(r, e), a(t)
                    }
                };
            a(t), o("[data-set-lang]").on("click", function() {
                (e = o(this).data("setLang")) && (t.language = e, a(t), function(e) {
                    var t = e.parents(".dropdown-menu");
                    if (t.length) {
                        var o = t.prev("button, a");
                        o.text(e.text())
                    }
                }(o(this)))
            })
        }

        function a(e) {
            o("[data-localize]").localize(n, e)
        }
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = new n;
        o("[data-search-open]").on("click", function(e) {
            e.stopPropagation()
        }).on("click", e.toggle);
        var a = o("[data-search-dismiss]");
        o('.navbar-form input[type="text"]').on("click", function(e) {
            e.stopPropagation()
        }).on("keyup", function(t) {
            27 == t.keyCode && e.dismiss()
        }), o(t).on("click", e.dismiss), a.on("click", function(e) {
            e.stopPropagation()
        }).on("click", e.dismiss)
    });
    var n = function() {
        var e = "form.navbar-form";
        return {
            toggle: function() {
                var t = o(e);
                t.toggleClass("open");
                var a = t.hasClass("open");
                t.find("input")[a ? "focus" : "blur"]()
            },
            dismiss: function() {
                o(e).removeClass("open").find('input[type="text"]').blur()
            }
        }
    }
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o("[data-now]").each(function() {
            var e = o(this),
                t = e.data("format");

            function a() {
                var o = moment(new Date).format(t);
                e.text(o)
            }
            a(), setInterval(a, 1e3)
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var e = o("#maincss"),
            t = o("#bscss");
        o("#chk-rtl").on("change", function() {
            e.attr("href", this.checked ? "css/app-rtl.css" : "css/app.css"), t.attr("href", this.checked ? "css/bootstrap-rtl.css" : "css/bootstrap.css")
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    var n, r, i, l;

    function s(e) {
        e.siblings("li").removeClass("open").end().toggleClass("open")
    }

    function c() {
        o(".sidebar-subnav.nav-floating").remove(), o(".dropdown-backdrop").remove(), o(".sidebar li.open").removeClass("open")
    }

    function d() {
        return i.hasClass("aside-hover")
    }
    o(function() {
        n = o(e), r = o("html"), i = o("body"), l = o(".sidebar"), APP_MEDIAQUERY;
        var t = l.find(".collapse");
        t.on("show.bs.collapse", function(e) {
            e.stopPropagation(), 0 === o(this).parents(".collapse").length && t.filter(".show").collapse("hide")
        });
        var a = o(".sidebar .active").parents("li");
        d() || a.addClass("active").children(".collapse").collapse("show"), l.find("li > a + ul").on("show.bs.collapse", function(e) {
            d() && e.preventDefault()
        });
        var u = r.hasClass("touch") ? "click" : "mouseenter",
            f = o();
        l.on(u, ".sidebar-nav > li", function() {
            (i.hasClass("aside-collapsed") || i.hasClass("aside-collapsed-text") || d()) && (f.trigger("mouseleave"), f = function(e) {
                c();
                var t = e.children("ul");
                if (!t.length) return o();
                if (e.hasClass("open")) return s(e), o();
                var a = o(".aside"),
                    r = o(".aside-inner"),
                    d = parseInt(r.css("padding-top"), 0) + parseInt(a.css("padding-top"), 0),
                    u = t.clone().appendTo(a);
                s(e);
                var f = e.position().top + d - l.scrollTop(),
                    p = n.height();
                return u.addClass("nav-floating").css({
                    position: i.hasClass("layout-fixed") ? "fixed" : "absolute",
                    top: f,
                    bottom: u.outerHeight(!0) + f > p ? 0 : "auto"
                }), u.on("mouseleave", function() {
                    s(e), u.remove()
                }), u
            }(o(this)), o("<div/>", {
                class: "dropdown-backdrop"
            }).insertAfter(".aside").on("click mouseenter", function() {
                c()
            }))
        }), void 0 !== l.data("sidebarAnyclickClose") && o(".wrapper").on("click.sidebar", function(e) {
            if (i.hasClass("aside-toggled")) {
                var t = o(e.target);
                t.parents(".aside").length || t.is("#user-block-toggle") || t.parent().is("#user-block-toggle") || i.removeClass("aside-toggled")
            }
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o("[data-scrollable]").each(function() {
            var e = o(this);
            e.slimScroll({
                height: e.data("height") || 250
            })
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o("[data-check-all]").on("change", function() {
            var e = o(this),
                t = e.index() + 1,
                a = e.find('input[type="checkbox"]');
            e.parents("table").find("tbody > tr > td:nth-child(" + t + ') input[type="checkbox"]').prop("checked", a[0].checked)
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var t = o("body");
        toggle = new StateToggler, o("[data-toggle-state]").on("click", function(a) {
            a.stopPropagation();
            var n = o(this),
                r = n.data("toggleState"),
                i = n.data("target"),
                l = void 0 !== n.attr("data-no-persist"),
                s = i ? o(i) : t;
            r && (s.hasClass(r) ? (s.removeClass(r), l || toggle.removeState(r)) : (s.addClass(r), l || toggle.addState(r))), o(e).resize()
        })
    }), e.StateToggler = function() {
        var e = "jq-toggleState",
            t = {
                hasWord: function(e, t) {
                    return new RegExp("(^|\\s)" + t + "(\\s|$)").test(e)
                },
                addWord: function(e, t) {
                    if (!this.hasWord(e, t)) return e + (e ? " " : "") + t
                },
                removeWord: function(e, t) {
                    if (this.hasWord(e, t)) return e.replace(new RegExp("(^|\\s)*" + t + "(\\s|$)*", "g"), "")
                }
            };
        return {
            addState: function(a) {
                var n = o.localStorage.get(e);
                n = n ? t.addWord(n, a) : a, o.localStorage.set(e, n)
            },
            removeState: function(a) {
                var n = o.localStorage.get(e);
                n && (n = t.removeWord(n, a), o.localStorage.set(e, n))
            },
            restoreState: function(t) {
                var a = o.localStorage.get(e);
                a && t.addClass(a)
            }
        }
    }
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        var a = o("[data-trigger-resize]"),
            n = a.data("triggerResize");
        a.on("click", function() {
            setTimeout(function() {
                var o = t.createEvent("UIEvents");
                o.initUIEvent("resize", !0, !1, e, 0), e.dispatchEvent(o)
            }, n || 300)
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.andSelf = function() {
        return this.addBack()
    }, o(function() {
        o(".flatdoc").each(function() {
            Flatdoc.run({
                fetcher: Flatdoc.file("server/documentation/readme.md"),
                root: ".flatdoc",
                menu: ".flatdoc-menu",
                title: ".flatdoc-title",
                content: ".flatdoc-content"
            })
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o(".card.card-demo").on("card.refresh", function(e, t) {
            setTimeout(function() {
                t.removeSpinner()
            }, 3e3)
        }).on("hide.bs.collapse", function(e) {
            console.log("Card Collapse Hide")
        }).on("show.bs.collapse", function(e) {
            console.log("Card Collapse Show")
        }).on("card.remove", function(e, t, o) {
            console.log("Removing Card"), o.resolve()
        }).on("card.removed", function(e, t) {
            console.log("Removed Card")
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.nestable && o(function() {
        var t = function(t) {
            var a = t.length ? t : o(t.target),
                n = a.data("output");
            e.JSON ? n.val(e.JSON.stringify(a.nestable("serialize"))) : n.val("JSON browser support required for this demo.")
        };
        o("#nestable").nestable({
            group: 1
        }).on("change", t), o("#nestable2").nestable({
            group: 1
        }).on("change", t), t(o("#nestable").data("output", o("#nestable-output"))), t(o("#nestable2").data("output", o("#nestable2-output"))), o(".js-nestable-action").on("click", function(e) {
            var t = o(e.target).data("action");
            "expand-all" === t && o(".dd").nestable("expandAll"), "collapse-all" === t && o(".dd").nestable("collapseAll")
        })
    })
}(window, document, window.jQuery),
function(e, t, o) {
    "use strict";
    e(o);

    function a(t) {
        var o = t.data("message"),
            a = t.data("options");
        o || e.error("Notify: No message specified"), e.notify(o, a || {})
    }
    e(function() {
        e("[data-notify]").each(function() {
            var t = e(this);
            void 0 !== t.data("onload") && setTimeout(function() {
                a(t)
            }, 800), t.on("click", function(e) {
                e.preventDefault(), a(t)
            })
        })
    })
}(jQuery, window, document),
function(e, t, o) {
    var a = {},
        n = {},
        r = function(t) {
            return "string" == e.type(t) && (t = {
                message: t
            }), arguments[1] && (t = e.extend(t, "string" == e.type(arguments[1]) ? {
                status: arguments[1]
            } : arguments[1])), new i(t).show()
        },
        i = function(t) {
            this.options = e.extend({}, i.defaults, t), this.uuid = "ID" + (new Date).getTime() + "RAND" + Math.ceil(1e5 * Math.random()), this.element = e(['<div class="uk-notify-message alert-dismissable">', '<a class="close">&times;</a>', "<div>" + this.options.message + "</div>", "</div>"].join("")).data("notifyMessage", this), this.options.status && (this.element.addClass("alert alert-" + this.options.status), this.currentstatus = this.options.status), this.group = this.options.group, n[this.uuid] = this, a[this.options.pos] || (a[this.options.pos] = e('<div class="uk-notify uk-notify-' + this.options.pos + '"></div>').appendTo("body").on("click", ".uk-notify-message", function() {
                e(this).data("notifyMessage").close()
            }))
        };
    e.extend(i.prototype, {
        uuid: !1,
        element: !1,
        timout: !1,
        currentstatus: "",
        group: !1,
        show: function() {
            if (!this.element.is(":visible")) {
                var e = this;
                a[this.options.pos].show().prepend(this.element);
                var t = parseInt(this.element.css("margin-bottom"), 10);
                return this.element.css({
                    opacity: 0,
                    "margin-top": -1 * this.element.outerHeight(),
                    "margin-bottom": 0
                }).animate({
                    opacity: 1,
                    "margin-top": 0,
                    "margin-bottom": t
                }, function() {
                    if (e.options.timeout) {
                        var t = function() {
                            e.close()
                        };
                        e.timeout = setTimeout(t, e.options.timeout), e.element.hover(function() {
                            clearTimeout(e.timeout)
                        }, function() {
                            e.timeout = setTimeout(t, e.options.timeout)
                        })
                    }
                }), this
            }
        },
        close: function(e) {
            var t = this,
                o = function() {
                    t.element.remove(), a[t.options.pos].children().length || a[t.options.pos].hide(), delete n[t.uuid]
                };
            this.timeout && clearTimeout(this.timeout), e ? o() : this.element.animate({
                opacity: 0,
                "margin-top": -1 * this.element.outerHeight(),
                "margin-bottom": 0
            }, function() {
                o()
            })
        },
        content: function(e) {
            var t = this.element.find(">div");
            return e ? (t.html(e), this) : t.html()
        },
        status: function(e) {
            return e ? (this.element.removeClass("alert alert-" + this.currentstatus).addClass("alert alert-" + e), this.currentstatus = e, this) : this.currentstatus
        }
    }), i.defaults = {
        message: "",
        status: "normal",
        timeout: 5e3,
        group: null,
        pos: "top-center"
    }, e.notify = r, e.notify.message = i, e.notify.closeAll = function(e, t) {
        if (e)
            for (var o in n) e === n[o].group && n[o].close(t);
        else
            for (var o in n) n[o].close(t)
    }
}(jQuery, window, document),
function(e, t, o) {
    "use strict";
    e(function() {
        e(o).on("click", "[data-animate]", function() {
            var t = e(this),
                o = t.data("target"),
                a = t.data("play") || "bounce";
            o && e(o).animo({
                animation: a
            })
        })
    })
}(jQuery, window, document),
function(e, t, o) {
    "use strict";
    if (e.fn.sortable) {
        var a = '[data-toggle="portlet"]',
            n = "jq-portletState";
        e(function() {
            e(a).sortable({
                connectWith: a,
                items: "div.card",
                handle: ".portlet-handler",
                opacity: .7,
                placeholder: "portlet box-placeholder",
                cancel: ".portlet-cancel",
                forcePlaceholderSize: !0,
                iframeFix: !1,
                tolerance: "pointer",
                helper: "original",
                revert: 200,
                forceHelperSize: !0,
                update: r,
                create: i
            })
        })
    }

    function r(t, o) {
        var a = e.localStorage.get(n);
        a || (a = {}), a[this.id] = e(this).sortable("toArray"), a && e.localStorage.set(n, a)
    }

    function i() {
        var t = e.localStorage.get(n);
        if (t) {
            var o = this.id,
                a = t[o];
            if (a) {
                var r = e("#" + o);
                e.each(a, function(t, o) {
                    e("#" + o).appendTo(r)
                })
            }
        }
    }
}(jQuery, window, document),
function(e, t, o, a) {
    "undefined" != typeof sortable && o(function() {
        sortable(".sortable", {
            forcePlaceholderSize: !0,
            placeholder: '<div class="box-placeholder p0 m0"><div></div></div>'
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o("#swal-demo1").on("click", function(e) {
            e.preventDefault(), swal("Here's a message!")
        }), o("#swal-demo2").on("click", function(e) {
            e.preventDefault(), swal("Here's a message!", "It's pretty, isn't it?")
        }), o("#swal-demo3").on("click", function(e) {
            e.preventDefault(), swal("Good job!", "You clicked the button!", "success")
        }), o("#swal-demo4").on("click", function(e) {
            e.preventDefault(), swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: !1
            }, function() {
                swal("Deleted!", "Your imaginary file has been deleted.", "success")
            })
        }), o("#swal-demo5").on("click", function(e) {
            e.preventDefault(), swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: !1,
                closeOnCancel: !1
            }, function(e) {
                e ? swal("Deleted!", "Your imaginary file has been deleted.", "success") : swal("Cancelled", "Your imaginary file is safe :)", "error")
            })
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    if (o.fn.fullCalendar) {
        o(function() {
            var e, t, a, i, l, s, c, d = o("#calendar"),
                u = (e = new Date, t = e.getDate(), a = e.getMonth(), i = e.getFullYear(), [{
                    title: "All Day Event",
                    start: new Date(i, a, 1),
                    backgroundColor: "#f56954",
                    borderColor: "#f56954"
                }, {
                    title: "Long Event",
                    start: new Date(i, a, t - 5),
                    end: new Date(i, a, t - 2),
                    backgroundColor: "#f39c12",
                    borderColor: "#f39c12"
                }, {
                    title: "Meeting",
                    start: new Date(i, a, t, 10, 30),
                    allDay: !1,
                    backgroundColor: "#0073b7",
                    borderColor: "#0073b7"
                }, {
                    title: "Lunch",
                    start: new Date(i, a, t, 12, 0),
                    end: new Date(i, a, t, 14, 0),
                    allDay: !1,
                    backgroundColor: "#00c0ef",
                    borderColor: "#00c0ef"
                }, {
                    title: "Birthday Party",
                    start: new Date(i, a, t + 1, 19, 0),
                    end: new Date(i, a, t + 1, 22, 30),
                    allDay: !1,
                    backgroundColor: "#00a65a",
                    borderColor: "#00a65a"
                }, {
                    title: "Open Google",
                    start: new Date(i, a, 28),
                    end: new Date(i, a, 29),
                    url: "//google.com/",
                    backgroundColor: "#3c8dbc",
                    borderColor: "#3c8dbc"
                }]);
            ! function(e) {
                var t = o(".external-events");
                new r(t.children("div"));
                var a = "#f6504d",
                    i = o(".external-event-add-btn"),
                    l = o(".external-event-name"),
                    s = o(".external-event-color-selector .circle");
                o(".external-events-trash").droppable({
                    accept: ".fc-event",
                    activeClass: "active",
                    hoverClass: "hovered",
                    tolerance: "touch",
                    drop: function(t, o) {
                        if (n) {
                            var a = n.id || n._id;
                            e.fullCalendar("removeEvents", a), o.draggable.remove(), n = null
                        }
                    }
                }), s.click(function(e) {
                    e.preventDefault();
                    var t = o(this);
                    a = t.css("background-color"), s.removeClass("selected"), t.addClass("selected")
                }), i.click(function(e) {
                    e.preventDefault();
                    var n = l.val();
                    if ("" !== o.trim(n)) {
                        var i = o("<div/>").css({
                            "background-color": a,
                            "border-color": a,
                            color: "#fff"
                        }).html(n);
                        t.prepend(i), new r(i), l.val("")
                    }
                })
            }(d), l = d, s = u, c = o("#remove-after-drop"), l.fullCalendar({
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,agendaWeek,agendaDay"
                },
                buttonIcons: {
                    prev: " fa fa-caret-left",
                    next: " fa fa-caret-right"
                },
                buttonText: {
                    today: "today",
                    month: "month",
                    week: "week",
                    day: "day"
                },
                editable: !0,
                droppable: !0,
                drop: function(e, t) {
                    var a = o(this),
                        n = a.data("calendarEventObject");
                    if (n) {
                        var r = o.extend({}, n);
                        r.start = e, r.allDay = t, r.backgroundColor = a.css("background-color"), r.borderColor = a.css("border-color"), l.fullCalendar("renderEvent", r, !0), c.is(":checked") && a.remove()
                    }
                },
                eventDragStart: function(e, t, o) {
                    n = e
                },
                events: s
            })
        });
        var n = null,
            r = function(e) {
                e && e.each(function() {
                    var e = o(this),
                        t = {
                            title: o.trim(e.text())
                        };
                    e.data("calendarEventObject", t), e.draggable({
                        zIndex: 1070,
                        revert: !0,
                        revertDuration: 0
                    })
                })
            }
    }
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.jQCloud && o(function() {
        o("#jqcloud").jQCloud([{
            text: "Lorem",
            weight: 13
        }, {
            text: "Ipsum",
            weight: 10.5
        }, {
            text: "Dolor",
            weight: 9.4
        }, {
            text: "Sit",
            weight: 8
        }, {
            text: "Amet",
            weight: 6.2
        }, {
            text: "Consectetur",
            weight: 5
        }, {
            text: "Adipiscing",
            weight: 5
        }, {
            text: "Sit",
            weight: 8
        }, {
            text: "Amet",
            weight: 6.2
        }, {
            text: "Consectetur",
            weight: 5
        }, {
            text: "Adipiscing",
            weight: 5
        }], {
            width: 240,
            height: 200,
            steps: 7
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.slider && o.fn.chosen && o.fn.datepicker && o(function() {
        o("[data-ui-slider]").slider(), o(".chosen-select").chosen(), o("#datetimepicker").datepicker({
            orientation: "bottom",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-crosshairs",
                clear: "fa fa-trash"
            }
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o.fn.colorpicker && (o(".demo-colorpicker").colorpicker(), o("#demo_selectors").colorpicker({
            colorSelectors: {
                default: "#777777",
                primary: APP_COLORS.primary,
                success: APP_COLORS.success,
                info: APP_COLORS.info,
                warning: APP_COLORS.warning,
                danger: APP_COLORS.danger
            }
        }))
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.slider && o.fn.chosen && o.fn.inputmask && o.fn.filestyle && o.fn.wysiwyg && o.fn.datepicker && o(function() {
        o("[data-ui-slider]").slider(), o(".chosen-select").chosen(), o("[data-masked]").inputmask(), o(".filestyle").filestyle(), o(".wysiwyg").wysiwyg(), o("#datetimepicker1").datepicker({
            orientation: "bottom",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-crosshairs",
                clear: "fa fa-trash"
            }
        }), o("#datetimepicker2").datepicker({
            format: "mm-dd-yyyy"
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        if (o.fn.cropper) {
            var a = o(".img-container > img"),
                n = o("#dataX"),
                r = o("#dataY"),
                i = o("#dataHeight"),
                l = o("#dataWidth"),
                s = o("#dataRotate"),
                c = {
                    aspectRatio: 16 / 9,
                    preview: ".img-preview",
                    crop: function(e) {
                        n.val(Math.round(e.x)), r.val(Math.round(e.y)), i.val(Math.round(e.height)), l.val(Math.round(e.width)), s.val(Math.round(e.rotate))
                    }
                };
            a.on({
                "build.cropper": function(e) {
                    console.log(e.type)
                },
                "built.cropper": function(e) {
                    console.log(e.type)
                },
                "dragstart.cropper": function(e) {
                    console.log(e.type, e.dragType)
                },
                "dragmove.cropper": function(e) {
                    console.log(e.type, e.dragType)
                },
                "dragend.cropper": function(e) {
                    console.log(e.type, e.dragType)
                },
                "zoomin.cropper": function(e) {
                    console.log(e.type)
                },
                "zoomout.cropper": function(e) {
                    console.log(e.type)
                },
                "change.cropper": function(e) {
                    console.log(e.type)
                }
            }).cropper(c), o(t.body).on("click", "[data-method]", function() {
                var e, t, n = o(this).data();
                if (a.data("cropper") && n.method) {
                    if (void 0 !== (n = o.extend({}, n)).target && (e = o(n.target), void 0 === n.option)) try {
                        n.option = JSON.parse(e.val())
                    } catch (e) {
                        console.log(e.message)
                    }
                    if (t = a.cropper(n.method, n.option), "getCroppedCanvas" === n.method && o("#getCroppedCanvasModal").modal().find(".modal-body").html(t), o.isPlainObject(t) && e) try {
                        e.val(JSON.stringify(t))
                    } catch (e) {
                        console.log(e.message)
                    }
                }
            }).on("keydown", function(e) {
                if (a.data("cropper")) switch (e.which) {
                    case 37:
                        e.preventDefault(), a.cropper("move", -1, 0);
                        break;
                    case 38:
                        e.preventDefault(), a.cropper("move", 0, -1);
                        break;
                    case 39:
                        e.preventDefault(), a.cropper("move", 1, 0);
                        break;
                    case 40:
                        e.preventDefault(), a.cropper("move", 0, 1)
                }
            });
            var d, u = o("#inputImage"),
                f = e.URL || e.webkitURL;
            f ? u.change(function() {
                var e, t = this.files;
                a.data("cropper") && t && t.length && (e = t[0], /^image\/\w+$/.test(e.type) ? (d = f.createObjectURL(e), a.one("built.cropper", function() {
                    f.revokeObjectURL(d)
                }).cropper("reset").cropper("replace", d), u.val("")) : alert("Please choose an image file."))
            }) : u.parent().remove(), o(".docs-options :checkbox").on("change", function() {
                var e = o(this);
                a.data("cropper") && (c[e.val()] = e.prop("checked"), a.cropper("destroy").cropper(c))
            }), o('[data-toggle="tooltip"]').tooltip()
        }
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o(function() {
        o.fn.select2 && (o("#select2-1").select2({
            theme: "bootstrap"
        }), o("#select2-2").select2({
            theme: "bootstrap"
        }), o("#select2-3").select2({
            theme: "bootstrap"
        }), o("#select2-4").select2({
            placeholder: "Select a state",
            allowClear: !0,
            theme: "bootstrap"
        }))
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    "undefined" != typeof Dropzone && (Dropzone.autoDiscover = !1, o(function() {
        new Dropzone("#dropzone-area", {
            autoProcessQueue: !1,
            uploadMultiple: !0,
            parallelUploads: 100,
            maxFiles: 100,
            dictDefaultMessage: '<em class="ion-upload color-blue-grey-100 icon-2x"></em><br>Drop files here to upload',
            paramName: "file",
            maxFilesize: 2,
            addRemoveLinks: !0,
            accept: function(e, t) {
                "justinbieber.jpg" === e.name ? t("Naha, you dont. :)") : t()
            },
            init: function() {
                var e = this;
                this.element.querySelector("button[type=submit]").addEventListener("click", function(t) {
                    t.preventDefault(), t.stopPropagation(), e.processQueue()
                }), this.on("addedfile", function(e) {
                    console.log("Added file: " + e.name)
                }), this.on("removedfile", function(e) {
                    console.log("Removed file: " + e.name)
                }), this.on("sendingmultiple", function() {}), this.on("successmultiple", function() {}), this.on("errormultiple", function() {})
            }
        })
    }))
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.validate && o(function() {
        var e = o("#example-form");
        e.validate({
            errorPlacement: function(e, t) {
                t.before(e)
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        }), e.children("div").steps({
            headerTag: "h4",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function(t, o, a) {
                return e.validate().settings.ignore = ":disabled,:hidden", e.valid()
            },
            onFinishing: function(t, o) {
                return e.validate().settings.ignore = ":disabled", e.valid()
            },
            onFinished: function(e, t) {
                alert("Submitted!"), o(this).submit()
            }
        }), o("#example-vertical").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        })
    })
}(window, document, window.jQuery),
function(e, t, o, a) {
    o.fn.xeditable && o(function() {
        o.fn.editableform.buttons = '<button type="submit" class="btn btn-primary btn-sm editable-submit"><i class="fa fa-fw fa-check"></i></button><button type="button" class="btn btn-default btn-sm editable-cancel"><i class="fa fa-fw fa-times"></i></button>', o("#enable").click(function() {
            o("#user .editable").editable("toggleDisabled")
        }), o("#username").editable({
            type: "text",
            pk: 1,
            name: "username",
            title: "Enter username",
            mode: "inline"
        }), o("#firstname").editable({
            validate: function(e) {
                if ("" === o.trim(e)) return "This field is required"
            },
            mode: "inline"
        }), o("#sex").editable({
            prepend: "not selected",
            source: [{
                value: 1,
                text: "Male"
            }, {
                value: 2,
                text: "Female"
            }],
            display: function(e, t) {
                var a = o.grep(t, function(t) {
                    return t.value == e
                });
                a.length ? o(this).text(a[0].text).css("color", {
                    "": "gray",
                    1: "green",
                    2: "blue"
                }[e]) : o(this).empty()
            },
            mode: "inline"
        }), o("#status").editable({
            mode: "inline"
        }), o("#group").editable({
            showbuttons: !1,
            mode: "inline"
        }), o("#dob").editable({
            mode: "inline"
        }), o("#event").editable({
            placement: "right",
            combodate: {
                firstItem: "name"
            },
            mode: "inline"
        }), o("#comments").editable({
            showbuttons: "bottom",
            mode: "inline"
        }), o("#note").editable({
            mode: "inline"
        }), o("#pencil").click(function(e) {
            e.stopPropagation(), e.preventDefault(), o("#note").editable("toggle")
        }), o("#user .editable").on("hidden", function(e, t) {
            if ("save" === t || "nochange" === t) {
                var a = o(this).closest("tr").next().find(".editable");
                o("#autoopen").is(":checked") ? setTimeout(function() {
                    a.editable("show")
                }, 300) : a.focus()
            }
        }), o("#users a").editable({
            type: "text",
            name: "username",
            title: "Enter username",
            mode: "inline"
        })
    })
}(window, document, window.jQuery),
function(e, t, o) {
    "use strict";
    var a = [{
        featureType: "water",
        stylers: [{
            visibility: "on"
        }, {
            color: "#bdd1f9"
        }]
    }, {
        featureType: "all",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#334165"
        }]
    }, {
        featureType: "landscape",
        stylers: [{
            color: "#e9ebf1"
        }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
            color: "#c5c6c6"
        }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{
            color: "#fff"
        }]
    }, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{
            color: "#fff"
        }]
    }, {
        featureType: "transit",
        elementType: "geometry",
        stylers: [{
            color: "#d8dbe0"
        }]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{
            color: "#cfd5e0"
        }]
    }, {
        featureType: "administrative",
        stylers: [{
            visibility: "on"
        }, {
            lightness: 33
        }]
    }, {
        featureType: "poi.park",
        elementType: "labels",
        stylers: [{
            visibility: "on"
        }, {
            lightness: 20
        }]
    }, {
        featureType: "road",
        stylers: [{
            color: "#d8dbe0",
            lightness: 20
        }]
    }];
    if (e.fn.gMap) {
        var n = [];
        e("[data-gmap]").each(function() {
            var t = e(this),
                o = t.data("address") && t.data("address").split(";"),
                r = t.data("title") && t.data("title").split(";"),
                i = t.data("zoom") || 14,
                l = t.data("maptype") || "ROADMAP",
                s = [];
            if (o) {
                for (var c in o) "string" == typeof o[c] && s.push({
                    address: o[c],
                    html: r && r[c] || "",
                    popup: !0
                });
                var d = {
                        controls: {
                            panControl: !0,
                            zoomControl: !0,
                            mapTypeControl: !0,
                            scaleControl: !0,
                            streetViewControl: !0,
                            overviewMapControl: !0
                        },
                        scrollwheel: !1,
                        maptype: l,
                        markers: s,
                        zoom: i
                    },
                    u = t.gMap(d).data("gMap.reference");
                n.push(u), void 0 !== t.data("styled") && u.setOptions({
                    styles: a
                })
            }
        })
    }
}(jQuery, window, document),
function(e, t, o, a) {
    o(function() {
        var e = o("[data-vector-map]");
        new VectorMap(e, n, r)
    });
    var n = {
            CA: 11100,
            DE: 2510,
            FR: 3710,
            AU: 5710,
            GB: 8310,
            RU: 9310,
            BR: 6610,
            IN: 7810,
            CN: 4310,
            US: 839,
            SA: 410
        },
        r = [{
            latLng: [41.9, 12.45],
            name: "Vatican City"
        }, {
            latLng: [43.73, 7.41],
            name: "Monaco"
        }, {
            latLng: [-.52, 166.93],
            name: "Nauru"
        }, {
            latLng: [-8.51, 179.21],
            name: "Tuvalu"
        }, {
            latLng: [7.11, 171.06],
            name: "Marshall Islands"
        }, {
            latLng: [17.3, -62.73],
            name: "Saint Kitts and Nevis"
        }, {
            latLng: [3.2, 73.22],
            name: "Maldives"
        }, {
            latLng: [35.88, 14.5],
            name: "Malta"
        }, {
            latLng: [41, -71.06],
            name: "New England"
        }, {
            latLng: [12.05, -61.75],
            name: "Grenada"
        }, {
            latLng: [13.16, -59.55],
            name: "Barbados"
        }, {
            latLng: [17.11, -61.85],
            name: "Antigua and Barbuda"
        }, {
            latLng: [-4.61, 55.45],
            name: "Seychelles"
        }, {
            latLng: [7.35, 134.46],
            name: "Palau"
        }, {
            latLng: [42.5, 1.51],
            name: "Andorra"
        }]
}(window, document, window.jQuery),
function(e, t, o, a) {
    e.defaultColors = {
        markerColor: "#23b7e5",
        bgColor: "transparent",
        scaleColors: ["#878c9a"],
        regionFill: "#bbbec6"
    }, e.VectorMap = function(e, t, o) {
        if (e && e.length) {
            var a, n, r, i = e.data(),
                l = i.height || "300",
                s = {
                    markerColor: i.markerColor || defaultColors.markerColor,
                    bgColor: i.bgColor || defaultColors.bgColor,
                    scale: i.scale || 1,
                    scaleColors: i.scaleColors || defaultColors.scaleColors,
                    regionFill: i.regionFill || defaultColors.regionFill,
                    mapName: i.mapName || "world_mill_en"
                };
            e.css("height", l), a = s, n = t, r = o, e.vectorMap({
                map: a.mapName,
                backgroundColor: a.bgColor,
                zoomMin: 1,
                zoomMax: 8,
                zoomOnScroll: !1,
                regionStyle: {
                    initial: {
                        fill: a.regionFill,
                        "fill-opacity": 1,
                        stroke: "none",
                        "stroke-width": 1.5,
                        "stroke-opacity": 1
                    },
                    hover: {
                        "fill-opacity": .8
                    },
                    selected: {
                        fill: "blue"
                    },
                    selectedHover: {}
                },
                focusOn: {
                    x: .4,
                    y: .6,
                    scale: a.scale
                },
                markerStyle: {
                    initial: {
                        fill: a.markerColor,
                        stroke: a.markerColor
                    }
                },
                onRegionLabelShow: function(e, t, o) {
                    n && n[o] && t.html(t.html() + ": " + n[o] + " visitors")
                },
                markers: r,
                series: {
                    regions: [{
                        values: n,
                        scale: a.scaleColors,
                        normalizeFunction: "polynomial"
                    }]
                }
            })
        }
    }
}(window, document, window.jQuery),
function(e, t, o) {
    "use strict";
    var a = {
            errorClass: "is-invalid",
            successClass: "is-valid",
            classHandler: function(e) {
                var t = e.$element.parents(".form-group").find("input");
                return t.length || (t = e.$element.parents(".c-checkbox").find("label")), t
            },
            errorsContainer: function(e) {
                return e.$element.parents(".form-group")
            },
            errorsWrapper: '<div class="text-help">',
            errorTemplate: "<div></div>"
        },
        n = e("#loginForm");
    n.length && n.parsley(a);
    var r = e("#registerForm");
    r.length && r.parsley(a)
}(jQuery, window, document),
function() {
    "use strict";
    $(function() {
        if (!$.fn.bootgrid) return;
        $("#bootgrid-basic").bootgrid({
            templates: {
                actionButton: '<button class="btn btn-secondary" type="button" title="{{ctx.text}}">{{ctx.content}}</button>',
                actionDropDown: '<div class="{{css.dropDownMenu}}"><button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown"><span class="{{css.dropDownMenuText}}">{{ctx.content}}</span></button><ul class="{{css.dropDownMenuItems}}" role="menu"></ul></div>',
                actionDropDownItem: '<li class="dropdown-item"><a href="" data-action="{{ctx.action}}" class="dropdown-link {{css.dropDownItemButton}}">{{ctx.text}}</a></li>',
                actionDropDownCheckboxItem: '<li class="dropdown-item"><label class="dropdown-item p-0"><input name="{{ctx.name}}" type="checkbox" value="1" class="{{css.dropDownItemCheckbox}}" {{ctx.checked}} /> {{ctx.label}}</label></li>',
                paginationItem: '<li class="page-item {{ctx.css}}"><a href="" data-page="{{ctx.page}}" class="page-link {{css.paginationButton}}">{{ctx.text}}</a></li>'
            }
        }), $("#bootgrid-selection").bootgrid({
            selection: !0,
            multiSelect: !0,
            rowSelect: !0,
            keepSelection: !0,
            templates: {
                select: '<div class="checkbox c-checkbox"><label class="mb-0"><input type="{{ctx.type}}" class="{{css.selectBox}}" value="{{ctx.value}}" {{ctx.checked}}><span class="fa fa-check"></span></label></div>',
                actionButton: '<button class="btn btn-secondary" type="button" title="{{ctx.text}}">{{ctx.content}}</button>',
                actionDropDown: '<div class="{{css.dropDownMenu}}"><button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown"><span class="{{css.dropDownMenuText}}">{{ctx.content}}</span></button><ul class="{{css.dropDownMenuItems}}" role="menu"></ul></div>',
                actionDropDownItem: '<li class="dropdown-item"><a href="" data-action="{{ctx.action}}" class="dropdown-link {{css.dropDownItemButton}}">{{ctx.text}}</a></li>',
                actionDropDownCheckboxItem: '<li class="dropdown-item"><label class="dropdown-item p-0"><input name="{{ctx.name}}" type="checkbox" value="1" class="{{css.dropDownItemCheckbox}}" {{ctx.checked}} /> {{ctx.label}}</label></li>',
                paginationItem: '<li class="page-item {{ctx.css}}"><a href="" data-page="{{ctx.page}}" class="page-link {{css.paginationButton}}">{{ctx.text}}</a></li>'
            }
        });
        var e = $("#bootgrid-command").bootgrid({
            formatters: {
                commands: function(e, t) {
                    return '<button type="button" class="btn btn-sm btn-info mr-2 command-edit" data-row-id="' + t.id + '"><em class="fa fa-edit fa-fw"></em></button><button type="button" class="btn btn-sm btn-danger command-delete" data-row-id="' + t.id + '"><em class="fa fa-trash fa-fw"></em></button>'
                }
            },
            templates: {
                actionButton: '<button class="btn btn-secondary" type="button" title="{{ctx.text}}">{{ctx.content}}</button>',
                actionDropDown: '<div class="{{css.dropDownMenu}}"><button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown"><span class="{{css.dropDownMenuText}}">{{ctx.content}}</span></button><ul class="{{css.dropDownMenuItems}}" role="menu"></ul></div>',
                actionDropDownItem: '<li class="dropdown-item"><a href="" data-action="{{ctx.action}}" class="dropdown-link {{css.dropDownItemButton}}">{{ctx.text}}</a></li>',
                actionDropDownCheckboxItem: '<li class="dropdown-item"><label class="dropdown-item p-0"><input name="{{ctx.name}}" type="checkbox" value="1" class="{{css.dropDownItemCheckbox}}" {{ctx.checked}} /> {{ctx.label}}</label></li>',
                paginationItem: '<li class="page-item {{ctx.css}}"><a href="" data-page="{{ctx.page}}" class="page-link {{css.paginationButton}}">{{ctx.text}}</a></li>'
            }
        }).on("loaded.rs.jquery.bootgrid", function() {
            e.find(".command-edit").on("click", function() {
                console.log("You pressed edit on row: " + $(this).data("row-id"))
            }).end().find(".command-delete").on("click", function() {
                console.log("You pressed delete on row: " + $(this).data("row-id"))
            })
        })
    })
}(),
function() {
    "use strict";
    $(function() {
        if (!$.fn.DataTable) return;
        $("#datatable1").DataTable({
            "order": [[ 1, "desc" ]],
            paging: !0,
            ordering: !0,
            info: !0,
            responsive: !0,
            oLanguage: {
                sSearch: '<em class="ion-search"></em>',
                sLengthMenu: "_MENU_ records per page",
                info: "Showing page _PAGE_ of _PAGES_",
                zeroRecords: "Nothing found - sorry",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                oPaginate: {
                    sNext: '<em class="fa fa-caret-right"></em>',
                    sPrevious: '<em class="fa fa-caret-left"></em>'
                }
            }
        }), $("#datatable2").DataTable({
            paging: !0,
            ordering: !0,
            info: !0,
            responsive: !0,
            oLanguage: {
                sSearch: "Search all columns:",
                sLengthMenu: "_MENU_ records per page",
                info: "Showing page _PAGE_ of _PAGES_",
                zeroRecords: "Nothing found - sorry",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                oPaginate: {
                    sNext: '<em class="fa fa-caret-right"></em>',
                    sPrevious: '<em class="fa fa-caret-left"></em>'
                }
            },
            dom: "Bfrtip",
            buttons: [{
                extend: "copy",
                className: "btn-info"
            }, {
                extend: "csv",
                className: "btn-info"
            }, {
                extend: "excel",
                className: "btn-info",
                title: "XLS-File"
            }, {
                extend: "pdf",
                className: "btn-info",
                title: $("title").text()
            }, {
                extend: "print",
                className: "btn-info"
            }]
        }), $("#datatable3").DataTable({
            paging: !0,
            ordering: !0,
            info: !0,
            responsive: !0,
            oLanguage: {
                sSearch: "Search all columns:",
                sLengthMenu: "_MENU_ records per page",
                info: "Showing page _PAGE_ of _PAGES_",
                zeroRecords: "Nothing found - sorry",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                oPaginate: {
                    sNext: '<em class="fa fa-caret-right"></em>',
                    sPrevious: '<em class="fa fa-caret-left"></em>'
                }
            },
            keys: !0
        })
    })
}(), window, document, (0, window.jQuery)(function() {});