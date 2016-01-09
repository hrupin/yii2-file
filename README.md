File
====
File

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hrupin/yii2-file "*"
```

or add

```
"hrupin/yii2-file": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```
use hrupin\file\File;

$dir = '/some/your/dir';

$file = new File($dir, 'file.txt');
$file->readAllFile();
$file->readStrFile(10);
$file->closeFile();

$file->createFile($dir, 'anotherFile.txt');
$file->writeFile('You some text or data ...');
$file->writeFile('Add you some text or data ...');
$file->readAllFile();
$file->closeFile();

var_dump($file->getErrors());

```
