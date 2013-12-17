<link href="styles/slides.css" rel="stylesheet" type="text/css"/>

<style>
#tarjeta {
		width: 1000px;
		height: 510px;
		position: absolute;
		background-image: url(../images/Snow_background.png);
		overflow: hidden;
}
#container{
    width: 1000px;
    height: 510px;
    position: relative;
}

#container img{
    width: 1000px;
    height: 510px;
    position: absolute;
}

</style>

<script type="text/javascript" src="../javascripts/ThreeCanvas.js"></script>
<script type="text/javascript" src="../javascripts/Snow.js"></script>
	
<script>
		
var slides;
var cw_slide = 0;

function openWindow(url){
	window.location = url
}


function moveAfter(){
	slides = this;
}

			var SCREEN_WIDTH = 1000;
			var SCREEN_HEIGHT = 510;

			var container;

			var particle;

			var camera;
			var scene;
			var renderer;

			var mouseX = 0;
			var mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;
			
			var particles = []; 
			var particleImage = new Image();//THREE.ImageUtils.loadTexture( "img/ParticleSmoke.png" );
			particleImage.src = '../images/ParticleSmoke.png'; 

		
		
			function snow_init() {

				container = document.getElementById('tarjeta');
				//document.body.appendChild(container);

				camera = new THREE.PerspectiveCamera( 75, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
				camera.position.z = 1000;

				scene = new THREE.Scene();
				scene.add(camera);
					
				renderer = new THREE.CanvasRenderer();
				renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
				var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );
					
				for (var i = 0; i < 500; i++) {

					particle = new Particle3D( material);
					particle.position.x = Math.random() * 3000 - 1000;
					particle.position.y = Math.random() * 3000 - 1000;
					particle.position.z = Math.random() * 3000 - 1000;
					particle.scale.x = particle.scale.y =  1;
					scene.add( particle );
					
					particles.push(particle); 
				}

				container.appendChild( renderer.domElement );

	
			//	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
			//	document.addEventListener( 'touchstart', onDocumentTouchStart, false );
			//	document.addEventListener( 'touchmove', onDocumentTouchMove, false );
				
				setInterval( loop, 1000 / 60 );
				
			}
			
			function onDocumentMouseMove( event ) {

				mouseX = event.clientX - windowHalfX;
				mouseY = event.clientY - windowHalfY;
			}

			function onDocumentTouchStart( event ) {

				if ( event.touches.length == 1 ) {

					event.preventDefault();

					mouseX = event.touches[ 0 ].pageX - windowHalfX;
					mouseY = event.touches[ 0 ].pageY - windowHalfY;
				}
			}

			function onDocumentTouchMove( event ) {

				if ( event.touches.length == 1 ) {

					event.preventDefault();

					mouseX = event.touches[ 0 ].pageX - windowHalfX;
					mouseY = event.touches[ 0 ].pageY - windowHalfY;
				}
			}

			//

			function loop() {

			for(var i = 0; i<particles.length; i++)
				{

					var particle = particles[i]; 
					particle.updatePhysics(); 
	
					with(particle.position)
					{
						if(y<-1000) y+=2000; 
						if(x>1000) x-=2000; 
						else if(x<-1000) x+=2000; 
						if(z>1000) z-=2000; 
						else if(z<-1000) z+=2000; 
					}				
				}
			
				camera.position.x += ( mouseX - camera.position.x ) * 0.05;
				camera.position.y += ( - mouseY - camera.position.y ) * 0.05;
				camera.lookAt(scene.position); 

				renderer.render( scene, camera );

				
			}				
</script>
<div id="container">
	<img src="../images/window_outline.v2.png" style="z-index:1; opacity:1"/>
	<div id="tarjeta">
	</div>
</div>
