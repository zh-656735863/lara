let canvas = document.querySelector('canvas');
let context = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

requestAnimationFrame = requestAnimationFrame || webkitRequestAnimationFrame;

let OPTIONS = {
  AMOUNT: 100,
  UPPER_LIMIT: 20,
  LOWER_LIMIT: 1
};

let UPPER_SIZE = 10;
let LOWER_SIZE = 4;

let doIt = function doIt() {
  return Math.random() > 0.5;
};
let update = function update(p) {
  return doIt() ? Math.max(OPTIONS.LOWER_LIMIT, p - 1) : Math.min(p + 1, OPTIONS.UPPER_LIMIT);
};
let reset = function reset(p) {
  p.x = p.startX;
  p.y = p.startY;
};
let floored = function floored(r) {
  return Math.floor(Math.random() * r);
};
let genParticles = function genParticles() {
  return new Array(OPTIONS.AMOUNT).fill().map(function (p) {
    let size = floored(UPPER_SIZE) + LOWER_SIZE;
    let c = document.createElement('canvas');
    let ctx = c.getContext('2d');
    let r = Math.PI / 180 * floored(360);
    let color = 'rgba(255,' + (100 + Math.floor(Math.random() * 70)) + ', 0, ' + Math.random() + ')';
    let xDelayed = doIt();
    let startX = xDelayed ? -(size + floored(canvas.width)) : floored(canvas.width * 0.25);
    let startY = xDelayed ? size + floored(canvas.height * 0.25) + Math.floor(canvas.height * 0.75) : canvas.height + size + floored(canvas.height);
    c.height = size;
    c.width = size;
    context.globalCompositeOperation = 'multiply';
    // ctx.filter = `blur(${Math.random() * size}px)`
    ctx.translate(size / 2, size / 2);
    ctx.rotate(r);
    ctx.translate(-(size / 2), -(size / 2));
    ctx.fillStyle = color;
    ctx.fillRect(0, 0, size, size);
    return {
      x: startX,
      y: startY,
      startY: startY,
      startX: startX,
      c: c,
      r: r,
      vx: floored(OPTIONS.UPPER_LIMIT / 4),
      vy: floored(OPTIONS.UPPER_LIMIT / 4),
      size: size
    };
  });
};

let particles = genParticles();
let FRAME_COUNT = 0;

let draw = function draw() {
  if (canvas.width !== window.innerWidth || canvas.height !== window.innerHeight) {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    particles = genParticles();
  }
  // context.restore()
  let _iteratorNormalCompletion = true;
  let _didIteratorError = false;
  let _iteratorError = undefined;

  try {
    for (let _iterator = particles[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done) ; _iteratorNormalCompletion = true) {
      let particle = _step.value;

      context.clearRect(particle.x, particle.y, particle.size, particle.size);
      FRAME_COUNT++;
      if (particle.y < canvas.height || particle.startX < 0) particle.x += particle.vx;
      if (particle.x > 0 || particle.startY > canvas.height) particle.y -= particle.vy;
      if (FRAME_COUNT % 11 === 0 && doIt()) particle.vx = update(particle.vx);
      if (FRAME_COUNT % 13 === 0 && doIt()) particle.vy = update(particle.vy);
      context.drawImage(particle.c, particle.x, particle.y);
      if (particle.x > canvas.width || particle.y < -particle.size) reset(particle);
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator.return) {
        _iterator.return();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }

  requestAnimationFrame(draw);
};
requestAnimationFrame(draw);
