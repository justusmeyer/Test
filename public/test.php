<script type="text/javascript" src="../javascripts/carousel-min.js"></script>
<script type="text/javascript" src="../javascripts/ThreeCanvas.js"></script>
<script type="text/javascript" src="../javascripts/Snow.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/slides.css" media="all" />

<style>
#tarjeta {
		width: 1000px;
		height: 630px;
		background-image: url(../slides/giftcard.jpg);
		overflow: hidden;
}
#carousel-wrapper {
    width: 1000px;
    height: 630px;
    overflow: hidden;
}
#carousel-content {
    width: 12000px;
}
#carousel-content .slide {
    float: left;
    width: 1000px;
    height: 630px;
}
</style>

	
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
			var SCREEN_HEIGHT = 630;

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
					particle.position.x = Math.random() * 2000 - 1000;
					particle.position.y = Math.random() * 2000 - 1000;
					particle.position.z = Math.random() * 2000 - 1000;
					particle.scale.x = particle.scale.y =  1;
					scene.add( particle );
					
					particles.push(particle); 
				}

				container.appendChild( renderer.domElement );

	
			//	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
			//	document.addEventListener( 'touchstart', onDocumentTouchStart, false );
			//	document.addEventListener( 'touchmove', onDocumentTouchMove, false );
				
				setInterval( loop, 1000 / 30 );
				
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

        <div class="main-container col3-layout">
            <div class="main">
               <div class="col-wrapper">
                    <div class="col-main">
                    
                    
