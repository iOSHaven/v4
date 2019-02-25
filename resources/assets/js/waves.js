"use strict";

window.Waves = function Waves(config) {
  for (var _len = arguments.length, waveConfigs = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    waveConfigs[_key - 1] = arguments[_key];
  }

  var canvas = document.getElementById(config.canvas);
  var context = canvas.getContext('2d');
  var waves = [];
  var scale = 1 / (config.scale || 0.5);
  var width = canvas.width = window.innerHeight * scale;
  var height = canvas.height = window.innerHeight * scale;
  var nodes = config.waveCount || 5;
  var backgroundColor = config.backgroundColor || 'white';
  var backgroundBlendMode = config.backgroundBlendMode || 'source-over';
  var waveBlendMode = config.waveBlendMode || 'screen';

  var resize = function resize() {
    width = canvas.width = window.innerHeight * scale;
    height = canvas.height = window.innerHeight * scale;
    update();
  };

  window.addEventListener('resize', resize);

  var init = function init() {
    for (var i = 0; i < 3; i++) {
      createWave(waveConfigs[i].color, nodes);
    }

    setInterval(update, 10);
  };

  var createWave = function createWave(color, nodes) {
    var nodeArray = [];

    for (var i = 0; i <= nodes + 2; i++) {
      var node = [(i - 1) * width / nodes, 0, Math.random() * 200, 0.3];
      nodeArray.push(node);
    }

    waves.push({
      color: color,
      nodes: nodeArray
    });
  };

  var update = function update() {
    context.fillStyle = backgroundColor;
    context.globalCompositeOperation = backgroundBlendMode;
    context.fillRect(0, 0, width, height);
    context.globalCompositeOperation = waveBlendMode;

    for (var i = 0; i < waves.length; i++) {
      for (var j = 0; j < waves[i].nodes.length; j++) {
        bounce(waves[i].nodes[j], waveConfigs[i].amplitude || 35);
      }

      drawWave(waves[i]);
    }
  };

  var bounce = function bounce(node, amplitude) {
    node[1] = amplitude * Math.sin(node[2] / 20) + height / 2;
    node[2] = node[2] + node[3];
  };

  var diff = function diff(a, b) {
    return (b - a) / 2 + a;
  };

  var drawWave = function drawWave(wave) {
    context.fillStyle = wave.color;
    context.beginPath();
    context.moveTo(0, height);
    context.lineTo(wave.nodes[0][0], wave.nodes[0][1]);

    for (var i = 0; i < wave.nodes.length; i++) {
      if (wave.nodes[i + 1]) {
        context.quadraticCurveTo(wave.nodes[i][0], wave.nodes[i][1], diff(wave.nodes[i][0], wave.nodes[i + 1][0]), diff(wave.nodes[i][1], wave.nodes[i + 1][1]));
      } else {
        context.lineTo(wave.nodes[i][0], wave.nodes[i][1]);
        context.lineTo(width, height);
      }
    }

    context.closePath();
    context.fill();
  };

  init();
};