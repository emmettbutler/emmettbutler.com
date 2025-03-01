// Adapted from http://pepperonipals.com/asdf.js
var canvas;
var time = 0;

var delta = [ 0, 0 ];
var stage = [ window.screenX, window.screenY, window.innerWidth, window.innerHeight ];
getBrowserDimensions();

var theme;

var names = ["dog"];
var images = [];
var loaded = 0;

function preload() {
    for (var i = 0; i < names.length; i++){
        images[i] = new Image();
        images[i].onload = function(){
            loaded += 1;
            if (loaded === names.length) {
                init();
                play();
            }
        }
        images[i].src = "media/images/" + names[i] + ".png";
    }
}

var worldAABB, world, iterations = 1, timeStep = 1 / 20;

var walls = [];
var wall_thickness = 200;
var wallsSetted = false;

var bodies, elements, text;

var createMode = false;
var destroyMode = false;

var isMouseDown = false;
var mouseJoint;
var mouse = { x: 0, y: 0 };
var gravity = { x: 0, y: 1 };

var PI2 = Math.PI * 2;

var timeOfLastTouch = 0;

// init();
// play();

preload();

function init() {

    canvas = document.getElementById( 'canvas' );

    document.onmousedown = onDocumentMouseDown;
    document.onmouseup = onDocumentMouseUp;
    document.onmousemove = onDocumentMouseMove;
    document.ondblclick = onDocumentDoubleClick;

    document.addEventListener( 'touchstart', onDocumentTouchStart, false );
    document.addEventListener( 'touchmove', onDocumentTouchMove, false );
    document.addEventListener( 'touchend', onDocumentTouchEnd, false );

    window.addEventListener( 'deviceorientation', onWindowDeviceOrientation, false );

    // init box2d

    worldAABB = new b2AABB();
    worldAABB.minVertex.Set( -200, -200 );
    worldAABB.maxVertex.Set( window.innerWidth + 200, window.innerHeight + 200 );

    world = new b2World( worldAABB, new b2Vec2( 0, 0 ), true );

    setWalls();
    reset();
}


function play() {

    setInterval( loop, 1000 / 40 );
}

function reset() {

    var i;

    if ( bodies ) {

        for ( i = 0; i < bodies.length; i++ ) {

            var body = bodies[ i ]
            canvas.removeChild( body.GetUserData().element );
            world.DestroyBody( body );
            body = null;
        }
    }


    bodies = [];
    elements = [];

    createInstructions();
    createDog();
}

function onDocumentMouseDown() {

    isMouseDown = true;
    return false;
}

function onDocumentMouseUp() {

    isMouseDown = false;
    return false;
}

function onDocumentMouseMove( event ) {

    mouse.x = event.clientX;
    mouse.y = event.clientY;
}

function onDocumentDoubleClick() {

    reset();
}

function onDocumentTouchStart( event ) {

    if( event.touches.length == 1 ) {

        event.preventDefault();

        // Faking double click for touch devices

        var now = new Date().getTime();

        if ( now - timeOfLastTouch  < 250 ) {

            reset();
            return;
        }

        timeOfLastTouch = now;

        mouse.x = event.touches[ 0 ].pageX;
        mouse.y = event.touches[ 0 ].pageY;
        isMouseDown = true;
    }
}

function onDocumentTouchMove( event ) {

    if ( event.touches.length == 1 ) {

        event.preventDefault();

        mouse.x = event.touches[ 0 ].pageX;
        mouse.y = event.touches[ 0 ].pageY;

    }

}

function onDocumentTouchEnd( event ) {

    if ( event.touches.length == 0 ) {

        event.preventDefault();
        isMouseDown = false;

    }

}

function onWindowDeviceOrientation( event ) {

    if ( event.beta ) {

        gravity.x = Math.sin( event.gamma * Math.PI / 180 );
        gravity.y = Math.sin( ( Math.PI / 4 ) + event.beta * Math.PI / 180 );

    }

}

//

function createInstructions() {
  return

    var size = 250;

    var element = document.createElement( 'div' );
    element.width = size;
    element.height = size;
    element.style.position = 'absolute';
    element.style.left = -200 + 'px';
    element.style.top = -200 + 'px';
    element.style.cursor = "default";

    canvas.appendChild(element);
    elements.push( element );

    var circle = document.createElement( 'canvas' );
    circle.width = size;
    circle.height = size;

    var graphics = circle.getContext( '2d' );

    graphics.fillStyle = theme[ 3 ];
    graphics.beginPath();
    graphics.arc( size * .5, size * .5, size * .5, 0, PI2, true );
    graphics.closePath();
    graphics.fill();

    element.appendChild( circle );

    var b2body = new b2BodyDef();

    var circle = new b2CircleDef();
    circle.radius = size / 2;
    circle.density = 1;
    circle.friction = 0.3;
    circle.restitution = 0.3;
    b2body.AddShape(circle);
    b2body.userData = {element: element};

    b2body.position.Set( Math.random() * stage[2], Math.random() * -200 );
    b2body.linearVelocity.Set( Math.random() * 400 - 200, Math.random() * 400 - 200 );
    bodies.push( world.CreateBody(b2body) );
}