<div id="carousel-wrapper">
	<a href="javascript:" class="carousel-control" id="prev-button" rel="prev">Previous slide</a>
	<a href="javascript:" class="carousel-control" id="next-button" rel="next">Next slide</a>
	<div id="carousel-content">
		
		



		<div class="slide" id="slide_11">
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/scarves/solid-wispy-scarf.html')" id="scarf_11">
				<img src="../slides/11/scarf.png" />
				<div class="detail">
					<h2>BEGG SCOTLAND</h2>
					<h3>WISPY CASHMERE SCARF</h3>
					<span>$ 380</span>
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/handbags/clutches/large-foldover-clutch-176.html')" id="handbag_11" >
				<img src="slides/11/handbag.png"   onmouseover="this.src='slides/11/handbag1.png'" onmouseout="this.src='slides/11/handbag.png'" />
				<div class="detail">
					<h2>B. MAY</h2>
					<h3>EMBOSSED CALF LARGE FOLD OVER CLUTCH</h3>
					<span>$ 250</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/bracelets/baby-shirt-cuff.html')" id="bracelet_11">
				<img src="slides/11/bracelet.png" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>BABY SHIRT CUFF</h3>
					<span>$ 235</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/scarab-stud-earrings.html')" id="earrings_11">
				<img src="slides/11/earrings.png" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>SCARAB STUDS</h3>
					<span>$ 110</span>
				</div>
			</div>	
 		</div>		
		<div class="slide" id="slide_12">
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/handbags/the-renzo-jr-clutch.html')" id="handbag_12" >
				<img src="slides/12/handbag.png"  />
				<div class="detail">
					<h2>PAOLA DANGOND</h2>
					<h3>THE RENZO JR. CLUTCH</h3>
					<span>$ 450</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/rings/hexagon-cocktail-ring.html')" id="ring_12">
				<img src="slides/12/ring.png" />
				<div class="detail">
					<h2>ASHA BY ADM</h2>
					<h3>HEXAGON COCKTAIL RING</h3>
					<span>$ 595</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/earrings/crystal-caged-earrings.html')" id="earrings_12">
				<img src="slides/12/earrings.png" />
				<div class="detail">
					<h2>ASHA BY ADM</h2>
					<h3>CAGED TEAR DROP EARRINGS</h3>
					<span>$ 395</span>
				</div>
			</div>			
 		</div> 		
		<div class="slide" id="slide_13">
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/handbags/large-foldover-clutch-169.html')" id="handbag_13" >
				<img src="slides/13/handbag.png"   onmouseover="this.src='slides/13/handbag1.png'" onmouseout="this.src='slides/13/handbag.png'" />
				<div class="detail">
					<h2>B. MAY</h2>
					<h3>EMBOSSED CALF LARGE FOLD OVER CLUTCH</h3>
					<span>$ 250</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/cabochon-bead-bracelet.html')" id="bracelet_13">
				<img src="slides/13/bracelet.png" />
				<div class="detail">
					<h2>GERARD YOSCA</h2>
					<h3>MULTI-STONE BRACELET</h3>
					<span>$ 340</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/gerard-yosca/smoky-quartz-abstract-drop-earrings.html')" id="earrings_13">
				<img src="slides/13/earrings.png" />
				<div class="detail">
					<h2>GERARD YOSCA</h2>
					<h3>DROP EARRINGS WITH PEARL BORDER</h3>
					<span>$ 180</span>
				</div>
			</div>		
 		</div>
 		<div class="slide" id="slide_14">
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/handbags/priscilla-handbag.html')" id="handbag_14" >
				<img src="slides/14/handbag.png"   onmouseover="this.src='slides/14/handbag1.png'" onmouseout="this.src='slides/14/handbag.png'" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>PRISCILLA HANDBAG</h3>
					<span>$ 810</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/kara-ross/wide-section-cuff.html')" id="bracelet_14">
				<img src="slides/14/bracelet.png" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>WIDE SECTION CUFF</h3>
					<span>$ 345</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/jewelry/dangle-stick-earrings.html')" id="earrings_14">
				<img src="slides/14/earrings.png" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>DANGLE MIXED STICK EARRINGS</h3>
					<span>$ 115</span>
				</div>
			</div>
 		</div>	
 		<div class="slide" id="slide_15">		
			<div class="product" onclick="openWindow('http://www.halsbrook.com/accessories/scarves/floral-print-scarf.html')" id="scarf_15">
				<img src="slides/15/scarf.png" />
				<div class="detail">
					<h2>SAVICAN</h2>
					<h3>PRINTED WOOL SCARF</h3>
					<span>$ 95</span>
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/occasions/country-weekend/large-foldover-clutch.html')" id="handbag_15" >
				<img src="slides/15/handbag.png"   />
				<div class="detail">
					<h2>B. MAY</h2>
					<h3>PYTHON LARGE FOLD OVER CLUTCH</h3>
					<span>$ 695</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/kara-ross/amethyst-and-chain-necklace.html')" id="necklace_15">
				<img src="slides/15/necklace.png" />
				<div class="detail">
					<h2>KARA BY KARA ROSS</h2>
					<h3>CHAIN BIB NECKLACE WITH MIXED NUGGETS</h3>
					<span>$ 395</span>
				</div>
			</div>
 		</div>
 		
 		
 		
		<div class="slide" id="slide_1">
			<div class="slide_text_3">
				<div class="slide_text_col_1">
				<strong>Paola Dangond, The Renzo Clutch</strong>  This crocodile clutch oozes glamour and deserves to be tucked under the most fashionable arms. Available in either red or emerald and lined in creamy camel suede, it's accented with a matte two-tone gold and silver closure. Box it, tuck it under the tree, and wait for the oohs and ahhs.
				</div>
				<div class="slide_text_col_2">
				<strong>MaxMara, Pavone Leather Mini Bag</strong> There's nothing basic about this black bag—the size and shape are new (square, with a menswear-inspired vibe), it's petite but polished (your shoulders will thank you), and it offers an instant style upgrade (whether for work or weekend). In fact it's so good, you may need to buy two: one to give and one to keep for yourself. We won't tell. 
				</div>
				<div class="slide_text_col_3">
				<strong>Kara By Kara Ross, Priscilla Handbag</strong> This season, the clutch is having a major moment. But if you're tempted to dust off something your granny bequeathed, stop it. This sleek envelope speaks to the 1970's trend (yes, it's back), and yet looks totally modern. It's big enough for the essentials, but small enough to stash, and it'll add just a hint of dazzle to everything from jeans to a little black dress.  
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/the-renzo-clutch-578.html')" id="handbag_1" >
				<img src="slides/1/handbag_1.png" />
				<div class="detail">
					<h2>PAOLA DANGOND</h2>
					<h3>THE RENZO CLUTCH</h3>
					<span>$ 715</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/max-mara/pavone-mini-bag.html')" id="handbag_2">
				<img src="slides/1/handbag_2.png" />
				<div class="detail">
					<h2>MaxMara</h2>
					<h3>Pavone Leather Mini Bag</h3>
					<span>$ 725</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/kara-ross/priscilla-handbag.html')" id="handbag_3">
				<img src="slides/1/handbag_3.png" />
				<div class="detail">
					<h2>Kara By Kara Ross</h2>
					<h3>Priscilla Handbag</h3>
					<span>$ 810</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_2">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Kara By Kara Ross, Baby Shirt Cuff & Narrow Section Cuff</strong> Jewelry designer Kara Ross, who has been featured in Vogue, Elle, InStyle and Marie Claire to name but a few, is known for having her sketch pad on the pulse of what modern women crave. Case in point, these green, lizard-inlayed cuffs, which can be worn together, or, for maximum impact, stacked with other gold pieces.
				</div>
				<div class="slide_text_col_2">
				<strong>Erickson Beamon, Barbie Brooch</strong> Behold, the classic Christmas pin gets an upgrade. Buh-bye little blinged out spruce tree, there's a new bauble in town. Lush, hunter green Swarovski studded branches and blooms displayed in one of the best brooch designs we've seen make this piece a stunner. The craftsmanship is spectacular—it's set in blackened metal—and our hunch is it'll stand the test of time (and then some). 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/narrow-section-cuff.html')" id="bracelet_1">
				<img src="slides/2/bracelet_1.jpg" />
				<div class="detail">
					<h2>Kara By Kara Ross</h2>
					<h3>Narrow Section Cuff</h3>
					<span>$ 290</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/baby-shirt-cuff.html')" id="bracelet_2">
				<img src="slides/2/bracelet_2.jpg" />
				<div class="detail">
					<h2>Kara By Kara Ross</h2>
					<h3>Baby Shirt Cuff</h3>
					<span>$ 235</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/barbie-brooch.html')" id="green_thing">
				<img src="slides/2/green_thing.png" />
				<div class="detail">
					<h2>Erickson Beamon</h2>
					<h3>Barbie Brooch</h3>
					<span>$ 675</span>
				</div>
			</div>
 		</div>
 			<div class="slide" id="slide_3">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Gerard Yosca, Citrine Drops Necklace</strong> Pale citrine, warm tiger's eye, inky onyx…let us introduce you to the perfect necklace. The beauty in this piece is only matched by the genius of it. Featuring a mélange of neutral hues and subtle shine, it will accessorize any ensemble, flatter every skin tone and delight jewelry lovers of all ages. As we said, perfection. 
				</div>
				<div class="slide_text_col_2">
				<strong>rickson Beamon, Envy Earrings</strong> These beauties aren't named “Envy” for nothing. A mix of clear, blue and smoky Swarovski crystals and designed with a decidedly retro feel, they look culled from your grandmother's collection. They'll make any cocktail frock shine on Christmas Eve, and they'll dress up cashmere loungewear Christmas morning. Heck, they're so pretty they may never see the inside of a jewelry box again. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/lemon-citrine-drop-necklace.html')" id="necklace">
				<img src="slides/3/photo_1.png" />
				<div class="detail">
					<h2>Gerard Yosca</h2>
					<h3>Citrine Drops Necklace</h3>
					<span>$ 490</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/erickson-beamon/envy-earrings.html')" id="earrings">
				<img src="slides/3/photo_2.png" />
				<div class="detail">
					<h2>Erickson Beamon</h2>
					<h3>Envy Earrings</h3>
					<span>$ 340</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_4">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Pashma, Printed Featherweight Silk and Cashmere Scarf and Sweater</strong> There isn't a woman on the planet who doesn't enjoy something soft and featherweight draped around her neck and shoulders. To add color to a suit, a little femininity to jeans, or to simply take the chill off. It's got enough length to loop a few times around the neck and enough width to wear shawl-style. Best pairing? The matching top. Finding the perfect long sleeve tee doesn't have to be the holy grail of fashion (it just feels that way). This knit combines the warmth of cashmere with the comfort of silk, and then it's brilliantly bathed in an array of skin flattering powdery hues. It's pretty on its own, it's pretty when peeking out from underneath a cardigan or blazer. 
				</div>
				<div class="slide_text_col_2">
				<strong>Armani Collection, Fil Coupe Chiffon Stole </strong> Just between us girls, some people are hard to buy for. If you’ve got a classicist on your list this year, look no further than this chenille floral stole. Worn for day it adds a touch of textural print to all the black, gray and navy in your wardrobe, worn at night and it makes for a dramatic cold shoulder cover. 
				</div>
			</div>
 			<div class="product" onclick="openWindow(' http://www.halsbrook.com/designers/pashma/paisley-colorblock-scarf-453.html')" id="scarf_1">
				<img src="slides/4/scarf.png" />
				<div class="detail">
					<h2>Pashma</h2>
					<h3>Printed Featherweight Silk and Cashmere Scarf </h3>					
					<span>$ 235</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/pashma/paisley-colorblock-sweater-462.html')" id="sweater">
				<img src="slides/4/photo_2.png" />
				<div class="detail">
					<h2>Pashma</h2>
					<h3>Printed Featherweight Silk and Cashmere Sweater</h3>
					<span>$ 275</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/fil-coupe-chiffon-stole.html')" id="scarf_2">
				<img src="slides/4/scarf_2.png" />
				<div class="detail">
					<h2>Armani Collection</h2>
					<h3>Fil Coupe Chiffon Stole</h3>
					<span class="original-price">$ 525</span>
					<span class="sale-price">$ 315</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_5">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Peter Som, Fox Fur Collar</strong> Your travel plans this season probably don’t include a frozen tundra, but you can still give yourself, or someone you love, a Dr. Zhivago moment. Deliciously plush fox fur, saturated in color, will wake up the collar of any coat or sweater. Learning to play the balalaika is optional. Available in plum or emerald. 
				</div>
				<div class="slide_text_col_2">
				<strong>Sherry Cassin, Lucy Fur Vest</strong> It doesn’t take three wise men to recommend a fur vest: It’s warm and luxurious, it’s hip and modern, and it adds instant style oomph. We deem it a must buy, but whether or not it becomes a must GIVE is nobody’s business but your own. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/fox-fur-collar.html')" id="fur">
				<img src="slides/5/fur.png" onmouseover="this.src='slides/5/fur2.png'" onmouseout="this.src='slides/5/fur.png'" />
				<div class="detail">
					<h2>Peter Som</h2>
					<h3>Fox Fur Collar</h3>
					<span>$ 400</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/lucy-fur-vest.html')" id="vest">
				<img src="slides/5/vest.png" />
				<div class="detail">
					<h2>Sherry Cassin</h2>
					<h3>Lucy Fur Vest</h3>
					<span>$ 1,395</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_6">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Hania By Anya Cole, Coppelia with Cable Knit Hat</strong> Ice skating on a frozen pond. Sleigh rides through the woods. Holiday shopping, packages in tow. If someone you know is in need of chic bundling accoutrements for all of this season’s outdoor activities, start here.  Soft-as-butter cashmere and textural cable knit are combined to great effect for the perfect winter accessory. Want a companion? Add the New Coppelia Fingerless Gloves to go with. 
				</div>
				<div class="slide_text_col_2">
				<strong>Hania By Anya Cole, New Coppelia With Fingerless Gloves</strong> What’s new when it comes to keeping hands toasty warm? Glad you asked. In today’s tech-obsessed world (have hand-held, will web browse), modern gals are eager to leave digits free to type at will. Hence, these fingerless gloves, which do just that. Combine with a gift certificate for a manicure and you’ve got yourself a clever little present. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/hania/navy-knit-hat.html')" id="hat">
				<img src="slides/6/hat.png" onmouseover="this.src='slides/6/hat2.png'" onmouseout="this.src='slides/6/hat.png'" />
				<div class="detail">
					<h2>Hania By Anya Cole</h2>
					<h3>Coppelia with Cable Knit Hat</h3>
					<span>$ 275</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/hania/cashmere-fingerless-gloves.html')" id="gloves">
				<img src="slides/6/gloves.png" />
				<div class="detail">
					<h2>Hania By Anya Cole</h2>
					<h3>New Coppelia With Fingerless Gloves</h3>
					<span>$ 255</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_7">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Corgi, “Audrey” Cashmere Jacket</strong> If you know someone special who’s wishing for a white Christmas, you have the power to make that dream come true. Made in Scotland from six-ply cashmere, it is, hands down, the softest cashmere we have ever put our hands on. The only thing missing is a glass of champagne. 
				</div>
				<div class="slide_text_col_2">
				<strong>Hania Coppelia Cardigan</strong> You may think you know cashmere, but trust us when we say you don’t know this cashmere. We’re talking soft, scrumptious, opulent…it is a full on sensory experience. Knit in New York City by hand, every Hania piece is a one-of-a-kind creation. Apres-ski just got a whole lot cozier. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/corgi/tuck-stitch-cashmere-jacket.html')" id="jacket">
				<img src="slides/7/jacket1.png" onmouseover="this.src='slides/7/jacket2.png'" onmouseout="this.src='slides/7/jacket1.png'" />
				<div class="detail">
					<h2>Corgi</h2>
					<h3>"Audrey" Cashmere Jacket</h3>
					<span>$ 1,675</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/hania/coppelia-ski-cardigan.html')" id="cardigan">
				<img src="slides/7/cardigan1.png" onmouseover="this.src='slides/7/cardigan2.png'" onmouseout="this.src='slides/7/cardigan1.png'" />
				<div class="detail">
					<h2>Hania By Anya Cole</h2>
					<h3>Coppelia Ski Cardigan</h3>
					<span>$ 3,450</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_8">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Peserica, Quilted Nylon Car jacket</strong> You know how every once and awhile you discover an item that is so chic, so easy, so flattering and so versatile that you wonder how you lived so long without it? Look no further. This coat packs plenty of warmth (hold the bulk), and will put the cool factor in all of your casual fare. 
				</div>
				<div class="slide_text_col_2">
				<strong>Armani Collezioni, Classic Caban Coat</strong>  A color intervention is not only in order, it’s long overdue.  Yes ladies, it’s tough love time. Our advice? Go bold or go home. Featuring exquisite tailoring, the finest Italian cashmere and wool and a stylish three-quarter length, this coat is return-proof. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/peserico/nylon-car-jacket.html')" id="carjacket">
				<img src="slides/8/carjacket.png" />
				<div class="detail">
					<h2>Peserica</h2>
					<h3>Quilted Nylon Car jacket </h3>
					<span>$ 1,020</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/classic-caban-coat.html ')" id="cabancoat">
				<img src="slides/8/cabancoat.png" />
				<div class="detail">
					<h2>Armani Collezioni</h2>
					<h3>Classic Caban Coat</h3>
					<span class="original-price">$ 1,695</span>
					<span class="sale-price">$ 1,017</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_9">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Corgi, “Audrey” Cashmere Jacket</strong> If you know someone special who’s wishing for a white Christmas, you have the power to make that dream come true. Made in Scotland from six-ply cashmere, it is, hands down, the softest cashmere we have ever put our hands on. The only thing missing is a glass of champagne. 
				</div>
				<div class="slide_text_col_2">
				<strong>Hania Coppelia Cardigan</strong> You may think you know cashmere, but trust us when we say you don’t know this cashmere. We’re talking soft, scrumptious, opulent…it is a full on sensory experience. Knit in New York city by hand, every Hania piece is a one-of-a-kind creation. Apres ski just got a whole lot cozier. 
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/silk-tree-of-life-coat.html ')" id="coat">
				<img src="slides/9/coat.png" />
				<div class="detail">
					<h2>Gabriele Colangelo</h2>
					<h3>Silk Tree Print Coat</h3>
					<span class="original-price">$ 2,345</span>
					<span class="sale-price">$ 1,642</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/violanti/fur-trimmed-down-coat-with-removable-gilet.html')" id="nylon">
				<img src="slides/9/nylon.png" />
				<div class="detail">
					<h2>Violanti</h2>
					<h3>Nylon Down Coat with Fur Trim and Gilet</h3>
					<span class="original-price">$ 1,670</span>
					<span class="sale-price">$ 1,253</span>
				</div>
			</div>
 		</div>
 		<div class="slide" id="slide_10">
			<div class="slide_text_2">
				<div class="slide_text_col_1">
				<strong>Piazza Sempione, Wool and Cashmere Belted Coat</strong> It’s time to retire your decades-old black coat (long, boxy, skinny lapel and all) and instead gift yourself a new and improved version. What sets this one apart from the others on the rack is all in the details: the oversized notched collar (stand it up when the weather howls), the strong shoulder, the slight flare of the sleeve, the thigh-skimming length. Wrap, cinch, wear. Repeat. 
				</div>
				<div class="slide_text_col_2">
				<strong>MaxMara, Manuel Camel Hair Coat (full-length)</strong> Princess Grace wore it. So did Jacqueline Onassis. There’s no denying the eternal elegance of a camel hair coat, and the super stylish among us know it. This one, made by the designer who makes good tailoring an art form, is visionary. Christmas may come but once a year, but finding occasions to wear this is countless.  
				</div>
			</div>
 			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/piazzaa-sempione/wool-cashmere-wrap-coat.html')" id="wool">
				<img src="slides/10/wool.png" />
				<div class="detail">
					<h2>Piazza Sempione</h2>
					<h3>Wool and Cashmere Belted Coat</h3>
					<span class="original-price">$ 1,640</span>
					<span class="sale-price">$ 1,148</span>
				</div>
			</div>
			<div class="product" onclick="openWindow('http://www.halsbrook.com/designers/max-mara/manuel-camelhair-coat.html')" id="camel">
				<img src="slides/10/camel.png" />
				<div class="detail">
					<h2>MaxMara</h2>
					<h3>Manuel Camel Hair Coat</h3>
					<span>$ 2,490</span>
				</div>
			</div>
 		</div>
 		<!-- FINAL -->
	</div>
