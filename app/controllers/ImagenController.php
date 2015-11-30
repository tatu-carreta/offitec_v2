<?php

class ImagenController extends BaseController {

    public function borrar() {

        //Aca se manda a la funcion borrarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Imagen::borrar(Input::all());

        return $respuesta;
    }

    public function uploadImagenCrop() {

        //if (!empty(Input::hasFile('file'))) {
            $img = Input::file('file');

            $path = public_path() . '/uploads/';

            $count = count($img->getClientOriginalName()) - 4;

            $filename = Str::limit(Str::slug($img->getClientOriginalName()), $count, "");
            $extension = $img->getClientOriginalExtension(); //if you need extension of the file

            if (!is_null(Imagen::imagenPorNombre($filename . ".{$extension}"))) {

                $filename = $filename . "(" . Str::limit(sha1(time()), 3, "") . ")" . ".{$extension}";
            } else {
                $filename = $filename . ".{$extension}";
            }

            $img->move($path, "small_" . $filename);
            $answer = array('answer' => 'File transfer completed', 'imagen_path' => "small_" . $filename);
            echo json_encode($answer);
        //} else {
        //    echo 'No image';
        //}
    }
    
    public function uploadGaleriaSlideHome() {

        //if (!empty(Input::hasFile('file'))) {

            $img_slide = Input::file('file');

            $respuesta = Imagen::uploadImageAngularSlide($img_slide);

            echo json_encode($respuesta);
        //} else {
        //    echo 'No image';
        //}
        die();
    }

    public function ordenar() {

        foreach (Input::get('orden') as $key => $imagen_id) {
            if ($key == 0) {
                $destacado = 'A';
            } else {
                $destacado = NULL;
}
            $respuesta = Imagen::ordenarImagenItem($imagen_id, $key, Input::get('item_id'), $destacado);
        }

        $item = Item::find(Input::get('item_id'));

        $menu = $item->seccionItem()->menuSeccion()->modulo()->nombre;

        return Redirect::to('/' . $menu . '/' . $item->lang()->url)->with('mensaje', $respuesta['mensaje'])->with('ok', true);
    }

}
