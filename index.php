<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Book</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="image/logopjt.png">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

     <!--------------SCROLL TOP------------------------>
     <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevrons-up scroll__top__icon'></i>
    </a>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> Find Book </a>

        <form action="" class="search-form">
            <!-- <input type="search" name="" placeholder="pesquise aqui..." id="search-box">
            <label for="search-box" class="fas fa-search"></label> -->
            <!-- <h1>Para mais -></h1> -->
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"><a>login</a></div>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#projeto">Projeto</a>
            <a href="#destaques">Destaques</a>
            <a href="#empresa">Empresa</a>
            <!-- <a href="#unidades">Unidades</a> -->
            <a href="#contato">Contato</a>
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#projeto" class="fas fa-book"></a>
    <a href="#destaques" class="fas fa-tags"></a>
    <a href="#empresa" class="fas fa-city"></a>
    <!-- <a href="#unidades" class="fas fa-blog"></a> -->
    <a href="#contato" class="fas fa-phone"></a>
</nav>

<!-- login form  -->

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="#">
       <a href="login/LoginCadastro/loginUsuario.php"> <h3>Leitor</h3> </a>
       <a href="login/LoginCadastro/loginBiblioteca.php"> <h3>Biblioteca</h3> </a>
       <a href="login/LoginCadastro/loginAdm.php"> <h3>Administração</h3> </a>
    </form>

</div>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <div data-anime="left" class="column left">
            <h3>Bem Vindo ao Find Book</h3>
            <p>Um sistema web que vai ajudar futuros e atuais leitores a encontrar bibliotecas próximas
                com disponibilidade do livro desejado.</p>
            <a href="#projeto" class="btn">ver mais</a>
        </div>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="image/book-1.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-2.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-3.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-4.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-5.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-6.png" alt=""></a>
            </div>
            <img src="image/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!-- home section ense  -->

<!-- icons section starts  -->

<div class="max-width">
<section class="icons-container">

    <div class="icons">
        <i class="fas fa-book"></i>
        <div class="content">
            <h3>Acervo disponivel</h3>
            <p>encontre livros em bibliotecas próxima de você!</p>
        </div>
    </div>

    <div class="icons">
        <i class='bx bxs-location-plus'></i>
        <div class="content">
            <h3>Encontre bibliotecas</h3>
            <p>próximas de você!</p>
        </div>
    </div>

    <div class="icons">
        <i class='bx bxs-lock-alt'></i>
        <div class="content">
            <h3>Segurança</h3>
            <p>seus dados estão seguros em nossoo site.</p>
        </div>
    </div>
</div>
</section>

<!-- icons section ends -->


<!-- deal section starts  -->



<section class="deal" id="projeto">

    <div class="max-width">
    <div class="content">
        <div data-anime="left" class="column left">
        <h3>Find Book</h3>
        <p>O Find Book é um sistema web que tem como objetivo tornar a sua busca 
            por uma biblioteca mais próxima de você de forma prática e rápida.</p>
    </div>

    <div class="image">
        <div data-anime="right" class="column right">
        <img src="image/logopjt.png" width="59px" height="400px" alt="">
    </div>
    </div>

  
</div>
</div>
</section>
<!-- deal section ends -->



<!-- featured section starts  -->

<section class="featured" id="destaques">

    <h1 class="heading"> <span>Destaques</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="image/book-1.png" alt="">
                </div>
                <div class="content">
                    <h3>featured books</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>


            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="image/book-3.png" alt="">
                </div>
                <div class="content">
                    <h3>Bora Bill</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                   
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="image/book-5.png" alt="">
                </div>
                <div class="content">
                    <h3>ai kaliquinhaa</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                   
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="image/book-6.png" alt="">
                </div>
                <div class="content">
                    <h3>fggttddd</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                  
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="image/book-7.png" alt="">
                </div>
                <div class="content">
                    <h3>Sample</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- featured section ends -->


