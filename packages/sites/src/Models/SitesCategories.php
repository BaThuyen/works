<?php

namespace Sites\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class SitesCategories extends Model {

    protected $table = 'sites_categories';
    public $timestamps = false;
    protected $fillable = [
        'site_id',
        'site_category_name',
        'site_category_status',
        'site_category_url',
    ];
    protected $primaryKey = 'site_category_id';

    public function get_sites_categories($site_id) {
        $eloquent = self::orderBy('site_category_id');
        $eloquent->where('site_id', $site_id);
        $sites_categories = $eloquent->paginate(20);
        return $sites_categories;
    }

    public function add_category($input) {
        try {
            $category = self::create([
                        'site_id' => $input['site_id'],
                        'site_category_name' => $input['site_category_name'],
                        'site_category_url' => $input['site_category_url'],
            ]);
            return $category;
        } catch (Exception $e) {
            $category = self::where('site_category_url', $input['site_category_url'])->first();
            if (!empty($category)) {
                $category->site_category_name = $input['site_category_name'];
                $category->save();
                return $category;
            }
        }
    }

    /**
     * Get list of sites categories
     * @param type $category_id
     * @return type
     */
    public function pluckSelect() {
        return $this->pluck('category_name', 'category_id')->all();
    }

}