</div>                                            
<div class="hb_shop_by"><div class="hb_home_occasion">
<h2>Shop by occasion</h2>
<a class="hb_seeall" href="/occasions/casual-chic.html">see all</a>
<ul>
<li class="hb_occasion_wedding"><a href="/occasions/modern-business.html">Modern Business</a></li>
<li class="hb_occasion_graduation"><a href="/occasions/cold-weather.html">Cold Weather</a></li>
</ul>
<ul>
<li class="hb_occasion_cocktail"><a href="/occasions/day-to-evening.html">Day to Dinner</a></li>
<li class="hb_occasion_vacation"><a href="/occasions/cocktail.html">Cocktail</a></li>
</ul>
</div> <div class="hb_home_designer">
<h2>Shop by designer</h2>
<a class="hb_seeall" href="/designers.html">see all</a>
<ul>
<li><a href="/designers/peter-hidalgo.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/peter_hidalgo.png" alt="" /></a></li>
<li><a href="/designers/kara-ross.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/kara_1.png" alt="" /></a></li>
<li><a href="/designers/fabrizio-gianni.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/designer_fabri_2.png" alt="" /></a></li>
</ul>
<ul>
<li><a href="/designers/erickson-beamon.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/ericson.png" alt="" /></a></li>
<li><a href="/designers/piazzaa-sempione.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/designer_piazza.png" alt="" /></a></li>
<li><a href="/designers/max-mara.html"><img src="http://www.halsbrook.com/media/wysiwyg/homepage/designer_maxmara.png" alt="" /></a></li>
</ul>
</div></div>
<p><div class="hb_featured_items">
<h2><span>New Arrivals</span></h2>
<ul>
<li>
<a href="http://www.halsbrook.com/lucy-fur-vest.html">
<img src="https://s3.amazonaws.com/assets.halsbrook.com/catalog/product/cache/1/thumbnail/210x/9df78eab33525d08d6e5fb8d27136e95/h/a/halsbrook_102512_377.jpg" alt="Lucy Fur Vest" /></a>
<h3><a href="http://www.halsbrook.com/lucy-fur-vest.html">Sherry Cassin</a></h3>
<p><a href="http://www.halsbrook.com/lucy-fur-vest.html">Lucy Fur Vest</a></p>

