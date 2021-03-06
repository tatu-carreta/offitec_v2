@extends($project_name.'-master')

@section('contenido')
<style>
    .check_box {
    display:none;
}

.noTocado{
    background:url('{{URL::to("images/destacadoAzul.png")}}') no-repeat;
    height: 30px;
    width: 30px;
    display: inline-block;
    padding: 0 0 0 2em;
}

.tocado{
    background:url('{{URL::to("images/destacadoRojo.png")}}') no-repeat;
    height: 30px;
    width: 30px;
    display: inline-block;
    padding: 0 0 0 2em;
}

</style>
<script src="{{URL::to('js/ckeditorLimitado.js')}}"></script>
<script src="{{URL::to('js/producto-funcs.js')}}"></script>
<section class="container">    
        {{ Form::open(array('url' => $prefijo.'/admin/producto/editar', 'files' => true, 'role' => 'form', 'onsubmit' => 'return validatePrecioProd(this);')) }}
        <h2><span>Editar producto</span></h2>
        <div class="marginBottom2">
            <a class="volveraSeccion" href="@if($seccion_next != 'null'){{URL::to('/'.Seccion::find($seccion_next) -> menuSeccion()->lang() -> url)}}@else{{URL::to('/')}}@endif"><i class="fa fa-caret-left"></i>Volver a @if($seccion_next != 'null'){{ Seccion::find($seccion_next) -> menuSeccion()->lang() -> nombre }}@else Home @endif</a>
        </div>
        <div class="row datosProducto marginBottom2">
            <!-- Abre columna de descripción de Producto -->
            <div class="col-md-6">

                <!-- Nombre del producto -->
                <div>
                    <h3>Código del producto</h3>
                    <div class="form-group marginBottom2">
                        <input class="form-control" type="text" name="titulo" placeholder="Código" required="true" maxlength="9" value="{{ $item->lang()->titulo }}">
                        <p class="infoTxt"><i class="fa fa-info-circle"></i>No puede haber dos productos con igual código. Máximo 9 caracteres.</p>
                    </div>
                </div>

                <!-- Estado  -->
                <h3>Estado</h3>
                <div class="marginBottom2">
                    <!--
                    <div class="fondoDestacado marginBottom05">
                        <div class="radio">
                            <label>
                                <input id="" class="" type="checkbox" name="item_destacado" value="B" checked="true">
                                Normal
                            </label>
                        </div>
                    </div>
                    -->
                    <div class="fondoDestacado marginBottom05">
                        <div class="radio">
                            <label>
                                <input id="" class="" type="checkbox" name="item_destacado" value="N" @if($item->producto()->nuevo()) checked="true" @endif>
                                 <i class="fa fa-tag prodDestacado fa-lg"></i>
                                Nuevo
                            </label>
                        </div>
                    </div>
                    <div class="fondoDestacado marginBottom05">
                       <div class="divEstado">
                            <div class="estado">
                                <div class="radio">
                                    <label>
                                        
                                        <input id="" class=" precioDisabled" type="checkbox" name="item_destacado" value="O">
                                        <i  class="fa fa-usd prodDestacado fa-lg"></i>
                                        Oferta
                                    </label>
                                </div>
                            </div>
                            <div class="divPrecio">
                                <label for="" >
                                    <span>Precio antes $ </span><input id="" class="form-control inputWidth60 precioAble1 precio-number" type="text" name="precio_antes" value="{{$item->producto()->precio(1)}}">
                                </label>
                            </div>
                            <div class="divPrecio">
                                <label for="" >
                                    <span>Precio oferta $ </span><input id="" class="form-control inputWidth60 precioAble1 precio-number" type="text" name="precio_actual" value="{{$item->producto()->precio(2)}}">
                                </label>
                            </div>   
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <p class="infoTxt"><i class="fa fa-info-circle"></i>Los productos NUEVOS y las OFERTAS se muestran también en la home.</p>
                </div>

                @if($seccion_next != 'null')
                    <div class="fondoDestacado modIndicarSeccion">
                        <h3>Ubicación</h3>
                            @foreach($menues as $men)
                            <div class="cadaSeccion">
                                @if(count($men->children) == 0)
                                    <div>
                                        @foreach($men->secciones as $seccion)
                                            <span><input id="menu{{$men->id}}" type="checkbox" name="secciones[]" value="{{$seccion->id}}" @if(in_array($seccion->id, $item->secciones->lists('id'))) checked="true" @endif @if($seccion->id == $seccion_next) disabled @endif>{{-- @if($seccion->titulo != ""){{$seccion->titulo}}@else Sección {{$seccion->id}} @endif --}}</span>
                                        @endforeach
                                    </div>
                                    <div><label for="menu{{$men->id}}">{{$men->lang()->nombre}}</label></div>
                                @endif
                            </div>
                            @endforeach
                    </div>
                @else
                    @foreach($item->secciones as $seccion)
                        <input type="hidden" name="secciones[]" value="{{$seccion->id}}">
                    @endforeach
                @endif
            </div><!--cierra columna datos de producto-->

            <!-- Abre columna de imágenes -->
           
                <h3>Imagen principal</h3>
                <div class="col-md-6 fondoDestacado cargaImg">
                    <h3>Carga y recorte de la imagen</h3>
                    <p class="infoTxt"><i class="fa fa-info-circle">
                </i>La imagen original puede ser vertical u horizontal pero no debe exceder los 500kb de peso.</p>
                @if(!is_null($item->imagen_destacada()))
                    <div class="divCargaImgProducto">
                        <div class="marginBottom1 divCargaImg">
                            <img alt="{{$item->lang()->titulo}}"  src="{{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}">
                            <i onclick="borrarImagenReload('{{ URL::to('admin/imagen/borrar') }}', '{{$item->imagen_destacada()->id}}');" class="fa fa-times-circle fa-lg"></i>
                        </div>
                        <input type="hidden" name="imagen_portada_editar" value="{{$item->imagen_destacada()->id}}">
                        <input class="form-control" type="text" name="epigrafe_imagen_portada_editar" placeholder="Ingrese una descripción de la foto" value="{{ $item->imagen_destacada()->lang()->epigrafe }}">
                    </div>
                @else
                    @include('imagen.modulo-imagen-angular-crop')
                @endif
                
            </div>

            <div class="clear"></div>
            <!-- cierran columnas -->


        </div>  
            

            <div class="border-top">
                <input type="submit" value="Publicar" class="btn btn-primary marginRight5">
                <a href="@if($seccion_next != 'null'){{URL::to('/'.Seccion::find($seccion_next) -> menuSeccion()->lang() -> url)}}@else{{URL::to('/')}}@endif" class="btn btn-default">Cancelar</a>
            </div>


            {{Form::hidden('continue', $continue)}}
            {{Form::hidden('id', $item->id)}}
            {{Form::hidden('producto_id', $producto->id)}}
            {{Form::hidden('descripcion', '')}}
            {{Form::hidden('tipo_precio_id[]', '2')}}
            @if($seccion_next != 'null')
                {{Form::hidden('seccion_id', $seccion_next)}}
            @endif
        {{Form::close()}}
    </section>
@stop

@section('footer')

    @parent

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
    <script src="{{URL::to('js/angular-file-upload.js')}}"></script>
    <script src="{{URL::to('js/ng-img-crop.js')}}"></script>
    <script src="{{URL::to('js/controllers.js')}}"></script>

@stop
