<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!doctype html><html><head><meta charset="utf-8">
    <title>Resumen.es</title>
	<link rel="icon" type="image/png" href="img/logo.png">
    <link href="https://allfont.es/allfont.css?fonts=garamond" rel="stylesheet">
    <style>
        body { --primary: #b58664; --secondary: #020a0e; margin: 0px; 
        
	background-image: url("img/bg2.jpg");

	height: 100vh;

	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
		
		h1 {
            font-family: 'Garamond', arial;
            font-size: 10px;
			font-weight: 10;
            text-shadow: 4px 4px 4px rgb(102, 75, 55);
            }
        h2  {
            text-align: center;
            font-family: 'Garamond', arial;
            font-size: 18px;
            text-shadow: 4px 4px 4px #aaa;
            }

		.titleResu {
			font-size: 70px;
			font-weight: 300;
			display:inline;
		}
		
        div.field{
            text-align: center;
            font-size: 14px;
            
        }

        button { 
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            text-decoration: none;
            margin: 2px;
            color: white;
            background: rgb(102, 75, 55);
            border: 1px solid var(--primary);
            height: 20px;
            font-size: 9px;
            text-transform: uppercase;
            cursor: pointer;
            transition: ease-in 0.2s all;
            padding: 0 8px 0 8px;
        }
		
		a { color: white}
		
        div#main {padding: 10px;}
        input {margin-bottom: 5px; margin-top: 2px; padding: 4px; font-size: 12px; }
        h1 {background: var(--primary); color: white; font-weight: 300; text-transform: uppercase; font-size: 20px; margin: 0px; padding: 15px;}
        h2 { margin-block-start: 0px; margin-block-end: 10px; font-size: 20px;  color: var(--primary); position:center;}
        button:hover { background: var(--primary); color: white; }
        div.actions { margin-top: 10px; text-align: center; font-size: 16px;}
        div.movie { background-color: rgba(227, 206, 193, 0.75);  display: inline-block; width: auto; padding: 10px; box-shadow: 2px 2px 7px #020a0e; margin: 5px;}
        div.movie div.movie-img {width: 200px; height: auto; min-height: 200px; cursor: pointer; border-color: #020a0e;} 
        div.movie div.movie-img img {align-items: center; width: inherit; height: 160px;}
        div.movie div.title {text-align: center; overflow: hidden; text-overflow: ellipsis; width: 200px; white-space: nowrap; }
        div.field {color: var(--primary); text-transform: uppercase; font-size: 12px;}
        div.textoresu {margin-left: 250px; margin-right: 250px; text-align: justify;}
		div.textoresucontainer {background-color:rgba(227, 206, 193, 0.75); box-shadow: 2px 2px 7px #020a0e;}
        .cuadro {width: 300px; height: 200px;}
        .titulo {width: 300px;}
    
    /* Estrellas */

        p.clasificacion {
        position: relative;
        overflow: hidden;
        display: inline-block;
      }

      p.clasificacion input {
        position: absolute;
        top: -100px;
      }

      p.clasificacion label {
       float: right;
       color: #333;
       font-size: 30px;
      }

      p.clasificacion label:hover,
      p.clasificacion label:hover ~ label,
      p.clasificacion input:checked ~ label {
      color: #dd4;
      }  

    </style>

    <script type="text/javascript">

        // MODELO DE DATOS

        let mis_resumenes_iniciales = [
            {titulo: "Don Quijote de la Mancha",
            autor: "Miguel de Cervantes", 
            miniatura: "files/quijote.png", 
            resu:"Desde hace 400 años, hay un caballero andante en la literatura mundial que, de hecho, no lo es: Don Quijote de la Mancha, el Caballero de la Triste Figura, que vive aventuras donde no las hay. Toma a molinos de viento por gigantes, rebaños de ovejas por ejércitos enemigos, toneles de vino también por gigantes, posadas por fortalezas y a una sencilla campesina por su distinguida señora. Don Quijote es víctima de su pasión literaria, de su exagerada afición por leer novelas de caballería. Todos los niños conocen al menos uno de sus numerosos episodios; enfrentarse a molinos de viento, por ejemplo, existe hoy en día como expresión. Pero, ¿qué hace a esta novela, supuestamente cómica y de más de 1000 páginas, estar considerada no sólo como la obra maestra de la literatura española, sino también haber sido confirmada como mejor novela del mundo por el instituto Nobel en 2002? Son sus distintos niveles de narración, relacionados entre ellos de forma magistral y de entre cuyos renglones se desprende cierta sabiduría, junto a una acertada parodia y el monumental inventario de temas y de personajes lo que convierten a la obra de Cervantes en novela universal en el mejor de los sentidos. Don Quijote fascina a toda persona dotada de fantasía, que se evade con libros o películas, si bien la obra muestra al mismo tiempo lo cómico que puede llegar a ser esta forma de huir del mundo.",
            audio: "files/donquijote.mp3" 
        },

            {titulo: "La Celestina",
            autor: "Fernando de Rojas",
            miniatura: "files/celestina.png",
            resu:"Calisto entra afanado al huerto de la casa de Melibea buscando su halcón. Él es un joven de noble linaje y se enamora a primera vista de ella, la única heredera de una familia que la mantiene encerrada en casa. Enloquecido de amor Calisto comienza a expresarle a la mujer sus sentimientos con lisonjas y dulces palabras, pero ella lo rechaza. Abatido regresa a casa y le cuenta sus pesares a uno de sus criados. Sempronio, el criado, le sugiere que recurra a una vieja prostituta y alcahueta profesional llamada Celestina. Ésta se hace pasar por vendedora de artículos diversos para entrar en las casas y organizar citas de amantes. También regenta un burdel con dos prostitutas, Areúsa y Elicia.Pármeno, otro criado de Calisto, cuya madre conocía a Celestina, trata de disuadirlo: tenía para remediar amores y para se querer bien: tenía huessos de coraçón de ciervo, lengua de bívora, cabeças de cordonizes . . . Venían a ella muchos hombre y mujeres, y a unos demadava el pan do mordían, a otros, de su ropa; a otros, de su sus cabellos . . . a otros dava unos coraçones de cera, llenos de agujas quebradas, y a otras cosas en barro y en plomo fechas, muy espantables a ver. Pintava figuras, dezía palabras en tierra. ¿Quién te podrá dezir lo que esta vieja hazía? Y todo era burla y mentira. A pesar de las razones de Pármeno, Calisto no le hace caso e insiste en su deseo de poseer a Melibea. De notar que la ansiedad por Melibea no es el amor puro ni el matrimonio, sino el acto carnal. Celestina conjura al diablo para hechizar a Melibea y hacer que se enamore de Calisto. Y como promesa va a recibir a cambio de su trabajo una considerable suma de dinero. Celestina, sagaz como un zorro,  también logra corromper a Pármeno cuando una de sus prostitutas, Areúsa, lo seduce y lo pone en el bando de la vieja. Elicia, la otra prostituta, es la amante de Sempronio. Con el pretexto de venderle hilado a Melibea, logra entrar en su casa y se queda con un cordón de ella que usa para completar el hechizo. Aunque al inicio Melibea no es receptiva a las palabras que Celestina pronuncia acerca de Calisto, se acuerda una segunda reunión con ella ya que Melibea se siente culpable por haber tratado mal a la vieja. Además, como el hilo es parte del encantamiento apenas Melibea lo toca comienza a sentir algo por Calisto acuerda una cita con él a través de la vieja alcahueta. La Celestina acuerda una cita a la media noche para que los jóvenes se puedan ver. Celestina corre donde Calisto a darle las buenas nuevas y este, emocionado, le da el pago en una valiosa cadena de oro. El primer encuentro de los jóvenes es breve pero lleno de pasión. Se acuerda otra reunión en la noche siguiente para poder pasar más rato juntos. Así, a la noche siguiente, Calisto escala los muros que los conducen a la habitación de Melibea, donde satisfacen su deseo carnal. Melibea se debate entre haber pedido su honor con un hombre al que apenas conoce y sin estar casada, y además por cuenta de un encantamiento de hechicería; pareciera que su culpa se empequeñece respecto al fuertísimo deseo carnal que los une. Al mismo tiempo, los criados acuden a donde Celestina por su parte del pago. La mujer se niega a compartir y los criados se vengan de ella matándola. Sempronio y Pármeno serán juzgados y eventualmente mueren decapitados en la plaza pública.",
            audio: "files/donquijote.mp3" 
        },

            {titulo: "El principito", 
            autor: "Antoine de Saint-Exupéry", 
            miniatura: "files/principito.png",
            resu:"El principito narra la historia de un piloto que, mientras intenta reparar su avión averiado en medio del desierto del Sahara, se topa con un pequeño príncipe proveniente del asteroide B 612, que le pide insistentemente que le dibuje un cordero y que nunca olvida una pregunta.El piloto empezará a descubrir la fascinante historia del principito, que comienza en su asteroide, donde vivía con tres volcanes, uno inactivo, y se entretenía en arrancar las malas hierbas y ver puestas de sol. Un día en el suelo del asteroide del principito nace una flor. El principito la cuida y atiende con dedicación, pero la flor es dramática y caprichosa, y esto le molesta. El principito entonces decide abandonar su asteroide y emprender un viaje por el universo en busca de un amigo. En la travesía, que llevará al principito a visitar varios asteroides hasta llegar al la Tierra, conocerá a una variado grupo de excéntricos personajes que lo convencen de lo extraño que es el mundo de los adultos, tan ocupados siempre en asuntos serios e importantes, que se olvidan de disfrutar la vida. En la Tierra, el principito entrará en contacto con animales, flores y personas. Será allí donde, antes de encontrar al piloto, conocerá al zorro, quien le revelará la importancia de la amistad y el valor del amor que siente hacia su flor. Será la nostalgia por ella y la decepción que le causa el mundo de los adultos lo que motivará al principito a regresar a su planeta.",
            audio: "files/donquijote.mp3"
         },
        ];

        localStorage.mis_resumenes = localStorage.mis_resumenes || JSON.stringify(mis_resumenes_iniciales);

        // VISTAS
        const indexView = (resumenes) => {
            let i=0;
            let view = "";

            while(i < resumenes.length) {
              view += `
                <div class="movie">
                   <div class="movie-img">
                        <img data-my-id="${i}" src="${resumenes[i].miniatura}" onerror="this.src='files/placeholder.png'"/>
                   </div>
                   <div class="title">
                       ${resumenes[i].titulo || "<em>Sin título</em>"}
                   </div>
                   <div class="actions">
                        <!--Insertar aquí botones de "Show" y "Delete"-->
                       
                       <button class="show" data-my-id="${i}"> LEER MAS >> </button>
                       
                    </div>
                </div>\n`;
              i = i + 1;
            };

          view += `<div class="actions">
                        <!--Insertar aquí botones de "Añadir" y "Reset"-->
                        <button class="new" > añadir resumen</button>
                        <button class="reset" > reset </button>
                    </div>`;

            return view;
        };

        const editView = (i, resumen) => {
            return `<h2>Editar Resumen </h2>
                <div class="field">
                Título <br>
                <input  type="text" id="titulo" placeholder="Título" 
                        value="${resumen.titulo}">
                </div>
                <div class="field">
                Director <br>
                <input  type="text" id="autor" placeholder="Director" 
                        value="${resumen.autor}">
                </div>
                <div class="field">
                Miniatura <br>
                <input  type="text" id="miniatura" placeholder="URL de la miniatura" 
                        value="${resumen.miniatura}">
                </div>
                <div class="actions">
                    <button class="update" data-my-id="${i}">
                        Actualizar
                    </button>
                    <button class="index">
                        Volver
                    </button>
               `;
        }

        const showView = (resumen) => {
            // Completar: genera HTML con información de la película
            // ...

            return `
			<div class="textoresucontainer">
            <div class="textoresu">
            <p style="font-size: 40px;">
                <b >${resumen.titulo} de ${resumen.autor}.</b>
                
             </p>
             <p>
                <img src="${resumen.miniatura}">
            </p> 
           
            <p>    
            <audio controls>
                <source src="${resumen.audio}" type="audio/mp3">
             Tu navegador no soporta audio HTML5.
            </audio> 
            </p> 
			
            <p>
                ${resumen.resu}
            </p>
			
            <p style="margin-top: 50px"> Valoración: </p>
            <p class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label for="radio1">★</label>
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label for="radio2">★</label>
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3">★</label>
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4">★</label>
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5">★</label>
            </p>
            
            <div class="actions">
                <button class="index">Volver</button>
            </div>
			</div>
			</div>
        </div>`;
        }

        const newView = () => {
            // Completar: genera formulario para crear nuevo quiz
            // ...

            return `
			<h2>Añadir resumen</h2>
             <div class="field">
                Título <br>
                <input class="titulo" type="text" id="titulo" placeholder="Título">
                </div>
                <div class="field">
                Autor <br>
                <input class="titulo" type="text" id="autor" placeholder="Autor">
                </div>
                <div class="field">
                Escritor <br>
                <input class="titulo" type="text" id="autor" placeholder="Escritor">
                </div>
                <div class="field">
                Miniatura <br>
                <input type="file" id="miniatura" placeholder="URL de la miniatura">
                </div>
                <div class="field">
                Resumen <br>
                <input  type="text" id="resu" class="cuadro">
                </div>
                <div class="field">
                Audio <br>
                <input type="file" id="audio" placeholder="Audio formato mp3">
                </div>
                <div class="actions">
                    <button class="index">Volver</button>
                    <button class="create"> Crear </button>
                </div>`;
        }


        // CONTROLADORES 
        const indexContr = () => {
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            document.getElementById('main').innerHTML = indexView(mis_resumenes);
        };

        const showContr = (i) => {
            // Completar: controlador que muestra la vista showView(resumen)
            // ...
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            document.getElementById('main').innerHTML = showView(mis_resumenes[i]);

        };

        const newContr = () => {
            // Completar: controlador que muestra la vista newView()
            // ...
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            document.getElementById('main').innerHTML = newView(mis_resumenes);

        };

        const createContr = () => {
            // Completar: controlador que crea una película nueva en el modelo guardado en localStorage
            // ...
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);

            let resumen_nuevo = 
            {titulo: document.getElementById("titulo").value,
            autor: document.getElementById("autor").value, 
            miniatura: document.getElementById("miniatura").value, 
            resu: document.getElementById("resu").value, 
            audio: document.getElementById("audio").value};

            mis_resumenes.push(resumen_nuevo);
            localStorage.mis_resumenes = JSON.stringify(mis_resumenes);
            indexContr();
        };

        const editContr = (i) => {
            let resumen = JSON.parse(localStorage.mis_resumenes)[i];
            document.getElementById('main').innerHTML = editView(i, resumen);
        };

        const updateContr = (i) => {
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            mis_resumenes[i].titulo    = document.getElementById('titulo').value;
            mis_resumenes[i].autor  = document.getElementById('autor').value;
            mis_resumenes[i].miniatura = document.getElementById('miniatura').value;
            localStorage.mis_resumenes = JSON.stringify(mis_resumenes);
            indexContr();
        };

        const deleteContr = (i) => {
            // Completar:  controlador que actualiza el modelo borrando la película seleccionada
            // Genera diálogo de confirmación: botón Aceptar devuelve true, Cancel false
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            if(confirm(`Borrar ${mis_resumenes[i].titulo}`)){
                mis_resumenes.splice(i,1);
                localStorage.mis_resumenes = JSON.stringify(mis_resumenes);
                indexContr();
            }
        };

        const resetContr = () => {
            // Completar:  controlador que reinicia el modelo guardado en localStorage con las películas originales
            let mis_resumenes = JSON.parse(localStorage.mis_resumenes);
            localStorage.mis_resumenes = JSON.stringify(mis_resumenes_iniciales); //Guardas en el localstorage el objeto inicial que es dato
            indexContr();
        };

        // ROUTER de eventos
        const matchEvent = (ev, sel) => ev.target.matches(sel);
        const myId = (ev) => Number(ev.target.dataset.myId);

        document.addEventListener('click', ev => {
            if      (matchEvent(ev, '.index'))  indexContr  ();
            else if (matchEvent(ev, '.edit'))   editContr   (myId(ev));
            else if (matchEvent(ev, '.update')) updateContr (myId(ev));
            // Completar añadiendo los controladores que faltan
            else if (matchEvent(ev, '.new'))    newContr    ();
            else if (matchEvent(ev, '.create')) createContr ();
            else if (matchEvent(ev, '.reset'))  resetContr  ();
            else if (matchEvent(ev, '.show'))   showContr   (myId(ev));
            else if (matchEvent(ev, '.delete')) deleteContr (myId(ev));

        })
        
        
        // Inicialización        
        document.addEventListener('DOMContentLoaded', indexContr);
    </script>
</head>

<body>
   
    <h1><p class="titleResu">Resumen.es</p>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> <button><a href="reset-password.php">Reset Your Password</a></button> <button><a href="logout.php">Sign Out of Your Account</a></button> </h1>

	<div id="main"></div>   
       
   
    
    
</body>
</html>



