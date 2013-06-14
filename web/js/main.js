$(document).ready(function(){
    prettyPrint();
});

/**
 * most of the code comes from http://creativejs.com/2012/02/ansi-escapes-js/
 */

var width = 210;
var height = 100;
var camera, scene, renderer;
var creativeJSImageFolder = "/img/";

var counterX = 0,
    counterY = 0,
    mouseX = 0,
    mouseY = 0,
    mouseDown = false,
    lastMouseX = 0,
    lastMouseY = 0,
    velX = 0,
    velY = 0,
    mouseClicked = false,
    targetX = 0,
    targetY = 0,
    mouseUpCounter = 0,
    xMove = 50,
    yMove = 20,
    dragExtentX = 200,
    dragExtentY = 100,
    logoObject3D,

    cdCubes,
    logoMaterials = [],
    logoMaterial,
    animating = false,
    lightsOn = false;

var logoImage = new Image();
// preload logo
logoImage.src = creativeJSImageFolder + 'kaoz4-logo.png';

//window.addEventListener("load", init3D, false);

function init3D() {
    camera = new THREE.PerspectiveCamera(27, width / height, 1, 2000);
    camera.position.z = 320;
    camera.position.y = 20;

    scene = new THREE.Scene();

    scene.add(camera);

    logoObject3D = new THREE.Object3D();

    makeLogoPlanes();

    scene.add(logoObject3D);
    logoObject3D.position.y = 0;

    setupRenderer();
}

function makeLogoPlanes() {
    var material = new THREE.MeshBasicMaterial({map:THREE.ImageUtils.loadTexture(creativeJSImageFolder + 'kaoz4-logo.png'), opacity:1, blending:THREE.AdditiveAlphaBlending, depthTest:false, transparent:false});
    var geom = new THREE.PlaneGeometry(300, 300 * (115 / 460), 1, 1);

    var logo = new THREE.Mesh(geom, material);
    logo.position.z = 0;
    logo.position.y = 0;

    logoObject3D.add(logo);
    logoMaterial = material;
}

function setupRenderer() {

    if (Detector.webgl) {
        renderer = new THREE.WebGLRenderer({antialias:true});
        //setInterval(loop, 1000 / 30);
        loop();
    } else if (Detector.canvas) {
        renderer = new THREE.CanvasRenderer({});
        //setInterval(loop, 1000 / 20);
        loop();

    } else {
        // oh super noes! No canvas or WebGL? WTF!? Best just leave it as it is
        return;
    }

    var element = document.getElementById('logo');
    renderer.setSize(width, height);
    element.parentNode.replaceChild(renderer.domElement, element);
    var canvas = renderer.domElement;
    canvas.style.background = "transparent";
    var canvas = renderer.domElement;
    window.addEventListener("mousemove", onMouseMove, false);
    canvas.addEventListener("mousedown", onMouseDown, false);
    window.addEventListener("mouseup", onMouseUp, false);
}

function loop() {

    var diffX, diffY, speed = 0.5;

    if (mouseDown) {
        targetX = camera.position.x + ((mouseX - lastMouseX) * 0.1);
        targetY = camera.position.y + ((mouseY - lastMouseY) * -0.1);

        if (targetX > dragExtentX) targetX = dragExtentX;
        else if (targetX < -dragExtentX) targetX = -dragExtentX;
        if (targetY > dragExtentY) targetY = dragExtentY;
        else if (targetY < -dragExtentY) targetY = -dragExtentY;

    } else if (!mouseClicked) {
        targetX = Math.sin(counterX) * xMove;
        targetY = Math.cos(counterY) * yMove;

        counterX += 0.012;
        counterY += 0.01;
        speed = 0.01;

    }
    mouseUpCounter++;
    if (mouseUpCounter > 200) mouseClicked = false;


    velX *= 0.8;
    velY *= 0.8;

    diffX = (targetX - camera.position.x) * speed;
    diffY = (targetY - camera.position.y) * speed;

    velX += diffX;
    velY += diffY;
    camera.position.x += velX;
    camera.position.y += velY;


    if (logoObject3D.targetPosition) {
        var diff = logoObject3D.targetPosition.clone();
        diff.subSelf(logoObject3D.position);
        diff.multiplyScalar(0.2);
        logoObject3D.position.addSelf(diff);

    }

    lastMouseX = mouseX;
    lastMouseY = mouseY;

    if (cdCubes) {
        cdCubes.updateSpin();
    }


    if (document.body.scrollTop > 250 || window.pageYOffset > 250) return;
    camera.lookAt(scene.position);

    if (animating) {
        var rnd = Math.random();
        if (rnd < 0.01) {
            lightsOn = true;
        } else if (rnd > 0.95) {
            lightsOn = false

        }

        if (lightsOn) {
            logoMaterial.opacity = Math.random() * 0.3 + 0.5;
        } else {
            logoMaterial.opacity = Math.random() * 0.01 + 0.05;
        }
        for (var i = 0; i < logoMaterials.length; i++) {
            logoMaterials[i].opacity = logoMaterial.opacity * 0.01;

        }
    }

    renderer.render(scene, camera);
}

function onMouseDown(event) {
    event.preventDefault();
    mouseClicked = true;
    mouseDown = true;
    lastMouseX = mouseX;
    lastMouseY = mouseY;
}

function onMouseUp(event) {
    mouseDown = false;
    mouseUpCounter = 0;

    if (targetX / xMove > 1) targetX = xMove;
    else if (targetX / xMove < -1) targetX = -xMove;
    if (targetY / yMove > 1) targetY = yMove;
    else if (targetY / yMove < -1) {
        targetY = -yMove;
    }
    counterX = Math.asin(targetX / xMove);
    counterY = Math.acos(targetY / yMove);
}

function onMouseMove(event) {
    var canvas = renderer.domElement;
    // for browsers that don't support offsetX and offsetY (Fx)
    mouseX = event.pageX - canvas.offsetLeft;
    mouseY = event.pageY - canvas.offsetTop;

    mouseX -= (width / 2);
    mouseY -= (height / 2);
}

