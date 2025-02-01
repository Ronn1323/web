<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializar la variable de sesión si no existe
if (!isset($_SESSION['razon'])) {
    $_SESSION['razon'] = 0;
}

// Manejo de navegación
if (isset($_GET['accion'])) {
    if ($_GET['accion'] == 'siguiente' && $_SESSION['razon'] < 199) {
        $_SESSION['razon']++;
    } elseif ($_GET['accion'] == 'anterior' && $_SESSION['razon'] > 0) {
        $_SESSION['razon']--;
    } elseif ($_GET['accion'] == 'inicio') {
        $_SESSION['razon'] = 0;
    }
}

// Lista de razones
$razones = [
    "1. Porque me encanta cuando tarareas una canción sin darte cuenta.",
    "2. Porque disfruto nuestras conversaciones hasta altas horas de la noche.",
    "3. Porque cada mensaje tuyo ilumina mi día.",
    "4. Porque me gusta cómo te preocupas por mi bienestar.",
    "5. Porque tus besos tienen el poder de calmarme.",
    "6. Porque eres la primera persona en quien pienso al despertar.",
    "7. Porque me haces sentir protegido(a) y seguro(a).",
    "8. Porque con solo una palabra tuya, todo mejora.",
    "9. Porque me motivas a ser una mejor persona.",
    "10. Porque cada 'te extraño' tuyo me hace sentir especial.",
    "11. Porque contigo el amor es fácil y sincero.",
    "12. Porque me enseñas a ver el lado bueno de las cosas.",
    "13. Porque me encanta verte emocionado(a) por las pequeñas cosas.",
    "14. Porque me gusta la forma en que me miras cuando crees que no me doy cuenta.",
    "15. Porque juntos podemos conquistar el mundo.",
    "16. Porque me encanta cuando me haces reír en los momentos más inesperados.",
    "17. Porque me siento afortunado(a) de tenerte en mi vida.",
    "18. Porque tus abrazos tienen el poder de curar cualquier tristeza.",
    "19. Porque me encanta hacer planes contigo, sin importar si son a corto o largo plazo.",
    "20. Porque me haces sentir que somos un equipo invencible.",
    "21. Porque me enseñas lo importante que es el amor incondicional.",
    "22. Porque siempre sabes cómo animarme cuando me siento mal.",
    "23. Porque me encanta nuestra complicidad.",
    "24. Porque contigo aprendí lo que significa amar sin condiciones.",
    "25. Porque valoro cada sacrificio que haces por nosotros.",
    "26. Porque eres mi mayor apoyo y mi refugio en momentos difíciles.",
    "27. Porque cada vez que me miras, siento mariposas en el estómago.",
    "28. Porque me encanta hacerte feliz.",
    "29. Porque disfruto cada instante a tu lado, sin importar lo que estemos haciendo.",
    "30. Porque siento que nos entendemos sin necesidad de palabras.",
    "31. Porque me haces sentir único(a) y especial.",
    "32. Porque siempre me das tu amor sin reservas.",
    "33. Porque amo nuestra historia y todo lo que hemos vivido juntos.",
    "34. Porque me gusta cómo respetamos nuestras diferencias.",
    "35. Porque confío en ti con los ojos cerrados.",
    "36. Porque me encanta ver cómo evolucionamos juntos.",
    "37. Porque cada pequeño detalle tuyo me enamora más.",
    "38. Porque contigo no necesito más para ser feliz.",
    "39. Porque cada beso tuyo me da paz.",
    "40. Porque me encanta descubrir nuevas cosas contigo.",
    "41. Porque haces que mis días sean más brillantes.",
    "42. Porque siempre encuentras formas de demostrarme tu amor.",
    "43. Porque nuestras discusiones siempre terminan con amor y comprensión.",
    "44. Porque me encanta cuando me tomas de la mano sin motivo alguno.",
    "45. Porque me gusta verte disfrutar de las cosas que amas.",
    "46. Porque cada momento a tu lado se vuelve inolvidable.",
    "47. Porque me haces sentir en casa con solo estar a tu lado.",
    "48. Porque juntos crecemos y aprendemos el uno del otro.",
    "49. Porque cada desafío que enfrentamos nos hace más fuertes.",
    "50. Porque me gusta cuando te ríes de mis chistes, aunque sean malos.",
    "51. Porque nunca me aburro cuando estoy contigo.",
    "52. Porque me gusta ver el mundo a través de tus ojos.",
    "53. Porque me haces ver la belleza en lo simple.",
    "54. Porque me encanta cuando me incluyes en tus sueños y planes.",
    "55. Porque eres la mejor sorpresa que la vida me ha dado.",
    "56. Porque amo lo que somos y lo que estamos construyendo juntos.",
    "57. Porque siempre tienes un lugar especial en mi corazón.",
    "58. Porque no importa cuántos años pasen, sigo sintiendo lo mismo por ti.",
    "59. Porque me haces sentir amado(a) sin necesidad de palabras.",
    "60. Porque no hay nadie más con quien quiera estar.",
    "61. Porque me gusta cómo celebramos nuestras pequeñas victorias.",
    "62. Porque siempre tienes una palabra de aliento para mí.",
    "63. Porque contigo todo problema parece más fácil de resolver.",
    "64. Porque eres mi persona favorita en el mundo.",
    "65. Porque cada segundo contigo vale la pena.",
    "66. Porque me gusta cómo hemos construido nuestra relación con amor y respeto.",
    "67. Porque me encanta ver nuestro crecimiento juntos.",
    "68. Porque me haces ver el amor de una manera diferente.",
    "69. Porque cada día a tu lado es una nueva aventura.",
    "70. Porque juntos creamos recuerdos inolvidables.",
    "71. Porque me encanta compartir mis alegrías y tristezas contigo.",
    "72. Porque cada vez que estamos separados, cuento los minutos para verte.",
    "73. Porque me encanta ver cómo enfrentamos la vida juntos.",
    "74. Porque no hay amor más verdadero que el nuestro.",
    "75. Porque te amo con todo mi corazón, y eso nunca cambiará.",
    "76. Porque sé que, pase lo que pase, siempre te elegiré a ti.",
    "77. Porque me haces feliz todos los días.",
    "78. Porque tu sonrisa ilumina mi vida.",
    "79. Porque siempre me apoyas en mis sueños.",
    "80. Porque me haces sentir amado(a).",
    "81. Porque juntos superamos cualquier problema.",
    "82. Porque contigo todo es más bonito.",
    "83. Porque eres mi mejor amigo(a) y mi pareja.",
    "84. Porque nuestras risas son inigualables.",
    "85. Porque confío plenamente en ti.",
    "86. Porque me aceptas tal y como soy.",
    "87. Porque me enseñas a ser mejor persona.",
    "88. Porque me das paz cuando estoy ansioso(a).",
    "89. Porque tu voz me tranquiliza.",
    "90. Porque abrazarte es mi lugar favorito.",
    "91. Porque cuando estamos juntos, el tiempo vuela.",
    "92. Porque con solo mirarnos nos entendemos.",
    "93. Porque nuestra historia es única.",
    "94. Porque cada día aprendo algo nuevo contigo.",
    "95. Porque amo compartir mi vida contigo.",
    "96. Porque me haces sentir especial.",
    "97. Porque siempre me animas en mis momentos difíciles.",
    "98. Porque me inspiras a luchar por mis metas.",
    "99. Porque nuestras conversaciones nunca se acaban.",
    "100. Porque tu amor es sincero y puro.",
    "101. Porque me llenas de besos sin razón.",
    "102. Porque me haces sentir en casa, sin importar dónde estemos.",
    "103. Porque haces que cada día sea especial.",
    "104. Porque me haces sentir seguro(a).",
    "105. Porque me recuerdas lo valioso(a) que soy.",
    "106. Porque eres mi mayor bendición.",
    "107. Porque me das fuerzas cuando las necesito.",
    "108. Porque contigo todo tiene sentido.",
    "109. Porque eres la persona que siempre soñé.",
    "110. Porque cada momento a tu lado es un tesoro.",
    "111. Porque nuestros planes a futuro me ilusionan.",
    "112. Porque me encanta la forma en que me miras.",
    "113. Porque siempre sabes qué decirme.",
    "114. Porque me haces reír hasta en mis días tristes.",
    "115. Porque eres mi mayor motivación.",
    "116. Porque contigo el amor es real.",
    "117. Porque cada detalle tuyo me enamora más.",
    "118. Porque me siento completo(a) a tu lado.",
    "119. Porque no imagino una vida sin ti.",
    "120. Porque eres la mejor parte de mis días.",
    "121. Porque contigo soy libre de ser yo mismo(a).",
    "122. Porque me encanta escucharte hablar.",
    "123. Porque juntos hemos construido algo hermoso.",
    "124. Porque no importa el problema, siempre encontramos solución.",
    "125. Porque contigo aprendí lo que es amar de verdad.",
    "126. Porque me haces sentir importante.",
    "127. Porque cada día a tu lado es una nueva aventura.",
    "128. Porque me encanta soñar despierto(a) contigo.",
    "129. Porque eres mi persona favorita.",
    "130. Porque cada beso tuyo me hace olvidar todo lo malo.",
    "131. Porque me haces sentir amado(a) sin necesidad de palabras.",
    "132. Porque en tus abrazos me siento en paz.",
    "133. Porque siempre me escuchas y me entiendes.",
    "134. Porque juntos somos un gran equipo.",
    "135. Porque me das razones para sonreír cada día.",
    "136. Porque valoro cada momento a tu lado.",
    "137. Porque no importa cuántos años pasen, te seguiré eligiendo.",
    "138. Porque me haces sentir en casa con solo estar contigo.",
    "139. Porque eres el amor de mi vida.",
    "140. Porque cada día me enamoro más de ti.",
    "141. Porque me encanta la forma en que me cuidas.",
    "142. Porque nunca me has fallado.",
    "143. Porque siempre estás cuando te necesito.",
    "144. Porque juntos hemos pasado por mucho y seguimos aquí.",
    "145. Porque me encanta cómo compartimos nuestros sueños.",
    "146. Porque me haces sentir la persona más afortunada.",
    "147. Porque eres mi refugio en los días difíciles.",
    "148. Porque contigo me siento completo(a).",
    "149. Porque amo nuestra complicidad.",
    "150. Porque siempre encuentras la forma de hacerme reír.",
    "151. Porque tu amor me llena el alma.",
    "152. Porque cada beso tuyo es único.",
    "153. Porque me das paz en este mundo caótico.",
    "154. Porque me encanta cómo somos juntos.",
    "155. Porque me enseñas lo que es el amor verdadero.",
    "156. Porque eres mi mayor alegría.",
    "157. Porque no necesito nada más cuando estoy contigo.",
    "158. Porque contigo aprendí a amar sin miedo.",
    "159. Porque tus abrazos son mi mejor terapia.",
    "160. Porque me das fuerzas cuando siento que no puedo más.",
    "161. Porque me encanta despertar a tu lado.",
    "162. Porque no hay nadie más con quien quiera estar.",
    "163. Porque eres la mejor parte de mi vida.",
    "164. Porque juntos construimos recuerdos hermosos.",
    "165. Porque no importa el tiempo, siempre te amaré.",
    "166. Porque cada 'te amo' tuyo me hace el día.",
    "167. Porque amo cada detalle de ti.",
    "168. Porque me encanta hacer planes a tu lado.",
    "169. Porque cada vez que te miro, me enamoro más.",
    "170. Porque me encanta la forma en que me miras.",
    "171. Porque me haces sentir querido(a) todos los días.",
    "172. Porque eres la persona que siempre quise en mi vida.",
    "173. Porque cada risa contigo es un regalo.",
    "174. Porque me das razones para luchar por nuestro amor.",
    "175. Porque me encanta la vida a tu lado.",
    "176. Porque contigo todo es mejor.",
    "177. Porque amo cuando me tomas de la mano.",
    "178. Porque me encanta verte dormir.",
    "179. Porque me sorprendes cada día con algo nuevo.",
    "180. Porque cuando estamos juntos, el mundo se detiene.",
    "181. Porque me haces sentir joven y lleno(a) de vida.",
    "182. Porque me haces sentir que todo es posible.",
    "183. Porque me encanta la forma en que me tocas el cabello.",
    "184. Porque siempre encuentro paz en tu voz.",
    "185. Porque te preocupas por mis sentimientos.",
    "186. Porque me haces sentir que todo lo malo desaparece.",
    "187. Porque me haces reír incluso cuando no quiero.",
    "188. Porque contigo los días nublados se sienten soleados.",
    "189. Porque haces que la rutina nunca sea aburrida.",
    "190. Porque eres la persona con quien quiero envejecer.",
    "191. Porque me das el amor más sincero.",
    "192. Porque eres mi inspiración todos los días.",
    "193. Porque nuestras diferencias nos hacen más fuertes.",
    "194. Porque me encanta verte ser tú mismo(a).",
    "195. Porque siempre me motivas a mejorar.",
    "196. Porque me haces sentir que tengo todo lo que necesito.",
    "197. Porque me das razones para creer en el amor.",
    "198. Porque me encanta cuando me dices que me amas.",
    "199. Porque nunca dejas de sorprenderme.",
    "200. Porque haces que cada día sea una nueva oportunidad de amarte."
];

// Asegurar que no haya errores si la sesión supera el número de razones
$razon_actual = $razones[$_SESSION['razon']] ?? "Fin de las razones.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razón #<?php echo $_SESSION['razon'] + 1; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('fondo1.png'); /* Imagen de fondo */
            background-size: cover;
            background-position: center;
            text-align: center;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: red;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            margin: 5px;
        }

        .btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2><?php echo $razon_actual; ?></h2>
        <div class="buttons">
            <?php if ($_SESSION['razon'] > 0): ?>
                <a href="?accion=anterior" class="btn">Anterior</a>
            <?php endif; ?>
            
            <?php if ($_SESSION['razon'] < count($razones) - 1): ?>
                <a href="?accion=siguiente" class="btn">Siguiente</a>
            <?php else: ?>
                <a href="index.php" class="btn">Volver al inicio</a>
            <?php endif; ?>

            <a href="?accion=inicio" class="btn">Regresar a la razón 1</a>
        </div>
    </div>

</body>
</html>