<span class="hb-price">$1,395</span>
</li>
<li>
<a href="http://www.halsbrook.com/pashmina-and-silk-scarf.html">
<img src="https://s3.amazonaws.com/assets.halsbrook.com/catalog/product/cache/1/thumbnail/210x/9df78eab33525d08d6e5fb8d27136e95/h/a/halsbrook_100812_4896.jpg" alt="Pashmina and Silk Scarf" /></a>
<h3><a href="http://www.halsbrook.com/pashmina-and-silk-scarf.html">Scialle</a></h3>
<p><a href="http://www.halsbrook.com/pashmina-and-silk-scarf.html">Pashmina and Silk Scarf</a></p>
<span class="hb-price">$250</span>
</li>
<li>
<a href="http://www.halsbrook.com/monblanc-silk-crepe-dress.html">
<img src="https://s3.amazonaws.com/assets.halsbrook.com/catalog/product/cache/1/thumbnail/210x/9df78eab33525d08d6e5fb8d27136e95/0/9/09-r13-671-04-120719-229.jpg" alt="Monblanc Silk Crepe Dress" /></a>
<h3><a href="http://www.halsbrook.com/monblanc-silk-crepe-dress.html">Sachin+Babi</a></h3>
<p><a href="http://www.halsbrook.com/monblanc-silk-crepe-dress.html">Monblanc Silk Crepe Dress</a></p>
<span class="hb-price">$695</span>
</li>
<li>
<a href="http://www.halsbrook.com/modal-and-cashmere-blend-scarf-1120.html">
<img src="https://s3.amazonaws.com/assets.halsbrook.com/catalog/product/cache/1/thumbnail/210x/9df78eab33525d08d6e5fb8d27136e95/h/a/halsbrook_100812_4870.jpg" alt="Modal and Cashmere-Blend Scarf" /></a>
<h3><a href="http://www.halsbrook.com/modal-and-cashmere-blend-scarf-1120.html">Scialle</a></h3>
<p><a href="http://www.halsbrook.com/modal-and-cashmere-blend-scarf-1120.html">Modal and Cashmere-Blend Scarf</a></p>
<span class="hb-price">$185</span>
</li>
</ul></div></p></div>                    </div>
                    <div class="col-left sidebar"></div>
                </div>
                <div class="col-right sidebar"><div class="block block-cart">
        <div class="block-title">
        <strong><span>My Cart</span></strong>
    </div>
    <div class="block-content">
                        <p class="empty">You have no items in your shopping cart.</p>
        </div>
</div>
</div>
            </div>
        </div>
        <br class="hb-clear" />
        <script>
document.observe("dom:loaded",function(){ 
	cw_slide = new Carousel('carousel-wrapper', $$('#carousel-content .slide'), $$('a.carousel-control', 'a.carousel-jumper'),{'auto':false,'frequency':5,'afterMove': moveAfter});
			});

</script>
        
<div class="footer-container">
    <div class="footer">
    	<h1>Halsbrook</h1>
        
<ul class="links">
                        <li class="first" ><a href="/aboutus" title="About us" >About us</a></li>
                                <li ><a href="/terms" title="Terms & Conditions" >Terms & Conditions</a></li>
                                <li ><a href="/privacy" title="Privacy Policy" >Privacy policy</a></li>
                                <li ><a href="/returns" title="Returns" >Returns</a></li>
                                <li class=" last" ><a href="http://www.halsbrook.com/contacts/" title="Contact Us" >Contact Us</a></li>
            </ul>
        <address>&copy; 2012 Halsbrook Inc. All Rights Reserved.</address>
    </div>
</div>

<!-- End of Async HubSpot Analytics Code -->
            </div>
</div>
</body>
</html>
