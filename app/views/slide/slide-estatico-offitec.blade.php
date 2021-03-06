<!-- abre S L I D E estático -->
<div class="slideHome">
    
    <div class="wrapper">
                    <div id="ei-slider" class="ei-slider">
                        <ul class="ei-slider-large">
                           <li>
                                <img  src="{{URL::to('images/slide3.jpg')}}" alt="image02" />
                                <div class="ei-title">
                                    <h3>{{ Lang::get('html.slide_offitec.imagen1') }}</h3>
                                </div>
                            </li>
                            <li>
                                <img src="{{URL::to('images/mesaSillonBlanco1.jpg')}}" alt="image01" />
                                <div class="ei-title">
                                    <h3>{{ Lang::get('html.slide_offitec.imagen2') }}</h3>
                                </div>
                            </li>
                            <li>
                                <img src="{{URL::to('images/sillasVerde.jpg')}}" alt="image04"/>
                                <div class="ei-title">
                                   <h3>{{ Lang::get('html.slide_offitec.imagen3') }}</h3>
                                </div>
                            </li>
                       
                            <li>
                                <img src="{{URL::to('images/slide1blanco.jpg')}}" alt="image01" />
                                <div class="ei-title">
                                    <h3>{{ Lang::get('html.slide_offitec.imagen4') }}</h3>
                                </div>
                            </li>
                            
                            <li>
                                <img src="{{URL::to('images/slide4blanco.jpg')}}" alt="image03"/>
                                <div class="ei-title">
                                    <h3>{{ Lang::get('html.slide_offitec.imagen5') }}</h3>
                                </div>
                            </li>
                         
                        
                       
                        </ul><!-- ei-slider-large -->
                    
                        <ul class="ei-slider-thumbs">
                                <li class="ei-slider-element">Current</li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                            </ul><!-- ei-slider-thumbs -->
                    </div><!-- ei-slider -->

            </div><!-- wrapper -->

</div><!-- cierra S L I D E estático --> 

<!--C A R O U S E L de colores-->
<div class="fondo-negro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contenedor-carousel">
                    <div class="carousel-home carousel-oculto">
                        <div id="owl-demo2">
                            
                                <div class="item"><a class="boton-violeta" href="{{URL::to(Lang::get('catalogo_offitec.cat1.url'))}}">{{ Lang::get('catalogo_offitec.cat1.titulo') }}</a></div>
                                <div class="item"><a class="boton-rosa" href="{{URL::to(Lang::get('catalogo_offitec.cat2.url'))}}">{{ Lang::get('catalogo_offitec.cat2.titulo') }}</a></div>
                                <div class="item"><a class="boton-verdeagua" href="{{URL::to(Lang::get('catalogo_offitec.cat3.url'))}}">{{ Lang::get('catalogo_offitec.cat3.titulo') }}</a></div>
                                <div class="item"><a class="boton-amarillo" href="{{URL::to(Lang::get('catalogo_offitec.cat4.url'))}}">{{ Lang::get('catalogo_offitec.cat4.titulo') }}</a></div>
                                <div class="item"><a class="boton-azul" href="{{URL::to(Lang::get('catalogo_offitec.cat5.url'))}}">{{ Lang::get('catalogo_offitec.cat5.titulo') }}</a></div>
                                <div class="item"><a class="boton-violeta" href="{{URL::to(Lang::get('catalogo_offitec.cat6.url'))}}">{{ Lang::get('catalogo_offitec.cat6.titulo') }}</a></div>
                                <div class="item"><a class="boton-rosa" href="{{URL::to(Lang::get('catalogo_offitec.cat7.url'))}}">{{ Lang::get('catalogo_offitec.cat7.titulo') }}</a></div>
                                <div class="item"><a class="boton-verdeagua" href="{{URL::to(Lang::get('catalogo_offitec.cat8.url'))}}">{{ Lang::get('catalogo_offitec.cat8.titulo') }}</a></div>
                                <div class="item"><a class="boton-amarillo" href="{{URL::to(Lang::get('catalogo_offitec.cat9.url'))}}">{{ Lang::get('catalogo_offitec.cat9.titulo') }}</a></div>
                                <div class="item"><a class="boton-azul" href="{{URL::to(Lang::get('catalogo_offitec.cat10.url'))}}">{{ Lang::get('catalogo_offitec.cat10.titulo') }}</a></div>
                                <div class="item"><a class="boton-violeta" href="{{URL::to(Lang::get('catalogo_offitec.cat11.url'))}}">{{ Lang::get('catalogo_offitec.cat11.titulo') }}</a></div>
                                <div class="item"><a class="boton-rosa" href="{{URL::to(Lang::get('catalogo_offitec.cat12.url'))}}">{{ Lang::get('catalogo_offitec.cat12.titulo') }}</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>