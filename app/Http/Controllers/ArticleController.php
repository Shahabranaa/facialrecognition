<?php

namespace App\Http\Controllers;

use App\ArticleImage;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
//use App\Http\HTTP_Request2;
//require_once 'HTTP/Request2.php';

class ArticleController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $articles = Article::all();
        $data = ['articles' => $articles];
        return view('pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

// NOTE: You must use the same region in your REST call as you used to obtain your subscription keys.
//   For example, if you obtained your subscription keys from westus, replace "westcentralus" in the
//   URL below with "westus".
// set post fields
        $parameters = array(
            // Request parameters
            'returnFaceId' => 'true',
            'returnFaceLandmarks' => 'false',
            'returnFaceAttributes' => 'age,gender',
        );
        $headers = array(
            // Request headers
            'Content-Type' => 'application/json',

            // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
            'Ocp-Apim-Subscription-Key' => 'e84c84f4107743d3af813caafd2d3bf2',
        );


        $ch = curl_init('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
//
//// execute!
//        $response = curl_exec($ch);
//
//// close the connection, release resources used
//        curl_close($ch);
//dd($response);
$request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'application/json',

    // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
    'Ocp-Apim-Subscription-Key' => '<Subscription Key>',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'returnFaceId' => 'true',
    'returnFaceLandmarks' => 'false',
    'returnFaceAttributes' => 'age,gender',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody('{"url": "http://www.example.com/images/image.jpg"}');

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $images = $request->file('images');
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::user()->id;
        $article->save();

        foreach ($images as $key=> $image) {
            if ($image != null) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension() . $key;

                $destinationPath = public_path('/images');

                $image->move($destinationPath, $input['imagename']);
            }

            ArticleImage::create([
                'image'=>$input['imagename'],
                'article_id'=>$article->id
        ]);
        }
        return redirect(route('index'))->with('message','An article has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $article = Article::find($id);
        $data = ['article' => $article];
//dd($article->images);
        return view('pages.read',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $article = Article::find($id);
        $data = ['article' => $article];

        return view('pages.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return redirect(route('index'))->with('message','An article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Article::find($id)->delete();

        return redirect(route('index'))->with('message','An article has been deleted');
    }
}
