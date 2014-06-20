function renderCode(parentId) {
  var examples = document.getElementsByClassName('example');
  if (examples.length > 0) {

    var sketches = examples[0].getElementsByTagName('code');
    var sketches_array = Array.prototype.slice.call(sketches);
    sketches_array.forEach(function(s) {
      setupCode(s, parentId);
      runCode(s, parentId);
    });
  }

  function setupCode(sketch, parentId) {

    // remove start and end lines
    // sketch.innerText = sketch.innerText.replace(/^\s+|\s+$/g, '');
    var runnable = sketch.innerText;
    var rows = sketch.innerText.split('\n').length;

    // sketch
    var parent = document.getElementById(parentId) || sketch.parentNode;
    if (!parentId) {
      sketch.style.position = 'absolute';
      sketch.style.top = 0;
      sketch.style.left = '150px';
      parent.style.position = 'relative';
      var h = Math.max(sketch.offsetHeight, 100) + 25;
      parent.style.height = h+'px';
    }

    // store original sketch
    var orig_sketch = document.createElement('div');
    orig_sketch.innerHTML = sketch.innerHTML;

    // create canvas
    var cnv = document.createElement('div');
    cnv.className = 'cnv_div';
    cnv.style.position = 'absolute';
    parent.appendChild(cnv);


    // create edit space
    var edit_space = document.createElement('div');
    parent.appendChild(edit_space);
    if (!parentId) {
      edit_space.style.position = 'absolute';
      edit_space.style.top = '-20px';
      edit_space.style.left = '150px';
    } else {
      edit_space.style.position = 'absolute';
      edit_space.style.top = cnv.style.height;
    }
    

    //add buttons
    var edit_button = document.createElement('button');
    edit_button.value = 'edit';
    edit_button.innerHTML = 'edit';
    edit_space.appendChild(edit_button);
    edit_button.onclick = function(e) {
      if (edit_button.innerHTML === 'edit') { // edit
        setMode(sketch, 'edit');
      } else { // run
        setMode(sketch, 'run');
      }
    }


    var reset_button = document.createElement('button');
    reset_button.value = 'reset';
    reset_button.innerHTML = 'reset';
    edit_space.appendChild(reset_button);
    reset_button.onclick = function() {
      edit_area.value = orig_sketch.innerText;
      setMode(sketch, 'run');
    };

    var edit_area = document.createElement('textarea');
    edit_area.value = runnable;
    edit_area.rows = rows;
    edit_area.cols = 80;
    edit_area.position = 'absolute'
    edit_space.appendChild(edit_area);
    edit_area.style.display = 'none';


    function setMode(sketch, m) {
      if (m === 'edit') {
        edit_button.innerHTML = 'run';
        edit_area.style.display = 'block';
      } else {
        edit_button.innerHTML = 'edit';
        edit_area.style.display = 'none';
        sketch.innerHTML = edit_area.value;
        runCode(sketch, parent);
      }
    }
  }

  function runCode(sketch, parentId) {

    var parent = document.getElementById(parentId) || sketch.parentNode;
    var runnable = sketch.innerText;
    var cnv = parent.getElementsByClassName('cnv_div')[0];
    cnv.innerHTML = '';

    var s = function( p ) {

      if (runnable.indexOf('setup()') === -1 && runnable.indexOf('draw()') === -1){
        p.setup = function() {
          p.createCanvas(100, 100);
          p.background(200);
          with (p) {
            eval(runnable);
          }
        }
      }
      else {
 
        with (p) {
          eval(runnable);
        }

        var fxns = ['setup', 'draw', 'preload', 'mousePressed', 'mouseReleased', 
        'mouseMoved', 'mouseDragged', 'mouseClicked', 'mouseWheel', 
        'touchStarted', 'touchMoved', 'touchEnded', 
        'keyPressed', 'keyReleased', 'keyTyped'];
        fxns.forEach(function(f) { 
          if (runnable.indexOf(f) !== -1) {
            with (p) {
              p[f] = eval(f);
            }
          }
        });

        if (typeof p.setup === 'undefined') {
          p.setup = function() {
            p.createCanvas(100, 100);
            p.background(200);
          }
        }
      }
    };

    //prettyPrint();

    setTimeout(function() { var myp5 = new p5(s, cnv); }, 100);
  }

}