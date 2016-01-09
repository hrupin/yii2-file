<?php

namespace hrupin\file;

/**
 * This is just an example.
 */
class File extends \yii\base\Widget
{

    // $typeRead
    //
    //r – открытие файла только для чтения.
    //r+ - открытие файла одновременно на чтение и запись.
    //w – создание нового пустого файла. Если на момент вызова уже существует такой файл, то он уничтожается.
    //w+ - аналогичен r+, только если на момент вызова фай такой существует, его содержимое удаляется.
    //a – открывает существующий файл в  режиме записи, при этом указатель сдвигается на  последний байт файла (на конец файла).
    //a+ - открывает файл в режиме чтения и записи при этом указатель сдвигается на последний байт файла (на конец файла). Содержимое файла не удаляется.

    protected $errors = [];
    protected $file;
    protected $path;

    public function __construct($dir, $file, $typeRead = 'r+'){
        if($this->assetFile($dir, $file)){
            $this->openFile($typeRead);
        }
    }

    public function createFile($dir, $file){
        $this->path = $dir.'/'.$file;
        $this->file = fopen($this->path, "w");
    }

    private function setErrors($key, $err){
        $this->errors[$key] = $err;
    }

    public function getErrors(){
        return $this->errors;
    }

    private function openFile($t){
        $this->file = fopen($this->path, $t);
    }

    public function writeFile($text){
        return fwrite($this->file, $text);
    }

    public function readAllFile(){
        return readfile($this->path);
    }

    public function readStrFile($str){
        return fgets($this->file, $str);
    }

    public function closeFile(){
        return fclose($this->file);
    }

    private function assetFile($dir, $file){
        if(file_exists($dir)){
            if(file_exists($dir.'/'.$file)){
                $this->path = $dir.'/'.$file;
                return true;
            }
            else{
                $this->setErrors('file', 'Файла в этом каталоге не существует');
            }
        }
        else{
            $this->setErrors('dir', 'Каталога не существует');
        }
    }

}
