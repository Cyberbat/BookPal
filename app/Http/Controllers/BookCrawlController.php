<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Symfony\Component\DomCrawler\Crawler;
  use Goutte\Client;

  use App\Popularbooks;

class BookCrawlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $html='https://www.goodreads.com/book/popular_by_date/2018';
        $hmtl3='https://www.realsimple.com/work-life/entertainment/best-books-of-2018';
        $hmtl2='https://www.thrillist.com/entertainment/nation/best-books-of-2018#';
       
        $client = new Client();
        $client3 = new Client();
        $client2 = new Client();

        $crawler = $client->request('GET', $html);
        $crawler3 = $client3->request('GET', $hmtl3);
        $crawler2 = $client2->request('GET', $hmtl2);

      $cc = $crawler->filter('a > span')->each(function (Crawler $node, $i) {
    return $node->text();
});
    $cc2 = $crawler2->filter('a > em')->each(function (Crawler $node, $i) {
    return $node->text();
});


   $cc3 = $crawler3->filter('h3 > em')->each(function (Crawler $node, $i) {
    return $node->text();
});



for ($i = 0; $i < count($cc); $i++) {

$pop = Popularbooks::where('popbooks', '=', $cc[$i]);

if ($pop->exists()) {


 
}else{


 Popularbooks::forceCreate([
     'popbooks'=>$cc[$i],
  ]);
 
};
};



for ($h = 0; $h < count($cc2); $h++) {
$pop2 = Popularbooks::where('popbooks', '=', $cc2[$h]);

if ($pop2->exists()) {
 
}else{

 Popularbooks::forceCreate([
     'popbooks'=>$cc2[$h],
  ]);
 
};
};


for ($h = 0; $h < count($cc3); $h++) {
$pop3 = Popularbooks::where('popbooks', '=', $cc3[$h]);

if ($pop3->exists()) {

}else{


 Popularbooks::forceCreate([
     'popbooks'=>$cc3[$h],
  ]);
 
};
};


return view('popularbooks.popularbooks');

 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
