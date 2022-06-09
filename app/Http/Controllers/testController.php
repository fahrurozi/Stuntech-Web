<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function getSummernote()
    {
        return view('files.summernoteform');
    }

    public function postSummernote(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $message = $request->input('message');
        $product = new Product;
        $dom = newDomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submited message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image/(?<mime>.*?);/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "/summernoteimages/$filename.$mimetype";
                // @see 
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100) // encode file to the specified mimetype
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $product->message = $dom->saveHTML();
        $product->save();
    }
}