function createDog( x, y ) {

    var x = x || Math.random() * stage[2];
    var y = y || Math.random() * -200;

    var width = 54;
    var height = 12;
    var element = document.createElement("canvas");
    element.width = width;
    element.height = height;
    element.style['position'] = 'absolute';
    element.style['left'] = -200 + 'px';
    element.style['top'] = -200 + 'px';
    element.style['z-index'] = 10000000;

    var graphics = element.getContext("2d");
    graphics.drawImage(images[0], 0, 0, width, height);
    canvas.appendChild(element);

    elements.push( element );

    var b2body = new b2BodyDef();

    var rect = new b2BoxDef();
    rect.extents.Set(width/2, height/2);
    rect.density = 1;
    rect.friction = 0.9;
    rect.restitution = 0.1;
    b2body.AddShape(rect);

    b2body.userData = {element: element};
    b2body.position.Set( x, y );
    var b = world.CreateBody(b2body)
    bodies.push(b);
}

function loop() {
    time++;

    if (getBrowserDimensions()) {
        setWalls();
    }

    delta[0] += (0 - delta[0]) * .5;
    delta[1] += (0 - delta[1]) * .5;

    world.m_gravity.x = gravity.x * 150 + delta[0];
    world.m_gravity.y = gravity.y * 150 + delta[1];

    mouseDrag();
    world.Step(timeStep, iterations);

    for (i = 0; i < bodies.length; i++) {
        var body = bodies[i];
        var element = elements[i];

        element.style.left = (body.m_position0.x - (element.width >> 1)) + 'px';
        element.style.top = (body.m_position0.y - (element.height >> 1)) + 'px';

        var rotationStyle = 'rotate(' + (body.m_rotation0 * 57.2957795) + 'deg)';
        element.style.WebkitTransform = rotationStyle;
        element.style.MozTransform = rotationStyle;
        element.style.OTransform = rotationStyle;
        element.style.msTransform = rotationStyle;
    }

    if(time % 280 == 0){
        createDog();
    }

}


// .. BOX2D UTILS

function createBox(world, x, y, width, height, fixed) {

    if (typeof(fixed) == 'undefined') {

        fixed = true;

    }

    var boxSd = new b2BoxDef();

    if (!fixed) {

        boxSd.density = 1.0;

    }

    boxSd.extents.Set(width, height);

    var boxBd = new b2BodyDef();
    boxBd.AddShape(boxSd);
    boxBd.position.Set(x,y);

    return world.CreateBody(boxBd);

}

function mouseDrag()
{
    if (isMouseDown && !mouseJoint) {

        var body = getBodyAtMouse();

        if (body) {

            var md = new b2MouseJointDef();
            md.body1 = world.m_groundBody;
            md.body2 = body;
            md.target.Set(mouse.x, mouse.y);
            md.maxForce = 30000 * body.m_mass;
            md.timeStep = timeStep;
            mouseJoint = world.CreateJoint(md);
            body.WakeUp();

        }
    }

    // mouse release
    if (!isMouseDown) {

        destroyMode = false;

        if (mouseJoint) {

            world.DestroyJoint(mouseJoint);
            mouseJoint = null;

        }

    }

    // mouse move
    if (mouseJoint) {
        var p2 = new b2Vec2(mouse.x, mouse.y);
        mouseJoint.SetTarget(p2);
    }
}

function getBodyAtMouse() {

    // Make a small box.
    var mousePVec = new b2Vec2();
    mousePVec.Set(mouse.x, mouse.y);

    var aabb = new b2AABB();
    aabb.minVertex.Set(mouse.x - 1, mouse.y - 1);
    aabb.maxVertex.Set(mouse.x + 1, mouse.y + 1);

    // Query the world for overlapping shapes.
    var k_maxCount = 10;
    var shapes = new Array();
    var count = world.Query(aabb, shapes, k_maxCount);
    var body = null;

    for (var i = 0; i < count; ++i) {

        if (shapes[i].m_body.IsStatic() == false) {

            if ( shapes[i].TestPoint(mousePVec) ) {

                body = shapes[i].m_body;
                break;

            }

        }

    }

    return body;

}

function setWalls() {

    if (wallsSetted) {

        world.DestroyBody(walls[0]);
        world.DestroyBody(walls[1]);
        world.DestroyBody(walls[2]);
        world.DestroyBody(walls[3]);

        walls[0] = null;
        walls[1] = null;
        walls[2] = null;
        walls[3] = null;
    }

    walls[0] = createBox(world, stage[2] / 2, - wall_thickness, stage[2], wall_thickness);
    walls[1] = createBox(world, stage[2] / 2, stage[3] + wall_thickness, stage[2], wall_thickness);
    walls[2] = createBox(world, - wall_thickness, stage[3] / 2, wall_thickness, stage[3]);
    walls[3] = createBox(world, stage[2] + wall_thickness, stage[3] / 2, wall_thickness, stage[3]);

    wallsSetted = true;

}

// BROWSER DIMENSIONS

function getBrowserDimensions() {

    var changed = false;

    if (stage[0] != window.screenX) {

        delta[0] = (window.screenX - stage[0]) * 50;
        stage[0] = window.screenX;
        changed = true;

    }

    if (stage[1] != window.screenY) {

        delta[1] = (window.screenY - stage[1]) * 50;
        stage[1] = window.screenY;
        changed = true;

    }

    if (stage[2] != window.innerWidth) {

        stage[2] = window.innerWidth;
        changed = true;

    }

    if (stage[3] != window.innerHeight) {

        stage[3] = window.innerHeight;
        changed = true;

    }

    return changed;

}