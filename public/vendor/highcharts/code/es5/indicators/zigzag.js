/**
 * Highstock JS v11.2.0 (2023-10-30)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2021 Kacper Madej
 *
 * License: www.highcharts.com/license
 */!function(t){"object"==typeof module&&module.exports?(t.default=t,module.exports=t):"function"==typeof define&&define.amd?define("highcharts/indicators/zigzag",["highcharts","highcharts/modules/stock"],function(e){return t(e),t.Highcharts=e,t}):t("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(t){"use strict";var e=t?t._modules:{};function o(t,e,o,n){t.hasOwnProperty(e)||(t[e]=n.apply(null,o),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:e,module:t[e]}})))}o(e,"Stock/Indicators/Zigzag/ZigzagIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var o,n=this&&this.__extends||(o=function(t,e){return(o=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var o in e)Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function n(){this.constructor=t}o(t,e),t.prototype=null===e?Object.create(e):(n.prototype=e.prototype,new n)}),i=t.seriesTypes.sma,r=e.merge,s=e.extend,a=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.data=void 0,e.points=void 0,e.options=void 0,e}return n(e,t),e.prototype.getValues=function(t,e){var o,n,i,r,s=e.lowIndex,a=e.highIndex,u=e.deviation/100,h={low:1+u,high:1-u},p=t.xData,d=t.yData,c=d?d.length:0,f=[],l=[],g=[],v=!1,y=!1;if(p&&!(p.length<=1)&&(!c||void 0!==d[0][s]&&void 0!==d[0][a])){var m=d[0][s],x=d[0][a];for(o=1;o<c;o++)d[o][s]<=x*h.high?(f.push([p[0],x]),i=[p[o],d[o][s]],r=!0,v=!0):d[o][a]>=m*h.low&&(f.push([p[0],m]),i=[p[o],d[o][a]],r=!1,v=!0),v&&(l.push(f[0][0]),g.push(f[0][1]),n=o++,o=c);for(o=n;o<c;o++)r?(d[o][s]<=i[1]&&(i=[p[o],d[o][s]]),d[o][a]>=i[1]*h.low&&(y=a)):(d[o][a]>=i[1]&&(i=[p[o],d[o][a]]),d[o][s]<=i[1]*h.high&&(y=s)),!1!==y&&(f.push(i),l.push(i[0]),g.push(i[1]),i=[p[o],d[o][y]],r=!r,y=!1);var w=f.length;return 0!==w&&f[w-1][0]<p[c-1]&&(f.push(i),l.push(i[0]),g.push(i[1])),{values:f,xData:l,yData:g}}},e.defaultOptions=r(i.defaultOptions,{params:{index:void 0,period:void 0,lowIndex:2,highIndex:1,deviation:1}}),e}(i);return s(a.prototype,{nameComponents:["deviation"],nameSuffixes:["%"],nameBase:"Zig Zag"}),t.registerSeriesType("zigzag",a),a}),o(e,"masters/indicators/zigzag.src.js",[],function(){})});//# sourceMappingURL=zigzag.js.map