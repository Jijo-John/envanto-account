<?php 
namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageService {
       
    
     static $imageName, $dest, $string_file, $s3_url;
    
    /**
     * generateUUid
     *
     * @param  mixed $extention
     * @return void
     */
     
      /**
     * getFileUrl
     *
     */
    public function getFileUrl() {
        
        if(self::$string_file)
        {
            if(strpos(self::$imageName, 'http') !== false || strpos(self::$imageName, 'https') !== false){
                return self::$imageName;
            }
            return asset('images/'.self::$dest.'/' . self::$imageName);
        }
        
        return asset('images/'.self::$dest.'/' . self::$imageName);
    }
    
    private static function generateUUid($extention) {
        self::$imageName = Str::random(34) . '-' . time() . '.' . $extention;
    }
        
    public function upload($file, $dest, $s3 = false) {
        if($file == null){
            return $this;
        }
        self::$dest = $dest;
        if(is_string($file)){
            self::$imageName = $file;
            self::$string_file = true;
            return $this;
        }
        
     
        $extention = $file->getClientOriginalExtension();
        self::generateUUid($extention);
        $file->storeAs($dest, self::$imageName , ['disk' => 'my_files']);
        return $this;
    }
        
   
    
}




