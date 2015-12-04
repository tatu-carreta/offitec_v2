@extends($project_name.'-master')

@section('head')

    @parent

    <link rel="stylesheet" href="{{URL::to('css/ng-img-crop.css')}}" />
@stop

@section('contenido')
    <script src="{{URL::to('js/ckeditorLimitado.js')}}"></script>
    @if (Session::has('mensaje'))
    <script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
    @endif
    <section class="container"  id="ng-app" ng-app="app">    
        <div ng-controller="ImagenMultiple" nv-file-drop="" uploader="uploader" filters="customFilter, sizeLimit">
        {{ Form::open(array('url' => $prefijo.'/admin/portfolio_completo/editar', 'files' => true, 'role' => 'form')) }}
            <h2 class="marginBottom2"><span>Editar proyecto</span></h2>
            <div class="marginBottom2">
                <a class="volveraSeccion" href="@if($seccion_next != 'null'){{URL::to('/'.Seccion::find($seccion_next) -> menuSeccion()->lang() -> url)}}@else{{URL::to('/')}}@endif"><i class="fa fa-caret-left"></i>Volver a @if($seccion_next != 'null'){{ Seccion::find($seccion_next) -> menuSeccion()->lang() -> nombre }}@else Home @endif</a>
            </div>
            
            <div class="row">
                <div class="col-md-6 divDatos divCargaTitulo">
                    <h3>Título del proyecto</h3>
                    <div class="form-group fondoDestacado">
                        <input class="form-control" type="text" name="titulo" placeholder="Ingrese el título del proyecto" required="true" maxlength="50" value="{{ $item->lang()->titulo }}">
                        <p class="infoTxt"><i class="fa fa-info-circle"></i>No puede haber dos proyectos con igual nombre. Máximo 50 caracteres.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Imágenes -->
                <div class="col-md-12 divDatos">
                    <h3>Recorte de imágenes</h3>
                        <div class="fondoDestacado">
                            <h4>Nueva imagen</h4>
                            <p class="infoTxt"><i class="fa fa-info-circle"></i>La imagen original no debe exceder los 500kb de peso.</p>

                            <input type="hidden" ng-model="url_public" ng-init="url_public = '{{URL::to('/')}}'">
                            @include('imagen.modulo-imagen-angular-crop-horizontal-multiples')


                            @if((count($item->imagen_destacada()) > 0) || (count($item->imagenes) > 0))

                            @endif
                            @if(count($item->imagen_destacada()) > 0)
                            <div class="row">
                                <div class="col-md-12 imgSeleccionadas">
                                    <h4>Imágenes cargadas</h4>
                                    <p class="infoTxt"><i class="fa fa-info-circle"></i>La primer imagen cargada se mostrará en el listado de proyectos.</p>
                                </div>
                                <div class="col-md-2 imgSelecDestacada">
                                    <div class="thumbnail">
                                        <input type="hidden" name="imagen_crop_editar[]" value="{{$item->imagen_destacada()->id}}">
                                        <img class="marginBottom1" src="{{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}" alt="{{$item->lang()->titulo}}">
                                        <input class="form-control" type="text" name="epigrafe_imagen_crop_editar[]" value="{{$item->imagen_destacada()->lang()->epigrafe}}">
                                        <i onclick="borrarImagenReload('{{ URL::to('admin/imagen/borrar') }}', '{{$item->imagen_destacada()->id}}');" class="fa fa-times-circle fa-lg"></i>
                                    </div>
                                </div>

                                @endif
                                @foreach($item->imagenes as $img)
                                <div class="imgSeleccionadas">
                                    <div class="col-md-2">
                                        <div class="thumbnail">
                                            <input type="hidden" name="imagen_crop_editar[]" value="{{$img->id}}">
                                            <img class="marginBottom1" src="{{ URL::to($img->carpeta.$img->nombre) }}" alt="{{$item->lang()->titulo}}">
                                            <input class="form-control" type="text" name="epigrafe_imagen_crop_editar[]" value="{{$img->lang()->epigrafe}}">
                                            <i onclick="borrarImagenReload('{{ URL::to('admin/imagen/borrar') }}', '{{$img->id}}');" class="fa fa-times-circle fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div ng-repeat="img in imagenes_seleccionadas" class="imgSeleccionadas">
                                    <div class="col-md-2">
                                        <div class="thumbnail">
                                            <input type="hidden" name="imagen_portada_ampliada[]" value="<% img.imagen_portada_ampliada %>">
                                            <img class="marginBottom1" ng-src="<% img.src %>">
                                            <input type="hidden" name="epigrafe_imagen_portada[]" value="<% img.epigrafe %>">
                                            <input type="hidden" name="imagen_portada_crop[]" value="<% img.imagen_portada %>">
                                            <i ng-click="borrarImagenCompleto($index)" class="fa fa-times-circle fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>  

            <div class="row">
                <div class="col-md-6 divDatos">
                    <h3>Cuerpo</h3>
                    <div class="divEditorTxt fondoDestacado marginBottom2">
                        <textarea id="texto" contenteditable="true" name="cuerpo">{{ $item->portfolio()->portfolio_completo()->lang()->cuerpo }}</textarea>
                    </div>
                    <!-- Videos -->
                    <div class="divCargaVideos">
                        <h3>Videos</h3>
                        <div class="fondoDestacado">
                            @include('video.modulo-video-editar')
                        </div>   
                    </div>
                </div>
            </div>
            
            

            <div class="punteado">
                <input type="submit" value="Publicar" class="btn btn-primary marginRight5">
                <a onclick="window.history.back();" class="btn btn-default">Cancelar</a>
            </div>


            {{Form::hidden('continue', $continue)}}
            {{Form::hidden('id', $item->id)}}
            {{Form::hidden('portfolio_completo_id', $portfolio_completo->id)}}
            @if($seccion_next != 'null')
                {{Form::hidden('seccion_id', $seccion_next)}}
            @endif
        {{Form::close()}}
        </div>
    </section>
@stop

@section('footer')

    @parent

    <script src="{{URL::to('js/angular-1.3.0.min.js')}}"></script>
    <script src="{{URL::to('js/angular-file-upload.js')}}"></script>
    <script src="{{URL::to('js/ng-img-crop.js')}}"></script>
    <script src="{{URL::to('js/controllers.js')}}"></script>
    
    <script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
        <script src="{{URL::to('ckeditor/adapters/jquery.js')}}"></script>

@stop