<section class="about" id="empresa">
    <h1 class="heading"> <span>Empresa desenvolvedora</span> </h1>
    <div class="max-width">
        <div class="content">
            <div data-anime="left" class="column left">
                <img  src="image/forsetTech.png" alt="">
            </div>
            <div data-anime="right" class="column right">
                    <h3>Forset Tech</h3>
                    <p>O Find Book foi desenvolvido pela empresa Forset Tech. A empresa é atuante no setor de informática e
                        é especializada no desenvolvimento de software 
                        para empresas de médio porte.</p>
                        <a href="#projeto" class="btn">ver mais</a>
            </div>
        </div>
    </div>
</section>



<section class="newsletter">

</section>

<!-- blogs section starts  -->
<!-- 
<section class="blogs" id="unidades">

    <h1 class="heading"> <span>Unidades</span> </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/k.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Minhá kaza sua vidah</h3>
                   <p> <i class='bx bxs-location-plus'></i> Aqui.</p>
                    <a href="#" class="btn">ver mais</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/k.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Minhá kaza sua vidah</h3>
                    <p> <i class='bx bxs-location-plus'></i> Aqui.</p>
                    <a href="#" class="btn">ver mais</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/k.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Minhá kaza sua vidah</h3>
                    <p> <i class='bx bxs-location-plus'></i> Aqui.</p>
                    <a href="#" class="btn">ver mais</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/k.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Minhá kaza sua vidah</h3>
                    <p> <i class='bx bxs-location-plus'></i> Aqui.</p>
                    <a href="#" class="btn">ver mais</a>
                </div>
            </div>

        </div>

    </div>

</section> -->

<!-- blogs section ends -->

      
<!-- contact section starts  -->

<section class="contact" id="contato">
    <h1 class="heading">  <span>Contato </span></h1>
    <div class="max-width">
    <div class="row">
        <form action="">
            <h3>Entrar em contato</h3>
            <div class="inputBox">
                <input type="text" placeholder="seu nome">
                <input type="email" placeholder="seu email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="seu número">
                <input type="text" placeholder="seu assunto">
            </div>
            <textarea placeholder="Digite uma mensagem..." cols="30" rows="10"></textarea>
            <input type="submit" value="enviar mensagem" class="btn">
        </form>

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.4314718210435!2d-46.401794885543225!3d-23.5529422671654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce65086cafaf55%3A0xf7da96815e7611da!2sETEC%20de%20Guaianases!5e0!3m2!1spt-BR!2sbr!4v1663645749224!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
    </div>
</section>
<!-- contact section ends -->


<!-- FOOTER -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Desenvolvedores</h3>
            <a href="#"> <i class="fas fa-user"></i> Caio Fellipe </a>
            <a href="#"> <i class="fas fa-user"></i> Caroliny Santos </a>
            <a href="#"><i class="fas fa-user"></i> Igor Carvalho </a>
            <a href="#"> <i class="fas fa-user"></i> Julia Nery </a>
            <a href="#"> <i class="fas fa-user"></i> Kathelyn Vanessa </a>
            <a href="#"> <i class="fas fa-user"></i> Rafaela Alves </a>
            <a href="#"> <i class="fas fa-user"></i> Sâmella Rosendo </a>
        </div>


        <div class="box">
            <h3>siga-nos</h3>
            <a href="#"> <i class="fab fa-facebook"></i> Facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> Linkedin </a>
            <a href="#"> <i class="fab fa-github"></i> Git hub </a>
            <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
        </div>

        <div class="box">
            <h3>Sessões</h3>
            <a href="#home"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#projeto"> <i class="fas fa-arrow-right"></i> projeto </a>
            <a href="#destaques"> <i class="fas fa-arrow-right"></i> destaques </a>
            <a href="#empresa"> <i class="fas fa-arrow-right"></i> empresa </a>
            <!-- <a href="#unidades"> <i class="fas fa-arrow-right"></i> unidades </a> -->
            <a href="#contato"> <i class="fas fa-arrow-right"></i> contato </a>
        </div>

        <div class="box">
            <h3>Contatos</h3>
            <a href="#"> <i class="fas fa-phone"></i> (11) 9 8456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> (11) 9 6222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> findbook@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>
        
    </div>

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>
</section>

<!-- footer section ends -->

<!-- loader  -->
<!-- 
<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div> -->
















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/main.js"></script>
</body>
</html>