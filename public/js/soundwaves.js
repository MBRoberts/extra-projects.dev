// jshint esnext:true
let mic
let fft
let specHistory = []
let red = getRandomInt(0, 255);
let blue = getRandomInt(0, 255);
let green = getRandomInt(0, 255);

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

function setup() {
  createCanvas(1600, 1000, WEBGL)
  noFill()

  mic = new p5.AudioIn()
  mic.start()
  
  fft = new p5.FFT()
  fft.setInput(mic)
  frameRate(40)

}

function draw() {
  background('#161712')
  rotateX(-.8)
  rotateY(0)
  rotateZ(0)
  orbitControl()
  translate(-850, -350, 0)
  
  var spec = fft.analyze()
  camera(0, 0, 50);


  if (spec.length > 0) {
	// store a history of the spectrum over time
	specHistory.unshift(spec);
	if (specHistory.length > 250) {
	  specHistory.pop()
	}
	
	specHistory.forEach((spectrum) => {
	  translate(0, 25, 8)
	  var x = 0;
	  
	  beginShape()
	  var color = 'rgba(' + red + ', ' + blue + ', ' + green + ', 1)';
	  // adjust line opacity for mobile vs desktop
	  if (typeof window.orientation !== 'undefined') {
		// mobile
		fill(color);
	  } else {
		// desktop
		fill(color);
		colorMode(color);
	  }
	  
	  stroke(40);

	  for (let spectrumValue of spectrum) {
		vertex(x, -spectrumValue, 0)
		x+=10
		if (x > 1800) {
		  break
		}
	  }
	  endShape()
	})
  }
  	if(red == 255){
		if(green == 255){
			if(blue == 255){
				green = getRandomInt(0, 255);
				red = getRandomInt(0, 255);
				blue = getRandomInt(0, 255);
			}else{
				blue++;
			}
		}else{
			green++;
		}
	}else{
		red++;
	}
}