 

**PHP - Laravel** 

**Rotas e controladores**

O arquivo de rotas dentro do framework Laravel indica a URL e os parametros que serão passados para uma determinada parte da aplicação. através das rotas conseguimos separar nossa aplicação de forma eficiente como no exemplo abaixo

Route::get('/', function () {  ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.001.png)   return view('welcome'); }); 

// a rota / irá nos redirecionar para a visualização welcome. Podemos fazer o mesmo quantas vezes quisermos 

Route::get('/teste', function () {     return view('teste'); 

}); 

// a rota /teste irá nos levar para a visualização teste por exemplo

Também podemos indicar dentro do arquivo de rotas um controlar que irá fazer o trabalho de redirecionamento facilitando a leitura e o entendimento a sintaxe fica desta forma

Route::get('/', 'nomecontrolaro@metodo') ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.002.png)

// primeiramente colocamos o nome do nosso controlador criado e em seguida passamos o  //metodo desejado

desta forma estaremos deixando o arquivo de rotas restrito apenas a nossas url e toda a logica será feita em um controlador

💡 Para criação de um novo controlador utilizamos o comando php artisan make:controller![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.003.png)

nomedocontrolador

desta forma o resultado final será o seguinte Rota

Route::get('/series', 'SeriesController@index');![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.004.png)

Controlador

<?php ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.005.png)

namespace App\Http\Controllers; use Illuminate\Http\Request; 

class SeriesController extends Controller { 

`    `public function index(){ 

`        `return view('welcome'); 

`    `} 

}

💡 Atenção a partir da versão 7.0 do laravel é necessário fazer uma configuração para que![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.006.png)

essa chamada funcione sem maiores problemas você pode encontrar como fazer essa [configuração neste link https://mazer.dev/pt-br/laravel/erros/como-corrigir-o-erro-target- class-does-not-exist-no-laravel-8/](https://mazer.dev/pt-br/laravel/erros/como-corrigir-o-erro-target-class-does-not-exist-no-laravel-8/)

![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.007.png)Desta forma a chamada para uma visualização está sendo feita pelo controlador por hora estamos apenas chamando a view padrão do laravel porem iremos alterar isso logo![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.008.png)

**View(s)**

View são as visualizações de nossa aplicação elas são acessadas e criadas dentro da pasta resources→views dentro dela podemos criar qualquer pagina de visualização que desejarmos como por exemplo uma pagina criada series. para isso utilizamos o blade que iremos explicar mais a frente

e passamos para nosso controlador para retornar a visualização da seguinte forma

class SeriesController extends Controller { ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.009.png)

`    `public function index(){ 

`        `return view('series/index');     } 

}

**Passando variaveis para uma view**

Para enviarmos uma variavel para dentro de uma visualização é bastante simples iremos ultilizar nosso controlador e dentro do paramentro return view iremos passar a variavel que desejamos enviar para nossa visualização no exemplo abaixo criamos um array com algumas series e as passamos para nossa view index

class SeriesController extends Controller { ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.010.png)

public function index(){ 

`        `$series = [ 

`            `'lost', 

`            `'Demolidor', 

`            `'The walking dead'  ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.011.png)       ]; 

`     `//array de series 

`        `return view('series.index', [ 

`            `'series' => $series //passando o array para a view         ]); 

`    `} 

}

na visualização podemos receber isso com a forma do php puro porem o laravel ultiliza um motor de visualização chamado blade que nos permite enxuta codigo php com alguns padrões como pode ser visto abaixo 

Usando Blade

<!DOCTYPE html> ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.012.png)

<html lang="pt-br"> 

`  `<head> 

`    `<title>Controle de Series</title>     <meta charset="utf-8"> 

`  `</head> 

`  `<body> 

`    `ola mundo series 

`    `@foreach ($series as $serie) 

`   `// ao inves de abrirmos um foreach como no php comum podemos usar @foreach 

`        `<li>{{$serie}}</li> // assim como podemos interpolar uma variavel entro {{}}     @endforeach 

`  `</body> </html>

Mesmo código sem uso do blade

<!DOCTYPE html> ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.013.png)

<html lang="pt-br"> 

`  `<head> 

`    `<title>Controle de Series</title>     <meta charset="utf-8"> 

`  `</head> 

`  `<body> 

`    `ola mundo series 

`   `<?php 

`     `foreach($series as $serie) {  ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.014.png)   ?> 

`     `<li><?php echo $serie ?></li>     <?php 

`    `} 

`    `?> 

`  `</body> </html>

💡 Note que ambos terão a mesma saída porem o  codigo fica mais legivel usando o blade![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.015.png)![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.016.png)

**Compactando variaveis no controller**

Caso façamos o passamento de uma variavel a qual possui o mesmo nome tanto em seu controlado quanto na view não precisamos efetuar a declaração completa do array e podemos usar o metodo compact do php como por exemplo

forma comum 

return view('series.index', [ ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.017.png)

`            `'series' => $series         ]);

usando compact

return view('series.index', compact('series'));![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.018.png)![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.019.png)

**Model** 

Uma model é um modelo de banco de dados. usamos elas para evitar escrever código SQL dentro do lavrável. basicamente um modelo de como será rodado o banco de dados elas se localizam na pasta Database/migrations e podem ser criadas atras do artisan com o comando

💡 php artisan make:migration nome\_da\_migration![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.020.png)

dentro da mesma escrevemos o comando que desejamos criar em nossa base de dados desta forma

return new class extends Migration ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.021.png)

{ 

`    `/\*\* 

* Run the migrations. 

`     `\* 

* @return void 

`     `\*/ 

`    `public function up() 

`    `{ 

`        `Schema::create('series', function(Blueprint $table){ 

`            `$table->increments('id'); // cria o campo id 

`            `$table->string('nome', 255); // cria o campo nome na base de dados         }); 

`    `} 

`    `/\*\* 

* Reverse the migrations. 

`     `\* 

* @return void 

`     `\*/ 

`    `public function down() 

`    `{ 

`        `schema::drop('series');     } 

};

após isso rodamos o comando php artisan migration o que irá criar nossa base de dados![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.022.png)

**Manipulando dados** 

Para manipularmos os dados das tarefas do banco de dados iremos criar um arquivo que gerencia nossos dados de banco de dados o nome dele sera serie.php e ira se localizar na raiz da pasta app

<?php ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.023.png)

namespace App; 

use Illuminate\Database\Eloquent\Model; 

class Serie extends Model { 

public $timestamps = false; protected $fillable = ['nome']; 

}![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.024.png)

**controler**

exemplo de controler com os metodos de adicionar e retirar serie enviando mensagem de sucesso

public function store(SeriesFormRequest $request){ ![](Aspose.Words.9bb4c49e-f15b-4100-9008-7cb67a22163c.025.png)

`        `$serie = serie::create($request->all()); 

`        `$request->session()->flash( 

`         `'mensagem', 

`         `"série criada com sucesso {$serie->nome}");         return redirect('/series'); 

`    `} 

`    `public function destroy(Request $request){         serie::destroy($request->id); 

`        `$request->session()->flash( 

`            `'mensagem', 

`            `"série Deletada com sucesso"); 

`           `return redirect('/series'); 

`    `} 
PHP - Laravel 7
